<div class="line">
  <hr style="border: 4px solid green">
  </div>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
        

          <div class="card">
        </div>
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title" style="color: blue"><b>{{$product->productName}} Items</b></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="categories" class="table table-bordered table-striped">
                <thead class="table bg-success" >
                <tr>
                              
                  <th>Item Name</th>  
                  <th>Item Code</th>
                  <th>Status</th>            
                                 
                </tr>
                </thead>
                <tbody>
                    @foreach ($product->items as $item)          
                <tr>
                              
                  <td>{{$item->itemName}}</td>  
                  <td>{{$item->itemCode}}</td> 
                  <td>@if ($item->status==1)
                    <a class="updateServiceStatus"  id="service-{{$item->id}}" item_id={{$item->id}}
                        href="javascript:void(0)">Active</a>
                    @else 
                    <a class="updateServiceStatus"   id="service-{{$item->id}}" item_id ="{{$item->id}}"
                        href="javascript:void(0)">InActive</a>
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
 



 


