



  <div class="line">
    <hr style="border: 4px solid green">
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

            <div class="col-12">

                <a href="<?=route('suppliers.index')?>" class="btn btn-sm btn-success"><span class="fa fa-bars"><span>View supplier List</a>
     </span>
         <div class="col-12">
         <div class="card">

          </div>
            <!-- /.card -->

            <div class="card card-success card-outline">
              <div class="card-header">
                <h3 class="card-title">Create New Supplier</h3>
              
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                 <form role="form" method="post"  name="recruitForm" action="{{route('suppliers.update',$supplier->id)}}" 
                id="recruitForm" enctype="multipart/form-data">@csrf
                
                   @method('put')
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <label  style="font-weight: normal;" >Supplier Name</label>
                             <input type="text" class="form-control"  value="{{$supplier->supplierName}}" readonly name="supplierName" placeholder="supplier Name " required>
                        </div>

                     
                          <div class="col-md-6 col-sm-6">
                            <label  style="font-weight: normal;" >KRA Pin</label>
                             <input type="text" class="form-control"  value="{{$supplier->supplierPin}}"  readonly name="supplierPin" placeholder="supplier Pin " required>
                        </div>
                        
                      </div>
                      <div class="row">
                       

                <div class="col-md-6 col-sm-6">
                          <label  style="font-weight: normal;" >Supplier Email</label>
                           <input type="email" class="form-control"  value="{{$supplier->supplierEmail}}"  name="supplierEmail" placeholder="supplier Email" required>
                      </div>
                       <div class="col-sm-6 form-group ">
                        <label  style="font-weight: normal;">Phone Number</label>
                         <input type="text" class="form-control" value="{{$supplier->phoneNumber}}" name="phoneNumber" placeholder="Phone Number" required>
                        
                      </div>
                      </div>
                    
                <div class="row">
                        <div class="col-md-3 col-sm-3">
                           <button class="btn btn-success btn-block">Save</button>
                         
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
  
<style>
  
  .card{
  box-shadow: 
   5px 5px 10px 5px rgba(56, 230, 12, 0.2),
   -5px -5px 10px 5px rgba(56, 230, 12, 0.2);
      border-radius: 5px; 
     }
  
     
</style>
@push("scripts")

<script>
     
   $("#categoryId").on("change",function(e){
       e.preventDefault();
        var id=$(this).val();
          if(id.length>0)
          {
              var url="<?=url('/item/catyegory/getProducts')?>/"+id;
               $.get(url,function(data){
                   $("#productId").html(data);
               })
          }



   });
   $("#productId").on("change",function(e){
       e.preventDefault();
        var id=$(this).val();
          if(id.length>0)
          {
              var url="<?=url('/item/product/getItems')?>/"+id;
               $.get(url,function(data){
                   $("#itemId").html(data);
               })
          }



   });
   </script>


   @endpush 
