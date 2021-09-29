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
                            <label>TVET Name</label>
                            <select id="tvetname" name="tvetname" class="form-control select2" style="width: 100%;" required >
                             <option value="" >select college...</option>
                              @foreach ($tvets as $tvet)
                                <option value="{{$tvet->id}}">{{$tvet->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        <div class="form-group">
                            <label>TVET Course</label>
                            <select id="course" name="course" class="form-control select2" style="width: 100%;" required >
                             <option value="" >select course...</option>
                              @foreach ($courses as $course)
                                <option value="{{$course->id}}">{{$course->coursename}}</option>
                              @endforeach
                            </select>
                          </div>                        
                                    
                      </div>
                      <div class="col-12 col-sm-6">                      

                        <div class="form-group">
                            <label >Start Date</label>
                            
                            <input type="date" class="form-control" id="startdate" name="startdate" value="{{$tvettraining->startdate}}" placeholder="Enter deployment start date" required>
                          </div> 
                        <div class="form-group">
                          <label >End Date</label>                            
                          <input type="date" class="form-control" id="enddate" name="enddate" value="{{$tvettraining->enddate}}" placeholder="Enter deployment end date" required>
                        </div>  
                        <div class="form-group">
                          <label >Graduation Date</label>                            
                          <input type="date" class="form-control" id="graduationdate" name="graduationdate" value="{{$tvettraining->graduationdate}}" placeholder="Enter deployment end date" required>
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
