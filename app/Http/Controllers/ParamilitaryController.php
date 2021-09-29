<?php

namespace App\Http\Controllers;

use Session;
use App\Models\County;
use App\Models\Ethnicity;
use App\Models\Paramilitary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParamilitaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paramilitaries = DB::table('paramilitaries')
            ->join('counties', 'paramilitaries.countyofbirth', '=', 'counties.countycode')
            ->select('paramilitaries.*', 'counties.countyname')
            ->get();
        // $products=json_decode(json_encode($products));
        // echo "<pre>"; print_r($products); die;
        return view('paramilitaries.index',compact('paramilitaries'));
        /* $data=DB::table('paramilitaries')
            ->join('counties as a','a.id','=','paramilitaries.countyofbirth')
            ->join('counties as b','b.id','=','paramilitaries.countyofresidence')
            ->join('recruitmentstations','recruitmentstations.id','=','paramilitaries.recruitmentstation')
            ->join('ethnicities','ethnicities.id','=','paramilitaries.ethnicity')
            ->select('paramilitaries.servicenumber','a.countyname','b.countyname','recruitmentstations.name','ethnicities.ethnicityname')
            ->get();

        foreach (compact('data') as $item) 
            echo $item->servicenumber;
        
        die;*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    $paramilitaries= Paramilitary::all();
    $counties=County::all();
    $ethnicities=Ethnicity::all();
    return view('paramilitaries.create',compact('paramilitaries','counties','ethnicities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Paramilitary $paramilitary)
    {
        $data = $request->all();
        $paramilitary->servicenumber= $request->servicenumber;
        $paramilitary->name= $request->name;
        $paramilitary->idnumber= $request->idnumber;
        $paramilitary->dateofbirth= $request->dateofbirth;
        $paramilitary->countyofbirth= $request->countyofbirth;
        $paramilitary->countyofresidence= $request->countyofresidence;
        $paramilitary->recruitmentstation= $request->recruitmentstation;
        $paramilitary->phone= $request->phone;
        $paramilitary->email= $request->email;
        $paramilitary->ethnicity= $request->ethnicity;
        $paramilitary->gender= $request->gender;
        $paramilitary->yearofadmission= $request->yearofadmission;
        $paramilitary->intakecycle= $request->intakecycle;
        $paramilitary->passoutdate= $request->passoutdate;
        $paramilitary->disability= $request->disability;                
        $paramilitary->save();
        Session::flash('success_message','Recruit registered successfully');
            return redirect('paramilitary');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\paramilitary  $paramilitary
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $paramilitary= Paramilitary::find($id);
        $counties =County::all();
        $ethnicities =Ethnicity::all();
        return view('paramilitaries.view',compact('paramilitary','counties','ethnicities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\paramilitary  $paramilitary
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paramilitary= Paramilitary::find($id);
        $counties =County::all();
        $ethnicities =Ethnicity::all();
        return view('paramilitaries.edit',compact('paramilitary','counties','ethnicities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\paramilitary  $paramilitary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $paramilitary = Paramilitary::find($id);
        $paramilitary->name= $request->name;
        $paramilitary->idnumber= $request->idnumber;
        $paramilitary->dateofbirth= $request->dateofbirth;
        $paramilitary->countyofbirth= $request->countyofbirth;
        $paramilitary->countyofresidence= $request->countyofresidence;
        $paramilitary->recruitmentstation= $request->recruitmentstation;
        $paramilitary->phone= $request->phone;
        $paramilitary->email= $request->email;
        $paramilitary->ethnicity= $request->ethnicity;
        $paramilitary->gender= $request->gender;
        $paramilitary->yearofadmission= $request->yearofadmission;
        $paramilitary->intakecycle= $request->intakecycle;
        $paramilitary->passoutdate= $request->passoutdate;
        $paramilitary->disability= $request->disability;                
        $paramilitary->save();
        Session::flash('success_message','Recruit details updated successfully');
        return redirect('/Backend/Paramilitary/Index');
    }

    public function deploy(Request $request, $id)
    {
        $count = DB::table('paramilitaries')
                ->WhereNull('passoutdate')
                ->where('servicenumber', '=', $servicenumber)->count();
        if($count>0){
            Session::flash('success_message','Serviceman still active in Paramilitary Training');
            return back();
        }
        $count = DB::table('paramilitaries')
                ->where([
                            ['passoutdate','>',date('Y-m-d')],
                            ['servicenumber', '=', $servicenumber],
                        ])->count();
        if($count>0){
            Session::flash('success_message','Serviceman still active in Paramilitary Training');
            return back();
        }
        if($request->caller=="nationalservice"){
            $nationalservice = DB::table('nationalservices')->where('servicenumber', $servicenumber)->first();
            //print_r(compact('nationalservice'));exit;
            $nationalservice->servicenumber= $request->servicenumber;   
            $nationalservice->deployedorganization= $request->deployedorganization;
            $nationalservice->countyposted= $request->countyposted;
            $nationalservice->physicallocation= $request->physicallocation;
            $nationalservice->duty= $request->duty;
            $nationalservice->startdate= $request->startdate;
            $nationalservice->enddate= $request->enddate;
            if($nationalservice->startdate > $nationalservice->enddate){
                $count=1;
            }else{
                $count=0;
            }
            if($nationalservice->startdate == $nationalservice->enddate){
                $count3=1;
            }else{
                $count3=0;
            }
            if($count>0 or $count3>0){
                Session::flash('success_message','Invalid dates');
                return back();
            }
            if($nationalservice->enddate < date('Y-m-d')){
                $count2=1;
            }else{
                $count2=0;
            }
            if($count2>0){
                Session::flash('success_message','End date is in the past!');
                return back();
            }
            DB::insert('UPDATE nationalservices SET deployedorganization=?, countyposted=?, physicallocation=?, duty=?, startdate=?, enddate=? WHERE servicenumber=?', [$nationalservice->deployedorganization, $nationalservice->countyposted, $nationalservice->physicallocation, $nationalservice->duty, $nationalservice->startdate, $nationalservice->enddate, $nationalservice->servicenumber]);
        }else{
            $nationalservice = DB::table('paramilitaries')->where('servicenumber', $servicenumber)->first();
            //$nationalservice = $request->all();
            $nationalservice->servicenumber= $request->servicenumber;   
            $nationalservice->deployedorganization= $request->deployedorganization;
            $nationalservice->countyposted= $request->countyposted;
            $nationalservice->physicallocation= $request->physicallocation;
            $nationalservice->duty= $request->duty;
            $nationalservice->startdate= $request->startdate;
            $nationalservice->enddate= $request->enddate;            
            if($nationalservice->startdate > $nationalservice->enddate){
                $count=1;
            }else{
                $count=0;
            }
            if($tvettraining->startdate < date('Y-m-d')){
                $count2=1;
            }else{
                $count2=0;
            }
            if($nationalservice->startdate == $nationalservice->enddate){
                $count3=1;
            }else{
                $count3=0;
            }
            if($count>0 or $count2>0 or $count3>0){
                Session::flash('success_message','Invalid dates');
                return back();
            }
            DB::insert('INSERT INTO nationalservices (servicenumber, deployedorganization, countyposted, physicallocation, duty, startdate, enddate) values (?, ?, ?, ?, ?, ?, ?)', [$nationalservice->servicenumber, $nationalservice->deployedorganization, $nationalservice->countyposted, $nationalservice->physicallocation, $nationalservice->duty, $nationalservice->startdate, $nationalservice->enddate]);
        }
        Session::flash('success_message','Recruit deployment details updated successfully');
        return redirect('/Backend/Paramilitary/Index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\paramilitary  $paramilitary
     * @return \Illuminate\Http\Response
     */
    public function destroy(paramilitary $paramilitary)
    {
        //
    }
}
