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
               
           

            
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Update Profile</h3>
              
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                 <form role="form" method="post"  name="recruitForm" action="{{$url}}" 
                id="recruitForm" enctype="multipart/form-data">@csrf
                
                   
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-sm-4">
                        <span style="color: red" >{{$errors->first('servicename')}}</span> 
                        <div class="form-group">
                          <label >Service Number</label>
                          <input type="text" class="form-control" id="servicenumber" value="{{$user->username}}" name="servicenumber" placeholder="Enter Servie Number" readonly>
                        </div> 
                        
                        
                      </div>
                      <div class="col-md-4 col-sm-4 col-sm-4">
                        <span style="color: red" >{{$errors->first('servicename')}}</span> 
                        <div class="form-group">
                          <label >ID Number</label>
                          <input type="text" class="form-control" id="servicenumber" value="{{$model->idnumber}}" name="id_number" placeholder="Enter Servie Number" required>
                        </div> 
                    </div>
                     <div class="col-md-4 col-sm-4 col-sm-4">
                        <span style="color: red" >{{$errors->first('servicename')}}</span> 
                        <div class="form-group">
                          <label >Telephone</label>
                          <input type="text" class="form-control number" id="servicenumber" value="{{$user->username}}" name="servicenumber" placeholder="Enter Servie Number" required>
                        </div> 
                    </div>
                    
                  </div> 
                  <div class="row">
                      <div class="col-md-4 col-sm-4 col-sm-4">
                        <span style="color: red" >{{$errors->first('servicename')}}</span> 
                        <div class="form-group">
                          <label >Name</label>
                          <input type="text" class="form-control" id="servicenumber" value="{{$user->name}}" name="servicenumber" placeholder="Enter Servie Number" readonly>
                        </div> 
                        
                        
                      </div>
                      <div class="col-md-4 col-sm-4 col-sm-4">
                        <span style="color: red" >{{$errors->first('servicename')}}</span> 
                        <div class="form-group">
                          <label >Gender</label>
                         {!! Form::select('gender',[''=>'--- Select Gender---']+array("Male"=>"Male","Female"=>"Female"),$model->gender,['class'=>'form-control','id'=>"gender",'style'=>'width:100%']) !!}
                        </div> 
                    </div>
                    <div class="col-md-4 col-sm-4 col-sm-4">
                        <span style="color: red" >{{$errors->first('servicename')}}</span> 
                        <div class="form-group">
                          <label >Gender</label>
                         {!! Form::select('gender',[''=>'--- Select Gender---']+array("Male"=>"Male","Female"=>"Female"),$model->gender,['class'=>'form-control','id'=>"gender",'style'=>'width:100%']) !!}
                        </div> 
                    </div>
                    
                  </div>
                  <div class="row">
                      <div class="col-md-6 col-sm-6 col-sm-6">
                        <span style="color: red" >{{$errors->first('servicename')}}</span> 
                        <div class="form-group">
                          <label >Date Of Birth</label>
                          <input type="text" class="form-control" id="dob" value="{{$model->dateofbirth}}" name="dateofbirth" placeholder="Date Of Birth"  required>
                           <input type="hidden" id="Eighteen" value='<?=date('Y', strtotime(date('Y-m-d') . "-18 years"))?>'>
                        </div> 
                        
                        
                      </div>
                      <div class="col-md-6 col-sm-6 col-sm-6">
                        <span style="color: red" >{{$errors->first('servicename')}}</span> 
                        <div class="form-group">
                          <label >County of Birth</label>
                        {!! Form::select('county_name',[''=>'--- Select County Name---']+$counties,$model->county_name,['class'=>'form-control','id'=>"County",'style'=>'width:100%']) !!}
                        </div> 
                    </div>
                    <div class="col-md-3 col-sm-3 col-sm-3">
                        <span style="color: red" >{{$errors->first('servicename')}}</span> 
                        <div class="form-group">
                          <label >Sub County</label>
                        {!! Form::select('sub_countyname',[''=>'--- Select subCounty---']+array(),$model->sub_countyname,['class'=>'form-control','id'=>'SUbCounty','style'=>'width:100%']) !!}
                        </div> 
                    </div>
                     <div class="col-md-3 col-sm-3 col-sm-3">
                        <span style="color: red" >{{$errors->first('servicename')}}</span> 
                        <div class="form-group">
                          <label >Division</label>
                         {!! Form::select('devision',[''=>'--- Select Division---']+array(),$model->devision,['class'=>'form-control','id'=>'Division','style'=>'width:100%']) !!}
                        </div> 
                    </div>
                    <div class="col-md-3 col-sm-3 col-sm-3">
                        <span style="color: red" >{{$errors->first('servicename')}}</span> 
                        <div class="form-group">
                          <label >Location</label>
                        {!! Form::select('location',[''=>'--- Select Location']+array(),$model->location,['class'=>'form-control','id'=>'Location','style'=>'width:100%']) !!}
                        </div> 
                    </div>

                    <div class="col-md-3 col-sm-3 col-sm-3">
                        <span style="color: red" >{{$errors->first('servicename')}}</span> 
                        <div class="form-group">
                          <label >Sub Location</label>
                        {!! Form::select('sub_location',[''=>'--- Select Sub Location']+array(),$model->sub_location,['class'=>'form-control','id'=>'SubLocation','style'=>'width:100%']) !!}
                        </div> 
                    </div>
                    <div class="col-md-3 col-sm-3 col-sm-3">
                        <span style="color: red" >{{$errors->first('servicename')}}</span> 
                        <div class="form-group">
                          <label >Are You Employed</label>
                        {!! Form::select('is_employed',[''=>'--- Select Sub Location']+array("Yes"=>"Yes","No"=>"No"),$model->is_employed,['class'=>'form-control','id'=>'Employment','style'=>'width:100%']) !!}
                        </div> 
                    </div>
                     <div class="col-md-3 col-sm-3 col-sm-3">
                        <span style="color: red" >{{$errors->first('servicename')}}</span> 
                        <div class="form-group">
                          <label >Organization Type</label>
                        {!! Form::select('organization_type',[''=>'--- Select Type']+array("Ministry"=>"Ministry","State Department"=>"State Department","State Corporation"=>"State Corporation","Commission"=>"Commission","Agency"=>"Agency"),$model->organization_type,['class'=>'form-control','id'=>'Employment','style'=>'width:100%']) !!}
                        </div> 
                    </div>
                    <div class="col-md-6 col-sm-6 col-sm-6">
                        <span style="color: red" >{{$errors->first('servicename')}}</span> 
                        <div class="form-group">
                          <label >Organization Name</label>
                         <input type="text" class="form-control"  value="{{$model->organization_name}}" name="organization_name" placeholder="Enter Servie Number"  required>
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

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
   var start=$("#Eighteen").val();
    var end=start-75;
    var myrange=end+":"+start;
   
   $("#dob").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: myrange,
        maxDate:0,
   });

    $("#County").on("change",function(e){
        e.preventDefault();
         
           var value=$(this).val();
              if(value.length>0)
              {
                 var url="<?=url('/Backend/Location/GetSubCounties')?>";
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
                
                 var url="<?=url('/Backend/Location/GetDevision')?>";
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
                
                 var url="<?=url('/Backend/Location/GetLocation')?>";
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
                
                 var url="<?=url('/Backend/Location/GetSubLocation')?>";
                    $.get(url,{'Name':value},function(data){

                        $("#SubLocation").html(data);
                    });

              }
          });

        
          
       
    </script>

@endpush