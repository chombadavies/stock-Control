                <!-- form start -->
                <form>
                @csrf
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12 col-sm-6">
                        <span style="color: red" >{{$errors->first('servicename')}}</span> 
                        <div class="form-group">
                          <label >Service Number</label>
                          <input type="text" class="form-control" value="{{$tvettraining->servicenumber}}" id="servicenumber" name="servicenumber" placeholder="Enter Servie Number" readonly required>
                        </div> 
                        <div class="form-group">
                            <label >TVET Name</label>
                            <input type="text" class="form-control" value="{{$tvettraining->tvet->name}}" id="name" name="name" placeholder="Enter Name " readonly required>
                        </div> 
                        <div class="form-group">
                            <label >TVET Course</label>
                            <input type="text" class="form-control" value="{{$tvettraining->Course->coursename}}" id="name" name="name" placeholder="Enter Name " readonly required>
                        </div>      
                      </div>
                      <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label >Start Date</label>
                            <input type="text" class="form-control" value="{{$tvettraining->startdate}}" id="name" name="name" placeholder="Enter Name " readonly required>
                        </div> 
                        <div class="form-group">
                            <label >End Date</label>
                            <input type="text" class="form-control" value="{{$tvettraining->enddate}}" id="name" name="name" placeholder="Enter Name " readonly required>
                        </div> 
                        <div class="form-group">
                            <label >Graduation Date</label>
                            <input type="text" class="form-control" value="{{$tvettraining->graduationdate}}" id="name" name="name" placeholder="Enter Name " readonly required>
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
