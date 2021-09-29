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
               <li class="breadcrumb-item"><a href="{{url()->current()}}">recruitment</a></li>
              <li class="breadcrumb-item active">Index</li>
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

            <a href="<?=url('/Backend/Recruitments/Create')?>" class="btn btn-sm btn-info" data-title="Add Recruitment "><span class="fa fa-plus"><span>Add New recruit</a>

                                       <a href="<?=url('/Backend/Recruitments/Create')?>" class="btn btn-sm btn-success"><span class="fa fa-bars"><span>List of Recruits</a>
                                        </div>

          <div class="col-12">
               
           

            <div class="card">

          </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of Recruits</h3>
              
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                   <table id="SystemPermisions" class="table table-bordered table-striped"  style="width: 100%;">
                  <thead class="table-info">
                  <tr>
                    
                                        <th>Action</th>
                                         <th>Station</th>
                                        <th>ID Number</th>
                                        <th>Names</th>
                                        <th>D.O.B</th>
                                        <th>Sex</th>
                                        <th>County</th>
                                        <th>Ethnicity</th>
                                        <th>System Date</th>
                                       
                                        
                   
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
         "lengthMenu": [[50, 250, 500, -1], [50, 250, 500, "All"]],
        "order": [[8, "desc" ]],
       
           ajax:'<?=url("Backend/Recruitment/fetchList")?>',
            columns: [
            {data: 'action', name: 'action',searchable:false,orderable:false},
            {data: 'recruitmentstation', name: 'recruitmentstation'},
            {data: 'idnumber', name: 'idnumber'},
            {data: 'name', name: 'name'},
            {data: 'dateofbirth', name: 'dateofbirth'},
            {data: 'gender', name: 'gender'},
            {data: 'countyname', name: 'countyname'},
            {data: 'ethnicity', name: 'ethnicity'},
            {data: 'created_at', name: 'created_at'},
           
            
            ],


            dom: 'Bfrtip',

        buttons: [
         'pageLength',
            { 
      extend: 'excelHtml5',
      className:'btn-danger',
      exportOptions: {
               columns: [1,2,3,4,5]
                
            },
      text: '<span>Excel</span>',
      
       },

          { 
      extend: 'csvHtml5',
       className:'btn-success',
      text: '<span>CSV</span>',
      exportOptions: {
               columns: [1,2,3,4,5]
                
            },
     
      
       },
        
        {extend: 'print',
         className:'btn-info',
        exportOptions: {
            columns: [1,2,3,4,5]
                
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