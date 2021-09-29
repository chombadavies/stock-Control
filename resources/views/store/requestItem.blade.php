@extends('layouts.admin_layout.admin_layout')
@section('content')

<div class="content-wrapper">
  
  <div class="container-fluid">
       <div class="col-md-12">
           <div class="row">
             <div class="col-md-4">
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
           <div class="col-md-12">
<div class="line">
              <hr style="border: 4px solid green">
              </div>

            <form action="{{route('store.store')}}" method="post">@csrf
            <div class="card card-success card-outline">
                         <div class="card-header"><h4 style="float:left">Make Order</h4>
                           </div>
                 
                <div class="card-body">

                    
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
                      <input type="text" name="itemdescription[]" id="itemdescription" class="form-control" required>
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
<br>
                               <style>
                            .modal.right .modal-dialog{
                                top: 0;
                                right: 0;
                                margin-right: 20vh;
                            }
                            .modal.fade:not(.in).right .modal-dialog{
                        -webkit-transform: translate3d(25%,0,0);
                        transform: translate3d(25%,0,0);
                            }
                            .card{
                        box-shadow: 
                        14px 14px 14px 5px rgba(56, 230, 12, 0.2),
                        -5px -5px 10px 5px rgba(56, 230, 12, 0.2);
                            /* transition: 0.3s;
                            border-radius: 5px;  */
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
         '<td> <input type="text" name="itemdescription[]" class="form-control itemdescription" required></td>' +
         '<td><select class="form-control unit_id" name="unit_id[]" id ="umitId" required> ' + unit +
         '</select></td>' +
         '<td> <input type="text" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" name="quantity[]" class="form-control quantity" required></td>' +
         '<td> <a class="btn btn-danger btn-sm delete rounded-circle"><i class ="fa fa-times"></i></a></td>';
     $('.addMoreItem').append(tr);
        })

            $('.addMoreItem').delegate('.delete','click',function(e){
              e.preventDefault();
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
        </script>


   @endpush
