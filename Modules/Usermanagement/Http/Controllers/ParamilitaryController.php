<?php

namespace Modules\Usermanagement\Http\Controllers;

use App\Helpers\Helper;
use App\Helpers\SystemAudit;
use App\Http\Controllers\Controller;
use App\Imports\RecruitImport;
use App\Models\Category;
use App\Models\County;
use App\Models\Deploymentorganization;
use App\Models\Ethnicity;
use App\Models\MovementTrack;
use App\Models\MultipleEntry;
use App\Models\Nationalservice;
use App\Models\Paramilitary;
use App\Models\Separation;
use Auth;
use Excel;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Yajra\Datatables\Datatables;

class ParamilitaryController extends Controller
{
    protected $userID;
    protected $mid;
    protected $sid;
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            $this->userID = Auth::user()->id;
            $this->sid = Auth::user()->org_id;

            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        if (Auth::User()->hasRole("SuperAdmin")
            ||
            Auth::User()->can(["Add Recruits", "view Recruits", "Edit Recruits", "Deploy Recruits"])) {
            $data['page_title'] = "Paramilitary";

            return view('usermanagement::paramilitary.index', $data);

        } else {
            return view("forbidden");
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {
        if (Auth::User()->hasRole("SuperAdmin")
            ||
            Auth::User()->can(["Admit Recruits", "view admitted Recruits"])) {
            $data['page_title'] = "Paramilitary";
            $data['url'] = url()->current();
            $data['model'] = new Paramilitary();
            if ($request->isMethod("post")) {
                $data = $request->all();
                $model = Paramilitary::where(['servicenumber' => $data['idnumber']])->first();
                if ($model) {
                    DB::beginTransaction();
                    $number = Helper::getServiceNo();
                    $model->para_station = $data['para_station'];
                    $model->yearofadmission = $data['yearofadmission'];
                    $model->intakecycle = $data['intakecycle'];
                    $model->disability = $data['disability'];
                    $model->stage = "Paramilitary";
                    $model->servicenumber = $number;

                    $model->save();

                    $movement = new MovementTrack();
                    $movement->servicenumber = $model->servicenumber;
                    $movement->year = $model->yearofadmission;
                    $movement->event_description = "Join Paramilitary";
                    $movement->organization = $model->para_station;
                    $movement->updated_by = $this->userID;
                    $movement->save();
                    $user = Auth::user();
                    $text = "You have been succesfully Admitted at " . $model->para_station . " ,your Service No is " . $model->servicenumber;

                    $description = $user->name . " admitted recruit  with Id number  " . $movement->id_number;
                    $client_ip = $request->ip();
                    SystemAudit::CreateEvent($user, "Admitted", $description, "Major", $client_ip, "Admission");
                    DB::commit();
                    $sms = Helper::sendSms($model->phone, $text);
                    Session::flash("success_msg", "Recruit Admitted Successfully");
                    return redirect('/Backend/Paramilitary/Index');

                }
                dd($data);
            }
            return view('usermanagement::paramilitary.create', $data);

        } else {
            return view("forbidden");
        }

    }

    public function fetchList()
    {
        $models = DB::select('SELECT * FROM `categories`');
        return Datatables::of($models)

            ->addColumn('action', function ($model) {
                $edit_url = url('/categories/' . $model->id . '/edit');
                $view_url = url('/paramilitary/' . $model->id);
                $deploy_url = url('/Backend/Paramilitary/Deployment/' . $model->id);
                $exit_url = url('/Backend/Paramilitary/Exit/' . $model->id);

                return '<div class="dropdown ">
        <button class="btn btn-info btn btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Action
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
        <li><a style="cursor:pointer;" class="reject-modal"  data-title="Edit Details" data-url="' . $edit_url . '">Edit Details</a></li>
        <li><div class="dropdown-divider"></div></li>
        <li><a style="cursor:pointer;" class="reject-modal"  data-title="View" data-url="' . $view_url . '">View</a></li>

        </ul>
        </div> ';

            })
            ->make(true);
    }

    public function Import(Request $request)
    {
        if (Auth::User()->hasRole("SuperAdmin")
            ||
            Auth::User()->can(["Add Recruits", "view Recruits", "Edit Recruits", "Deploy Recruits"])) {
            $data['page_title'] = "Data Import";
            $paramilitaries =
            $data['url'] = url()->current();
            if ($request->isMethod("Post")) {
                ini_set('memory_limit', '-1');
                $data = $request->all();
                $file_name = $data['file_name'];

                $path1 = $file_name->store('temp');
                $path = storage_path('app') . '/' . $path1;

                $array = Excel::toarray(new RecruitImport, $path);
                array_splice($array[0], 0, 1);
                foreach ($array as $rows) {
                    foreach ($rows as $row) {
                        try {

                            $serviceNumber = $row[0];
                            $idnumber = $row[1];
                            $name = $row[2];
                            $sex = $row[3];
                            $countyName = $row[4];
                            $county = County::where(['countycode' => $countyName])->first();
                            $name = str_ireplace("’", "", $name);

                            $year = 2017;
                            $reason = null;

                            if (preg_match("/F/i", $sex)) {
                                $gender = "Female";
                                $gender = "Male";
                                $malecount = 0;
                                $femalecount = 1;
                            } else if (preg_match("/M/i", $sex)) {
                                $gender = "Male";
                                $malecount = 1;
                                $femalecount = 0;
                            } else {
                                $gender = $gender;
                                $malecount = 1;
                                $femalecount = 0;

                            }
                            $model = $param = Paramilitary::where(['servicenumber' => $serviceNumber])->first();
                            if (!$model) {
                                $idmodel = Paramilitary::where(['idnumber' => $idnumber])->first();
                                if ($idmodel) {
                                    $idnumber = null;
                                }
                                DB::beginTransaction();
                                $model = new Paramilitary();
                                $model->servicenumber = $serviceNumber;
                                $model->idnumber = $idnumber;
                                $model->name = strtoupper($name);
                                $model->gender = $gender;
                                $model->countyofbirth = ($county) ? $county->id : null;
                                $model->yearofadmission = $year;
                                $model->countyofbirth = null;
                                $model->created_by = $this->userID;
                                $model->isMale = $malecount;
                                $model->IsFemale = $femalecount;
                                $model->stage = "Paramilitary";
                                $model->completion_status = "Ongoing";
                                $model->occupation_status = null;
                                $model->save();
                                $movement = new MovementTrack();
                                $movement->servicenumber = $serviceNumber;
                                $movement->year = $year;
                                $movement->event_description = "Join Paramilitary";
                                $movement->organization = "Paramilitary";
                                $movement->created_by = $this->userID;
                                $movement->save();

                                if ($model->completion_status == "Discharged") {
                                    $separation = new Separation();
                                    $separation->servicenumber = $model->servicenumber;
                                    $separation->stageofexit = "Paramilitary";
                                    $separation->year = $year;
                                    $separation->reason = $reason;
                                    $separation->save();
                                    $movement = new MovementTrack();
                                    $movement->servicenumber = $serviceNumber;
                                    $movement->year = $year;
                                    $movement->event_description = "Exited due to " . $reason;
                                    $movement->organization = "Paramilitary";
                                    $movement->created_by = $this->userID;
                                    $movement->save();

                                }

                                DB::commit();

                            } else {
                                $model = new MultipleEntry();
                                $model->service_number = $serviceNumber;
                                $model->batch_description = "Admission";
                                $model->year = $year;
                                $model->similar_id_name = $param->idnumber;
                                $model->save();
                            }

                        } catch (\Exceptions $e) {

                        }
                    }
                }
                Session::flash("success_msg", "Data Imported Successfully");
                return redirect('/home');

            }

            return view('usermanagement::paramilitary.import', $data);

        } else {
            return view("forbidden");
        }

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, Paramilitary $paramilitary)
    {
        //
        $data = $request->all();
        $paramilitary->servicenumber = $request->servicenumber;
        $paramilitary->name = $request->name;
        $paramilitary->idnumber = $request->idnumber;
        $paramilitary->dateofbirth = $request->dateofbirth;
        $paramilitary->countyofbirth = $request->countyofbirth;
        $paramilitary->countyofresidence = $request->countyofresidence;
        $paramilitary->recruitmentstation = $request->recruitmentstation;
        $paramilitary->phone = $request->phone;
        $paramilitary->email = $request->email;
        $paramilitary->ethnicity = $request->ethnicity;
        $paramilitary->gender = $request->gender;
        $paramilitary->yearofadmission = $request->yearofadmission;
        $paramilitary->intakecycle = $request->intakecycle;
        $paramilitary->passoutdate = $request->passoutdate;
        $paramilitary->disability = $request->disability;

        $exists = DB::table('paramilitaries')->where('servicenumber', $request->servicenumber)->count();

        if ($exists > 0) {
            Session::flash('success_message', 'Invalid service number!');
            return redirect('paramilitary');
        } else {
            $paramilitary->save();
            Session::flash('success_message', 'Recruit registered successfully');
            return redirect('paramilitary');
        }
    }

    public function Deploy($servicenumber, Request $request)
    {

        $paramilitary = $model = paramilitary::where('servicenumber', $servicenumber)->first();

        $counties = County::all();
        $deploymentorganizations = Deploymentorganization::all();
        $data['counties'] = $counties;
        $data['deploymentorganizations'] = $deploymentorganizations;
        $data['paramilitary'] = $paramilitary;

        $data['url'] = url()->current();

        if ($request->isMethod("post")) {
            $data = $request->all();
            DB::beginTransaction();
            $paramilitary->stage = "National Service";
            $paramilitary->save();
            $model = Nationalservice::where(['servicenumber' => $paramilitary->servicenumber])->first();
            if (!$model) {
                $model = new Nationalservice();
                $model->servicenumber = $paramilitary->servicenumber;
            }

            $model->deployedorganization = $data['deployedorganization'];
            $model->countyposted = $data['countyposted'];
            $model->physicallocation = $data['physicallocation'];
            $model->duty = $data['duty'];
            $model->startdate = date('Y-m-d', strtotime($data['startdate']));
            $model->enddate = date('Y-m-d', strtotime($data['enddate']));
            $model->save();
            DB::commit();
            Session::flash("success_msg", "stage updated successfully");
            return redirect()->back();

        }
        //print_r(compact('paramilitary'));exit;
        return view('usermanagement::paramilitary.deploy', $data);

    }
    function exit($servicenumber, Request $request) {

        $paramilitary = $model = paramilitary::where('servicenumber', $servicenumber)->first();
        $data['paramilitary'] = $paramilitary;
        $data['url'] = url()->current();
        if ($request->isMethod("post")) {

            $data = $request->all();
            $separation = Separation::where(['servicenumber' => $paramilitary->servicenumber])->first();
            if (!$separation) {
                $separation = new Separation();
                $separation->servicenumber = $paramilitary->servicenumber;

            }
            $separation->stageofexit = "Paramilitary";
            $separation->typeofexit = $request->typeofexit;
            $separation->reason = $request->reason;
            $separation->dateofexit = date('Y-m-d', strtotime($request->date));
            $separation->save();
            Session::flash("success_msg", "Exited successfully");
            return redirect()->back();

        }

        //print_r(compact('paramilitary'));exit;
        return view('usermanagement::paramilitary.exit', $data);
    }
    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('usermanagement::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $category = Category::find($id);
        dd($category);

        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
        $paramilitary = Paramilitary::find($id);
        $paramilitary->name = $request->name;
        $paramilitary->idnumber = $request->idnumber;
        $paramilitary->dateofbirth = $request->dateofbirth;
        $paramilitary->countyofbirth = $request->countyofbirth;
        $paramilitary->countyofresidence = $request->countyofresidence;
        $paramilitary->recruitmentstation = $request->recruitmentstation;
        $paramilitary->phone = $request->phone;
        $paramilitary->email = $request->email;
        $paramilitary->ethnicity = $request->ethnicity;
        $paramilitary->gender = $request->gender;
        $paramilitary->yearofadmission = $request->yearofadmission;
        $paramilitary->intakecycle = $request->intakecycle;
        $paramilitary->passoutdate = $request->passoutdate;
        $paramilitary->disability = $request->disability;
        $paramilitary->save();
        Session::flash('success_message', 'Recruit details updated successfully');
        return redirect('paramilitary');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
