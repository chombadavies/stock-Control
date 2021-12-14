
  <div class="line">
    <hr style="border: 4px solid green">
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

            <div class="col-12">

                <a href="<?=route('upload.index')?>" class="btn btn-sm btn-success"><span class="fa fa-bars"><span>View Uploads</a>
                  <a href="<?=url('/download/'.$upload->file)?>" class="btn btn-sm btn-info"><i class="fas fa-download"></i>Download</a>
     </span>
         <div class="col-12">
         <div class="card">

          </div>
            <!-- /.card -->

            <div class="card card-success card-outline">
              <div class="card-header">
                <h3 class="card-title">View Details</h3>
              
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                {{$upload->name}}
                {{$upload->description}}

                {{-- <iframe src="/uploads/{{$upload->file}}" frameborder="0" height="300" width="600"></iframe> --}}
                <object data="{{asset('/uploads/'.@$upload->file)}}"  width="100%" height="650">
                  alt : <a href="{{url('/print/'.$upload->id)}}">No Preview To Show.Click To Print</a>
                  </object>
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



 
 
 


   
