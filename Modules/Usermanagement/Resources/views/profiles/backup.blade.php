@extends('layouts.admin_layout.admin_layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
              <?=$page_title?>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">My Profile</a></li>
              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

            <div class="col-12">

          

          <div class="col-12">
               
           

            <div class="card">

          </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Update Profile</h3>
              
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                 <form role="form" method="post"  name="recruitForm" action="{{route('paramilitary.store')}}" 
                id="recruitForm" enctype="multipart/form-data">@csrf
                
                   
                    <div class="row">
                      <div class="col-12 col-sm-6">
                        <span style="color: red" >{{$errors->first('servicename')}}</span> 
                        <div class="form-group">
                          <label >Service Number</label>
                          <input type="text" class="form-control" id="servicenumber" value="{{$user->username}}" name="servicenumber" placeholder="Enter Servie Number" readonly>
                        </div> 
                        <span style="color: red" >{{$errors->first('details')}}</span> 
                        <div class="form-group">
                            <label >Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name " value="{{$user->name}}" required>
                        </div>                          
                        <div class="form-group">
                            <label>County of Birth</label>

                            {!! Form::select('county_name',[''=>'--- Select County Name---']+$counties,$model->county_name,['class'=>'form-control','id'=>"County",'style'=>'width:100%']) !!}



                           
                          </div>
                          <div class="form-group">
                            <label >Year of Admission</label>
                            <input type="date" class="form-control" id="yearofadmission" name="yearofadmission" placeholder="Enter Date Of Admission" required>
                          </div> 
                          <div class="form-group">
                            <label >Gender</label>
                            <select id="gender" name="gender" class="form-control select2" style="width: 100%;" required >
                             <option value="">select gender...</option>
                             <option value="M">Male</option>
                             <option value="F">Female</option>
                            </select>
                          </div> 
                          <div class="form-group">
                            <label >Intake Cycle</label>
                            <select id="intakecycle" name="intakecycle" class="form-control select2" style="width: 100%;" required >
                             <option value="">select intake cycle...</option>
                             <option value="1">Cycle One</option>
                             <option value="2">Cycle Two</option>
                            </select>
                          </div> 
                          <div class="form-group">
                            <label >Disability</label>
                            <select id="disability" name="disability" class="form-control select2" style="width: 100%;" required >
                             <option value="">select if disabled...</option>
                             <option value="1">Disabled</option>
                             <option value="0">Not Disabled</option>
                            </select>
                          </div> 
                          <div class="form-group">
                            <label >Passout Date</label>
                            <input type="date" class="form-control" id="passoutdate" name="passoutdate"  >
                          </div>            
                      </div>
                      <div class="col-12 col-sm-6">
                      
                        <div class="form-group">
                            <label >ID Number</label>
                            <input type="text" class="form-control" id="idnumber" name="idnumber" placeholder="Enter Id Number" required>
                          </div> 
        
                        <div class="form-group">
                            <label >Date of Birth</label>
                            <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" placeholder="Enter Date of Birth" required>
                          </div> 
                          
                        <div class="form-group">
                            <label>County of Residence</label>
                            <select id="countyofresidence" name="countyofresidence" class="form-control select2" style="width: 100%;" required >
                             <option value="">select county...</option>
                            
                            </select>
                          </div>
                          <div class="form-group">
                            <label >Recruitment Station</label>
                            <input type="text" class="form-control" id="recruitmentstation" name="recruitmentstation" placeholder="Enter Recruit Station " required>
                          </div> 
                          <div class="form-group">
                            <label >Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" required>
                          </div> 
                          <div class="form-group">
                            <label >Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                          </div> 
                         
                        <div class="form-group">
                            <label>Ethnicity</label>
                            <select id="ethnicity" name="ethnicity" class="form-control select2" style="width: 100%;" required >
                             <option value="">select ethnicity...</option>
                             
                            </select>
                          </div>
        
                        
                      </div>
                    
                  </div> 
                     
                
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
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
  </div>
@endsection
@push("scripts")


<script>


    $("#County").on("change",function(e){
        e.preventDefault();
       
           var value=$(this).val();
              if(value.length>0)
              {
                 var url="<?=url('/backend/Location/GetSubCounties')?>";
                    $.get(url,{'Name':value},function(data){

                        $("#SUbCounty").html(data);
                    });

              }
          });

 $("#SUbCounty").on("change",function(e){
    e.preventDefault();
      
      var value=$(this).val();
              if(value.length>0)
              {
                
                 var url="<?=url('/backend/Location/GetDevision')?>";
                    $.get(url,{'Name':value},function(data){

                        $("#Division").html(data);
                    });

              }
          });




  $("#Division").on("change",function(e){
    e.preventDefault();
      
      var value=$(this).val();
              if(value.length>0)
              {
                
                 var url="<?=url('/backend/Location/GetLocation')?>";
                    $.get(url,{'Name':value},function(data){

                        $("#Location").html(data);
                    });

              }
          });


   $("#Location").on("change",function(e){
    e.preventDefault();
      
      var value=$(this).val();
              if(value.length>0)
              {
                
                 var url="<?=url('/backend/Location/GetSubLocation')?>";
                    $.get(url,{'Name':value},function(data){

                        $("#SubLocation").html(data);
                    });

              }
          });

        
          
       
    </script>

@endpush