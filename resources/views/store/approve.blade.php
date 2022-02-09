@extends('layouts.admin_layout.admin_layout')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Orders Approval</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Orders</li>
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
          <div></div>
          <div class="col-12">
               
            @if (Session::has('success_message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px">
          {{Session::get('success_message')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif

            <div class="card">
          </div>
            <!-- /.card -->

            <div class="card card-success card-outline">
              <div class="card-header">
                <h3 class="card-title">Orders</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="categories" class="table table-bordered table-striped">
                  <thead class="table bg-success" >
                  <tr>
                    
                    <th>Product</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    
                    <th>Staff Name</th>
                    <th>Request Type</th>
                    <th>Appproval</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($orderdetails as $orderdetail)          
                  <tr>
                     
                    <td>{{$orderdetail->productName }}</td>
                    <td>{{$orderdetail->itemName}}</td>   
                    <td>{{$orderdetail->quantity}}</td>
                      {{-- <td> <a class="updateApproval;badge badge-info"   id="orderdetail-{{$orderdetail->id}}" orderdetail_id ="{{$orderdetail->id}}"
                        href="javascript:void(0)">Consult</a></td>  --}}
                    <td>{{$orderdetail->name}}</td> 
                    <td>{{$orderdetail->names}}</td> 
                    <td>@if ($orderdetail->approve==1)
                      <a class="updateApproval;badge badge-success"  id="orderdetail-{{$orderdetail->id}}" orderdetail_id={{$orderdetail->id}}
                          href="javascript:void(0)">Approved</a>
         @elseif ($orderdetail->reject==1)
                          <a class="updateApproval;badge badge-danger"   id="orderdetail-{{$orderdetail->id}}" orderdetail_id ="{{$orderdetail->id}}"
                              href="javascript:void(0)">Rejected</a>
                              
                              @else
                              <a class="updateApproval;badge badge-warning"   id="orderdetail-{{$orderdetail->id}}" orderdetail_id ="{{$orderdetail->id}}"
                                href="javascript:void(0)">Pending</a>
                         
                      @endif
                  </td>

                  <td class="text-centre">
                    
            <form action="{{url('approval')}}" method="POST" class="d-inline">@csrf
              
               <input <?php if($orderdetail->approve==1){echo 'checked';}?> type="checkbox" name="approve" required >
               <input type="hidden" name="order_id" value="{{$orderdetail->id}}">
                <input type="submit" class="btn btn-outline-success btn-sm" value="Approve">
              </form> 

 
            <button class="btn btn-outline-danger btn-sm reject-modal" data-title="Reasons For Rejection" data-url= {{url('/rejectionReason')}}>reject</button>
           
          <a style="cursor:pointer;" class="reject-modal btn btn-sm btn-info"  data-title="Adjust Order"  data-url= {{url('/orderdetails/' . $orderdetail->id . '/edit')}} >

           <i class="fa fa-edit"></i>Adjust </a>
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

<style>
   .modal-title{
         font-family: Verdana, Geneva, Tahoma, sans-serif;
         font-size: 20px;
         font-weight: bolder;
         text-transform: uppercase;
     }
     .card{
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
@endsection