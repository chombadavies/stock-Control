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
               <li class="breadcrumb-item"><a href="{{url('/home')}}">User Management</a></li>
              <li class="breadcrumb-item active">Create </li>
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

            <a href="<?=url('/Backend/User/CreateAdmin')?>" class="btn btn-sm btn-info"><span class="fa fa-plus"><span>Add New User</a>
           <a href="<?=url('/Backend/User/Index')?>" class="btn btn-sm btn-success"><span class="fa fa-bars"><span> Registered Users</a>
          </div>

          <div class="col-12">
               
           

            <div class="card">

          </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Create New Internal System User</h3>
              
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <form role="form" action="{{$url}}" method="post">
                                                            <?=csrf_field()?>
                                        <div class="row">

                                           <div class="form-group col-md-6">
                                                                <label style="font-weight: normal;">Staff Name   <span class="text-danger">*</span></label >
                                                                 <input type="text" required class="form-control" id="userameInput" placeholder="Name" value="{{(isset($model->name))?$model->name:old('name')
                                                                }}"  name="name">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label   style="font-weight: normal;">Email Address  <span class="text-danger">*</span></label>
                                                             
                                                                    <input  required type="email" class="form-control" name="email" id="emailInput" placeholder="Email Address" value="{{(isset($model->email))?$model->email:old('email')
                                                                }}">
                                                                   
                                                              
                                                            </div>
                                          

                                        </div>
                                        <div class="row">

                                           <div class="form-group col-md-6">
                                                                <label  style="font-weight: normal;">Telephone  <span class="text-danger">*</span></label>
                                                                <span class="input-icon icon-right">
                                                                  <input type="text"  required class="form-control" name="telephone" placeholder="Phone" value="{{old('telephone')}}" >
                                                                   
                                                                </span>
                                                            </div>

                                             <div class="form-group col-md-6">
                                                                <label  style="font-weight: normal;">Personal Number  <span class="text-danger">*</span></label>
                                                                <span class="input-icon icon-right">
                                                              <input  required type="text" class="form-control" name="id_number" placeholder="personal Number" value="{{old('id_number')}}">
                                                                   
                                                                </span>
                                                            </div>
                                            </div>
                                        <div class="row">
                                                <div class="form-group col-md-6">
                                                                <label  style="font-weight: normal;">Gender  <span class="text-danger">*</span></label>
                                                                <span class="input-icon icon-right">
                                                             {{ Form::select('gender',([null=>'--Select Gender--'] + array("Male"=>"Male","Female"=>"Female")), @$profile->gender, ['class'=>'form-control','required'=>'required','id'=>'Gender','style'=>'width:100%']) }}
                                                                   
                                                                </span>
                                                            </div>

                                                     <div class="form-group col-md-6">
                                                                <label   style="font-weight: normal;">User Role  <span class="text-danger">*</span></label>
                                                                <span class="input-icon icon-right">
                                                            {{ Form::select('role_id',([null=>'--Select Role--'] + $roles), $model->role_id, ['class'=>'form-control','required'=>'required','id'=>'Role','style'=>'width:100%']) }}
                                                                   
                                                                </span>
                                                                
                                                            </div>
                                                            

                                                      
                                      </div>
                                      <div class="row">
                                      
                                             <div class="form-group col-md-6" id="Centre">
                                                        <label   style="font-weight: normal;">Centre <span class="text-danger">*</span></label>
                                                        <span class="input-icon icon-right">
                                                    {{ Form::select('centre_id',([null=>'--Select Centre--'] + $centres), $model->centre_id, ['class'=>'form-control','style'=>'width:100%']) }}
                                                           
                                                        </span>
                                                    </div>
                                                    <div class="form-group col-md-6" id="Department">
                                                      <label   style="font-weight: normal;">Department <span class="text-danger">*</span></label>
                                                      <span class="input-icon icon-right">
                                                  {{ Form::select('dpt_id',([null=>'--Select Department--'] + $departments), $model->dpt_id, ['class'=>'form-control','style'=>'width:100%']) }}
                                                         
                                                      </span>
                                                  </div>
                                                 

                                              
                              </div>

                                       <div class="row">
                                                <div class="form-group col-md-6">
                                                                <label   style="font-weight: normal;">Password  <span class="text-danger">*</span></label>
                                                        <span class="input-icon icon-right">
                                                        <input  required type="password" class="form-control" id="passwordInput" placeholder="Password" name="password" value="{{old('password')}}">
                                                                   
                                                                </span>
                                                            </div>

                                                     <div class="form-group col-md-6">
                                                                <label   style="font-weight: normal;">Confirm Password  <span class="text-danger">*</span></label>
                                                                <span class="input-icon icon-right">
                                                            <input  required type="password" class="form-control" id="confirmPasswordInput" name="password_confirmation" placeholder="Confirm Password" value="{{old('password_confirmation')}}">
                                                                   
                                                                </span>
                                                            </div>
                                      </div>

                                       <div class="row">
                                                <div class="form-group col-md-3">
                                                    <button class="btn btn-success btn-block"><?=($model->exists)?"Update":"Create"?></button>
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
@push("scripts")


<script>
        
          
       $('#SystemPermisions').DataTable({
        processing: true,
        serverSide: true,
         pageLength:50,
        "order": [[ 3, "desc" ]],
       
           ajax:'<?=url("Backend/Roles/fetchList")?>',
            columns: [
            {data: 'action', name: 'action',searchable:false,orderable:false},
            {data: 'guard_name', name: 'guard_name'},
            {data: 'name', name: 'name'},
            {data: 'created_at', name: 'created_at'},
            ],


            dom: 'Bfrtip',

        buttons: [
            { 
      extend: 'excelHtml5',
      className:'btn-danger',
      exportOptions: {
               columns: [1,2,3]
                
            },
      text: '<span>Excel</span>',
      
       },

          { 
      extend: 'csvHtml5',
       className:'btn-success',
      text: '<span>CSV</span>',
      exportOptions: {
               columns: [1,2,3]
                
            },
     
      
       },
        
        {extend: 'print',
         className:'btn-info',
        exportOptions: {
            columns: [1,2,3]
                
            },
           text: '<span >Print</span>',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
        }},
        ],
        });

     

                  $(function() {
              $('#Centre').hide(); 
              $('#Department').hide(); 
              $('#Role').change(function(){
                  if($('#Role').val() =='Store Manager','Staff') {
                      $('#Centre').show(); 
                      
                  } 
                 
                  
                   else {
                      $('#Centre').hide(); 
                  } 
              });
              $('#Centre').change(function(){
                // alert('meme');
                  if($('#Centre').val() == 'MEME') {
                      $('#Department').show(); 
                      
                  } 
                  else {
                      $('#Department').show(); 
                  } 
              });
          });

          
       


    
   
    
    </script>

@endpush