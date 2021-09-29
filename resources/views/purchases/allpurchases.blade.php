<div class="line">
  <hr style="border: 4px solid green">
  </div>
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
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-12">

            <a href="<?=route('purchases.create')?>" class="btn btn-sm btn-info" data-title="Add Item "><span class="fa fa-plus"><span>Receive Purchases</a>

                                        <a href="<?=route('purchases.index')?>" class="btn btn-sm btn-success"><span class="fa fa-bars"><span>List of Purchases</a>
 </div>

          <div class="col-12">
               
           

            <div class="card">

          </div>
            <!-- /.card -->

            <div class="card">
           
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                   <table id="SystemPermisions" class="table table-bordered table-striped"  style="width: 100%;">
                  <thead class="table-info">
                  <tr>
                    
                                        <th>Action</th>
                                        <th>Product</th>
                                        <th>Item Name</th>
                                         <th>Item Description</th>
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
     
           ajax:'<?=url("/fetchallpurchases")?>',
            columns: [
            {data: 'action', name: 'action',searchable:false,orderable:false}, 
           {data: 'productName', name: 'productName'},
           {data: 'itemName', name: 'itemName'},
           {data: 'Description', name: 'Description'},
           {data:'Quantity',name: 'Quantity'},
            ],
          


            dom: 'Bfrtip',

        buttons: [
         'pageLength',
        ],
        });
    </script>

@endpush
{{-- /fetchpurchases --}}