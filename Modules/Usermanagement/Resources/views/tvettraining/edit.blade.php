                <!-- form start -->
               <form role="form" method="post"  name="editForm" action="{{$url}}" id="editForm" enctype="multipart/form-data">
                @csrf

                  <div class="card-body">
                   
                    <div class="row">
                      <div class="col-12 col-sm-6">
                        <span style="color: red" >{{$errors->first('servicename')}}</span> 
                        <div class="form-group">
                          <label >Service Number</label>
                            <input type="hidden" id="caller" readonly="" name="caller" value="nationalservice">
                          	<input type="text" class="form-control" id="servicenumber" name="servicenumber" value="{{$paramilitary->servicenumber}}" readonly="" placeholder="Enter Servie Number" required>
                        </div> 
                                                
                        <div class="form-group">
                            <label>TVET Name</label>
                            <select id="tvet" name="tvet" class="form-control select2" style="width: 100%;" required >
                             <option value="" disabled selected>select TVET...</option>
                              @foreach ($tvets as $tvet)
                                <?php
                                if(!(isset($tvettraining->tvetname))){
                                  $tvetname=0;
                                }else{
                                  $tvetname=$tvettraining->tvetname;
                                }
                                if($tvetname==$tvet->id){?>
                                  <option value="{{$tvet->id}}" selected>{{$tvet->name}}</option><?php
                                }else{?>
                                  <option value="{{$tvet->id}}" >{{$tvet->name}}</option><?php
                                }?>
                              @endforeach
                            </select>
                          </div>

                        <div class="form-group">
                            <label>TVET Course</label>
                            <select id="course" name="course" class="form-control select2" style="width: 100%;" required >
                             <option value="" disabled selected>select course...</option>
                              @foreach ($courses as $course)
                                <?php
                                if(!(isset($tvettraining->course)) or $tvettraining->course==0){
                                  $regcourse=0;
                                }else{
                                  $regcourse=$tvettraining->course;
                                }
                                if($regcourse==$course->id){?>
                                  <option value="{{$course->id}}" selected>{{$course->coursename}}</option><?php
                                }else{?>
                                  <option value="{{$course->id}}" >{{$course->coursename}}</option><?php
                                }?>
                              @endforeach
                            </select>
                          </div>                                   
                      </div>
                      <div class="col-12 col-sm-6">                      
                        <div class="form-group">
                            <label >Start Date</label>
                            <?php
                            if(!(isset($tvettraining->startdate))){
                              $startdate="";
                            }else{
                              $startdate=$tvettraining->startdate;
                            }
                            ?>
                            <input type="date" class="form-control" id="startdate" name="startdate" value="{{$startdate}}" placeholder="Enter deployment start date" required>
                          </div> 
                        <div class="form-group">
                            <label >End Date</label>
                            <?php
                            if(!(isset($tvettraining->enddate))){
                              $enddate="";
                            }else{
                              $enddate=$tvettraining->enddate;
                            }
                            ?>
                            <input type="date" class="form-control" id="enddate" name="enddate" value="{{$enddate}}" placeholder="Enter deployment end date" required>
                          </div> 
                        <div class="form-group">
                            <label >Graduated On</label>
                            <?php
                            if(!(isset($tvettraining->graduationdate))){
                              $graduationdate="";
                            }else{
                              $graduationdate=$tvettraining->graduationdate;
                            }
                            ?>
                            <input type="date" class="form-control" id="graduationdate" name="graduationdate" value="{{$graduationdate}}" placeholder="Enter deployment end date" >
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
