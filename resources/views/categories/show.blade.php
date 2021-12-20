<div class="line">
  <hr style="border: 4px solid green">
  </div>
  <link rel="stylesheet" href="{{asset('css/admin_css/style2.css') }}">
<!-- Main content -->
    <section class="content"  >
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          
            

            <div class="card">
          </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="color: blue"><b>{{$category->categoryName}} Products</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="categories" class="table table-bordered table-striped">
                  <thead class="table bg-success" >
                  <tr>
                                   
                    <th>Product Name</th>  
                    <th>Product Code</th>
                    <th>Status</th>            
                                   
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($category->products as $product)          
                  <tr>
                                
                    <td>{{$product->productName}}</td>  
                    <td>{{$product->code}}</td> 
                    <td>@if ($product->status==1)
                      <a class="updateServiceStatus"  id="service-{{$product->id}}" service_id={{$product->id}}
                          href="javascript:void(0)">Active</a>
                      @else 
                      <a class="updateServiceStatus"   id="service-{{$product->id}}" service_id ="{{$product->id}}"
                          href="javascript:void(0)">Inactive</a>
                      @endif
                    </td>
                
               
                  </tr>
                  @endforeach
                  </tbody>
                </table>
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
   



   
 
 
