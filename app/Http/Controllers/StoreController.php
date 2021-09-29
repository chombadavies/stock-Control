<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CentreItem;
use App\Models\Item;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Store;
use App\Models\Transaction;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::put('page', 'requestedlist');
        if (Auth::User()->hasRole('SuperAdmin') || Auth::User()->hasRole('Centre Manager') ||Auth::User()->hasRole('Supervisor')||
            Auth::User()->hasRole('Store Manager')) {
            $orders = Order_detail::where(['centre_id'=>Auth::User()->centre_id,'dpt_id'=>Auth::User()->dpt_id])->get();
            // dd($orders);
            return view('store.index')->with(compact('orders'));
        } else {
            Session::flash('error_message', 'Not permitted to perform this operation');
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        Session::put('page', 'makeorder');
        if (Auth::User()->hasRole('Staff') || Auth::User()->hasRole('SuperAdmin')|| Auth::User()->hasRole('Store Manager')|| Auth::User()->hasRole('Centre Manager')|| Auth::User()->hasRole('Supervisor')) {
            $data['page_title'] = 'requestItem';
            $categories = Category::all();
            $products = Product::all();
            $items = Item::all();
            $stocks = Stock::all();
            $units = Unit::all();
            return view('store.requestItem', $data, compact('products', 'categories', 'items', 'units', 'stocks'));
        } else {
            Session::flash('error_message', 'not Permitted to perform this operation');
            return redirect()->back();
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

       
        
        DB::transaction(function () use ($request) {

            $data = $request->all();
// dd($data);
            $user_id = Auth::User()->id;
            $qtys = $data['quantity'];
            $categories = $data['category_id'];
            $products = $data['product_id'];
            $items = $data['item_id'];
            $units = $data['unit_id'];
            $descriptions = $data['itemdescription'];

            // //orders
            $order = new Order();
            $order->centre_id = Auth::User()->centre_id;
            $order->user_id = $user_id;
            $order->save();
            $order_id = $order->id;

            foreach ($qtys as $key => $value) {

                $saveQty = $qtys[$key];
                $catId = $categories[$key];
                $productId = $products[$key];
                $itemId = $items[$key];
                $unitId = $units[$key];
                $description = $descriptions[$key];
                $user_id = Auth::User()->id;


                 $item = CentreItem::where(['item_id' =>$itemId, 'centre_id' => Auth::User()->centre_id])->first();
                
                //  order details/requested items
                if($saveQty>$item->quantity){
                    Session::flash('error_message','request quantity is higher than available stock');
                    return redirect()->back();
                 }
                 else{
                     
                     $order_detail = new Order_detail();
                     $order_detail->category_id = $catId;
                     $order_detail->product_id = $productId;
                     $order_detail->item_id = $itemId;
                     $order_detail->order_id = $order_id;
                     $order_detail->quantity = $saveQty;
                     $order_detail->itemdescription = $description;
                     $order_detail->unit_id = $unitId;
                     $order_detail->user_id = $user_id;
                     $order_detail->centre_id = Auth::User()->centre_id;
                     $order_detail->dpt_id = Auth::User()->dpt_id;
                     $order_detail->save();
                     $order_detail_id = $order_detail->id;
                 }
            }

        });
        Session::flash('succes_message', 'order submitted successfully');
        return redirect()->back();
        
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        //
    }

    public function approveOrder(Request $request)
    {

        Session::put('page', 'approve');
        $orderdetails = DB::table('order_details')
        ->join('products', 'order_details.product_id', '=', 'products.id')
        ->join('items', 'order_details.item_id', '=', 'items.id')
        ->join('users', 'order_details.user_id', '=', 'users.id')
        ->select('order_details.id',  'items.itemName', 'order_details.quantity','order_details.approve','order_details.reject', 'users.name', 'products.productName')
        ->where(['order_details.issue'=>0,'order_details.approve'=>0,'order_details.reject'=>0,'order_details.centre_id'=>Auth::User()->centre_id,'order_details.dpt_id'=>Auth::User()->dpt_id])
        ->get();
        return view('store.approve', compact('orderdetails'));

    }
    public function approval(Request $request)
    {

        if (Auth::User()->hasRole("Centre Manager") || Auth::User()->hasRole('SuperAdmin')|| Auth::User()->hasRole('Supervisor')) {
            $order = Order_detail::find($request->order_id);

            $item = CentreItem::where(['item_id' => $order->item_id, 'centre_id' => Auth::User()->centre_id])->first();

            $approveVal = $request->approve;

            if ($approveVal == 'on') {
                $approveVal = 1;
            } else {
                $approveVal = 0;
            }
            // $item->approve=$approveVal;
            // $item->reject =0;
            // $item->save();

            $order->approve = $approveVal;
            $order->reject = 0;
            $order->save();

            return redirect('/approve');
        } else {
            return view('forbidden');
        }

    }
    public function issueItem(Request $request, $id)
    {
        Session::put('page', 'Dispatch');
     if (Auth::User()->hasRole("Store Manager") || Auth::User()->hasRole('SuperAdmin')) {
            DB::Transaction(function () use ($request, $id) {
                $orderDetails = Order_detail::find($id);
                $order = Order_detail::find($request->order_id);
                $item = CentreItem::where(['item_id' => $order->item_id, 'centre_id' => Auth::User()->centre_id])->first();
                $isueVal = $request->dispatch;

                if ($isueVal == 'on') {
                    $isueVal = 1;
                } else {
                    $isueVal = 0;
                }
                $order->issue = $isueVal;
                $order->approve = 2;
                $order->reject = 2;
                $order->save();

                $item->quantity = $item->quantity - $order->quantity;
                $item->save();

                $transaction = new Transaction();
                $transaction->order_id = $request->order_id;
                // $transaction->order_detail_id = $id;
                $transaction->credit = $order->quantity;
                $transaction->item_id=$orderDetails->item_id;
                $transaction->user_id = Auth::User()->id;
                $transaction->centre_id = Auth::User()->centre_id;
                $transaction->transac_date = date('Y-m-d H:I:s');
                $transaction->save();

            });
            return redirect('/approvedlist');
        } else {
            Session::flash('error_message', 'not permitted to perform this operation');
            return redirect()->back();
        }

    }

    public function approvedList()
    {
        Session::put('page', 'approvedlist');
        $data['page_title'] = 'Approved List';
        if (Auth::User()->hasRole('SuperAdmin') || Auth::User()->hasRole('Centre Manager') ||
            Auth::User()->hasRole('Store Manager')|| Auth::User()->hasRole('Supervisor')) {
            $orders = Order_detail::where(['approve'=>1,'issue'=>0,'centre_id'=>Auth::User()->centre_id,'dpt_id'=>Auth::User()->dpt_id])->get();
            
            return view('store.approvedList', $data)->with(compact('orders'));
        }else if( Auth::User()->hasRole('Staff')){
            $orders = Order_detail::where(['approve'=>1,'issue'=>0,'centre_id'=>Auth::User()->centre_id,'user_id'=>Auth::User()->id])->get();
            
            return view('store.approvedList', $data)->with(compact('orders'));
        }
         else {
            return view('forbidden');
        }
    }

    public function pendingList()
    {
        $data['page_title'] = 'Pending List';
        Session::put('page', 'pendinglist');
        if (Auth::User()->hasRole('SuperAdmin') || Auth::User()->hasRole('Centre Manager') || Auth::User()->hasRole('Supervisor')||
            Auth::User()->hasRole('Store Manager')) {
            $orders = Order_detail::where(['approve'=>0,'reject'=>0,'issue'=>0,'centre_id'=>Auth::User()->centre_id,'dpt_id'=>Auth::User()->dpt_id])->get();
            return view('store.pendingList', $data)->with(compact('orders'));
        } else if( Auth::User()->hasRole('Staff')){
            $orders = Order_detail::where(['approve'=>0,'reject'=>0,'issue'=>0,'centre_id'=>Auth::User()->centre_id,'user_id'=>Auth::User()->id])->get();
            
            return view('store.approvedList', $data)->with(compact('orders'));
        }
        
        else {
            return view('forbidden');
        }
    }
    public function rejectedList()
    {
        $data['page_title'] = 'Rejected List';
        Session::put('page', 'rejectedlist');
        if (Auth::User()->hasRole('SuperAdmin') || Auth::User()->hasRole('Centre Manager') ||
            Auth::User()->hasRole('Store Manager')||Auth::User()->hasRole('Staff')|| Auth::User()->hasRole('Supervisor')) {
            $orders = Order_detail::where(['reject'=>1,'centre_id'=>Auth::User()->centre_id,'dpt_id'=>Auth::User()->dpt_id])->get();
            return view('store.RejectedList', $data)->with(compact('orders'));
        }else if( Auth::User()->hasRole('Staff')){
            $orders = Order_detail::where(['reject'=>1,'centre_id'=>Auth::User()->centre_id,'user_id'=>Auth::User()->id])->get();
            
            return view('store.approvedList', $data)->with(compact('orders'));
        }
        
        else {
            return view('forbidden');
        }
    }

    public function issuedList()
    {
        $data['page_title'] = 'Issued List';
        Session::put('page', 'issuedlist');
        if (Auth::User()->hasRole('SuperAdmin') || Auth::User()->hasRole('Centre Manager') ||
            Auth::User()->hasRole('Store Manager')||Auth::User()->hasRole('Staff')|| Auth::User()->hasRole('Supervisor')) {
            $orders = Order_detail::where(['issue'=>1,'centre_id'=>Auth::User()->centre_id,'dpt_id'=>Auth::User()->dpt_id])->get();
            return view('store.issuedlist', $data)->with(compact('orders'));
        }else if( Auth::User()->hasRole('Staff')){
            $orders = Order_detail::where(['issue'=>1,'centre_id'=>Auth::User()->centre_id,'user_id'=>Auth::User()->id])->get();
            
            return view('store.approvedList', $data)->with(compact('orders'));
        }
        
        else {
            return view('forbidden');
        }
    }
    public function reject(Request $request)
    {
        if (Auth::User()->hasRole('Centre Manager') || Auth::User()->hasRole('SuperAdmin')|| Auth::User()->hasRole('Supervisor')) {

            $order = Order_detail::find($request->order_id);
            // dd($order->item->itemName);
            $item = CentreItem::where(['item_id' => $order->item_id, 'centre_id' => Auth::User()->centre_id])->first();
//    dd($item);
            $rejectVal = $request->reject;

            if ($rejectVal == 'on') {
                $rejectVal = 1;
            } else {
                $approveVal = 0;
            }

            $order->reject = $rejectVal;
            $order->approve = 0;
            $order->save();

            return redirect('/approve');
        } else {
            return view('forbidden');
        }
    }

    public function fetchAllRequests()
    {
        echo ('we are about to dispaly all the requests');die;
        $models = DB::table('store')
            ->join('centres', 'centre_item.centre_id', '=', 'centres.id')
            ->join('items', 'centre_item.item_id', '=', 'items.id')
            ->select('centre_item.id', 'centres.centreName', 'items.itemName', 'items.itemCode', 'items.alert_stock', 'centre_item.quantity')
            ->get();
        // dd($models);

        return Datatables::of($models)

            ->addColumn('action', function ($model) {
                $edit_url = url('/stocks/' . $model->id . '/edit');
                $view_url = url('/stocks/');

                return '<div class="dropdown ">
<button class="btn btn-info btn btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Action
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
