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
             
            </ol>
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

            <a href="<?=route('stock.create')?>" class="btn btn-sm btn-info" data-title="Add Item "><span class="fa fa-plus"><span> Receive Stock</a>

                                        <a href="<?=route('stock.index')?>" class="btn btn-sm btn-success"><span class="fa fa-bars"><span> Stock Register</a>
 </div>

          <div class="col-12">
               
           

            <div class="card">

          </div>
            <!-- /.card -->

            <div class="card card-success card-outline">
           
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                   <table id="SystemPermisions" class="table table-bordered table-striped"  style="width: 100%;">
                  <thead class="table bg-success">
                  <tr>
                    
                                        <th>Action</th>
                                        <th>Item Name</th>
                                        <th>Centre</th>
                                         <th>Alert Stock</th>
                                         <th>Quantity</th>
                                  
                   
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
                  pageLength:25,
                  "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
                "order": [[1, "desc" ]],

                    ajax:'<?=url("/fetchallstock")?>',
                    columns: [
                    {data: 'action', name: 'action',searchable:false,orderable:false}, 
                    {data: 'itemName', name: 'itemName'},
                    {data: 'centreName', name: 'centreName'},
                    {data:'alert_stock',name:'alert_stock'},
                    {data:'quantity',name: 'quantity'},
                    ],
                  


                    dom: 'Bfrtip',

                buttons: [
                  'pageLength',
                ],
                });
                
              </script>

@endpush
<style>
    .card{
  box-shadow: 
   5px 5px 10px 5px rgba(56, 230, 12, 0.2),
   -5px -5px 10px 5px rgba(56, 230, 12, 0.2);
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
