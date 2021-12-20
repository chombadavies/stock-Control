
@extends('layouts.admin_layout.admin_layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
         <?=$page_title?>
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

            <a href="<?=route('centres.index')?>" class="btn btn-sm btn-success"><span class="fa fa-bars"><span> View List</a>
</span>
                                        

                                        

          <div class="col-12">
               
           

            <div class="card">

          </div>
            <!-- /.card -->

            <div class="card1 card-success card-outline">
              <div class="card-header">
                <h3 class="card-title">Add New Centre</h3>
          </div>
              <!-- /.card-header -->


              @if (Session::has('error_message'))
              <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px">
            {{Session::get('error_message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif

              @if (Session::has('success_message'))
              <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px">
            {{Session::get('success_message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
              
              <div class="card-body">
         <form role="form" method="post"  name="centreForm" action="{{route('centres.store')}}" 
                id="centreForm" enctype="multipart/form-data">@csrf
                
                   
                    <div class="row">
                     
                      <div class="col-sm-4 form-group">
                        <label style="font-weight: normal;"> Centre Name</label>
                        <input type="text" name="centreName" class="form-control" required  value="{{old('centreName')}}" id="name" >
                        <span style="color: red" >{{$errors->first('centreName')}}</span>
                      </div>
                      <div class="col-sm-4 form-group">
                        <label style="font-weight: normal;">Centre Code</label>
                        <input type="text" name="code" class="form-control" required  value="{{old('code')}}" id="code">
                        <span style="color: red" >{{$errors->first('code')}}</span>
                      </div>
                        
                      </div>
                 <div class="row">
                        <div class="col-md-3 col-sm-3">
                           <button class="btn btn-success btn-block" >SAVE</button>
                         
                       </div>
                        
                      </div>
                </form>
                
              </div>
              <!-- /.card-body -->
            </div>
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
  .card1{
  box-shadow: 
   5px 5px 10px 5px rgba(56, 230, 12, 0.2),
   -5px -5px 10px 5px rgba(56, 230, 12, 0.2);
      border-radius: 5px; 
     }
     .card1:hover {
      box-shadow: 
     5px 5px 10px 5px rgba(235, 11, 11, 0.2),
    -5px -5px 10px 5px rgba(235, 11, 11, 0.2);
  border-radius: 5px;
     }
</style>
