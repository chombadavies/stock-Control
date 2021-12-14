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
                  <th>price</th> 
                  <th>total</th> 
                                 
                </tr>
                </thead>
                <tbody>
                    @foreach ($purchaseItems as $item)          
                <tr>
                              
                  <td>{{$item->itemName}}</td>  
                  <td>{{$item->description}}</td> 
                  <td>{{$item->quantity}}</td> 
                  <td>{{$item->price}}</td> 
                  <td>{{$item->total}}</td> 
              
             
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
 



 


