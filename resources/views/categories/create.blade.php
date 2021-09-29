@extends('layouts.admin_layout.admin_layout')
@section('content')
<link rel="stylesheet" href="{{asset('css/admin_css/style2.css') }}">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>
         Categories
            </h1>
          </div>
         
        </div>
        <div class="line">
          <hr style="border: 4px solid green">
          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
  <div class="col-12">
          <a href="<?=route('categories.index')?>" class="btn btn-sm btn-success"><span class="fa fa-bars"><span> View List</a>
</span>
                                        
 <div class="col-12">
       <br>
            <!-- /.card -->

            <div class="meme card-success card-outline" >
              <div class="card-header">
                <h3 class="card-title">Add New Category</h3>
          </div>
              <!-- /.card-header -->
              
              <div class="card-body">
         <form role="form" method="post"  name="recruitForm" action="{{route('categories.store')}}" 
                id="recruitForm" enctype="multipart/form-data">@csrf
                
                   
                    <div class="row">
                     
                      <div class="col-sm-5 form-group" style="margin-left: 70px">
                        <label style="font-weight: normal;">Name</label>
                        <input type="text" name="categoryName" class="form-control" required  value="{{old('categoryName')}}" id="categoryName" >
                        
                      </div>
                    
                      </div>
                 <div class="row">
                        <div class="col-md-3 col-sm-3"  style="margin-left: 70px" >
                           <button class="btn btn-success btn-block">SAVE</button>
                         
                       </div>
                        
                      </div>
                </form>
                
              </div>
              <!-- /.card-body -->
           
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection

<style>
           .meme{
  box-shadow: 
   5px 5px 10px 5px rgba(56, 230, 12, 0.2),
   -5px -5px 10px 5px rgba(56, 230, 12, 0.2);
      border-radius: 5px; 
     }
     .meme:hover {
      box-shadow: 
     5px 5px 10px 5px rgba(235, 11, 11, 0.2),
    -5px -5px 10px 5px rgba(235, 11, 11, 0.2);
  border-radius: 5px;
     }
}

     
     </style>
