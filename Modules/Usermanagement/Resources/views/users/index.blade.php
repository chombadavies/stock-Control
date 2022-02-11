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
              <li class="breadcrumb-item active">Roles</li>
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
          <div class="col-4">
          @if (Session::has('success_message'))
          <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px">
        {{Session::get('success_message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
        
        </div>

          <div class="col-12">
           
            <!-- /.card -->
<br>
            <div class="card card-success card-outline">
              <div class="card-header">
                <h3 class="card-title">List Of System Users</h3>
              
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                  <table id="SystemPermisions" class="table table-bordered table-striped"  style="width:100%;">
                  <thead class="table bg-success">
                  <tr>
                    <th>Action</th>
                    <th>Staff Name</th>
                    <th>Email Address</th>
                    <th>Telephone</th>
                    <th>Gender</th>
                    <th>Role</th>
                    <th>Centre</th>
                    <th>Department</th>
                    <th>Account Status</th>
                    <th>Last Login </th>
                    <th>Creation Date</th>
                  </tr>
                  </thead>
                  <tbody>
                     
                  </tbody>
                </table>
                  
                </div>
                
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
        "order": [[ 9, "desc" ]],
       
           ajax:'<?=url("Backend/Users/fetchList")?>',
            columns: [
            {data: 'action', name: 'action',searchable:false,orderable:false},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'phone', name: 'phone'},
            {data: 'gender', name: 'gender'},
            {data: 'user_role', name: 'user_role'},
            {data: 'centreName', name: 'centreName'},
            {data: 'dptName', name: 'dptName'},
            {data: 'user_status', name: 'user_status'},
            {data: 'lastlogindate', name: 'lastlogindate'},
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
    </script>

@endpush