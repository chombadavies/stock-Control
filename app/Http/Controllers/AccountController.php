<?php

namespace App\Http\Controllers;

use Session;
use App\Models\County;
use App\Models\Ethnicity;
use App\Models\Paramilitary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Helpers\Helper;
use Modules\Usermanagement\Entities\Profile;
use App\Helpers\SystemAudit;
class AccountController extends Controller
{
    //

    public function ValidateAccount ()
    {
    	$data['page_title']="Account Verification";
    	 return view('account_verification',$data);

    }

    public function CheckMyAccount(Request $request)
    {
    	 $data=$request->all();
    	   $no=$data['serviceNo'];
    	    $model=Paramilitary::where(['servicenumber'=>$no])->first();
    	      if($model)
    	      {
    	      	 $data=array("Name"=>$model->name,
    	      	 	         "Email"=>$model->email,
    	      	 	         "Telephone"=>$model->phone,
    	      	 	         'ServiceNo'=>$model->servicenumber,


    	      	             );
    	      	 return $data;

    	      }else{
    	      	 return  0;
    	      }
    	  

    }

    public function RegisterAccount(Request $request)
    {
         DB::beginTransaction();
          $code=Helper::generatePin(6);
          $verification_code=strrev(Helper::generatePin(18));
            $data=$request->all();
           $user=new User();
           $user->name=$data['name'];
           $user->email=$data['email'];
           $user->username=$data['serviceno'];
           $user->phone=Helper::processNumber($data['phone']);
           $user->password=$code;
           $user->verification_code=$code;
           $user->user_status="Active";
           $user->user_type="External";
           $user->save();
            $profile=new Profile();
            $profile->user_id=$user->id;
            $profile->servicenumber=$user->username;
            $profile->Profile_Status="Draft";

            $profile->save();
         $roles="Student";
         $user->assignRole($roles);
            $description=$user->name." Registered  Account using".$user->username." as Service No";
                $client_ip=$request->ip();
        SystemAudit::CreateEvent($user,"Registered",$description,"Critical",$client_ip,"Student Registration Module");
        DB::commit();
         $text="Your NYS Portal logins are :\n Email :".$user->email."\n Password :".$code;
        Helper::sendSms($user->phone,$text);
        Session::flash("success_mg","Your Account Password has been sent to your Telephone :".$user->phone);
         return redirect('/');
         

    }
}
