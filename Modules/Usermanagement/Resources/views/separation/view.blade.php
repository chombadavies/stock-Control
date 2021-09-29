                <!-- form start -->
                <form>
                @csrf
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12 col-sm-6">
                        <span style="color: red" >{{$errors->first('servicename')}}</span> 
                        <div class="form-group">
                          <label >Service Number</label>
                          <input type="text" class="form-control" value="{{$separation->servicenumber}}" id="servicenumber" name="servicenumber" placeholder="Enter Servie Number" readonly required>
                        </div> 
                        <div class="form-group">
                            <label >Stage of Exit</label>
                            <input type="text" class="form-control" value="{{$separation->stageofexit}}" id="name" name="name" placeholder="Enter Name " readonly required>
                        </div> 
                        <div class="form-group">
                            <label >Type of Exit</label>
                            <input type="text" class="form-control" value="{{$separation->typeofexit}}" id="name" name="name" placeholder="Enter Name " readonly required>
                        </div>      
                      </div>
                      <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label >Reason</label>
                            <input type="text" class="form-control" value="{{$separation->reason}}" id="name" name="name" placeholder="Enter Name " readonly required>
                        </div> 
                        <div class="form-group">
                            <label >Exit Date</label>
                            <input type="text" class="form-control" value="{{$separation->dateofexit}}" id="name" name="name" placeholder="Enter Name " readonly required>
                        </div> 
                        <div class="form-group">
                          <br>
                          <div align="right">
                           <a href="" onclick="window.replace('Index')" class="btn btn-warning">Close</a>
                          </div>
                        </div> 
                      </div>
                  </div> 
                     
                  </div>
                </form>
                  <!-- /.card-body -->
