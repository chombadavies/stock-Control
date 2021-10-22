
  <div class="line">
    <hr style="border: 4px solid green">
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

            <div class="col-12">

                <a href="<?=route('store.index')?>" class="btn btn-sm btn-info"><span class="fa fa-bars"><span> View ordered items</a>
     </span>
         <div class="col-12">
         <div class="card">

          </div>
            <!-- /.card -->

            <div class="card card-success card-outline">
              <div class="card-header">
                <h3 class="card-title">Edit Item</h3>
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
                            <label  style="font-weight: normal;" >item  Name</label>
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
                           <input type="number" class="form-control" id="physicalQuantity"  name="physicalquantity">
                      </div>
                      <div class="col-md-6 col-sm-4">
                        <label  style="font-weight: normal;" >Adjustment Value</label>
                         <input type="number" class="form-control" id="adjustmentValue"  name="adjustmentvalue">
                    </div>
                      </div>
                      <hr>
                   
                <div class="row">
                        <div class="col-md-6 col-sm-6">
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

    
  

