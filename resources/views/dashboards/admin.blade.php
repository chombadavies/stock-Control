
@extends('layouts.admin_layout.admin_layout')
@section('content')
        <div class="content-wrapper">
 <section class="content">
    <div class="container-fluid">
      

      <div class="col-4">
        @if (Session::has('success_message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px">
      {{Session::get('success_message')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        @if (Session::has('error_message'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 10px">
      {{Session::get('error_message')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
      </div>
     <div class="row">
    
       <div class=" col-md-3 col-xs-2 b-r">

       </div>
         <div class="col-md-6 col-xs-2 b-r">
            <div class="card">

            </div>
            
            <div class="card card-success card-outline">
             <!-- /.card-header -->
                <div class="card-body bg-">
                   <p class="pull-right">CONGRATULATIONS!</p> 
                    <p style="color: blue" class="pull-right" >{{$centre->centreName}}</p> 
  <hr>
                                        <p class="text-left text-uppercase  text-dark">welcome to stock control system</p>
                                        <div class="row">
                                            <div class="col-md-3"> <a href="{{route('store.create')}}" class="btn btn-block btn-success">Place Order</a> </div>
                                            <div class="col-md-9"><i><h5 class="text-dark text-right">YOUR WELFARE IS OUR BUSINESS</i></div>
                                        </div>
                 
                    
                  </div>
                 
                </div>
                <!-- /.card-body -->
              </div>
              <div class="col-md-6 col-xs-2 b-r">
                <div class="card">
    
                </div>
              
               
                     
                    </div>
                    <!-- /.card-body -->
                  </div>
         </div>
      
          <div class="card1 card-success card-outline">
         
            <!-- /.card-header -->
            <div class="card-body">
              <h6 style="color: blue" >{{$centre->centreName}} AVAILABLE STOCK</h6>
              <div class="table-responsive">
                 <table id="SystemPermisions" class="table table-bordered table-striped" style="width: 100%;">
                <thead class="table bg-success">
                <tr>
                  
                                      <th>Action</th>
                                      <th>Product Name</th>
                                      <th>Item Name</th>
                                      <th>Item Code</th>
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
   




</div>


</section>
@endsection
@push("scripts")


              <script>
               $('#SystemPermisions').DataTable({
                processing: true,
                serverSide: true,
                  pageLength:5,
                  "lengthMenu": [[5], [5]],
                "order": [[1, "desc" ]],

                    ajax:'<?=url("/fetchstock")?>',
                    columns: [
                    {data: 'action', name: 'action',searchable:false,orderable:false}, 

                   
                    {data: 'productName', name: 'productName'},
                    {data: 'itemName', name: 'itemName'},
                    {data: 'itemCode', name: 'itemCode'}, 
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
               div.content-wrapper{
                    font-family: "Helvetica", Sans-Serif;
                    background-image: url("/images/background.jpeg");
                    background-repeat: no-repeat;
                    background-size: cover;
                  }
                  .card{
  box-shadow: 
     5px 5px 10px 5px rgba(56, 230, 12, 0.2),
   -5px -5px 10px 5px rgba(56, 230, 12, 0.2);
      transition: 0.3s;
      border-radius: 5px; 
     }

          /* .table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {
   background-color: #BFDFB1;
} */
                </style> 

