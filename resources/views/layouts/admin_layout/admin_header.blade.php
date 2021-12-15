
<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white" >
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/home')}}" class="btn btn-outline rounded-pill"><i class="fa fa-home">Home</i></a>
      </li>
      <br>
      <?php if(Auth::User()->hasRole('SuperAdmin')|| Auth::User()->hasRole('Centre Manager')):?>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/contactsupplers')}}" class="btn btn-outline rounded-pill"><i class="fa fa-money-bill">Suppliers</i></a>
      </li>
      
      <br>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('transactions.index')}}" class="btn btn-outline rounded-pill"><i class="fa fa-money-bill">Transactions</i></a>
      </li>
      <?php endif;?>
      <br><br>
           <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('store.index')}}" class="btn btn-outline rounded-pill"><i class="fa fa-money-bill">Orders</i></a>
      </li>
      <br><br>
           <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('store.create')}}" class="btn btn-outline rounded-pill"><i class="fa fa-money-bill">Make Order</i></a>
      </li>
   
    {{-- <li class="nav-item d-none d-sm-inline-block">
     <a href="{{url('/fixedasset')}}" class="btn btn-outline rounded-pill"><i class="fa fa-money-bill">Fixed Assets</i></a>
</li> --}}
   
@if(Auth::guard()->check())
<li class="nav-item">
  <a class="nav-link"  href="{{url('/logout')}}" >
    Logout
  </a>
</li>
<br><br>
<li class="nav-item">
  <a class="nav-link"  href="{{url('/home')}}" > My Account </a></li>
@else
<li class="nav-item">
<a class="nav-link"  href="{{url('/admin/logout')}}" > Logout </a></li>
@endif
    </ul>

  

    <!-- Right navbar links -->

   
  </nav>
  <!-- /.navbar -->


<style>
.btn-outline{
   border-color: #008b8b;
   color: #008b8b;
}
.btn-outline:hover{
   background-color: #008b8b;
   color: #fff;
}
.nav-item {
  padding-left: 15px;
}
.navbar{

  position: sticky; 
  background-color: #fff;
   top: 0;
}
</style>