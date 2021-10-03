
@extends('layouts.admin_layout.admin_layout')
@section('content')
<div class="content-wrapper">
  
  <div class="container-fluid">
    <div class="line">
      <hr style="border: 2px solid rgb(16, 231, 34)">
      </div>
       <div class="col-md-12">
           <div class="row">
           <div class="col-md-12">

         <form action="{{route('purchases.store')}}" method="post">@csrf
              
            @if (Session::has('success_message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px">
          {{Session::get('success_message')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
            <div class="card">
                         <div class="card-header"><h4 style="float:left">Supplier details</h4>
                           </div>
                 
                <div class="card-body">
                     <section>
                   
                    <div class="row">
                    <div class="col-sm-4 form-group">
                        <label style="font-weight: normal;">Supplier Name</label>
                      
                      <select name="supplier_id" id="supplierId" class="form-control" style="width: 100%" required>
                        <option value="" selected disabled >select Supplier</option>
                      @foreach ($suppliers as $supplier)
                          <option value="{{$supplier->id}}">
                      {{$supplier->supplierName}}
                          </option>
                      @endforeach
                      </select>
                      </div>
                   
                      <div class="col-sm-4 form-group">
                        <label style="font-weight: normal;">Supplier Pin</label>
                       <input type="search" name="supplierPin" id="supplierPin" class="form-control" readonly>
                        
                      </div>
                      
                      <div class="col-sm-4 form-group">
                        <label style="font-weight: normal;">Supplier Telephone</label>
                        <input type="text" name="telephoneNumber" id="telephoneNumber" class="form-control" required>
                        
                      </div>
                        
                      </div>
                      <div class="row">

                        <div class="col-sm-4 form-group">
                        <label style="font-weight: normal;">Supplier Email</label>
                        <input type="text" name="supplierEmail" id="supplierEmail" class="form-control" required>
                        
                      </div>
                      <div class="col-sm-4 form-group ">
                        <label  style="font-weight: normal;">Purchase Order No</label>
                        <input type="text" name="orderNumber" id="orderNumber" class="form-control" required>
                        
                      </div>
                        <div class="col-md-4 col-sm-4">
                          <label  style="font-weight: normal;" >Delivery Note No</label>
                          <input type="text" name="deliveryNoteNumber" id="deliveryNoteNumber" class="form-control" required>
                         
                       </div>
                      
                      </div>
                      <div class="row">
                        <div class="col-sm-4 form-group ">
                          <label  style="font-weight: normal;">Invoice No</label>
                          <input type="text" name="invoiceNumber" id="invoiceNumber" class="form-control" required>
                          
                        </div>
                      <div class="col-sm-4 form-group">
                        <label  style="font-weight: normal;">delivery Date</label>
                        <input type="date" name="deleveryDate" id="deleveryDate" class="form-control" required>
                      </div>
                      <div class="col-sm-4 form-group">
                        <label  style="font-weight: normal;">Delivered by(Name)</label>
                        <input type="text" name="delevererName" id="delevererName" class="form-control" required>
                      </div>
                        
          
                      </div>
                      <div>
                        <div class="col-md-4 col-sm-2">
                          <label   style="font-weight: normal;">Delivered by(Telephone)</label>
                          <input type="text" name="delevererPhone" id="delevererPhone" class="form-control" class="form-control" required>
                         
                       </div>
                      </div>
                    </section>

                    <div  class="row">
                      <div class="card-header"  style="width: 100%">
                           <h4 class="card-title" style="float:left"><b>Supply List</b></h4>
                        </div>
                       </div>
                    <br>
                    <table class="table table-bordered ">
                        <thead>
                  <tr>  
                      <th>#</th>
                      <th>Category Name</th>
                      <th>Product Name</th>
                      <th>Item</th>
                      <th>Description</th>
                      <th>Units</th>
                      <th>Quantity</th>
                <th> <a href="" class="btn btn-success btn-sm add_more"> <i class="fa fa-plus"></i></a></th>
                  </tr>
              </thead>
                <tbody class="addMoreItem">
                <tr>
                    <td>1</td>
                    <td>
                          <select name="category_id[]" id="categoryId" class="form-control category_id" >
                            <option value="" disabled selected required>Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->categoryName}}</option>
                        @endforeach
                    </select>
                        
                    </td>
                    <td>
                      <select name="product_id[]" id="productId" class="form-control product_id" style="width: 100%" required>
                        <option value="" selected disabled >select Product</option>
                      </select>
                    </td>
                    <td>
                      <select name="item_id[]" id="itemId" class="form-control item_id" style="width: 100%" required>
                        <option value="">select item</option>
                      </select>
                    </td>
                  
                    <td>
                      <input type="text" name="description[]" id="description" class="form-control" required>
                    </td>
                    <td>
                      <select name="unit_id[]" id="unitId" class="form-control unit_id" >
                        <option value="" disabled selected required>Select Units</option>
                    @foreach ($units as $unit)
                        <option value="{{$unit->id}}">{{$unit->unitName}}</option>
                    @endforeach
                </select>   
                </td>
                    <td>
                        <input type="text" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" name="quantity[]" id="total" class="form-control" required>
                    </td>
                    <td><a href="" class="btn btn-danger btn-sm rounded-circle" id="delete"> <i class="fa fa-times"></i></a></td>
                </tr>
        
                  
                </tbody>

            </table>
            <hr style=" border: 1px solid green">
            <td>
            <div class="col-md-3">
              <button type="" class="btn btn-success btn-block ">Save</button>
            </div>
          </td>
              </div>
                
              </div>
            </form> 
                          </div>
                      
                          </div>
                      </div>
                  </div>

                </div>

                               <style>
                            .modal.right .modal-dialog{
                                top: 0;
                                right: 0;
                                margin-right: 20vh;
                            }
                            .modal.fade:not(.in).right .modal-dialog{
                        -webkit-transform: translate3d(25%,0,0);
                        transform: translate3d(25%,0,0); }
                        .card{
                        box-shadow: 
                        5px 5px 10px 5px rgba(56, 230, 12, 0.2),
                        -5px -5px 10px 5px rgba(56, 230, 12, 0.2);
                            transition: 0.3s;
                            border-radius: 5px; 
                          }
                          .card:hover {
                            box-shadow: 
                          5px 5px 10px 5px rgba(235, 11, 11, 0.2),
                          -5px -5px 10px 5px rgba(235, 11, 11, 0.2);
                        border-radius: 5px;
                          }
     
                           
                        </style>
        
                  @endsection
                  @push("scripts")


       <script>
          
      
        $('.add_more').on('click',function(e){
          e.preventDefault();
            var category= $('#categoryId').html();
            var product= $('#productId').html();
            var item= $('#itemId').html();
            var unit =$('#unitId').html();
         var numberofrow =($('.addMoreItem tr').length - 0) + 1;
         var tr ='<tr><td class"no"">' + numberofrow + '</td>' +
         '<td><select class="form-control category_id" name="category_id[]" id ="categoryId" required> ' + category +
         '</select></td>' +
         '<td><select name="product_id[]" id="productId" class="form-control product_id" style="width: 100%" required>  ' + product +
         '</select></td>' +
         '<td><select class="form-control item_id" name="item_id[]" id="itemId" required> ' + item +
         '</select></td>' +
         '<td> <input type="text" name="description[]" class="form-control description" required></td>' +
         '<td><select class="form-control unit_id" name="unit_id[]" id ="umitId" required> ' + unit +
         '</select></td>' +
         '<td> <input type="text" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" name="quantity[]" class="form-control quantity" required></td>' +
         '<td> <a class="btn btn-danger btn-sm delete rounded-circle"><i class ="fa fa-times"></i></a></td>';
     $('.addMoreItem').append(tr);
        })

            $('.addMoreItem').delegate('.delete','click',function(){
              $(this).parent().parent().remove();
            })
              
     

                  $('.addMoreItem').delegate('.category_id','change',function(){
            
                var id=$(this).val();
                var tr =$(this).parent().parent();
                var category = tr.find('.category_id option:selected').val();
                      if(id.length>0)
                      {
                          var url="<?=url('/item/catyegory/getProducts')?>/"+id;
                          $.get(url,function(data){
                              tr.find(".product_id").html(data);
                          })
                      }
          })
          $('.addMoreItem').delegate('.product_id','change',function(){
            

             var id=$(this).val();
             var tr =$(this).parent().parent();
             var product= tr.find('.product_id option:selected').val();;
                   if(id.length>0)
                   {
                    var url="<?=url('/item/product/getItems')?>/"+id;
                          $.get(url,function(data){
                              tr.find(".item_id").html(data);
                       })
                   }
            })

            $("#supplierId").on("change",function(e){
       e.preventDefault();
        var id=$(this).val();
          if(id.length>0)
          {
            var url="<?=url('/supplier/details')?>/"+id;
               $.get(url,function(data){
           
                    console.log(data);

                   $('#supplierPin').val(data.SupplierPin);
                    $('#telephoneNumber').val(data.telephoneNumber);
                    $('#supplierEmail').val(data.supplierEmail);
               })
               
          }

   });
          
        </script>


   @endpush



