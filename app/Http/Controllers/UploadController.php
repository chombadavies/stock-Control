<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Stroage;
use Illuminate\Support\Facades\Validator;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::put('page', 'uploads');
        if (Auth::User()->hasRole('SuperAdmin') || Auth::User()->hasRole('Centre Manager')|| Auth::User()->hasRole('Test Admin')) {
            $data['page_title'] = 'Uploads';

            return view('uploads.index', $data);
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
        return view('uploads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
              'file'=>'required|mimes:pdf,zip'
          ]);
            $upload=new Upload();

            $file=$request->file;
            dd($file);
            $fileName=time().'.'.$file->getClientOriginalExtension();
            $request->file->move('uploads',$fileName);
            $upload->file=$fileName;
            $upload->name=$request->name;
            $upload->description=$request->description;
            $upload->save();
    

            Session::flash('success_message', 'Upload Compleate successfully');
            
            return redirect()->route('upload.index');


       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$file)
    {
        // echo('we are here');die;
        
        // return response()->download(public_path('uploads/'.$file));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function edit(Upload $upload)
    {
        echo('we are here');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Upload $upload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function destroy(Upload $upload)
    {
        //
    }

    public function fetchUploads()
    {
 
      $models = DB::select('SELECT * FROM `uploads`');

        return Datatables::of($models)

        ->addColumn('action', function ($model) {
            $view_url = url('/view/' . $model->id);
            $download_url = url('/download/' .$model->file);

            return '<div class="dropdown ">
<button class="btn btn-success btn btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Action
<span class="caret"></span></button>
<ul class="dropdown-menu">
<li><a style="cursor:pointer;" class="reject-modal"  data-title="View Document" data-url="' . $view_url . '">View Document </a></li>
<li><div class="dropdown-divider"></div></li>
<li><a style="cursor:pointer;" data-url="' . $download_url . '">Download</a></li>

</ul>
</div> ';

        })
        ->make(true);
    }


    public function Download(Request $request,$file){
        
       return response()->download(public_path('uploads/'.$file));
    }


    public function View($id){
       
$upload= Upload::find($id);

return view('uploads.show',compact('upload'));
    }

    public function Print($id){
    
        $upload= Upload::find($id);
        
        return view('uploads.show',compact('upload'));
            }
}
