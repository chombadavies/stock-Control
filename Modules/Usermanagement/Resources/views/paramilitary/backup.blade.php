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
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
               <li class="breadcrumb-item"><a href="{{url()->current()}}">Paramilitaries</a></li>
              <li class="breadcrumb-item active">Add New</li>
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

            <a href="<?=url('/Backend/Paramilitary/Create')?>" class="btn btn-sm btn-info" data-title="Add Recruitment "><span class="fa fa-plus"><span>Add New recruit</a>

                                       <a href="<?=url('/Backend/Paramilitary/Index')?>" class="btn btn-sm btn-success"><span class="fa fa-bars"><span>List of Recruits</a>
                                        

                                          <a href="<?=url('/Backend/Paramilitary/Import')?>" class="btn btn-sm btn-danger" data-title="Add Recruitment "><span class="fa fa-upload"><span>Import Data</a>
                                        </div>

          <div class="col-12">
               
           

            <div class="card">

          </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Admit New Recruits</h3>
              
               
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
                          <input type="text" class="form-control" id="servicenumber" name="servicenumber" placeholder="Enter Servie Number" required>
                        </div> 
                        <span style="color: red" >{{$errors->first('details')}}</span> 
                        <div class="form-group">
                            <label >Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name " required>
                        </div>                          
                        <div class="form-group">
                            <label>County of Birth</label>
                            <select id="countyofbirth" name="countyofbirth" class="form-control select2" style="width: 100%;" required >
                             <option value="">select county...</option>
                              @foreach ($counties as $county)
                              <option value="{{$county->id}}" >{{$county->countyname}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label >Year of Admission</label>
                            <input type="year" class="form-control" id="yearofadmission" name="yearofadmission" placeholder="Enter Date Of Admission" required>
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
                              @foreach ($counties as $county)
                              <option value="{{$county->id}}" >{{$county->countyname}}</option>
                              @endforeach
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
                              @foreach ($ethnicities as $ethnicity)
                              <option value="{{$ethnicity->id}}" >{{$ethnicity->ethnicityname}}</option>
                              @endforeach
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
        
          
       
    </script>

@endpush