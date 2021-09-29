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
              <h3 class="card-title" style="color: blue"><b>{{$purchase->Name}} Supply List</b></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="categories" class="table table-bordered table-striped">
                <thead class="table bg-success">
                <tr>
                                 
                  <th>Item Name</th>  
                  <th>Description</th>
                  <th>Item Quantity</th>
                  <th>Status</th>            
                                 
                </tr>
                </thead>
                <tbody>
                    @foreach ($purchaseItems as $item)          
                <tr>
                              
                  <td>{{$item->itemName}}</td>  
                  <td>{{$item->description}}</td> 
                  <td>{{$item->quantity}}</td> 
                  <td>@if ($item->status==1)
                    <a class="updateServiceStatus"  id="item-{{$item->id}}" service_id={{$item->id}}
                        href="javascript:void(0)">Active</a>
                    @else 
                    <a class="updateServiceStatus"   id="item-{{$item->id}}" service_id ="{{$item->id}}"
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
 



 


