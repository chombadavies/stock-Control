  
  @extends('layouts.admin_layout.admin_layout')
  @section('content')
        {{-- <style>
          .content-wrapper{
           background-image:url('/images/background.jpeg')
          }
        </style> --}}
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Settings</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Admin Settings</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Update Password</h3>
                </div>
                  <!-- /.card-header -->

                @if (Session::has('error_message'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin-top: 10px">
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
              
                <!-- form start -->
                <form role="form" method="post"  name="updatePasswordForm" action="{{url('/admin/update-current-pwd')}}" id="updatePasswordForm">@csrf
                  <div class="card-body">
                    {{-- <div class="form-group">
                      <label for="exampleInputEmail1">Admin name </label>
                      <input  class="form-control" type="text" value="{{$adminDetails->name}}" placeholder="Enter Admi-name"
                       id="admin_name" name="admin_name">
                    </div> --}}
                    <div class="row">
                      <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Admin Email</label>
                      <input  class="form-control" value="{{$adminDetails->email}}" readonly="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Current Password</label>
                      <input type="password" class="form-control" required="" id="current_pwd" name="current_pwd" placeholder="Enter Current Password">
                      <span id="checkCurrentPwd"></span>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Confirm Password</label>
                      <input type="password" class="form-control" name="confirm_pwd" id="confirm_pwd" placeholder="Confirm Password" required="">
                      <span id="confirmPassword"></span>
                    </div>
                  </div>
              
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Admin type </label>
                      <input  class="form-control" value="{{$adminDetails->type}}" readonly="">
                    </div>
                   
                    <div class="form-group">
                      <label for="exampleInputPassword1">New Password</label>
                      <input type="password" class="form-control" id="new_pwd" name="new_pwd" placeholder="Enter New Password">
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
            </div>
           
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  @endsection
  