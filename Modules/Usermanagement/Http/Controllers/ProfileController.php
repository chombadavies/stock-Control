<?php

namespace Modules\Usermanagement\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller ;
use Modules\Usermanagement\Entities\Department;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use App\User;
use Auth;
use DB;
use Input;
use Modules\Usermanagement\Entities\Role;
use Modules\Usermanagement\Entities\Location;
use Modules\Usermanagement\Entities\Profile;
use Modules\Usermanagement\Entities\Permission;
use Validator;
use Redirect;
use App\Helpers\SystemAudit;
use App\Models\County;
use App\Models\Ethnicity;
use App\Models\Paramilitary;
class ProfileController extends Controller
{
    protected $userID;
    protected $mid;
    protected $sid;
  public function __construct()
    {
       $this->middleware('auth');
        
       
        $this->middleware(function ($request, $next) {
            $this->userID = Auth::user()->id;
            $this->sid=Auth::user()->org_id;

            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('usermanagement::index');
    }

    public function  UpdateProfile (Request $request)
    {
          if(Auth::User()->hasRole("Student"))
          {
             $data['page_title']="Profile";
             $data['url']=url()->current();
             $data['user']=$user=Auth::User();
             $data['profile']=Auth::User()->profile;
             $data['counties']=Location::select('county')->distinct()->pluck('county','county')->toArray();
              $data['entinicity']=Ethnicity::pluck('ethnicityname','ethnicityname')->toarray();
              $data['model']=$model=Paramilitary::where(['servicenumber'=>$user->username])->first();
                      if($request->isMethod("post"))
                      {
                         $data=$request->all();


                          $model->idnumber=$data['id_number'];
                          $model->dateofbirth=date('Y-m-d',strtotime($data['dateofbirth']));
                          $model->sub_countyname=$data['sub_countyname'];
                          $model->division=$data['devision'];
                          $model->location=$data['location'];
                          $model->sub_location=$data['sub_location'];
                          $model->is_employed=$data['is_employed'];
                          $model->organization_type=$data['organization_type'];
                          $model->organization_name=$data['organization_name'];
                          $model->save();
                            Session::flash("success_msg","Profile Updated Succesfully");
                            return redirect()->back();
                      }

              return view('usermanagement::profiles.update',$data);
             


          }else{
            return view("forbidden");
          }

    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('usermanagement::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
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
        return view('usermanagement::edit');
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
