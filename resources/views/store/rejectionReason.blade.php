
  <div class="line">
    <hr style="border: 4px solid green">
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

            <div class="col-12">

                
     </span>
         <div class="col-12">
         <div class="card">

          </div>
            <!-- /.card -->

            <div class="card card-success card-outline">
              <div class="card-header">
                <h3 class="card-title">Write Rejection Grounds</h3>
</div>
              <!-- /.card-header -->
              <div class="card-body">

                 <form role="form" method="post"  name="recruitForm" action="{{url('/reject')}}" 
                id="reason for rejection" >@csrf
                
                    <div class="row">
                      @foreach ($orderdetails as $orderdetail)
                          
                      @endforeach
                      <input type="hidden"  name="reject"  >
                      <input type="hidden" name="order_id" value="{{$orderdetail->id}}">
                        <div class="col-md-12 col-sm-4">
                            <label  style="font-weight: normal;" >Reason For Rejection</label>
                             <textarea class="form-control" id="reason for rejection" name="reasonForRejection" rows="3" required></textarea>

                        </div>
                        
  
                      </div>
                    
                      <hr>
                   
                <div class="row">
                        <div class="col-md-6 col-sm-6">
                          <input  <?php if($orderdetail->reject==1){echo 'checked';}?> type="checkbox" name="reject" required >
                          <p style="color: crimson">Confirm Order Rejection</p>
                           <button class="btn btn-success btn-block">Save</button>
                         
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

    
  

