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
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
               <li class="breadcrumb-item"><a href="{{url()->current()}}">Paramilitaries</a></li>
              <li class="breadcrumb-item active">Add New</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

            <div class="col-12">

            <a href="<?=url('/Backend/Paramilitary/Create')?>" class="btn btn-sm btn-info" data-title="Add Recruitment "><span class="fa fa-plus"><span>Add New recruit</a>

                                        <a href="<?=url('/Backend/Paramilitary/Index')?>" class="btn btn-sm btn-success"><span class="fa fa-bars"><span>List of Recruits</a>

                                          <a href="<?=url('/Backend/Paramilitary/Import')?>" class="btn btn-sm btn-danger" data-title="Add Recruitment "><span class="fa fa-upload"><span>Import Data</a>
                                        </div>

          <div class="col-12">
               
           

            <div class="card">

          </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Import Recruits Data</h3>
              
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                 <form role="form" method="post"  name="recruitForm" action="{{$url}}" 
                id="recruitForm" enctype="multipart/form-data">
                @csrf
                
                   
                    <div class="row">
                      <div class="col-12 col-sm-6">
                        <span style="color: red" >{{$errors->first('servicename')}}</span> 
                        <div class="form-group">
                          <label >Select Import  Excel File</label>
                          <input type="file" class="form-control" id="servicenumber" name="file_name" placeholder="Excel File" required>
                        </div> 
                       
                        
                      </div>
                    
                  </div> 
                     
                
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-success">Import</button>
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
@push("scripts")


<script>
        
          
       
    </script>

@endpush