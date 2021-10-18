
     <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="javascript:void(0)" class="brand-link" >
      <img src="{{asset('images/hudumalogo.png') }}" alt="Huduma Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light" style="margin-top:2rem">Warehouse Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image" >
          {{-- <img src="{{asset('images/admin_images/admin_photos/'.Auth::User()->image) }}" class="img-circle elevation-2" alt="User Image"> --}}
          <img src="{{asset('k.png')}}" class="img-circle elevation-2" alt="Avatar" >
        
        </div>
        <div class="info" >
          <a href="#" class="d-block">{{ucwords(Auth::User()->name)}}</a>
        </div>
      </div>
      {{-- style="margin-left:2rem;margin-top:2rem" --}}
     
      <!-- Sidebar Menu -->
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">            
            <!--dashboard -->
            @if (Session::get('page') =="admin")
            <?php $active ='active' ?>
            @else 
            <?php $active ='' ?>
            @endif

  
           
             <li class="nav-item">
               <a href="{{url('/home')}}" class="nav-link {{$active}}">
                  <i class="nav-icon fas fa-home"></i>
                  <p>
                     Dashboard
                  </p>
               </a>
            </li>

            
        <br>
     
        <?php if(Auth::User()->hasRole("SuperAdmin") || Auth::User()->hasRole('Centre Manager')
        || Auth::User()->hasRole('Test Admin')):?>

        @if (Session::get('page') =="receive purchases" || Session::get('page')=="purchases" || Session::get('page')=="allpurchases")
        <?php $active ='active' ?>
        @else 
        <?php $active ='' ?>
     @endif

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link {{$active}}">
            <i class="nav-icon fas fa-bars"></i>
            <p>
             Manage purchases
              <i class="fas fa-angle-left right"></i> 
            </p>
          </a>
          <ul class="nav nav-treeview">
            @if (Session::get('page') =="receive purchases")
            <?php $active ='active' ?>
            @else 
            <?php $active ='' ?>
         @endif
            <li class="nav-item">
              <a href="{{route('purchases.create')}}" class="nav-link {{$active}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Receive Purchases</p>
              </a>
            </li>
            @if (Session::get('page') =="purchases")
            <?php $active ='active' ?>
            @else 
            <?php $active ='' ?>
         @endif
            <li class="nav-item">
              <a href="{{route('purchases.index')}}"  class="nav-link {{$active}}">
                <i class="far fa-circle nav-icon"></i>
                <p>list of purchases</p>
              </a>
            </li>
            {{-- @if (Session::get('page') =="allpurchases")
            <?php $active ='active' ?>
            @else 
            <?php $active ='' ?>
         @endif
            <li class="nav-item">
              <a href="{{url('/allpurchases')}}"  class="nav-link {{$active}}">
                <i class="far fa-circle nav-icon"></i>
                <p>list of All purchases</p>
              </a>
            </li> --}}
            
          </ul>
        </li>

        <?php endif;?>
              <?php if(Auth::User()->hasRole("SuperAdmin")||Auth::User()->hasRole("Test Admin")):?>

            <!--categories -->
             @if (Session::get('page') =="createcategory" || Session::get('page')=="categories")
              <?php $active ='active' ?>
              @else 
              <?php $active ='' ?>
           @endif

            <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{$active}}">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Categories
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if (Session::get('page') =="createcategory")
              <?php $active ='active' ?>
              @else 
              <?php $active ='' ?>
           @endif
              <li class="nav-item">
                <a href="{{route('categories.create')}}" c class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Category</p>
                </a>
              </li>
              @if (Session::get('page') =="categories")
              <?php $active ='active' ?>
              @else 
              <?php $active ='' ?>
           @endif
              <li class="nav-item">
                <a href="{{route('categories.index')}}"  class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category List</p>
                </a>
              </li>
              
            </ul>
          </li>

          @if (Session::get('page') =="createproduct" || Session::get('page')=="products")
          <?php $active ='active' ?>
          @else 
          <?php $active ='' ?>
       @endif

            <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{$active}}">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Products  
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              @if (Session::get('page') =="createproduct")
              <?php $active ='active' ?>
              @else 
              <?php $active ='' ?>
           @endif
              <li class="nav-item">
                <a href="{{route('products.create')}}"  class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Product</p>
                </a>
              </li>

              @if (Session::get('page') =="products")
              <?php $active ='active' ?>
              @else 
              <?php $active ='' ?>
           @endif
              <li class="nav-item">
                <a href="{{route('products.index')}}" class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>products list</p>
                </a>
              </li>
              
            </ul>
          </li>
           <?php endif;?>
            <?php if(Auth::User()->hasRole("SuperAdmin")||Auth::User()->hasRole("Test Admin")):?>
 <!--orders -->
            @if (Session::get('page') =="createitem" || Session::get('page')=="items")
            <?php $active ='active' ?>
            @else 
            <?php $active ='' ?>
         @endif

             <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{$active}}">
              <i class="nav-icon fas fa-bars"></i>
              <p>
             Items
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if (Session::get('page') =="createitem")
              <?php $active ='active' ?>
              @else 
              <?php $active ='' ?>
           @endif
                <li class="nav-item">
                <a href="{{route('items.create')}}"  class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Item</p>
                </a>
              </li>
              @if (Session::get('page') =="items" )
              <?php $active ='active' ?>
              @else 
              <?php $active ='' ?>
           @endif
              <li class="nav-item">
                <a href="{{route('items.index')}}"  class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List of items</p>
                </a>
              </li>
              
            </ul>
          </li>
       <?php endif;?>
       <?php if(Auth::User()->hasRole("Centre Manager") || Auth::User()->hasRole("SuperAdmin")|| Auth::User()->hasRole("Test Admin")
       || Auth::User()->hasRole("Staff") || Auth::User()->hasRole("Store Manager")|| Auth::User()->hasRole('Supervisor')):?>
         <!--orders -->
        @if (Session::get('page') =="makeorder" || Session::get('page')=="approve" || Session::get('page')=="requestedlist"
         || Session::get('page')=="pendinglist"  || Session::get('page')=="approvedlist" || Session::get('page')=="rejectedlist" 
          || Session::get('page')=="issuedlist" || Session::get('page')=="allstocks"  || Session::get('page')=="allrequests"|| Session::get('page')=="stockregister")
        <?php $active ='active' ?>

        @else 
        <?php $active ='' ?>
     @endif

         <li class="nav-item has-treeview">
        <a href="#" class="nav-link {{$active}}">
          <i class="nav-icon fas fa-bars"></i>
          <p>
         Stores
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          @if (Session::get('page') =="stockregister")
          <?php $active ='active' ?>
          @else 
          <?php $active ='' ?>
       @endif
            <li class="nav-item">
            <a href="{{route('stock.index')}}"  class="nav-link {{$active}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Stock Register</p>
            </a>
          </li>
          @if (Session::get('page') =="allstocks")
          <?php $active ='active' ?>
          @else 
          <?php $active ='' ?>
       @endif
       <?php if(Auth::User()->hasRole('SuperAdmin')|| Auth::User()->hasRole('Test Admin')):?>
         <li class="nav-item">
            <a href="{{url('/allstocks')}}"  class="nav-link {{$active}}">
              <i class="far fa-circle nav-icon"></i>
              <p>ALL Stocks Register</p>
            </a>
          </li> 
          <?php endif;?>
          @if (Session::get('page') =="makeorder")
          <?php $active ='active' ?>
          @else 
          <?php $active ='' ?>
       @endif
       <?php if(Auth::User()->hasRole("Staff") || Auth::User()->hasRole('SuperAdmin')|| Auth::User()->hasRole('Centre Manager') || Auth::User()->hasRole('Store Manager')
       || Auth::User()->hasRole('Supervisor')||Auth::User()->hasRole('Supervisor')||Auth::User()->hasRole("Test Admin")):?>
          <li class="nav-item">
            <a href="{{route('store.create')}}"  class="nav-link {{$active}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Request Item</p>
            </a>
          </li>
          <?php endif;?>
          @if (Session::get('page') =="approve")
          <?php $active ='active' ?>
          @else 
          <?php $active ='' ?>
       @endif
       <?php if(Auth::User()->hasRole("Centre Manager") || Auth::User()->hasRole('SuperAdmin')|| 
       Auth::User()->hasRole('Supervisor')||Auth::User()->hasRole("Test Admin")):?>
             <li class="nav-item">
            <a href="{{url('/approve')}}" class="nav-link {{$active}}">
              <i class="far fa-circle nav-icon"></i>
              <p> Approve Orders</p>
            </a>
          </li>
          <?php endif;?>

          @if (Session::get('page') =="requestedlist")
          <?php $active ='active' ?>
          @else 
          <?php $active ='' ?>
       @endif
       <?php if(Auth::User()->hasRole('SuperAdmin')|| Auth::User()->hasRole('Centre Manager')
       || Auth::User()->hasRole('Supervisor')|| Auth::User()->hasRole('Store Manager')||Auth::User()->hasRole("Test Admin")):?>
          <li class="nav-item">
            <a href="{{route('store.index')}}"  class="nav-link {{$active}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Requested Items</p>
            </a>
          </li>
          <?php endif;?>
{{-- 
          @if (Session::get('page') =="allrequests")
          <?php $active ='active' ?>
          @else 
          <?php $active ='' ?>
       @endif
          <li class="nav-item">
            <a href="{{url('/allrequests')}}"  class="nav-link {{$active}}">
              <i class="far fa-circle nav-icon"></i>
              <p>ALL Requested  Items</p>
            </a>
          </li> --}}
          
          @if (Session::get('page') =="pendinglist")
          <?php $active ='active' ?>
          @else 
          <?php $active ='' ?>
       @endif
          <li class="nav-item">
            <a href="{{url('/pendinglist')}}"  class="nav-link {{$active}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Pending Approvals</p>
            </a>
          </li>
          @if (Session::get('page') =="approvedlist")
          <?php $active ='active' ?>
          @else 
          <?php $active ='' ?>
       @endif
          <li class="nav-item">
            <a href="{{url('/approvedlist')}}"  class="nav-link {{$active}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Appproved List</p>
            </a>
          </li>
          @if (Session::get('page') =="rejectedlist")
          <?php $active ='active' ?>
          @else 
          <?php $active ='' ?>
       @endif
          <li class="nav-item">
            <a href="{{url('/rejectedlist')}}"  class="nav-link {{$active}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Rejected Items</p>
            </a>
          </li>
          @if (Session::get('page') =="issuedlist")
              <?php $active ='active' ?>
              @else 
              <?php $active ='' ?>
           @endif
          <li class="nav-item">
            <a href="{{url('/issuedlist')}}"  class="nav-link {{$active}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Issued List</p>
            </a>
          </li>
          
        </ul>
      </li>
   <?php endif;?>
   
   <?php if(Auth::User()->hasRole("SuperAdmin")||Auth::User()->hasRole("Test Admin")):?>
 <!--huduma centres -->
   @if (Session::get('page') =="create centre" || Session::get('page')=='huduma centres')
   <?php $active ='active' ?>
   @else 
   <?php $active ='' ?>
   @endif

    <li class="nav-item has-treeview">
   <a href="#" class="nav-link {{$active}}">
     <i class="nav-icon fas fa-bars"></i>
     <p>
    Huduma Centres
       <i class="fas fa-angle-left right"></i>
     </p>
   </a>
   <ul class="nav nav-treeview">
    @if (Session::get('page') =="create centre")
    <?php $active ='active' ?>
    @else 
    <?php $active ='' ?>
 @endif
       <li class="nav-item">
       <a href="{{route('centres.create')}}"  class="nav-link {{$active}}">
         <i class="far fa-circle nav-icon"></i>
         <p>Add New Centre</p>
       </a>
     </li>
     @if (Session::get('page') =="huduma centres")
     <?php $active ='active' ?>
     @else 
     <?php $active ='' ?>
  @endif
     
     <li class="nav-item">
       <a href="{{route('centres.index')}}"  class="nav-link {{$active}}">
         <i class="far fa-circle nav-icon"></i>
         <p> Huduma Centres</p>
       </a>
     </li>
     
   </ul>
 </li>
<?php endif;?>
          
          <?php if(Auth::User()->hasRole("SuperAdmin")|| Auth::User()->hasRole("Test Admin")):?>
 <!--huduma centres -->
   @if (Session::get('page') =="add supplier" || Session::get('page')=='suppliers')
   <?php $active ='active' ?>
   @else 
   <?php $active ='' ?>
   @endif

    <li class="nav-item has-treeview">
   <a href="#" class="nav-link {{$active}}">
     <i class="nav-icon fas fa-bars"></i>
     <p>
    Suppliers
       <i class="fas fa-angle-left right"></i>
     </p>
   </a>
   <ul class="nav nav-treeview">
    @if (Session::get('page') =="add supplier")
    <?php $active ='active' ?>
    @else 
    <?php $active ='' ?>
 @endif
       <li class="nav-item">
       <a href="{{route('suppliers.create')}}"  class="nav-link {{$active}}">
         <i class="far fa-circle nav-icon"></i>
         <p>Add New Supplier</p>
       </a>
     </li>
     @if (Session::get('page') =="suppliers")
     <?php $active ='active' ?>
     @else 
     <?php $active ='' ?>
  @endif
     
     <li class="nav-item">
       <a href="{{route('suppliers.index')}}"  class="nav-link {{$active}}">
         <i class="far fa-circle nav-icon"></i>
         <p> Suppliers List</p>
       </a>
     </li>
     
   </ul>
 </li>
<?php endif;?>
          <br>   
     <?php if( Auth::User()->hasRole("SuperAdmin")):?>
     @if (Session::get('page') =="users" || Session::get('page') == "create user" 
           || Session::get('page') == "permissions" || Session::get('page') == "roles")
           <?php $active ='active' ?>
           @else 
           <?php $active ='' ?>
        @endif
             <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{$active}}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              @if (Session::get('page') =="create user")
              <?php $active ='active' ?>
              @else 
              <?php $active ='' ?>
           @endif
              <li class="nav-item">
                <a href="{{url('/Backend/User/CreateAdmin')}}"  class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New User</p>
                </a>
              </li>
              @if (Session::get('page') =="users")
              <?php $active ='active' ?>
              @else 
              <?php $active ='' ?>
           @endif
              <li class="nav-item">
                <a href="{{url('/Backend/User/Index')}}"  class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Internal Users</p>
                </a>
              </li>
              @if (Session::get('page') =="roles")
              <?php $active ='active' ?>
              @else 
              <?php $active ='' ?>
           @endif
              <li class="nav-item">
                <a href="{{url('/Backend/System/Roles')}}"  class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Role System</p>
                </a>
              </li>
              @if (Session::get('page') =="permissions")
              <?php $active ='active' ?>
              @else 
              <?php $active ='' ?>
           @endif
              <li class="nav-item">
                <a href="{{url('/Backend/System/Permissions')}}" class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>System Permission</p>
                </a>
              </li>
            </ul>
          </li>
       
    

           @if (Session::get('page') =="audit trail")
           <?php $active ='active' ?>
           @else 
           <?php $active ='' ?>
        @endif
           
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{$active}}">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                System Audit Trail
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
           
            <ul class="nav nav-treeview">
              
              @if (Session::get('page') =="audit trail")
              <?php $active ='active' ?>
              @else 
              <?php $active ='' ?>
           @endif
              <li class="nav-item">
                <a href="{{url('/Backend/AuditTrail/Index')}}"  class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Recent System Logs</p>
                </a>
              </li>
              
            </ul>
          </li>
{{-- settings --}}
          {{-- @if (Session::get('page') =="huduma centres" || Session::get('page')=="create centre")
          <?php $active ='active' ?>
          @else 
          <?php $active ='' ?>
       @endif

                 <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{$active}}">
              <i class="nav-icon fas fa-wrench"></i>
              <p>
                Settings Module
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
   
              @if (Session::get('page') =="create centre")
              <?php $active ='active' ?>
              @else 
              <?php $active ='' ?>
           @endif
                 <li class="nav-item">
                 <a href="{{route('centres.create')}}"  class="nav-link {{$active}}">
                   <i class="far fa-circle nav-icon"></i>
                   <p>Add New Huduma Centre</p>
                 </a>
               </li>

              @if (Session::get('page') =="huduma centres")
              <?php $active ='active' ?>
              @else 
              <?php $active ='' ?>
           @endif
              <li class="nav-item">
                <a href="{{route('centres.index')}}"  class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Of Huduma centres</p>
                </a>
              </li>
              @if (Session::get('page') =="warehouses")
              <?php $active ='active' ?>
              @else 
              <?php $active ='' ?>
           @endif
              
              <li class="nav-item">
                <a href="{{url('/Backend/Industry/Index')}}"  class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ware houses locations</p>
                </a>
              </li>
            
              
            </ul>
          </li> --}}
 <?php endif;?>
               
       
                
         </ul>
      </nav>
      <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
</aside>