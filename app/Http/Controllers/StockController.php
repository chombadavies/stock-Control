<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Centre;
use App\Models\CentreItem;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StockController extends Controller
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
     * @return Renderable

     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::put('page', 'stockregister');

        if (Auth::User()->hasRole('SuperAdmin') || Auth::User()->hasRole('Centre Manager') || Auth::User()->hasRole('Supervisor') || Auth::User()->hasRole('Staff') ||
            Auth::User()->hasRole('Store Manager')) {
            $data['page_title'] = 'Stock Register';
            $centre = Centre::where(['id' => Auth::User()->centre_id])->first();

            return view('stock.index', $data)->with(compact('centre'));
        } else {
            return view('forbidden');
        }

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
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $item = CentreItem::find($id);
        $item = CentreItem::join('items', 'centre_item.item_id', '=', 'items.id')
            ->join('products', 'items.product_id', '=', 'products.id')
            ->select('centre_item.id', 'items.itemName', 'products.productName', 'items.itemCode', 'centre_item.quantity')
            ->where(['centre_item.id' => $id])
            ->first();
        return view('stock.adjustStock')->with(compact('item'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
         $centreItem = CentreItem::find($id);
        $centreItem->quantity= $request->physicalquantity;
   
      $centreItem->save();
      $transaction = new Transaction();
      $transaction->stock_id = $id;
      $transaction->debit = $request->adjustmentvalue;
      $transaction->item_id = $centreItem->item_id;
      $transaction->adjustment_value =$request->adjustmentvalue;
      $transaction->user_id = Auth::User()->id;
      $transaction->centre_id = Auth::User()->centre_id;
      $transaction->transac_date = date('Y-m-d H:I:s');
      $transaction->save();
    Session::flash('success_message','Stock adjusted successfully');
    return redirect('/stock');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
    }
  
public function ProduceS13($id){
dd($id);
}

}
