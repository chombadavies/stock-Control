                      <!DOCTYPE html>
                      <html lang="en">

                      <head>
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-sclae=1.0">
                      <title>Huduma Kenya Login</title>
                      <link rel="stylesheet" href="{{asset('css/admin_css/style.css') }}">
                  
                      </head>

                      <body>
                        <section>
                          <div class="imgBx">
                            <img src="images/huduma.jpg" alt="Huduma Kenya Logo">
                            
                          </div>
                         
                          <div class="contentBx" style="width: 80%">
                              <div class="formBx ">
                                <h1>huduma kenya stock controll system</h1>
                              {{-- @include('layouts.notification') --}}
                             <br>
                              <h2>Login</h2>

                      <form action="{{url('/login')}}" method="POST">@csrf
                      <div class="inputBx">
                      <span>User Name</span>
                      <input type="email" name="email" type="email" class="form-control" placeholder="Email">
                      </div>
                      <div class="inputBx">
                        <span>Password</span>
                        <input type="password" name="password" id="password" placeholder="Password">
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
                            </div>

                          </div>
                        </section>

                        <!--Start of Tawk.to Script-->
<script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/60dd7af665b7290ac638da15/1f9gigl8v';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  </script>
  <!--End of Tawk.to Script-->
                      </body>
                            </html>

