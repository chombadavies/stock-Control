
  <div class="line">
    <hr style="border: 4px solid green">
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

            <div class="col-12">

                <a href="<?=route('upload.index')?>" class="btn btn-sm btn-success"><span class="fa fa-bars"><span>View Uploads</a>
     </span>
         <div class="col-12">
         <div class="card">

          </div>
            <!-- /.card -->

            <div class="card card-success card-outline">
              <div class="card-header">
                <h3 class="card-title">Create New Upload</h3>
              
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                 <form role="form" method="post"  action="{{route('upload.store')}}"
                 enctype="multipart/form-data">@csrf
                    <div class="row">
        
                      <div class="col-md-6 col-sm-4">
                            <label  style="font-weight: normal;" > Name</label>
                             <input type="text" class="form-control" id="name" value=""  name="name" placeholder="name" required>
                        </div>

                        <div class="col-md-6 col-sm-4">
                          <label  style="font-weight: normal;" >Description</label>
                           <input type="text" class="form-control" id="description" value="" required  name="description" placeholder="description ">
                      </div>
                        
                      </div>
                      <div class="row">
                        
                        <div class="col-md-6 col-sm-4">
                          <label  style="font-weight: normal;" >Attach Pdf Only</label>
                           <input type="file" class="form-control" id="input-id" @error('file') is-invalid @enderror accept="application/pdf,application/vnd.ms-excel"  name="file" placeholder="file " required>
                           @error('file')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                       @enderror
                      </div>
                         
                         
                      </div>
                      <br>
                <div class="row">
                        <div class="col-md-3 col-sm-3">
                           <button class="btn btn-success btn-block">Upload</button>
                         
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

<script type="text/javascript">
    $(function(){
        $("#input-id").on('change', function(event) {
            var file = event.target.files[0];
          if(!file.type.match('pdf.*')) {
                alert("upload pdf only");
                location.reload();
                $("#form-id").get(0).reset(); //the tricky part is to "empty" the input file here I reset the form.
                return;
            }

        });
    });
</script>



 
 
 


   
