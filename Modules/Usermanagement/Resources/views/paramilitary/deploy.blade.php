                <!-- form start -->
               <form role="form" method="post"  name="editForm" action="{{$url}}" id="editForm" enctype="multipart/form-data">
                @csrf
               
                  <div class="card-body">
                   
                    <div class="row">
                      <div class="col-12 col-sm-6">
                        <span style="color: red" >{{$errors->first('servicename')}}</span> 
                        <div class="form-group">
                          <label >Service Number</label>
                           <input type="hidden" id="caller" name="caller" value="paramilitary">
                          <input type="text" class="form-control" id="servicenumber" name="servicenumber" value="{{$paramilitary->servicenumber}}" readonly="" placeholder="Enter Servie Number" required>
                        </div> 
                                                
                        <div class="form-group">
                            <label>County Deployed</label>
                            <select id="countyposted" name="countyposted" class="form-control select2" style="width: 100%;" required >
                             <option value="" disabled selected>select county...</option>
                              <?php foreach($counties as $county):?>
                                <option value="{{$county->id}}">{{$county->countyname}}</option>
                              <?php endforeach;?>
                               
                            </select>
                          </div>
                          <div class="form-group">
                            <label >Physical location</label>
                            
                            <input type="text" class="form-control" id="physicallocation" name="physicallocation" placeholder="Enter physical location name" required>
                          </div>
                          <div class="form-group">
                            <label >Duty</label>
                           
                            <input type="text" class="form-control" id="duty" name="duty" placeholder="What exactly are you doing" required>
                          </div> 
                                    
                      </div>
                      <div class="col-12 col-sm-6">
                      
                        <div class="form-group">
                            <label>Deployed organization</label>
                            <select id="deployedorganization" name="deployedorganization" class="form-control select2" style="width: 100%;" required >
                             <option value="" >select organization...</option>
                              @foreach ($deploymentorganizations as $deploymentorganization)
                                <option value="{{$deploymentorganization->id}}">{{$deploymentorganization->organizationname}}</option>
                              @endforeach
                            </select>
                          </div>

                        <div class="form-group">
                            <label >Start Date</label>
                            
                            <input type="date" class="form-control" id="startdate" name="startdate"  placeholder="Enter deployment start date" required>
                          </div> 
                        <div class="form-group">
                            <label >End Date</label>
                            
                            <input type="date" class="form-control" id="enddate" name="enddate"  placeholder="Enter deployment end date" required>
                          </div>  
                          
                 </div>
                    
                  </div> 
                     
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
