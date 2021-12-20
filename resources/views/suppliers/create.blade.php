
@extends('layouts.admin_layout.admin_layout')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
       Products
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
               <li class="breadcrumb-item"><a href="">Products</a></li>
              
            </ol>
          </div>
      
        </div>
        <div class="line">
          <hr style="border: 4px solid green">
          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

            <div class="col-12">
 <a href="<?=route('suppliers.index')?>" class="btn btn-sm btn-success"><span class="fa fa-bars"><span>View List</a>
</span>
         <div class="col-12">
               <br>
            <!-- /.card -->

            <div class="card1 card-success card-outline">
              <div class="card-header">
                <h3 class="card-title">Add New Product</h3>
          </div>
              <!-- /.card-header -->
     <div class="card-body">
         <form role="form" method="post"  name="productForm" action="{{route('suppliers.store')}}" 
                id="productForm" enctype="multipart/form-data">@csrf
                
                   
                    <div class="row">
                     
                        <div class="col-sm-6 form-group">
                            <label style="font-weight: normal;">Name</label>
                            <input type="text" name="supplierName" class="form-control  @error('supplierName') is-invalid @enderror" required  value="{{old('supplierName')}}" placeholder="Supplier Name">
                            <span style="color: red" >{{$errors->first('supplierName')}}</span>
                          </div>
                      <div class="col-sm-6 form-group">
                        <label style="font-weight: normal;">KRA PIN</label>
                        <input type="text" name="supplierPin" class="form-control  @error('supplierPin') is-invalid @enderror" required  value="{{old('supplierPin')}}"  placeholder="Supplier Pin">
                        <span style="color: red" >{{$errors->first('supplierPin')}}</span>
                      </div>
                    
                        
                      </div>
                      <div class="row">
                     
                        <div class="col-sm-6 form-group">
                            <label style="font-weight: normal;">Phone Number</label>
                            <input type="text" name="phoneNumber" class="form-control  @error('phoneNumber') is-invalid @enderror" required  value="{{old('phoneNumber')}}"  placeholder="Supplier Phone Number">
                            <span style="color: red" >{{$errors->first('phoneNumber')}}</span>
                          </div>
                        <div class="col-sm-6 form-group">
                          <label style="font-weight: normal;">Email</label>
                          <input type="supplierEmail" name="supplierEmail" class="form-control  @error('supplierEmail') is-invalid @enderror" required  value="{{old('supplierEmail')}}"   placeholder="Supplier Email">
                          <span style="color: red" >{{$errors->first('supplierEmail')}}</span>
                        </div>
                      
                          
                        </div>
                 <div class="row">
                        <div class="col-md-3 col-sm-3">
                           <button class="btn btn-success btn-block">SAVE</button>
                         
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
<style>

.card1{
  box-shadow: 
   5px 5px 10px 5px rgba(56, 230, 12, 0.2),
   -5px -5px 10px 5px rgba(56, 230, 12, 0.2);
      transition: 0.3s;
      border-radius: 5px; 
     }
     .card1:hover {
      box-shadow: 
     5px 5px 10px 5px rgba(235, 11, 11, 0.2),
    -5px -5px 10px 5px rgba(235, 11, 11, 0.2);
  border-radius: 5px;
     }
</style>
