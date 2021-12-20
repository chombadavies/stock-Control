<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Hash;
use Image;
use Session;
use Reminder;
use App\Models\User;
use \App\Models\Admin;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class AdminController extends Controller
{

    public function settings()
    {
// echo "<pre>"; print_r( Auth::guard('admin')->user());die;
Session::put('page','settings');
$suppliers =Supplier::all();
        $adminDetails = Admin::Where('email', Auth::guard('admin')->user()->email)->first();
        return view("admin.admin_auth.admin_settings")->with(compact("adminDetails"));
    }
    public function dashboard()
    {
        $chart1 = (new LarapexChart)->barChart()
        ->setTitle('Recruits')
        ->setSubtitle('Cummulative recruits sinve 2010.')
        ->addData('Recruits', [5105, 5600,5600, 0, 4278, 19336, 10551,29193,16850,12194,8046])
        ->setXAxis(['2010', '2011', '2012', '2013', '2014', '2015','2016','2017','2018','2019','2020']);


        $chart3 = (new LarapexChart)->lineChart()
        ->setTitle('cummulative recruits Per gender')
        ->setSubtitle('Recruits per gender since 2010')
        ->addData('Males', [3975, 3471,3471, 0, 3101, 12896, 7803,21262,9732,7241,5752])
        ->addData('Females', [1630, 2129,2129, 0, 1177, 6440, 2748,7931,7118,4953,2294])
        ->setXAxis(['2010', '2011', '2012', '2013', '2014', '2015','2016','2017','2018','2019','2020']);

        $chart4 = (new LarapexChart)->barChart()
        ->setTitle('cummulative recruits')
        ->setSubtitle('Recruits per decade since indipendence')
        ->addData('intake per dacade', [11100, 39500,32416, 25601, 39375, 100448])
        ->setXAxis(['1964-1973', '1974-1983', '1984-1993', '1994-2003', '2004-2013', '2014-Date'])
        ->setColors(['#22BC22']);

        $chart2 = (new LarapexChart)->donutChart()
        ->setTitle('Recruitment Ratio')
        ->setSubtitle('Recruitment Ratio since independence to 2009 and 2010 to 2020')
        ->addData([131687,116753])
        ->setLabels([ 'since indepence to 2009', 'from 2009 to Date'])
        ->setColors(['#D32F2F', '#03A9F4']);


      
    Session::put('page','dashboard');
        return view('admin.admin_dashboard')->with(compact('chart1','chart3','chart4','chart2','suppliers'));
    }

    public function login(Request $request)
    {
        dd($request);
        if ($request->isMethod('post')) {
            dd($request);

            // $validated = $request->validate([
            //     'email' => 'required|email|max:255',
            //     'password' => 'required',
            // ]);
            $rules = ['email' => 'required|email|max:255',
                'password' => 'required'];
            $custommessage = [
                'email.required' => 'email is required',
                'email.email' => 'invalid email address',
                'password.required' => 'password is required',
            ];
            $this->validate($request, $rules, $custommessage);

            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('home');
            } else {
                Session::flash('error_message', 'invalid email or password');
                Session::forget('success_message');
                return redirect()->back();
            }
        }
        return view('admin.admin_auth.admin_login');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }

    public function chkCurrentPassword(Request $request)
    {
        $data = $request->all();
        // echo "<pre>"; print_r($data); die;
        if (Hash::check($data['current_pwd'], Auth::guard('admin')->user()->password)) {
            echo "true";
        } else {
            echo "false";
        }
    }
    
    public function confirmPassword(Request $request)
    {
        $data = $request->all();
        // echo "<pre>"; print_r($data); die;
        if (Hash::check($data['new_pwd'],$data['confirm_pwd'])) {
            echo "true";
        } else {
            echo "false";
        }
    }

    public function updateCurrentPassword(Request $request)
    {
       
        if ($request->isMethod('post')) {
            $data = $request->all();
            //check if current password is correct
            if (Hash::check($data['current_pwd'], Auth::guard('admin')->user()->password)) {
                //chwck for password match

                if ($data['new_pwd'] == $data['confirm_pwd']) {
                    Admin::where('id', Auth::guard('admin')->user()->id)->update(['password' => bcrypt($data['new_pwd'])]);
                    Session::flash('success_message', 'Passwords updated successfully');
                } else {
                    Session::flash('error_message', 'Passwords do not match');

                }
            } else {
                Session::flash('error_message', 'Your current password is incorect');
            }
            return redirect()->back();
        }
    }

    public function updateAdminDetails(Request $request)
    {
        Session::put('page','update-admin-details');
        $adminDetails = Admin::Where('email', Auth::guard('admin')->user()->email)->first();
        if ($request->isMethod('post')) {
            $data = $request->all();
            //  echo "<pre>"; print_r($data); die;
            $rules = [
                'admin_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'admin_mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:14',
                'admin_image' => 'image|mimes:jpeg,jpg,png,gif|required|max:10000',
            ];
            $custommessage = [
                'admin_name.required' => 'Name is Required',
                'admin_name.alpha' => 'Valid Name is Required',
                'admin_mobile.required' => 'mobile phone is require',
                'admin_mobile.numeric' => 'a valid phone number is required',
                'admin_mobile.min' => 'phone number digits at least 10',
                'admin_mobile.max' => ' phone number digits cannot exceed 10',
                'admin_image.mimes' => 'image file required',
            ];
            $this->validate($request, $rules, $custommessage);
//upload the image

if($request->hasFile('admin_image')){
    $image_tmp = $request->file('admin_image');
    if($image_tmp->isValid()){
        // Get Image Extension
        $extension = $image_tmp->getClientOriginalExtension();
        // Generate New Image Name
        $imageName = rand(111,99999).'.'.$extension;
        $imagePath = 'images/admin_images/admin_photos/'.$imageName;
        // Upload the Image
        Image::make($image_tmp)->resize(300,400)->save($imagePath);
    }
}else if(!empty($data['current_admin_image'])){
    $imageName = $data['current_admin_image'];
}else{
    $imageName = "";
}
            
            //update the admin_details
            Admin::where('email', Auth::guard('admin')->user()->email)
                ->update(['name' => $data['admin_name'], 'mobile' => $data['admin_mobile'], 'image' => $imageName]);
            Session::flash('success_message', 'Admin details updated successfully !');
        }
        return view('admin.admin_auth.update_admin_details')->with(compact('adminDetails'));
    }

    public function registerFormShow(){
        return view ('admin.admin_auth.register');
    }


    public function registerAdmin(Request $request ){
      
  
    $rules = [
    'name'=>'required|regex:/\A(?!.*[:;]-\))[ -~]{3,20}\z/',
    'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',
    'admin_image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
    'email' => 'required|email|max:255',
    'password' => 'required',
    'confirm_password'=>'required|same:password'

   
];

$custommessage = [
'email.required' => 'email is required',
'email.email' => 'invalid email address',
'type.required'=>' Admin type is required',
'password.required' => 'password is required',
'name.required'=>'admin name is required',
'phone.required' => 'phone number is required',
'phone.numeric' => 'valid phone number is required',
'phone.min' => 'phone number digits at least 10',
'phone.max' => ' phone number digits cannot exceed 10',
'admin_image.required'=>'admin image is required',
'confirm_password.required'=>'confirm password is required',
'confirm_password.same'=>'passwords do not match'

];
$this->validate($request, $rules, $custommessage);

    
if($request->hasFile('admin_image')){
    $image_tmp = $request->file('admin_image');
    if($image_tmp->isValid()){
        // Get Image Extension
        $extension = $image_tmp->getClientOriginalExtension();
        // Generate New Image Name
        $imageName = rand(111,99999).'.'.$extension;
        $imagePath = 'images/admin_images/admin_photos/'.$imageName;
        // Upload the Image
        Image::make($image_tmp)->resize(300,400)->save($imagePath);
    }
}else{
    $imageName = "";
}

      //check if user exist
      $userCount=User::where('email',$request->email)->count();
      if($userCount>0){
          $message= 'email already exist';
          session::flash('error_message',$message);
   return redirect('/');
  
      }  
      
      $user= new User;
      $user->name=$request->name;
      $user->phone=$request->phone;
      $user->user_type='admin';
    //   $user->image= $imageName;
      $user->email=$request->email;
      $user->password=bcrypt($request->password);
    //   dd($admin);
      $user->save();
  
      return redirect('/');
}

public function forgotPassword(Request $request){
if ($request->isMethod('post')){
    $data= $request->all();
    // dd($data);die;
    // //  echo "<pre>"; print_r($data); die;
    $emailCount = Admin::where('email',$data['email'])->count();
    if($emailCount==0){
$message ="Email doent exist!";
Session::put('error_message',$message);
Session::forget('success_message');
return redirect()->back();
    }
  //generate randorm password
$random_password= str_random(8);

 //ecode password
 $new_password = bcrypt($random_password);

 // update password
 Admin::where('email',$data['email'])->update(['password'=>$new_password]);

 //get username
$userName= Admin::select('name')->where('email',$data['email'])->first();

//send forgot password email
$emailAddress= $data['email'];
$name =$userName->name;
$messageData =[
    'email'=>$emailAddress,
    'name'=>$name,
    'password'=>$random_password

];
Mail::send('admin.emails.forgot_password',$messageData, function($message)use($emailAddress){
$message->to($emailAddress)->subject('New Password - UFE Admin panel');
});
//redirect to login
$message ='Please check your Email for a new Password.';
Session::put('success_message',$message);
Session::forget('error_message');
return redirect('/');
}
    return view('admin.admin_auth.forgot_password');
}
  

}
