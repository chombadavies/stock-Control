
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Register</title>
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
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{url('/') }}"><b>Admin Register</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
   

      @if (Session::has('error_message'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{Session::get('error_message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif




      <form id="registerForm" name="registerForm" action="{{url('/admin/register') }}" method="post"
      enctype="multipart/form-data">@csrf
        <span style="color: red" style="margin-top: 0%">{{$errors->first('name')}}</span>    
        <div class="form-group">
          <label >name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required>
        </div>
       
        <span style="color: red" >{{$errors->first('mobile')}}</span>  
        <div class="form-group">
          <label >phone number</label>
          <input type="text" class="form-control" id="phone" name="phone" value="{{old('mobile')}}" required>
        </div>

        <span style="color: red" >{{$errors->first('admin_image')}}</span>  
        <div class="form-group">
          <label >Admin Image</label>
          <input type="file" class="form-control" id="admin_image" name="admin_image" value="{{old('admin_image')}}" required>
        </div>

        <span style="color: red" style="margin-top: 0%">{{$errors->first('email')}}</span>  
        <div class="form-group">
          <label >email</label>
          <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" required>    
        </div>

        <span style="color: red" style="margin-top: 0%">{{$errors->first('password')}}</span>  
        <div class="form-group">
          <label >password</label>
          <input type="password" class="form-control" id="password" name="password" required>        
        </div>

        <span style="color: red" style="margin-top: 0%">{{$errors->first('confirm_password')}}</span>  
        <div class="form-group ">
          <label for="id_number">Confirm Password</label>
          <input type="password"  class="form-control" id="confirm_password" name="confirm_password" required>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-success btn-block">Register</button>
          </div>
         <div class="col-5 btn ">
            <a href="{{url('/')}}">back to login</a>
          </div>
          <!-- /.col --> 
        </div> 
      </form>
 
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
<script src="{{asset('js/admin_js/adminlte.min.js') }}"></script>


</body>
</html>
