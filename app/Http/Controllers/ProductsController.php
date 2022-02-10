<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;
use Session;
use Yajra\Datatables\Datatables;

class ProductsController extends Controller
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

        Session::put('page', 'products');
        if (Auth::User()->hasRole("SuperAdmin")
        ) {
            $data['page_title'] = "products";
            return view('products.index', $data);

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
        Session::put('page', 'createproduct');
        $categories = Category::all();

        if (Auth::User()->hasRole("SuperAdmin")) {

            return view('products.create', compact('categories'));
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

        $this->validate($request, [

            'productName' => 'string|unique:products|regex:/^[\pL\s\-]+$/u',

        ], [
            'productName.unique' => 'This product name already exist!',
            'productName.regex' => 'Poduct Name format is invalid',
        ]);

        if ($request->hasFile('productImage')) {

            $image_tmp = $request->file('productImage');
            if ($image_tmp->isValid()) {
                // Get Image Extension
                $extension = $image_tmp->getClientOriginalExtension();
                // Generate New Image Name
                $imageName = rand(111, 99999) . '.' . $extension;
                $imagePath = 'images/productsImage/' . $imageName;
                // Upload the Image
                Image::make($image_tmp)->resize(300, 400)->save($imagePath);
            }
        } else {
            $imageName = "";
        }

        $product = new Product;
        $product->category_id = $request->category_id;
        $product->productName = $request->productName;
        $product->productImage = $imageName;
        $product->status = 1;
        $product->save();

        $product->code = 'P' . str_pad($product->id, 4, "0", STR_PAD_LEFT);
        $product->save();
        Session::flash('success_message', 'Product Added successfully');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        // dd($product->items);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $product = Product::find($id);
        $categories = Category::all();
        return view('products.edit', compact('categories', 'product'));
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
        $product = Product::find($id);

        $product->category_id = $request->category_id;
        $product->productName = $request->productName;
        $product->productImage = $request->productImage;
        $product->save();
        Session::flash('success_message', 'product updated successfully');
        return redirect('/products');

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
    public function fetchProducts()
    {

        $models = DB::select('SELECT products.id,products.productName,products.code,products.created_at,categories.categoryName FROM `products`
  left join categories on categories.id=products.category_id');

        return Datatables::of($models)

            ->addColumn('action', function ($model) {
                $edit_url = url('/products/' . $model->id . '/edit');
                $view_url = url('/products/' . $model->id);

                return '<div class="dropdown ">
        <button class="btn btn-success btn btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Action
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
        <li><a style="cursor:pointer;" class="reject-modal"  data-title="Edit Product Details" data-url="' . $edit_url . '">Edit Product </a></li>
        <li><div class="dropdown-divider"></div></li>
        <li><a style="cursor:pointer;" class="reject-modal"  data-title="View Product Items" data-url="' . $view_url . '">View Items</a></li>
        </ul>
        </div> ';

            })
            ->make(true);
    }
    public function cascadeProducts($id)
    {
        $models = Product::Where(['category_id' => $id])->OrderBy('productName')->get();
        echo '<option value="">-----select Product---</option>';
        foreach ($models as $product) {

            echo '<option value="' . $product->id . '">' . $product->productName . '</option>';
        }
    }
}
