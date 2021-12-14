<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\Agency;
use App\Models\Station;
use App\Models\Supplier;
use App\Models\Department;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::put('page','suppliers');
        if(Auth::User()->hasRole("SuperAdmin") || Auth::User()->hasRole("Centre Manager"))
       {
          $data['page_title']="suppliers";
          $suppliers = DB::table('suppliers')->get();
           return view('suppliers.index',$data)->with(compact('suppliers'));

      }else{
        
        Session::flash('error_message','Not permitted to perform this operation');
        return redirect()->back();
    }
    }

    public function index2(){
        Session::put('page','suppliers');
        if(Auth::User()->hasRole("SuperAdmin")   
        )
       {
          $data['page_title']="suppliers";
          $suppliers = DB::table('suppliers')->get();
           return view('suppliers.index2',$data)->with(compact('suppliers'));

      }else{
        $data['page_title']="suppliers";
        return view("forbidden",$data);
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
          
            'supplierName'=>'string|unique:suppliers|regex:/^[\pL\s\-]+$/u',
            'supplierPin'=>'alpha_num|unique:suppliers',
            'phoneNumber'=>'digits:10',
            'supplierEmail'=>'email|unique:suppliers'
          
        ],[
            'supplierName.unique'=>'This Supplier name already exist!',
            'supplierName.regex'=>'Supplier Name format is invalid',
            'supplierPin.alpha_num'=>'Supplier pin format is invalid',
            'supplierPin.unique'=>'Supplier with this pin already exists ',
            'phoneNumber.digits'=>'phone Number format invalid',
            'supplierEmail.unique'=>'Supplier with this email already exists'
        ]);

        $supplier =new Supplier;
        $supplier->supplierName=$request->supplierName;
        $supplier->supplierPin=$request->supplierPin;
        $supplier->supplierEmail=$request->supplierEmail;
        $supplier->phoneNumber=$request->phoneNumber;
        $supplier->status=1;
        $supplier->save();

        Session::flash('success_message','Supplier Added successfully');
        return redirect()->route('suppliers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'finally we are here';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier=Supplier::find($id);
        return  view('suppliers.edit',compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $supplier=Supplier::find($id);

        $supplier->supplierName=$request->supplierName;
        $supplier->supplierPin=$request->supplierPin;
        $supplier->supplierEmail=$request->supplierEmail;
        $supplier->phoneNumber=$request->phoneNumber;
        $supplier->save();
        Session::flash('success_message','Supplier details updated successfully');
        return redirect()->route('suppliers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

   

          public function Blacklist(Request $request,$id)
          {
      if (Auth::User()->hasRole("Centre Manager") || Auth::User()->hasRole('SuperAdmin')) {
                  $supplier = Supplier::find($id);
                  $supplier->status =0;
                  $supplier->save();
               
                  return redirect('/contactsupplers');
              } else {
                  return view('forbidden');
              }
      
          }

          public function Reinstate(Request $request,$id)
          {
          
      if (Auth::User()->hasRole("Centre Manager") || Auth::User()->hasRole('SuperAdmin')) {
                  $supplier = Supplier::find($id);
                  $supplier->status =1;
                  $supplier->save();
               
                  
                  return redirect('/contactsupplers');
              } else {
                  return view('forbidden');
              }
      
          }

          public function Contact(Request $request,$id){
            $supplier = Supplier::find($id);
            $receipient=$supplier->supplierEmail;
         
              $details=[
                  'title'=>'huduma Kenya',
                  'body'=>'Please correct the purchase Order'
              ];
              Mail::to($receipient)->send(new TestMail($details));
            //   Mail::to('david.chomba.muriuki@gmail.com')->send(new TestMail($details));
            Session::flash('success_message', 'email sent');
             return redirect('/contactsupplers');
          }

          public function fetchSuppliers()
          {
             
            $models = DB::select('SELECT * FROM `suppliers`');
      
              return Datatables::of($models)
      
                  ->addColumn('action', function ($model) {
                      $edit_url = url('/suppliers/' . $model->id . '/edit');
                     
      
                      return '<div class="dropdown ">
      <button class="btn btn-success btn btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Action
      <span class="caret"></span></button>
      <ul class="dropdown-menu">
      <li><a style="cursor:pointer;" class="reject-modal"  data-title="Edit Details" data-url="' . $edit_url . '">Edit Supplier Details </a></li>
      <li><div class="dropdown-divider"></div></li>
     </ul>
      </div> ';
      
                  })
                  ->make(true);
          }

         public function fetchAgencies(){
            $models = Agency::all();

            echo '<option value="">-----select Department---</option>';
    
            foreach ($models as $agency) {
    
                echo '<option value="' . $agency->id . '">' . $agency->name . '</option>';
            }
          }
          public function fetchDepartments(){
            $models = Department::all();

            echo '<option value="">-----select Department---</option>';
    
            foreach ($models as $department) {
    
                echo '<option value="' . $department->id . '">' . $department->dptName . '</option>';
            }
        }
      }
