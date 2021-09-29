                <!-- form start -->
               <form role="form" method="post"  name="editForm" action="{{$url}}" id="editForm" enctype="multipart/form-data">
                @csrf
             
                  <div class="card-body">
                   
                    <div class="row">
                      <div class="col-12 col-sm-6">
                        <span style="color: red" >{{$errors->first('servicename')}}</span> 
                        <div class="form-group">
                          <label >Service Number</label>
                            <?php
                            if(!isset($nationalservice->servicenumber)){
                              $servicenumber=$paramilitary->servicenumber;?>
                              <input type="hidden" id="caller" name="caller" value="paramilitary">
                              <?php
                            }else{
                              $servicenumber=$nationalservice->servicenumber;?>
                              <input type="hidden" id="caller" name="caller" value="nationalservice">
                              <?php
                            }
                            ?>
                          <input type="text" class="form-control" id="servicenumber" name="servicenumber" value="{{$servicenumber}}" placeholder="Enter Servie Number" required>
                        </div> 
                                                
                        <div class="form-group">
                            <label>County Deployed</label>
                            <select id="countyposted" name="countyposted" class="form-control select2" style="width: 100%;" required >
                             <option value="" disabled selected>select county...</option>
                              @foreach ($counties as $county)
                                <?php
                                if(!(isset($nationalservice->countyposted))){
                                  $countyposted=0;
                                }else{
                                  $countyposted=$nationalservice->countyposted;
                                }
                                if($countyposted==$county->id){?>
                                  <option value="{{$county->id}}" selected>{{$county->countyname}}</option><?php
                                }else{?>
                                  <option value="{{$county->id}}" >{{$county->countyname}}</option><?php
                                }?>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label >Physical location</label>
                            <?php
                            if(!(isset($nationalservice->physicallocation))){
                              $physicallocation="";
                            }else{
                              $physicallocation=$nationalservice->physicallocation;
                            }
                            ?>
                            <input type="text" class="form-control" id="physicallocation" name="physicallocation" value="{{$physicallocation}}" placeholder="Enter physical location name" required>
                          </div>
                          <div class="form-group">
                            <label >Duty</label>
                            <?php
                            if(!(isset($nationalservice->duty))){
                              $duty="";
                            }else{
                              $duty=$nationalservice->duty;
                            }
                            ?>
                            <input type="text" class="form-control" id="duty" name="duty" value="{{$duty}}" placeholder="What exactly are you doing" required>
                          </div> 
                                    
                      </div>
                      <div class="col-12 col-sm-6">
                      
                        <div class="form-group">
                            <label>Deployed organization</label>
                            <select id="deployedorganization" name="deployedorganization" class="form-control select2" style="width: 100%;" required >
                             <option value="" >select organization...</option>
                              @foreach ($deploymentorganizations as $deploymentorganization)
                                <?php
                                if(!(isset($nationalservice->deployedorganization))){
                                  $deployedorganization="";
                                }else{
                                  $deployedorganization=$nationalservice->deployedorganization;
                                }
                                if($deployedorganization==$deploymentorganization->id){?>
                                  <option value="{{$deploymentorganization->id}}" selected>{{$deploymentorganization->organizationname}}</option><?php
                                }else{?>
                                  <option value="{{$deploymentorganization->id}}">{{$deploymentorganization->organizationname}}</option><?php
                                }?>
                              @endforeach
                            </select>
                          </div>

                        <div class="form-group">
                            <label >Start Date</label>
                            <?php
                            if(!(isset($nationalservice->startdate))){
                              $startdate="";
                            }else{
                              $startdate=$nationalservice->startdate;
                            }
                            ?>
                            <input type="date" class="form-control" id="startdate" name="startdate" value="{{$startdate}}" placeholder="Enter deployment start date" required>
                          </div> 
                        <div class="form-group">
                            <label >End Date</label>
                            <?php
                            if(!(isset($nationalservice->enddate))){
                              $enddate="";
                            }else{
                              $enddate=$nationalservice->enddate;
                            }
                            ?>
                            <input type="date" class="form-control" id="enddate" name="enddate" value="{{$enddate}}" placeholder="Enter deployment end date" required>
                          </div>  
                          
                 </div>
                    
                  </div> 
                     
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                  </div>
                </form>
              <!-- /.card -->
