<div class="line">
  <hr style="border: 4px solid green">
  </div>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
        
          <!-- /.card -->

          <div class="card card-success card-outline">
            <div class="card-header">
              <h3 class="card-title" style="color: blue"><b>Act/Deactivate {{$item->itemCode }}</b></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="categories" class="table table-bordered table-striped">
                <thead class="bg-success">
                <tr>
                               
                  <th>Item Name</th>  
                  <th>Item Code</th>
                  <th>Status</th>            
                                 
                </tr>
                </thead>
                <tbody>        
                <tr>
                 <td>{{$item->itemName}}</td>  
                  <td>{{$item->itemCode}}</td> 
                  <td>@if ($item->status==1)
                    <a class="updateServiceStatus"  id="item-{{$item->id}}" item_id={{$item->id}}
                        href="javascript:void(0)">Active</a>
                    @else 
                    <a class="updateServiceStatus"   id="item-{{$item->id}}" item_id ="{{$item->id}}"
                        href="javascript:void(0)">InActive</a>
                    @endif
                  </td>
              
             
                </tr>
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
  <style>
    
    .card{
  box-shadow: 
   5px 5px 10px 5px rgba(56, 230, 12, 0.2),
   -5px -5px 10px 5px rgba(56, 230, 12, 0.2);
      border-radius: 5px; 
     }
     .card:hover {
      box-shadow: 
     5px 5px 10px 5px rgba(235, 11, 11, 0.2),
    -5px -5px 10px 5px rgba(235, 11, 11, 0.2);
  border-radius: 5px;
     }

  </style>
 



 


