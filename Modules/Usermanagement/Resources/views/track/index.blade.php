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
            <li class="breadcrumb-item"><a href="{{url()->current()}}">Movement</a></li>
            <li class="breadcrumb-item active">Trail</li>
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



             
              <!-- /.card -->

              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Track Service men/women movement</h3>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="col-sm-12">
                    <div class="col-sm-4">

                    <div class="input-group input-group-sm">
        <input class="form-control number form-control-navbar" id="ServiceNo" type="search" placeholder="Enter Service No" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-primary" id="Query">Query
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
                    
                  </div>
                    
                  </div>
                  <div class="col-sm-12" id="SearchResuits">


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
     $("#Query").on("click",function(e){
      e.preventDefault();
          var ServiceNo=$("#ServiceNo").val();
            if(ServiceNo.length>0)
            {
               var url="<?=url('/Backend/Track/TrackMe')?>";
                $.get(url,{'ServiceNo':ServiceNo},function(data){
                   $("#SearchResuits").html(data);

                });
              
            }


     })


</script>

@endpush