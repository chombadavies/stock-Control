<div class="line">
  <hr style="border: 4px solid green">
  </div>
<!-- Main content -->
    <section class="content">
      
        <div class="row">

            <div class="col-12">

            <a href="<?=route('products.index')?>" class="btn btn-sm btn-success"><span class="fa fa-bars"><span>View List</a>
</span>
                                        

                                        

          <div class="col-12">
               
           

            <div class="card">

          </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit Product</h3>
          </div>
              <!-- /.card-header -->
 <div class="card-body">
         <form role="form" method="post"  name="productForm" action="{{route('products.update',$product->id)}}" 
                id="productForm" enctype="multipart/form-data">@csrf
                @method('put')
                   
                    <div class="row">
                     
                      <div class="col-sm-4 form-group">
                        <label style="font-weight: normal;">Category</label>
                      
                      <select name="category_id" id="category_id" class="form-control" style="width: 100%" >
                        <option value="" selected disabled >select Category</option>
                      @foreach ($categories as $category)
                          <option value="{{$category->id}}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                      {{$category->categoryName}}
                          </option>
                      @endforeach
                      </select>
                      </div>
                      <div class="col-sm-4 form-group">
                        <label style="font-weight: normal;">Name</label>
                        <input type="text" name="productName" class="form-control  @error('productName') is-invalid @enderror" required  value="{{$product->productName}}" id="productName">
                        <span style="color: red" >{{$errors->first('productName')}}</span>
                      </div>
                    
                      </div>
                 <div class="row">
                        <div class="col-md-6 col-sm-6">
                           <button class="btn btn-info">SAVE</button>
                         
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
 
