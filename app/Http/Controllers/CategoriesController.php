<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    protected $userID;
  protected $mid;
  protected $sid;
  public function __construct()
  {
   $this->middleware('auth');


   $this->middleware(function ($request, $next) {
    $this->userID = Auth::user()->id;
    $this->sid=Auth::user()->org_id;

    return $next($request);
});
}


    /**
     * Display a listing of the resource.
     * @return Renderable
     
     */
    public function index()
    {
       Session::put("page","categories");
      
        if(Auth::User()->hasRole("SuperAdmin")|| Auth::User()->hasRole("Test Admin"))
       {
          $data['page_title']="Categories";


          return view('categories.index',$data);

      }else{
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
        Session::put('page','createcategory');
    
        if(Auth::User()->hasRole("SuperAdmin")||Auth::User()->hasRole("Test Admin")){
     
            return view('categories.create');
            }else {
                return view ('forbidden');
            }
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category)
    {
      
        $rules=[
            'categoryName'=>'required|regex:/^[\pL\s\-]+$/u',
            
            ];
            $custommessage=[
            'categoryName.required'=>'Centre name is required',
           
            
            ];
            $this-> validate($request,$rules,$custommessage);
                
                    $category->categoryName= $request->categoryName;
                    $category->status=1;
                    $category->save();
  
                    $category->code='C'.str_pad($category->id, 4, "0", STR_PAD_LEFT);
                    $category->save();
            
                    Session::flash('success_message','category added successfully');
                    return redirect('/categories');
               
            
                   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     
        $category=Category::findOrFail($id);
      
        return view('categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $category= Category::find($id);
        return view('categories.edit')->with(compact('category'));
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

        $category= Category::find($id);

        $rules=[
            'categoryName'=>'required|regex:/^[\pL\s\-]+$/u',
            'code'=>'required|regex:/^[\w-]*$/',
            ];
            $custommessage=[
            'categoryName.required'=>'Category name is required',
            'code.required'=>'category code  is required',
            
            ];
            $this-> validate($request,$rules,$custommessage);
    
            $category->categoryName= $request->categoryName;
            $category->code= $request->code;
            $category->save();

        Session::flash('success_message','Category Editted successfully');
        return redirect()->route('categories.index');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        Session::flash('success_message','Category deleted successfully');
        return redirect()->route('categories.index');
    }

    public function fetchList()
    {
        $models = DB::select('SELECT * FROM `categories`');
        return Datatables::of($models)

            ->addColumn('action', function ($model) {
                $edit_url = url('/categories/' . $model->id . '/edit');
                $view_url = url('/categories/' . $model->id);
             
              

                return '<div class="dropdown ">
        <button class="btn btn-success btn btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Action
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
        <li><a style="cursor:pointer;" class="reject-modal"  data-title="Edit Details" data-url="' . $edit_url . '">Edit Category </a></li>
        <li><div class="dropdown-divider"></div></li>
        <li><a style="cursor:pointer;" class="reject-modal"  data-title="View" data-url="' . $view_url . '">View Details</a></li>
        </ul>
        </div> ';

            })
            ->make(true);
    }

   
}
