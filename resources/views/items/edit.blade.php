
  <div class="line">
    <hr style="border: 4px solid green">
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

            <div class="col-12">

                <a href="<?=route('items.index')?>" class="btn btn-sm btn-success"><span class="fa fa-bars"><span>View Items List</a>
     </span>
         <div class="col-12">
         <div class="card">

          </div>
            <!-- /.card -->

            <div class="card card-success card-outline">
              <div class="card-header">
                <h3 class="card-title">Create New Item</h3>
              
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                 <form role="form" method="post"  name="recruitForm" action="{{route('items.update',$item->id)}}" 
                id="recruitForm" enctype="multipart/form-data">@csrf
                
                   @method('put')
                    <div class="row">
                      <div class="col-sm-4 form-group">
                        <label style="font-weight: normal;">Category</label>
                      
                      <select name="category_id" id="categoryId" class="form-control" style="width: 100%" required>
                        <option value="" selected disabled >select Category</option>
                      @foreach ($categories as $category)
                          <option value="{{$category->id}}" {{ $category->id == $product->category_id ? 'selected' : ''}} readonly>
                      {{$category->categoryName}}
                          </option>
                      @endforeach
                      </select>
                      </div>

                     <div class="col-sm-4 form-group">
                        <label style="font-weight: normal;">Product</label>
                      
                      <select name="product_id" id="productId" class="form-control" style="width: 100%" required>
                        <option value="" selected disabled >select Product</option>
                        @foreach ($products as $product)
                        <option value="{{$product->id}}" {{ $product->id == $item->product_id ? 'selected' : ''}}>
                    {{$product->productName}}
                        </option>
                    @endforeach
                      </select>
                      
                      </div>
                      <div class="col-md-4 col-sm-4">
                            <label  style="font-weight: normal;" >Item Name</label>
                             <input type="text" class="form-control" id="itemName" value="{{$item->itemName}}"  name="itemName" placeholder="Item Name ">
                             <span style="color: red" >{{$errors->first('itemName')}}</span>
                        </div>
                        
                      </div>
                      <div class="row">
                        <div class="col-sm-4 form-group">
                            <label style="font-weight: normal;">Units</label>
                          
                          <select name="unit_id" id="unit_id" class="form-control" style="width: 100%" >
                            <option value="" selected disabled >select Units</option>
                          @foreach ($units as $unit)
                              <option value="{{$unit->id}}" {{ $unit->id == $item->unit_id ? 'selected' : ''}}>
                          {{$unit->unitName}}
                              </option>
                          @endforeach
                          </select>
                          </div>
                          <div class="col-sm-4 form-group">
                            <label style="font-weight: normal;">Image</label>
                            <input type="file" name="itemImage" class="form-control" value="" id="itemImage">
                            @if (!empty($item->itemImage))
                            <a target="_blank" href="{{url('images/itemImages', $item->itemImage)}}">{{$item->itemImage}}</a>
                            <input type="hidden" name="current_itemImage" 
                            value="{{$item->itemImage}}">
                            @else
                       <p style="color: red">No added Item Image</p>                            
                            @endif
                          </div>
                          <div class="col-md-4 col-sm-4">
                            <label  style="font-weight: normal;" >Item Code</label>
                             <input type="text" class="form-control" id="itemCode" value="{{$item->itemCode}}"  name="itemCode" placeholder="Item Code ">
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
     /* .card:hover {
      box-shadow: 
     5px 5px 10px 5px rgba(235, 11, 11, 0.2),
    -5px -5px 10px 5px rgba(235, 11, 11, 0.2);
  border-radius: 5px;
     } */
     
</style>


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
 
 
   </script>


   
