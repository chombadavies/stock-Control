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
               <li class="breadcrumb-item"><a href="{{url()->current()}}">Audits</a></li>
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
               
           

            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List Of Recent Audit Trails</h3>
              
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                   <table id="Orgdatatable" class="table table-bordered table-striped"  style="width: 100%;">
                  <thead class="table bg-success">
                  <tr>
                   
                <th>Datetime</th>
                <th>User Names</th>
                 <th>Access Right</th>
                 <th>Event Name</th>
                <th>Module Name</th>
                <th>Ip Address</th>
                <th>Severity</th>
                <th>Description</th>
                                      
                   
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

<style>
  .card{
    box-shadow: 
     5px 5px 10px 5px rgba(56, 230, 12, 0.2),
     -5px -5px 10px 5px rgba(56, 230, 12, 0.2);
        transition: 0.3s;
        border-radius: 5px; 
       }
       .card:hover {
        box-shadow: 
       5px 5px 10px 5px rgba(235, 11, 11, 0.2),
      -5px -5px 10px 5px rgba(235, 11, 11, 0.2);
    border-radius: 5px;
       }
       
       .table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {
     background-color: #BFDFB1;
  }
  </style>
@push("scripts")


<script>
        
          
       $('#Orgdatatable').DataTable({
        processing: true,
        serverSide: true,
         pageLength:50,
          "lengthMenu": [[50, 250, 500, -1], [50, 250, 500, "All"]],
        "order": [[ 1, "desc" ]],
           ajax: '<?=url("Backend/AuditTrail/fetchList")?>',
          columns: [
               {data: 'event_date', name: 'event_date'},
            {data: 'name', name: 'name'},
            {data: 'access_level', name: 'access_level'},
            {data: 'event_name', name: 'event_name'},
            {data: 'module_name', name: 'module_name'},
            {data: 'ip_address', name: 'ip_address'},
            {data: 'severity', name: 'severity'},
            {data: 'event_description', name: 'event_description'},
            ],

            dom: 'Bfrtip',

        buttons: [
         'pageLength',
            { 
      extend: 'excelHtml5',
      className:'btn-danger',
      exportOptions: {
               columns: [0,1,2,3,4,5,6,7]
                
            },
      text: '<span>Excel</span>',
      
       },

          { 
      extend: 'csvHtml5',
       className:'btn-success',
      text: '<span>CSV</span>',
      exportOptions: {
               columns: [0,1,2,3,4,5,6,7]
                
            },
     
      
       },
        
        {extend: 'print',
         className:'btn-info',
        exportOptions: {
            columns: [0,1,2,3,4,5,6,7]
                
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