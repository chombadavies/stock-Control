<!-- Main content -->
<div class="line">
  <hr style="border: 4px solid green">
  </div>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
      

        <a href="<?=route('items.index')?>" class="btn btn-sm btn-success"><span class="fa fa-bars"><span>View Items List</a>
        </span>
        <div class="card">
      </div>
        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <h3 class="card-title" style="color: blue"><b>{{$centre->name}} Stock</b></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table  class="table table-bordered table-striped">
              <thead class="thead bg-success" >
              <tr>
                            
               
                <th>Item Name</th>  
                <th>quantity</th> 
                <th>Status</th>            
                               
              </tr>
              </thead>
              <tbody>
                  @foreach ($centre->items as $item)          
              <tr>
               
              <td>{{$item->itemName}}</td>     
                <td>{{$item->pivot->quantity}}</td>      
                <td>@if ($item->pivot->status==1)
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







