<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-sclae=1.0">
<title>Huduma Kenya Login</title>
<link rel="stylesheet" href="{{ url('css/admin_css/style.css') }}">

</head>

<body>
  <section>
    <div class="imgBx">
      <img src="images/huduma.jpg" alt="meme">
      
    </div>
    <div class="contentBx">
 
      <div class="formBx ">
        {{-- @include('layouts.notification') --}}
        <h2>Login</h2>

        ugddjdafadifdcjkf
         2nd login
       
<form action="{{url('/login')}}" method="POST">@csrf
<div class="inputBx">
<span>User Name</span>
<input type="email" name="email" type="email" class="form-control" placeholder="Email">
<span style="color: red" >{{$errors->first('email')}}</span>
</div>
<div class="inputBx">
  <span>Password</span>
  <input type="password" name="password" id="password" placeholder="Password">
  <span style="color: red" >{{$errors->first('password')}}</span>
  </div>
  <div class="remember">
    <label for="remember"> <input type="checkbox" name="">Remember Me</label>
  </div>
  <div class="inputBx">
    <input type="submit" name="" value="Sign In">
    </div>
    <div class="inputBx">
      <p>Dont have an Account? <a href="">Sign Up</a></p>
      </div>
</form>
<h3>Login with social Media </h3>
<ul class="sci">
  <li> <img src="" alt=""></li>
  <li> <img src="" alt=""></li>
  <li><img src="" alt=""></li>
</ul>
      </div>

    </div>
  </section>
</body>
      </html>

