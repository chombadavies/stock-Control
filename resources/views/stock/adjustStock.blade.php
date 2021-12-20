
  <div class="line">
    <hr style="border: 4px solid green">
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

            <div class="col-12">

                <a href="<?=route('store.index')?>" class="btn btn-sm btn-info"><span class="fa fa-bars"><span> View Ordered Items</a>
     </span>
         <div class="col-12">
         <div class="card">

          </div>
            <!-- /.card -->

            <div class="card card-success card-outline">
              <div class="card-header">
                <h3 class="card-title">Adjust Stock</h3>
</div>
              <!-- /.card-header -->
              <div class="card-body">
            
                 <form role="form" method="post"  name="recruitForm" action="    {{route('stock.update',$item->id)}}" 
                id="adjustorder" enctype="multipart/form-data">@csrf
                
                   @method('put')
                    <div class="row">
                        <div class="col-md-6 col-sm-4">
                            <label  style="font-weight: normal;" >Product Name</label>
                             <input type="text" class="form-control" readonly id="productName" value="{{$item->productName }}"  name="product_id">
                        </div>
                        <div class="col-md-6 col-sm-4">
                            <label  style="font-weight: normal;" >Item  Name</label>
                             <input type="text" class="form-control" id="itemName" readonly value="{{$item->itemName }}"  name="item_id" >
                        </div>
  
                      </div>
                      <div class="row">
                       <div class="col-md-6 col-sm-4">
                          <label  style="font-weight: normal;" >Item Code</label>
                           <input type="text" class="form-control" readonly id="itemdescription" value="{{$item->itemCode}}"  name="itemdescription" >
                      </div>
                      <div class="col-md-6 col-sm-4">
                        <label  style="font-weight: normal;" >Item Quantity</label>
                         <input type="number" class="form-control" readonly id="quantity" value="{{$item->quantity}}"  name="quantity">
                    </div>
                  
                      
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-4">
                          <label  style="font-weight: normal;" >Physical Quantity</label>
                           <input type="number" class="form-control" id="physicalQuantity"  name="physicalquantity" required>
                      </div>
                      <div class="col-md-6 col-sm-4">
                        <label  style="font-weight: normal;" >Adjustment Value</label>
                         <input type="number" class="form-control" id="adjustmentValue"  name="adjustmentvalue" readonly>
                    </div>
                      </div>
                      <hr>
                   
                <div class="row">
                        <div class="col-md-6 col-sm-6">
                          <input type="checkbox" name="reject" required >
                          <br>
                          <p style="color: crimson">Confirm Stock Adjustment</p>
                           <button class="btn btn-success btn-block">Adjust</button>
                         
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

    <script>
     


         $('#physicalQuantity').on('input',function(e){

          var quantity=$('#quantity').val();
          var physicalqty=$('#physicalQuantity').val();
            if(quantity=="")
            {
              quantity=0; 
            }else{
              quantity=parseInt(quantity);
            }


            if(physicalqty=="")
            {
              physicalqty=0; 
            }else{
              physicalqty=parseInt(physicalqty);
            }
            var balance=quantity-physicalqty;
              $('#adjustmentValue').val(balance);
        
         })
    </script>

    
  

