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
        join products on products.id=order_details.product_id
        GROUP by productName   order by total   desc limit 8");
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
        $pedding = Order_detail::where(['approve' => 0, 'reject' => 0, 'issue' => 0, 'centre_id' => Auth::User()->centre_id, 'dpt_id' => Auth::User()->dpt_id])->count();
        $rejected = Order_detail::where(['reject' => 1, 'centre_id' => Auth::User()->centre_id, 'dpt_id' => Auth::User()->dpt_id])->count();
        $approved = Order_detail::where(['approve' => 1, 'issue' => 0, 'centre_id' => Auth::User()->centre_id, 'dpt_id' => Auth::User()->dpt_id])->count();
        $issued = Order_detail::where(['issue' => 1, 'centre_id' => Auth::User()->centre_id, 'dpt_id' => Auth::User()->dpt_id])->count();
        $centre = Centre::where(['id' => Auth::User()->centre_id])->first();
        Session::put('page', 'dashboard');
        return view('dashboards.admin', $data)->with(compact('centre', 'pedding', 'rejected', 'approved','issued'));

        //   }else if(Auth::User()->hasRole(['Student'])){

        //      $data['page_title']="Profile";
        //        return redirect('/Applicant/Profile/Update');
        //      return view("recruits",$data);

        //   }

        //   else{
        //      return view("forbidden");
        //   }

    }
    public function departments()
    {
        echo ('Comming soon');
    }

}
