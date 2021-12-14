

@extends('layouts.admin_layout.admin_layout')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?=$page_title?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Suppliers</li>
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
          <div class="col-4" >
                  
            @if (Session::has('success_message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px">
          {{Session::get('success_message')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
          </div>
          <div class="col-12">
         

            <div class="card">
          </div>
            <!-- /.card -->

            <div class="card1 card-success card-outline">
              <div class="card-header">
                <h3 class="card-title">Suppliers</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="categories" class="table table-bordered table-striped">
                  <thead class="thead bg-success">
                  <tr>
                    <th>Supplier Name</th>
                    <th>supplier Pin</th>
                    <th> Supplier Email</th>
                    <th>Phone Number</th>
                    <th>status</th>
                    <th>Action</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($suppliers as $supplier)          
                  <tr>
                    <td>{{$supplier->supplierName}}</td>  
                    <td>{{$supplier->supplierPin}}</td> 
                    <td>{{$supplier->supplierEmail}}</td>
                    <td>{{$supplier->phoneNumber}}</td>
                    <td>@if ($supplier->status==1)
                      <a class="blacklist" 
                          href="{{url('contact/'.$supplier->id)}}" >Contact Supplier</a>
                       
                      @else 
                      <a class="badge badge-danger"
                          href="javascript:void(0)">Inactive</a>
                      @endif

                  </td>
                  <td class="text-centre">
                    @if($supplier->status==1)
                    <form action="{{url('blacklist/'.$supplier->id)}}" method="POST" class="d-inline">@csrf
                      <input <?php if($supplier->status==1){echo 'checked';}?> type="checkbox" name="blaclist" required >
                      <input type="hidden" name="supplier_id" value="{{$supplier->id}}">
                       <input type="submit" class="btn btn-outline-danger" value="Deactivate">
                       @else
                       <form action="{{url('reinstate/'.$supplier->id)}}" method="POST" class="d-inline">@csrf
                        <input <?php if($supplier->status==1){echo 'checked';}?> type="checkbox" name="blaclist" required >
                        <input type="hidden" name="supplier_id" value="{{$supplier->id}}">
                         <input type="submit" class="btn btn-outline-Success" value="Activate">
                       @endif
                   </form>
                   </td> 
                  </tr>
                  @endforeach
                  </tbody>
                </table>
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
   
     .table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {
   background-color: #BFDFB1;
}
</style>






