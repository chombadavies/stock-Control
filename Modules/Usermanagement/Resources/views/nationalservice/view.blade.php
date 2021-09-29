                <!-- form start -->
                <form>
                @csrf
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12 col-sm-6">
                        <span style="color: red" >{{$errors->first('servicename')}}</span> 
                        <div class="form-group">
                          <label >Service Number</label>
                          <input type="text" class="form-control" value="{{$nationalservice->servicenumber}}" id="servicenumber" name="servicenumber" placeholder="Enter Servie Number" readonly required>
                        </div> 
                        <div class="form-group">
                            <label >County Deployed</label>
                            <input type="text" class="form-control" value="{{($nationalservice->county)?$nationalservice->county->countyname:'Not Set'}}" id="name" name="name" placeholder="Enter Name " readonly required>
                        </div> 
                        <div class="form-group">
                            <label >Physical Location</label>
                            <input type="text" class="form-control" value="{{$nationalservice->physicallocation}}" id="name" name="name" placeholder="Enter Name " readonly required>
                        </div> 
                        <div class="form-group">
                            <label >Duty</label>
                            <input type="text" class="form-control" value="{{$nationalservice->duty}}" id="name" name="name" placeholder="Enter Name " readonly required>
                        </div>      
                      </div>
                      <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label >Deployed Organization</label>
                            <input type="text" class="form-control" value="{{$nationalservice->deployedorganization}}" id="name" name="name" placeholder="Enter Name " readonly required>
                        </div> 
                        <div class="form-group">
                            <label >Start Date</label>
                            <input type="text" class="form-control" value="{{$nationalservice->startdate}}" id="name" name="name" placeholder="Enter Name " readonly required>
                        </div> 
                        <div class="form-group">
                            <label >End Date</label>
                            <input type="text" class="form-control" value="{{$nationalservice->enddate}}" id="name" name="name" placeholder="Enter Name " readonly required>
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
