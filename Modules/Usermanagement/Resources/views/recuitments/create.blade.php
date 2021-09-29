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
               <li class="breadcrumb-item"><a href="{{url()->current()}}">Recruitment</a></li>
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

            <a href="<?=url('/Backend/Recruitments/Create')?>" class="btn btn-sm btn-info" data-title="Add Recruitment "><span class="fa fa-plus"><span>Add New recruit</a>

                                       <a href="<?=url('/Backend/Recruitments/Create')?>" class="btn btn-sm btn-success"><span class="fa fa-bars"><span>List of Recruits</a>
                                        

                                        

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

                 <form role="form" method="post"  name="recruitForm" action="{{$url}}" 
                id="recruitForm" enctype="multipart/form-data">@csrf
                
                   
                    <div class="row">
                      <div class="col-sm-6 form-group">
                        <label style="font-weight: normal;">Name</label>
                        <input type="text" name="name" class="form-control" required  value="{{old('name')}}">
                        
                      </div>
                        <div class="col-md-6 col-sm-6">
                          <label  style="font-weight: normal;" >ID Number</label>
                           <input type="text" name="id_number" class="form-control" required  value="{{old('id_number')}}">
                         
                       </div>
                      </div>
                      <div class="row">
                      <div class="col-sm-6 form-group ">
                        <label  style="font-weight: normal;">Gender</label>
                         {!! Form::select('gender',[''=>'--- Select Gender---']+array("Male"=>"Male","Female"=>"Female"),$model->gender,['class'=>'form-control','id'=>"gender",'style'=>'width:100%']) !!}
                        
                      </div>
                        <div class="col-md-6 col-sm-6">
                          <label  style="font-weight: normal;" >Date of Birth</label>
                           <input type="text" class="form-control" id="dob" value="{{$model->dateofbirth}}" name="dateofbirth" placeholder="Date Of Birth"  required>
                           <input type="hidden" id="Eighteen" value='<?=date('Y', strtotime(date('Y-m-d') . "-18 years"))?>'>
                         
                       </div>
                      </div>
                      <div class="row">
                      <div class="col-sm-6 form-group">
                        <label  style="font-weight: normal;">Home County</label>
                        {!! Form::select('county_name',[''=>'--- Select County Name---']+$counties,$model->county_name,['class'=>'form-control','id'=>"County",'style'=>'width:100%']) !!}
                        
                      </div>
                        <div class="col-md-6 col-sm-6">
                          <label   style="font-weight: normal;">Telephone</label>
                           <input type="text" name="telephone" class="form-control" required  value="{{old('telephone')}}">
                         
                       </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-3 form-group">
                        <label   style="font-weight: normal;">Year of Admission</label>
                          {!! Form::select('yearofadmission',[''=>'--- Select Tribe---']+array("2020"=>"2020","2019"=>"2019","2018"=>"2018","2017"=>"2017","2016"=>"2016","2015"=>"2015","2014"=>"2014"),$model->yearofadmission,['class'=>'form-control','id'=>"yearofadmission",'style'=>'width:100%']) !!}
                        
                      </div>
                      <div class="col-sm-3 form-group">
                        <label   style="font-weight: normal;">Ethnicity</label>
                          {!! Form::select('ethnicity',[''=>'--- Select Tribe---']+$ethnicities,$model->ethnicity,['class'=>'form-control','id'=>"Ethinicity",'style'=>'width:100%']) !!}
                        
                      </div>
                        <div class="col-md-6 col-sm-6">
                          <label  style="font-weight: normal;">Recruitment Center</label>
                          {!! Form::select('recruitmentstation',[''=>'--- Select Center Name---']+$centers,$model->recruitmentstation,['class'=>'form-control','id'=>"Station",'style'=>'width:100%']) !!}
                         
                       </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-6">
                           <button class="btn btn-info">Register</button>
                         
                       </div>
                        
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
    var end=start-45;
    var myrange=end+":"+start;
   
   $("#dob").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: myrange,
        maxDate:0,
   });

     $("#County,#Ethinicity").select2();
        
          
       
    </script>

@endpush