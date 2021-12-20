
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
              <?=$page_title?>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              
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
              
              @extends('layouts.admin_layout.admin_layout')

                <a href="<?=route('items.index')?>" class="btn btn-sm btn-success"><span class="fa fa-bars"><span>View Items List</a>
     </span>
         <div class="col-12">
         <div class="card">

          </div>
            <!-- /.card -->

            <div class="card1 card-success card-outline">
              <div class="card-header">
                <h3 class="card-title">Create New Item</h3>
              
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">


                 <form role="form" method="post"  name="recruitForm" action="{{route('items.store')}}" 
                id="recruitForm" enctype="multipart/form-data">@csrf
                
                   
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label style="font-weight: normal;">Category</label>
                          
                          <select name="category_id" id="categoryId" class="form-control" style="width: 100%" required>
                            <option value="" selected disabled >select Category</option>
                          @foreach ($categories as $category)
                              <option value="{{$category->id}}">
                          {{$category->categoryName}}
                              </option>
                          @endforeach
                          </select>
                          </div>

                          <div class="col-sm-4 form-group">
                            <label style="font-weight: normal;">Product</label>
                          <select name="product_id" id="productId" class="form-control" style="width: 100%" >
                            <option value="" selected disabled >select Product</option>
                          </select>
                         
                          </div>

                        
                          <div class="col-md-4 col-sm-4">
                            <label  style="font-weight: normal;" >Item Name</label>
                             <input type="text" class="form-control" id="itemName"  name="itemName" placeholder="Item Name " required>
                             <span style="color: red" >{{$errors->first('itemName')}}</span>
                        </div>
                        
                      </div>
                      <div class="row">
                     <div class="col-sm-4 form-group">
                        <label style="font-weight: normal;">Units</label>

                      <select name="unit_id" id="unit_id" class="form-control" style="width: 100%" required>
                        <option value="" selected disabled >select Units</option>
                      @foreach ($units as $unit)
                          <option value="{{$unit->id}}">
                      {{$unit->unitName}}
                          </option>
                      @endforeach
                      </select>
                      </div>
                      
                   
                      <div class="col-sm-4 form-group">
                        <label style="font-weight: normal;">Select Huduma Centres</label>
                      <select name="centre_id[]" id="centre_id" class="form-control" style="width: 100%" multiple searchable="Search here.."
                      multiple ='true' required>
                        <option value="all">All</option>
                        @foreach ($centres as $centre)
                        <option value="{{$centre->id}}" >{{$centre->centreName}}</option>
                        @endforeach
                      </select>
                      </div>
                      <div class="col-sm-4 form-group">
                        <label  style="font-weight: normal;">Image</label>
                        <input type="file" class="form-control" id="itemImage" value="" name="itemImage" placeholder=" Image" >
                      </div>
                      
                      </div>
                    
                      <br>
                <div class="row">
                       
                       <div class="col-md-3 col-sm-3">
                        <button class="btn btn-success btn-block">Save</button>
                      
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
@push("scripts")

<script>
     
   $("#categoryId").on("change",function(e){
       e.preventDefault();
        var id=$(this).val();
          if(id.length>0)
          {
              var url="<?=url('/item/catyegory/getProducts')?>/"+id;
               $.get(url,function(data){
                //  alert(data);
                   $("#productId").html(data);
               })
          }



   });
 
  
   </script>


   @endpush
   <style>
.card1{
  box-shadow: 
   5px 5px 10px 5px rgba(56, 230, 12, 0.2),
   -5px -5px 10px 5px rgba(56, 230, 12, 0.2);
      border-radius: 5px; 
     }
     /* .card1:hover {
      box-shadow: 
     5px 5px 10px 5px rgba(235, 11, 11, 0.2),
    -5px -5px 10px 5px rgba(235, 11, 11, 0.2);
  border-radius: 5px;
     } */
   </style>