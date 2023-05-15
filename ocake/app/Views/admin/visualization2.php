<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <meta name="description" content="POS - Bootstrap Admin Template">
  <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
  <meta name="author" content="Dreamguys - Bootstrap Admin Template">
  <meta name="robots" content="noindex, nofollow">

  <title>Reports</title>
  <scripts rc="https://kit.fontawesome.com/8494b77c9c.js" crossorigin="anonymous"></script>

  <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>/tools/admin/assets/img/favicon.png">
  <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/css/animate.css">
  <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/plugins/fontawesome/css/fontawesome.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/plugins/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/css/style.css">
</head>
<body>
  <!-- <div id="global-loader">
    <div class="whirly-loader"> </div>
  </div> -->

<div class="main-wrapper">
  <?php echo view('admin/include/topbar'); ?>

  <?php echo view('admin/include/sidebar'); ?> 

  <div class="page-wrapper cardhead">
    <div class="content ">

      <div class="page-header">
        <div class="row">
          <div class="col-sm-12">
            <h3 class="page-title">Charts</h3>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?=site_url('admin/dashboard')?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Charts</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="row">

        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Weekly Sold</h5>
            </div>
            <div class="card-body">
             <div id="dailyChart"></div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Yearly Sold</h5>
            </div>
            <div class="card-body">
             <div id="yearlyChart"></div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Bar Chart</h5>
            </div>
            <div class="card-body">
              <div id="monthlyChart" class="chart-set"></div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Top Barangay</h5>
            </div>
            <div class="card-body">
             <div id="brgy_chart"></div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<div class="searchpart">
  <div class="searchcontent">
    <div class="searchhead">
      <h3>Search </h3>
      <a id="closesearch"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
    </div>
    <div class="searchcontents">
      <div class="searchparts">
        <input type="text" placeholder="search here">
        <a class="btn btn-searchs">Search</a>
      </div>
      <div class="recentsearch">
        <h2>Recent Search</h2>
        <ul>
          <li>
            <h6><i class="fa fa-search me-2"></i> Settings</h6>
          </li>
          <li>
            <h6><i class="fa fa-search me-2"></i> Report</h6>
          </li>
          <li>
            <h6><i class="fa fa-search me-2"></i> Invoice</h6>
          </li>
          <li>
            <h6><i class="fa fa-search me-2"></i> Sales</h6>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>


<script src="<?=base_url()?>/tools/admin/assets/js/jquery-3.6.0.min.js"></script>
<script src="<?=base_url()?>/tools/admin/assets/js/feather.min.js"></script>
<script src="<?=base_url()?>/tools/admin/assets/js/jquery.slimscroll.min.js"></script>
<script src="<?=base_url()?>/tools/admin/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url()?>/tools/admin/assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="<?=base_url()?>/tools/admin/assets/plugins/apexchart/chart-data.js"></script>
<script src="<?=base_url()?>/tools/admin/assets/js/script.js"></script>

<script>
      console.log('<?=json_encode($topBarangay["brgy"])?>', 'dggedfddf')
      var options = {
          series: [{
          name: 'Servings',
          data: JSON.parse('<?=json_encode($topBarangay["count"])?>')
        }],
        chart: {
          height: 350,
          type: 'bar',
        },
        plotOptions: {
          bar: {
            borderRadius: 10,
            columnWidth: '50%',
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          width: 2
        },
        
        grid: {
          row: {
            colors: ['#fff', '#f2f2f2']
          }
        },
        xaxis: {
          labels: {
            rotate: -45,
          },
          categories: JSON.parse('<?=json_encode($topBarangay["brgy"])?>'),
          tickPlacement: 'on'
        },
        yaxis: {
          title: {
            text: 'Ordered',
          },
        },
        fill: {
          type: 'gradient',
          gradient: {
            shade: 'light',
            type: "horizontal",
            shadeIntensity: 0.25,
            gradientToColors: undefined,
            inverseColors: true,
            opacityFrom: 0.85,
            opacityTo: 0.85,
            stops: [50, 0, 100]
          },
        }
        };
        
        var chart = new ApexCharts(document.querySelector("#brgy_chart"), options);
        chart.render();



        // WEEKLY SOLD CHART
        var options = {
          series: [{
            name: "Sold",
            data: JSON.parse('<?=json_encode($weeklySold["total"])?>')
        }],
          chart: {
          height: 350,
          type: 'line',
          zoom: {
            enabled: false
          }
        },
        dataLabels: {
          enabled: false,
        },
        stroke: {
          curve: 'straight'
        },
        title: {
          text: 'Weekly Sold on ' + JSON.parse('<?=json_encode($weeklySold["month"][0])?>'),
          align: 'left'
        },
        grid: {
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        xaxis: {
          categories: JSON.parse('<?=json_encode($weeklySold["week"])?>'),
          labels:{
            formatter: function(val){
              return 'Week ' + val;
            }
          }
        },
        yaxis:{
          labels:{
            formatter: function(val) {
            return val.toFixed(0);
          }
          }
        }
        };


        var chart = new ApexCharts(document.querySelector("#dailyChart"), options);
        chart.render();

        // YEARLY SOLD CHART
        var options = {
          series: [{
            name: "Sold",
            data: JSON.parse('<?=json_encode($yearlySold["total"])?>')
        }],
          chart: {
          height: 350,
          type: 'line',
          zoom: {
            enabled: false
          }
        },
        dataLabels: {
          enabled: false,
        },
        stroke: {
          curve: 'straight'
        },
        title: {
          text: 'Yearly Sold',
          align: 'left'
        },
        grid: {
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        xaxis: {
          categories: JSON.parse('<?=json_encode($yearlySold["year"])?>'),
          // labels:{
          //   formatter: function(val){
          //     return 'Year ' + val;
          //   }
          // }
        },
        yaxis:{
          labels:{
            formatter: function(val) {
            return val.toFixed(0);
          }
          }
        }
        };


        var chart = new ApexCharts(document.querySelector("#yearlyChart"), options);
        chart.render();


        //Bar chart
          var options = {
          series: [{
          data: JSON.parse('<?=json_encode($monthlySold["total"])?>')
        }],
          chart: {
          type: 'bar',
          height: 380
        },
        plotOptions: {
          bar: {
            barHeight: '100%',
            distributed: true,
            horizontal: true,
            dataLabels: {
              position: 'bottom'
            },
          }
        },
        colors: ['#33b2df', '#546E7A', '#d4526e', '#13d8aa', '#A5978B', '#2b908f', '#f9a3a4', '#90ee7e',
          '#f48024', '#69d2e7'
        ],
        dataLabels: {
          enabled: true,
          textAnchor: 'start',
          style: {
            colors: ['#fff']
          },
          formatter: function (val, opt) {
            return opt.w.globals.labels[opt.dataPointIndex] + ":  " + val
          },
          offsetX: 0,
          dropShadow: {
            enabled: true
          }
        },
        stroke: {
          width: 1,
          colors: ['#fff']
        },
        xaxis: {
          categories: JSON.parse('<?=json_encode($monthlySold["month"])?>')
        },
        yaxis: {
          labels: {
            show: false
          }
        },
        title: {
            text: 'Monthly Sales',
            align: 'center',
            floating: true
        },
        // subtitle: {
        //     text: 'Category Names as DataLabels inside bars',
        //     align: 'center',
        // },
        tooltip: {
          theme: 'dark',
          x: {
            show: false
          },
          y: {
            labels:{
              formatter: function(val) {
                return 'Sold: ' + val;
              }
            }
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#monthlyChart"), options);
        chart.render();
    </script>
</body>
</html>