<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Unit;
use App\Models\Centre;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\CentreItem;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class ItemsController extends Controller
{
    protected $userID;
    protected $mid;
    protected $sid;
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

        Session::put('page', 'items');
        if (Auth::User()->hasRole("SuperAdmin")

        ) {
            $data['page_title'] = "Items";

            return view('items.index', $data);

        } else {
            return view("forbidden");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Session::put('page', 'createitem');
        if (Auth::User()->hasRole("SuperAdmin")

        ) {
            $data['page_title'] = "Create Item";
            $categories = Category::all();
            $centres = Centre::all();
            $units = Unit::all();

            return view('items.create', $data, )->with(compact('categories', 'units', 'centres'));

        } else {
            return view("forbidden");
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

        if ($request->hasFile('itemImage')) {

            $image_tmp = $request->file('itemImage');
            if ($image_tmp->isValid()) {
                // Get Image Extension
                $extension = $image_tmp->getClientOriginalExtension();
                // Generate New Image Name
                $imageName = rand(111, 99999) . '.' . $extension;
                $imagePath = 'images/itemImages/' . $imageName;
                // Upload the Image
                Image::make($image_tmp)->resize(300, 400)->save($imagePath);
            }
        } else {
            $imageName = "";
        }
        if (in_array('all', $request->centre_id)) {
            $centres = Centre::all()->pluck('id');
            $products = Product::all()->pluck('id');

        } else {
            $centres = Centre::find($request->centre_id)->pluck('id');

        }
        $item = new Item;
        $item->product_id = $request->product_id;
        $item->itemName = $request->itemName;
        $item->unit_id = $request->unit_id;
        $item->itemImage = $imageName;
        $item->save();
        $item->itemCode = 'I' . str_pad($item->id, 4, "0", STR_PAD_LEFT);
        $item->save();
        $centre = $centres;

        $item->centres()->attach($centre);

        Session::flash('success_message', 'item added successfully');
        return redirect()->route('items.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::findOrFail($id);
        //dd($item);
        return view('items.show', compact('item'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if (Auth::User()->hasRole("SuperAdmin")

        ) {
            $data['page_title'] = "Edit Item";
            $categories = Category::all();

            $item = Item::find($id);
            $id1 = ($item->product_id);
            $product = Product::find($id1);
            $units = Unit::all();
            $products = Product::where(['category_id' => $product->category_id])->get();

            return view('items.edit', $data, )->with(compact('categories', 'units', 'item', 'product', 'products'));

        } else {
            return view("forbidden");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('itemImage')) {

            $image_tmp = $request->file('itemImage');
            if ($image_tmp->isValid()) {
                // Get Image Extension
                $extension = $image_tmp->getClientOriginalExtension();
                // Generate New Image Name
                $imageName = rand(111, 99999) . '.' . $extension;
                $imagePath = 'images/itemImages/' . $imageName;
                // Upload the Image
                Image::make($image_tmp)->resize(300, 400)->save($imagePath);
            }
        } else {
            $imageName = "";
        }
      
        $item =Item::find($id);
        $item->product_id = $request->product_id;
        $item->itemName = $request->itemName;
        $item->unit_id = $request->unit_id;
        $item->itemImage = $imageName;
        $item->itemCode =$request->itemCode;
        $item->save();
      
       Session::flash('success_message', 'item edited successfully');
        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
    public function fetchItems()
    {

        $models = DB::table('items')

            ->join('products', 'items.product_id', '=', 'products.id')
            ->select('items.id', 'items.itemName', 'items.itemCode', 'products.productName')
            ->get();

        return Datatables::of($models)

            ->addColumn('action', function ($model) {
                $edit_url = url('/items/' . $model->id . '/edit');
                $view_url = url('/items/' . $model->id);

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

    public function cascadeItems($id)
    {
        
        $models = Item::Where(['product_id' => $id])->OrderBy('itemName')->get();

        foreach ($models as $item) {

            echo '<option value="' . $item->id . '">' . $item->itemName . '</option>';
        }
    }

    public function Populate($id)
    {
       
$model = Supplier::find($id);

        if ($model) {
            $data = array("id" => $model->id, "SupplierPin" => $model->supplierPin,"telephoneNumber"=>$model->phoneNumber
        ,"supplierEmail"=>$model->supplierEmail);
            return $data;
        }

    }
    public function stockQuantity($id)
    {

    //  return $id;
       
$model = CentreItem::where(['item_id' =>$id, 'centre_id' => Auth::User()->centre_id])->first();
        if ($model) {
            $data = array("id" => $model->id, "quantity" => $model->quantity);
            return $data;
        }

    }

}
