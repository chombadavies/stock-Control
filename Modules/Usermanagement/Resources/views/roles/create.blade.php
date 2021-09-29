@extends('layouts.admin_layout.admin_layout')
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
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
               <li class="breadcrumb-item"><a href="{{url('/home')}}">Roles</a></li>
              <li class="breadcrumb-item active">Create</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

            <div class="col-12">

            <a href="<?=url('/Backend/Roles/Create')?>" class="btn btn-sm btn-info"><span class="fa fa-plus"><span>Add New Roles</a>

                                        <a href="<?=url('/Backend/System/Roles')?>" class="btn btn-sm btn-success"><span class="fa fa-bars"><span>List of Roles</a>
                                        </div>

          <div class="col-12">
               
           

            <div class="card">

          </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Define New System Roles</h3>
              
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                 <div class="col-md-12">
                                      <form method="post"  action="{{$url}}">
                                        <?=csrf_field()?>
        <div class="form-group col-md-12">
          <label style="font-weight: normal;" >Name:</label>
          <div ><input type="text" name="name" value="{{old('name')}}" class="form-control"></div>
        </div>
     
       
        
        <div class="form-group col-md-12">
          <label  style="font-weight: normal;"  >Description:</label>
          <div ><textarea name="description" class="form-control">{{old('description')}}</textarea> 

          </div>
        </div>
        <div class="form-group col-md-12">
           
             
           
          <legend> Attach Permissions</legend>
          <div class="row">
           <?php foreach($permissions as $permission): ?>
            <div class="col-md-6">
               {{$permission->perm_category}}

                <?php $permissions=$permission->getPerms($permission->perm_category); foreach($permissions as $perm):?>

                 <div class="checkbox">

                        <div class="task-check">
                                                        <div class="col-md-12">
                                                          
                                                         <div class="col-md-10">
                                                             <label style="font-weight: normal;">
                                                        <input name="permission[]" value="<?=$perm->id;?>"  type="checkbox" >
                                                         <?=$perm->name;?> 
                                                       </label>
                                                             
                                                         </div>
                                                            
                                                        </div>
                                                    </div>
                            
                          </div>



                 <?php endforeach;?>
               </div>
            <?php endforeach;?>
           </div>



          
       
        

             
        </div>
              
        <div class="form-group col-md-12">
          
          
          <button class="btn btn-info">Create</button>
          
        </div>
        </form>
                                    
                                  </div>
               
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
        
          
       
    </script>

@endpush