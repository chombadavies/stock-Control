<?php

namespace App\Http\Controllers;


use Session;
use App\Models\Centre;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CentresController extends Controller
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
     *
        * @return Renderable
     */



    public function index()
    {
        Session::put('page','huduma centres');
          if(Auth::User()->hasRole("SuperAdmin"))
       {
          $data['page_title']="Centres";


          return view('centres.index',$data);

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
        Session::put('page','create centre');
        if(Auth::User()->hasRole("SuperAdmin")   
        
        )
       {
          $data['page_title']="Centres-Create";


          return view('centres.create',$data);

      }else{
        return view("forbidden");
    }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Centre $centre)
    {
        $rules=[
            'name'=>'regex:/^[\pL\s\-]+$/u',
            'code'=>'regex:/^[\w-]*$/',
            ];
            $custommessage=[
            'name.required'=>'Centre name is required',
            'code.required'=>'category code  is required',
            
            ];
            $this-> validate($request,$rules,$custommessage);
                    
                    $centre->code= $request->code;
                    $centre->name= $request->name;
                    $centre->status=1;
                    $centre->save();
            
                    Session::flash('success_message','centre added successfully');
                    return redirect()->route('centres.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $centre= Centre::find($id);
        return view('centres.show')->with(compact('centre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $centre= Centre::find($id);
      
        return view('centres.edit')->with(compact('centre'));
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
     $rules=[
            'name'=>'regex:/^[\pL\s\-]+$/u',
            'code'=>'regex:/^[\w-]*$/',
            ];
            $custommessage=[
            'name.required'=>'Centre name is required',
            'code.required'=>'category code  is required',
            
            ];
            $this-> validate($request,$rules,$custommessage);
                    $centre=Centre::find($id);
                    $centre->code= $request->code;
                    $centre->centreName= $request->name;
                    $centre->status=1;
                    $centre->save();
            
                    Session::flash('success_message','centre added successfully');
                    return redirect()->route('centres.index');
    
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

    public function fetchCentres()
    {

        // $models = DB::select('SELECT * FROM `centres`');
        $models = DB::table('centres')
                ->orderBy('id','asc')
                ->get();
        return Datatables::of($models)

            ->addColumn('action', function ($model) {
                $edit_url = url('/centres/' . $model->id . '/edit');
                $view_url = url('/centres/' . $model->id);

        
                return '<div class="dropdown ">
        <button class="btn btn-success btn btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Action
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
        <li><a style="cursor:pointer;" class="reject-modal"  data-title="Edit Details" data-url="' . $edit_url . '">Edit Centre </a></li>
        <li><div class="dropdown-divider"></div></li>
        <li><a style="cursor:pointer;" class="reject-modal"  data-title="View" data-url="' . $view_url . '">View Details</a></li>
        </ul>
        </div> ';

            })
            ->make(true);
    }
    // public function fetchStock()
    // {

        
    //     $models = DB::table('centre_stocks')
    //     ->join('products', 'stocks.product_id', '=', 'products.id')
    //     ->join('products', 'stocks.product_id', '=', 'products.id')
    //     ->join('items', 'stocks.item_id', '=', 'items.id')
    //     ->select('centre_stocks.id', 'items.itemName', 'stocks.Description', 'stocks.alert_stock','stocks.Quantity', 'products.productName')
    //     ->get();
    //     return Datatables::of($models)

    //         ->addColumn('action', function ($model) {
    //             $edit_url = url('/centres/' . $model->id . '/edit');
    //             $view_url = url('/centres/' . $model->id);

        
    //             return '<div class="dropdown ">
    //     <button class="btn btn-success btn btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Action
    //     <span class="caret"></span></button>
    //     <ul class="dropdown-menu">
    //     <li><a style="cursor:pointer;" class="reject-modal"  data-title="Edit Details" data-url="' . $edit_url . '">Edit Centre </a></li>
    //     <li><div class="dropdown-divider"></div></li>
    //     <li><a style="cursor:pointer;" class="reject-modal"  data-title="View" data-url="' . $view_url . '">View Details</a></li>
    //     </ul>
    //     </div> ';

    //         })
    //         ->make(true);
    // }
    
}
