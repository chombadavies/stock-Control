<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Unit;
use App\Models\Category;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\CentreItem;
use App\Models\Transaction;
use App\Models\PurchaseItem;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PurchasesController extends Controller
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
    public function index()
    {
        Session::put('page', 'purchases');
        if (Auth::User()->hasRole('SuperAdmin') || Auth::User()->hasRole('Centre Manager')|| Auth::User()->hasRole('Test Admin')) {
            $data['page_title'] = 'purchases';

            return view('purchases.index', $data);
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
        Session::put('page', 'receive purchases');
        if (Auth::User()->hasRole('SuperAdmin') || Auth::User()->hasRole('Centre Manager')|| Auth::User()->hasRole('Test Admin')) {
            $categories = Category::all();
            $suppliers = Supplier::all();
            $units = Unit::all();
            $data['page_title'] = "purchases";
            return view('purchases.create', $data)->with(compact('categories', 'units','suppliers'));
        } else {
            return view('forbidden');
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

        // $centre_id=Auth::User()->centre_id;
        // dd($centre_id);
        DB::Transaction(function () use ($request) {
            //purchases
            $data = $request->all();

            $user_id = Auth::User()->id;
            $qtys = $data['quantity'];
            $categories = $data['category_id'];
            $products = $data['product_id'];
            $items = $data['item_id'];
            $units = $data['unit_id'];
            $supplier_id = $data['supplier_id'];
            
           

            $purchase = new Purchase();
            // $purchase->supplierName = $data['supplierName'];
            // $purchase->supplierPin = $data['supplierPin'];
            // $purchase->telephoneNumber = $data['telephoneNumber'];
            $purchase->orderNumber = $data['orderNumber'];
            $purchase->deliveryNoteNumber = $data['deliveryNoteNumber'];
            $purchase->invoiceNumber = $data['invoiceNumber'];
            $purchase->deleveryDate = $data['deleveryDate'];
            $purchase->centre_id = Auth::User()->centre_id;
            $purchase->supplier_id = $supplier_id;
            $purchase->delevererName = $data['delevererName'];
            $purchase->delevererPhone = $data['delevererPhone'];
            $purchase->save();
            $purchase_id = $purchase->id;
// $purchase=Purchase::where(['id'=>$purchase->id])->first();
            // dd($purchase);
            foreach ($qtys as $key => $value) {

                $saveQty = $qtys[$key];
                $catId = $categories[$key];
                $productId = $products[$key];
                $itemId = $items[$key];
                $unitId = $units[$key];
                $descriptions = $data['description'];
                $description = $descriptions[$key];
                $user_id = Auth::User()->id;

                $purchase_item = new PurchaseItem();
                $purchase_item->category_id = $catId;
                $purchase_item->item_id = $itemId;
                $purchase_item->purchase_id = $purchase_id;
                $purchase_item->product_id = $productId;
                $purchase_item->quantity = $saveQty;
                $purchase_item->description = $description;
                $purchase_item->unit_id = $unitId;
                $purchase_item->user_id = $user_id;
                $purchase_item->user_id = $user_id;
                $purchase_item->centre_id = Auth::User()->centre_id;
                $purchase_item->save();
                $purchase_item_id = $purchase_item->id;

                $transaction = new Transaction();
                $transaction->purchase_id = $purchase_id;
                $transaction->debit = $saveQty;
                $transaction->user_id = $user_id;
                $transaction->item_id = $purchase_item->item_id;
                // $transaction->purchase_item_id = $purchase_item_id;
                $transaction->centre_id = Auth::User()->centre_id;
                $transaction->user_id = Auth::User()->id;
                $transaction->supplier_id =$supplier_id;
                $transaction->transac_date = date('Y-m-d H:I:s');
                $transaction->save();

                $item = CentreItem::where(['centre_id' => $purchase->centre_id, 'item_id' => $purchase_item->item_id])
                    ->first();

                if ($item) {
                    $item->quantity = $item->quantity + $purchase_item->quantity;
                    // $item->lastupdated_at = date('Y-m-d H:I:s');
                    $item->save();

                }
            }

        });
        Session::flash('success_message', 'purchase received successfully');
        return redirect()->route('purchases.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchases  $purchases
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['page_title'] = "purchases";

        $purchase = Purchase::find($id);
        $purchaseItems = PurchaseItem::join('items', 'items.id', '=', 'purchase_items.item_id')
            ->where(['purchase_id' => $id])
            ->select('itemName', 'description', 'quantity','status')
            ->get();

        $data['purchaseItems'] = $purchaseItems;
        $data['purchase'] = $purchase;
        return view('purchases.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchases  $purchases
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchases $purchases)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchases  $purchases
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchases $purchases)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchases  $purchases
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchases $purchases)
    {
        //
    }

    public function allStocks()
    {

        Session::put('page', 'allstocks');
        if (Auth::User()->hasRole('SuperAdmin') || Auth::User()->hasRole('Centre Manager')|| Auth::User()->hasRole('Test Admin ')) {
            $data['page_title'] = 'allStocks';

            return view('stock.allstocks', $data);
        } else {
            return view('forbidden');
        }
    }

    public function allPurchases()
    {

        Session::put('page', 'allpurchases');
        if (Auth::User()->hasRole('SuperAdmin') || Auth::User()->hasRole('Centre Manager')) {
            $data['page_title'] = 'All purchases';

            return view('purchases.allpurchases', $data);
        } else {
            return view('forbidden');
        }
    }

    public function fetchStock()
    {

        $models = DB::table('centre_item')
            ->join('centres', 'centre_item.centre_id', '=', 'centres.id')
            ->join('items', 'centre_item.item_id', '=', 'items.id')
            ->join('products', 'items.product_id', '=', 'products.id')
            ->select('centre_item.id', 'centres.centreName', 'items.itemName','products.productName', 'items.itemCode', 'items.alert_stock', 'centre_item.quantity')->where(['centre_item.centre_id' => Auth::User()->centre_id])
            ->get();
        // dd($models);

        return Datatables::of($models)

            ->addColumn('action', function ($model) {
                
                $makeorder_url = route('store.create');

                return '<div class="dropdown ">
    <button class="btn btn-success btn btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Action
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
    <li><div class="dropdown-divider"></div></li>
    <li><a style="cursor:pointer;" data-title="View" href="' . $makeorder_url . '">Make Order</a></li>

    </ul>
    </div> ';

            })
            ->make(true);
    }

    public function fetchPurchases()
    {
        $models = DB::table('purchases')
        ->join('suppliers', 'purchases.supplier_id', '=', 'suppliers.id')
        ->select('purchases.id', 'suppliers.supplierName', 'suppliers.supplierPin', 'suppliers.phoneNumber', 'purchases.deleveryDate')
        ->where(['centre_id' => Auth::User()->centre_id])
        ->get();
        // $models = DB::table('purchases')
        //     ->select('*')
        //     ->where(['centre_id' => Auth::User()->centre_id]);
        return Datatables::of($models)

            ->addColumn('action', function ($model) {
                $edit_url = url('/purchases/' . $model->id . '/edit');
                $view_url = url('/purchases/' . $model->id);

                return '<div class="dropdown ">
    <button class="btn btn-success btn btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Action
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
    <li><a style="cursor:pointer;" class="reject-modal"  data-title="View" data-url="' . $view_url . '">View Purchase Item</a></li>
    </ul>
    </div> ';

            })
            ->make(true);
    }

    public function fetchallstock()
    {

        $models = DB::table('centre_item')
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

    public function fetchallpurchases()
    {

        $models = DB::table('purchases')
            ->join('products', 'purchases.product_id', '=', 'products.id')
            ->join('items', 'purchases.item_id', '=', 'items.id')
            ->select('purchases.id', 'items.itemName', 'purchases.Description', 'purchases.Quantity', 'products.productName')
            ->get();
        // dd($models);

        return Datatables::of($models)

            ->addColumn('action', function ($model) {
                $edit_url = url('/purchases/' . $model->id . '/edit');
                $view_url = url('/purchases/');

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
