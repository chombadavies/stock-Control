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
            <li class="breadcrumb-item"><a href="{{url()->current()}}">National Service</a></li>
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

          <a href="<?=url('/Backend/Nationalservice/Index')?>" class="btn btn-sm btn-success"><span class="fa fa-bars"><span>List of National Servicemen</a>

            <a href="<?=url('/Backend/Nationalservice/Import')?>" class="btn btn-sm btn-danger" data-title="Add National Servicemen "><span class="fa fa-upload"><span>Import Data</a>
            </div>

            <div class="col-12">



              <div class="card">

              </div>
              <!-- /.card -->

              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">List of National Service Deployments</h3>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="table-responsive">
                   <table id="SystemPermisions" class="table table-bordered table-striped"  style="width: 100%;">
                    <thead class="table-info">
                      <tr>

                        <th>Action</th>
                        <th>Service No</th>
                        <th>ID No</th>
                        <th>Name</th>
                        <th>Year</th>
                        <th>Station</th>
                        <th>Duty</th>
                        <th>Created At</th>

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
    "order": [[1, "desc" ]],

    ajax:'<?=url("Backend/Nationalservice/fetchList")?>',
    columns: [
    {data: 'action', name: 'action',searchable:false,orderable:false},
    {data: 'servicenumber', name: 'servicenumber'},
     {data: 'idnumber', name: 'idnumber'},
    {data: 'name', name: 'name'},
    {data: 'deployedorganization', name: 'deployedorganization'},
    {data: 'year', name: 'year'},
    {data: 'duty', name: 'duty'},
    {data: 'created_at', name: 'created_at'},
    ],


    dom: 'Bfrtip',

    buttons: [
    'pageLength',
    { 
      extend: 'excelHtml5',
      className:'btn-danger',
      exportOptions: {
       columns: [1,2,3,4,5,6]

     },
     text: '<span>Excel</span>',

   },

   { 
    extend: 'csvHtml5',
    className:'btn-success',
    text: '<span>CSV</span>',
    exportOptions: {
     columns: [1,2,3,4,5,6]

   },


 },

 {extend: 'print',
 className:'btn-info',
 exportOptions: {
  columns: [1,2,3,4,5,6]

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