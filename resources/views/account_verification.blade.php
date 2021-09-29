<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>NYS TRACKING SYSTEM</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ url('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('css/admin_css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page" id="login-page" class="login-page" style="background-image:'/images/background.jpeg'}}" >

  <h3 class="login-box-msg" style="font-weight: bold;" >NYS Servicemen/Servicewomen Tracking System</h3> 
<div class="login-box">
  <div class="login-logo">
    {{-- <p><b> NYS Admin Login  </b></p> --}}
    {{-- <p><b>Admin Login </b></p> --}}
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <div class="form-top" > 
  
        <img src="{{asset('images/nys-logo1.jpg')}}" class="img-responsive center-block" alt="NYS" style="margin-left: 17%" >
      </div>
      <br><br>
       <p class="login-box-msg" id="MyLabo">Account Verification</p> 

      @if (Session::has('error_message'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{Session::get('error_message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
    
      
      @if (Session::has('success_message'))
      <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px">
    {{Session::get('success_message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif

{{-- <div class="form-top" > 
  
  <img src="{{asset('images/nys-logo1.jpg')}}" class="img-responsive center-block" alt="meme" style="margin-left: 17%" >
</div>
<br><br> --}}


      <form action="#" method="post" id="ValidateForm">
        @csrf
        <div class="input-group mb-3">
          <input name="serviceno" id="serviceNo" type="email" class="form-control" placeholder="Service Number">
            
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
            <input type="hidden" name="token" id="MYCsRFToken" value="{{csrf_token()}}">
          </div>
          <div class="col-md-12">
            <span style="color: red" class="d-none" id="Invalid">
              Invalid Service Number
            </span>
          </div>
        </div>
        
        <div class="row">
          
          <!-- /.col -->
          <div class="col-md-12">
            <button type="button" class="btn btn-success form-control btn-block" id="ValidateMe">Validate</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <form action="{{url('/Account/register')}}" method="post" id="RegisterForm" class="d-none">
        @csrf
        <div class="input-group mb-3">
          <input name="serviceno" id="Number" type="email" class="form-control" placeholder="Service Number"  readonly>
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          
          </div>
        </div>
         <div class="input-group mb-3">
          <input name="name" id="Name" type="text" class="form-control" placeholder="Names" readonly >
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          
          </div>
        </div>

         <div class="input-group mb-3">
          <input name="email"  type="email" class="form-control" placeholder="Email Address"  required>
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          
          </div>
        </div>

         <div class="input-group mb-3">
          <input name="phone" id="Telephone" type="text" class="form-control"  required placeholder="Telephone Number: Start with 254" >
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          
          </div>
        </div>
        
        <div class="row">
          
          <!-- /.col -->
          <div class="col-md-12">
            <button type="submit" class="btn btn-success form-control btn-block" >Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <p class="mb-1">
       
      </p>
      <p class="mb-0">
        <a href="{{url('/')}}" class=" text-center" >I Already Have Account</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('dist/js/adminlte.min.js') }}"></script>
<script type="text/javascript">
   $("body").on("click","#ValidateMe",function(e){
    e.preventDefault();
      var no=$("#serviceNo").val();
        if(no=="")
        {
           alert("Please Enter Your Service Number");
        }else{
          var token =$("#MYCsRFToken").val();
             var url="<?=url('/ValidateAccount')?>";
             $.post(url,{'serviceNo':no,'_token':token},function(data){
                 if(data==0)
                 {
                  $("#RegisterForm").addClass("d-none");
                    $("#ValidateForm").removeClass("d-none");
                    $("#Invalid").removeClass("d-none");
                    $("#MyLabo").html("Account Verification");
                 }else{
                  $("#RegisterForm").removeClass("d-none");
                   $("#ValidateForm").addClass("d-none");
                   $("#MyLabo").html("Account Registration");
                    $("#Invalid").addClass("d-none");
                      $("#Name").val(data.Name)
                      $("#Number").val(data.ServiceNo);

                 }

             });

        }

   })
  
</script>

</body>
</html>
