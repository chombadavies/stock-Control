<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Image;
use Session;
use Reminder;
use App\Models\Item;
use App\Models\Centre;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //   if(Auth::User()->hasRole("SuperAdmin") or Auth::User()->Can("View Admin Dashboard"))
        //   {
            
            Session::put('page','admin');
              $data['page_title']="Warehouse Management";
              $centre = Centre::where(['id'=>Auth::User()->centre_id])->first();
            Session::put('page','dashboard');
              return view('dashboards.admin',$data)->with(compact('centre'));
        
        //   }else if(Auth::User()->hasRole(['Student'])){

        //      $data['page_title']="Profile";
        //        return redirect('/Applicant/Profile/Update');
        //      return view("recruits",$data);


        //   }

        //   else{
        //      return view("forbidden");
        //   }
       
    }
    public function makereports(){
        echo('Comming soon');
    }

   
}
