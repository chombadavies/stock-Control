<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Order_detail;
use Auth;
use Illuminate\Support\Facades\DB;
use Session;

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

    public function Dashboard()
    {

        $models = DB::select("SELECT products.productName,sum(quantity) as total FROM order_details
        join products on products.id=order_details.product_id WHERE order_details.centre_id=?
        GROUP by productName   order by total   desc limit 8",[Auth::User()->centre_id]);
        $data = array();
       
        foreach ($models as $model) {
            $data[] = array('name' => $model->productName, 'y' => intval($model->total));
        }
        return $data;
    }
    public function index()
    {
        //   if(Auth::User()->hasRole("SuperAdmin") or Auth::User()->Can("View Admin Dashboard"))
        //   {

        Session::put('page', 'admin');
        $data['page_title'] = "Warehouse Management";
        $centre = Centre::where(['id' => Auth::User()->centre_id])->first();
        Session::put('page', 'dashboard');

        if (Auth::User()->hasRole('SuperAdmin') || Auth::User()->hasRole('Centre Manager') ||
        Auth::User()->hasRole('Store Manager') || Auth::User()->hasRole('Staff') || Auth::User()->hasRole('Supervisor')) {
        $issued = Order_detail::where(['issue' => 1, 'centre_id' => Auth::User()->centre_id, 'dpt_id' => Auth::User()->dpt_id])->count();
        $pedding = Order_detail::where(['approve' => 0, 'reject' => 0, 'issue' => 0, 'centre_id' => Auth::User()->centre_id, 'dpt_id' => Auth::User()->dpt_id])->count();
        $rejected = Order_detail::where(['reject' => 1, 'centre_id' => Auth::User()->centre_id, 'dpt_id' => Auth::User()->dpt_id])->count();
        $approved = Order_detail::where(['approve' => 1, 'issue' => 0, 'centre_id' => Auth::User()->centre_id, 'dpt_id' => Auth::User()->dpt_id])->count();
        return view('dashboards.admin', $data)->with(compact('centre', 'pedding', 'rejected', 'approved','issued'));
    } else if (Auth::User()->hasRole('Staff')) {
        $issued = Order_detail::where(['issue' => 1, 'centre_id' => Auth::User()->centre_id, 'user_id' => Auth::User()->id])->count();
        $pedding = Order_detail::where(['approve' => 0, 'reject' => 0, 'issue' => 0, 'centre_id' => Auth::User()->centre_id, 'user_id' => Auth::User()->id])->count();
        $rejected = Order_detail::where(['reject' => 1, 'centre_id' => Auth::User()->centre_id, 'user_id' => Auth::User()->id])->count();
        $approved = Order_detail::where(['approve' => 1, 'issue' => 0, 'centre_id' => Auth::User()->centre_id, 'user_id' => Auth::User()->id])->count();
        return view('dashboards.admin', $data)->with(compact('centre', 'pedding', 'rejected', 'approved','issued'));
    } else {
        return view('forbidden');
    }
       
  
       

        //   }else if(Auth::User()->hasRole(['Student'])){

        //      $data['page_title']="Profile";
        //        return redirect('/Applicant/Profile/Update');
        //      return view("recruits",$data);

        //   }

        //   else{
        //      return view("forbidden");
        //   }

    }
    public function Departments()
    {
        $models = DB::select("SELECT departments.dptName,sum(dpt_id) as total FROM order_details
        join departments on departments.id=order_details.dpt_id WHERE dpt_id <> 7
        GROUP by dptName   order by total desc ");
        
        $data = array();
        foreach ($models as $model) {
            $data[] = array('name' => $model->dptName, 'y' => intval($model->total));
        }
        return $data;
    }

}
