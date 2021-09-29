<div class="line">
  <hr style="border: 4px solid green">
  </div>
    <!-- Main content -->
    <section class="content">              
        <div class="col-12">
            
          <a href="<?=route('items.index')?>" class="btn btn-sm btn-success"><span class="fa fa-bars"><span>View Items List</a>
          </span>       
           <div class="card">
    
              </div>
                <!-- /.card -->
    
                <div class="card2 card success card-outline">
                  <div class="card-header">
                    <h3 class="card-title">Edit Centre</h3>
              </div>
                  <!-- /.card-header -->
    
    
                  @if (Session::has('error_message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px">
                {{Session::get('error_message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif
    
                  @if (Session::has('success_message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px">
                {{Session::get('success_message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif
                  
                  <div class="card-body">
             <form role="form" method="post"  name="recruitForm" action="{{route('centres.update',$centre->id)}}" 
                    id="recruitForm" enctype="multipart/form-data">@csrf
                    @method('put')
                     <div class="row">
                         
                          <div class="col-sm-6 form-group">
                            <label style="font-weight: normal;">Name</label>
                            <input type="text" name="name" class="form-control" required  value="{{$centre->centreName}}" id="name" >
                            
                          </div>
                          <div class="col-sm-6 form-group">
                            <label style="font-weight: normal;">Code</label>
                            <input type="text" name="code" class="form-control" required  value="{{$centre->code}}" id="code">
                            
                          </div>
                            
                          </div>
                     <div class="row">
                            <div class="col-md-2 col-sm-2">
                               <button class="btn btn-success btn-block">SAVE</button>
                             
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
        <style>
          .card2{
  box-shadow: 
   5px 5px 10px 5px rgba(56, 230, 12, 0.2),
   -5px -5px 10px 5px rgba(56, 230, 12, 0.2);
      border-radius: 5px; 
     }
     .card2:hover {
      box-shadow: 
     5px 5px 10px 5px rgba(235, 11, 11, 0.2),
    -5px -5px 10px 5px rgba(235, 11, 11, 0.2);
  border-radius: 5px;
     }
         </style>