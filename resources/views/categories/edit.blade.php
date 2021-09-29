
<!-- Main content -->
    <section class="content">              
    <div class="col-12">
      
      
               
       <div class="card">

          </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit Category</h3>
          </div>
              <!-- /.card-header -->


        <div class="card-body">
         <form role="form" method="post"  name="recruitForm" action="{{route('categories.update',$category->id)}}" 
                id="recruitForm" enctype="multipart/form-data">@csrf
                @method('put')
                 <div class="row">
                     
                      <div class="col-sm-6 form-group">
                        <label style="font-weight: normal;">Name</label>
                        <input type="text" name="categoryName" class="form-control" required  value="{{$category->categoryName}}" id="categoryName" >
                        
                      </div>
                      <div class="col-sm-6 form-group">
                        <label style="font-weight: normal;">Code</label>
                        <input type="text" name="code" class="form-control" required  value="{{$category->code}}" id="code" readonly>
                        
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