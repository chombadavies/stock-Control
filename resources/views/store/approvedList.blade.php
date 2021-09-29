
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
          <div class="col-4">
            @if (Session::has('success_message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px">
          {{Session::get('success_message')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
            @if (Session::has('error_message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 10px">
          {{Session::get('error_message')}}
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
                <h3 class="card-title">Orders</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="categories" class="table table-bordered table-striped">
                  <thead class="table bg-success" >
                  <tr>
                  
                    <th>Product</th>
                    <th>Item Name</th>
                    <th>Item Description</th>
                    <th>Quantity</th>
                    <th>Appproval</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($orders as $order)          
                  <tr>
                    <td>{{$order->product->productName }}</td>  
                    <td>{{$order->item->itemName}}</td> 
                    <td>{{$order->itemdescription}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>@if ($order->approve==1)
                      <a class="updateApproval"  id="order-{{$order->id}}" order_id={{$order->id}}
                          href="javascript:void(0)">Approved</a>
                      @else 
                      <a class="updateApproval"   id="order-{{$order->id}}" order_id ="{{$order->id}}"
                          href="javascript:void(0)">Pedding</a>
                      @endif
                  </td>

                  <td class="text-centre">
            <form action="{{url('dispatch/'.$order->id)}}" method="POST" class="d-inline">@csrf
               <input <?php if($order->approve==1){echo 'checked';}?> type="checkbox" name="dispatch" >
               <input type="hidden" name="order_id" value="{{$order->id}}">
                <input <?php if($order->approve==1){echo "Disapprove";} ?> type="submit" class="btn btn-outline-success" value="Dispatch">
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
     /* .card1:hover {
      box-shadow: 
     5px 5px 10px 5px rgba(235, 11, 11, 0.2),
    -5px -5px 10px 5px rgba(235, 11, 11, 0.2);
  border-radius: 5px;
     } */
     
     .table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {
   background-color: #BFDFB1;
}
</style>

