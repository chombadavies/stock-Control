<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use DateTime;

class TransactionsController extends Controller
{

    protected $userID;

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
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $data['page_title']="Transactions";
        $centre = Centre::where(['id'=>Auth::User()->centre_id])->first();
  return view('transactions.index',$data)->with(compact('centre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function fetchTransactions()
    {
        $models = DB::table('transactions')
        ->leftJoin('users', 'transactions.user_id', '=', 'users.id')
        ->leftJoin('centres', 'transactions.centre_id', '=', 'centres.id')
        ->leftJoin('purchases', 'transactions.purchase_id', '=', 'purchases.id')
        ->leftJoin('items', 'transactions.item_id', '=', 'items.id')
        ->select('transactions.id', 'centres.centreName', 'users.name','purchases.supplierName', 'items.itemName','transactions.debit','transactions.credit')
        ->where(['transactions.centre_id'=>Auth::User()->centre_id])
        // 'transac_date'=> DATE(NOW())
      ->get();
        // dd($models);

        return Datatables::of($models)

            ->addColumn('action', function ($model) {
                $edit_url = url('/stocks/' . $model->id . '/edit');
                $view_url = url('/stocks/');

                return '<div class="dropdown ">
    <button class="btn btn-success btn btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Action
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
    <li><a style="cursor:pointer;" class="reject-modal"  data-title="Edit Details" data-url="' . $edit_url . '">Edit Item </a></li>
    <li><div class="dropdown-divider"></div></li>
    <li><a style="cursor:pointer;" class="reject-modal"  data-title="View" data-url="' . $view_url . '">Act/Deactivate item</a></li>

    </ul>
    </div> ';

            })
            ->make(true);
    }

}
