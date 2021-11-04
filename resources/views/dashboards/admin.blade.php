
@extends('layouts.admin_layout.admin_layout')
@section('content')
    <style>
               /* div.content-wrapper{
                    font-family: "Helvetica", Sans-Serif;
                    background-image: url("/images/background.jpeg");
                    background-repeat: no-repeat;
                    background-size: cover;
                  } */
                  .card{
  box-shadow: 
     5px 5px 10px 5px rgba(56, 230, 12, 0.2),
   -5px -5px 10px 5px rgba(56, 230, 12, 0.2);
      transition: 0.3s;
      border-radius: 5px; 
     }

          /* .table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {
   background-color: #BFDFB1;
} */
                </style> 
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1  style="color: green">{{($centre)?$centre->centreName:""}} Dashboard</h1>
        </div><!-- /.col -->
       
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
    
 <!-- Info boxes -->
 <div class="row">

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shopping-cart"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Pedding Orders</span>
        <span class="info-box-number">{{$pedding}}</span>
        <a href="{{url('/pendinglist')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->

  <!-- fix for small devices only -->
  <div class="clearfix hidden-md-up"></div>

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Approved Orders</span>
        <span class="info-box-number">{{$approved}}</span>
        <a href="{{url('/approvedlist')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-shopping-cart"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Rejected Orders</span>
        <span class="info-box-number">{{$rejected}}</span>
        <a href="{{URL('/rejectedlist')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Issued Orders</span>
        <span class="info-box-number">{{$issued}}</span>
        <a href="{{URL('/issuedlist')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Orders
              </h3>
            
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content p-0">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane active" id="saleschart">

                  <div id="container"></div>
                                        
              </div>  
                
              </div>
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </section>
     <section class="col-lg-5 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-users"></i>
                  Departments
                </h3>
              
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <div id="container2"></div>
                </div>
              </div><!-- /.card-body -->
            </div>
        
        </section>
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fa fa-exchange"></i>
                Transactions
              </h3>
            
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content p-0">
                <!-- Morris chart - Sales -->
               

                  <div id="container3"></div>
                                        
               
                
              </div>
            </div><!-- /.card-body -->
          </div>
      
        <!-- /.card -->

        <!-- solid sales graph -->
        

      
      </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
   




</div>


</section>
@endsection
@push("scripts")
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>




              <script>
                 

                var url="<?=url('/Dashboard')?>";
                 $.get(url,function(data){


                  Highcharts.chart('container2', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Top 8 Frequent Orders'
    },
   
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total Quantity Ordered'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
    },

    series: [
        {
            name: "Number",
            colorByPoint: true,
            data: data
        }
    ],
   
});



                 });
                
              
        
               
              </script>


<script>
                 

  var url="<?=url('/Dashboard')?>";
   $.get(url,function(data){


    Highcharts.chart('container', {
chart: {
type: 'column'
},
title: {
text: 'Top 8 Frequent Orders'
},

accessibility: {
announceNewData: {
enabled: true
}
},
xAxis: {
type: 'category'
},
yAxis: {
title: {
text: 'Total Quantity Ordered'
}

},
legend: {
enabled: false
},
plotOptions: {
series: {
borderWidth: 0,
dataLabels: {
  enabled: true,
  format: '{point.y}'
}
}
},

tooltip: {
headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
},

series: [
{
name: "Number",
colorByPoint: true,
data: data
}
],

});



   });
  


 
</script>

<script>
                 

  var url="<?=url('/Dashboard')?>";
   $.get(url,function(data){


    Highcharts.chart('container3', {
chart: {
type: 'column'
},
title: {
text: ' Dailly Transactions'
},

accessibility: {
announceNewData: {
enabled: true
}
},
xAxis: {
type: 'category'
},
yAxis: {
title: {
text: 'Total Quantity Ordered'
}

},
legend: {
enabled: false
},
plotOptions: {
series: {
borderWidth: 0,
dataLabels: {
  enabled: true,
  format: '{point.y}'
}
}
},

tooltip: {
headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
},

series: [
{
name: "Number",
colorByPoint: true,
data: data
}
],

});



   });
  


 
</script>
@endpush

        



