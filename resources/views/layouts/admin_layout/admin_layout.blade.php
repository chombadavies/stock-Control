

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=(isset($page_title))?$page_title:"Warehouse Management"?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css' ) }}">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css' ) }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css' ) }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css' ) }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/admin_css/adminlte.min.css') }}">

  {{-- <link rel="stylesheet" href="{{asset('css/admin_css/style2.css')}}"> --}}
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css' ) }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css' ) }}">
 
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
  <style type="text/css">
     
      th, td { white-space: nowrap; }


      .modal .modal-dialog {
  max-width: 750px;
}
.form-control{
  box-shadow: inset 0 0 7.75px #3ac9d6 !important;
  border-radius:1.011%
}


   </style>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

@include("layouts.admin_layout.admin_header")

@include("layouts.admin_layout.admin_sidebar")

      
@yield('content')


    <div class="modal fade" id="category-modal" role="dialog">
                <div class="modal-dialog ">
                  <div class="modal-content">        

                   
                    <div class="modal-header">
                      <h4 class="modal-title" > 
                          &nbsp;&nbsp;<span id="my-header">
                      Give Reason(s)</span></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                      
                    </div>
                   
                    
                    <div class="modal-body" id="load-category-details">
                    
                    </div>               
                   
                     
                  </div>
                </div>
              </div>

     
 
  @include("layouts.admin_layout.admin_footer")

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{url('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 4 -->
<script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Select2 -->
<script src="{{url('plugins/select2/js/select2.full.min.js')}}"></script>
<script>
   $('.select2').select2()
</script>
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<script src="{{ asset('isanya/datatables/extras/TableTools/Buttons-1.4.2/js/dataTables.buttons.min.js') }}"></script> 
    <script src="{{asset('isanya/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.bootstrap4.min.js') }}"></script>   
    <script src="{{asset('isanya/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.html5.min.js') }}"></script>    
    <script src="{{asset('isanya/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js') }}"></script>    
    <script src="{{asset('isanya/datatables/extras/TableTools/JSZip-2.5.0/jszip.min.js') }}"></script>   

<script>
  $(function () {
    $("#sections").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#categories").DataTable();
  });
</script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/admin_js/adminlte.j') }}s"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('js/admin_js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('js/admin_js/demo.js') }}"></script>
<!-- custom js -->
<script src="{{asset('js/admin_js/admin_script.js')}}"></script>
<!-- sweet alert script -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>




 <script type="text/javascript">
  $(function () {
      $.ajaxSetup({
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
      });
  });
  </script>

   <script type="text/javascript">
      $("body").on("keydown",'.number',function(event){

      if (event.shiftKey == true) {
            event.preventDefault();
        }

        if ((event.keyCode >= 48 && event.keyCode <= 57 ) || 
            (event.keyCode >= 96 && event.keyCode <= 105) || 
            event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 ||
            event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190 || event.keyCode == 110 || event.keyCode == 188) {

        } else {
            event.preventDefault();
        }
         if($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
            event.preventDefault(); 


      });
  
      
    </script>

 <script type="text/javascript">
   
          $(document).on('click','.reject-modal',function(){

           

           var head=$(this).attr('data-title');
                  
               var url=$(this).attr("data-url");
                $("#load-category-details").html("");
                $("#my-header").html(" ");
                $("#my-header").html(head);
                $("#category-modal").modal("show");
            $("#load-category-details").load(url,function(data){
            $("#category-modal").modal("show");
             
          });
       });

     

 </script>
        @stack('scripts')


</body>
</html>



