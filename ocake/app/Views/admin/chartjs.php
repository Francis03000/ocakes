<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">

    <title>Sales Report</title>
    <script src="https://kit.fontawesome.com/8494b77c9c.js" crossorigin="anonymous"></script>

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
<div class="content">

<div class="page-header">
<div class="row">
<div class="col-sm-12">
<h3 class="page-title">Chartjs</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
<li class="breadcrumb-item active">Chartjs</li>
</ul>
</div>
</div>
</div>

<div class="row">

<div class="col-md-6">
<div class="card">
<div class="card-header">
<div class="card-title">Bar Chart</div>
</div>
<div class="card-body">
<div>
<canvas id="chartBar1" class="h-300"></canvas>
</div>
</div>
</div>
</div>


<div class="col-md-6">
<div class="card">
<div class="card-header">
<div class="card-title">Transparency </div>
</div>
<div class="card-body">
<div>
<canvas id="chartBar2" class="h-300"></canvas>
</div>
</div>
</div>
</div>


<div class="col-md-6">
<div class="card">
<div class="card-header">
<div class="card-title">Gradient Bar Chart</div>
</div>
<div class="card-body">
<div>
<canvas id="chartBar3" class="h-300"></canvas>
</div>
</div>
</div>
</div>


<div class="col-md-6">
<div class="card">
<div class="card-header">
<div class="card-title">Horizontal Bar Chart</div>
</div>
<div class="card-body">
<div class="chartjs-wrapper-demo">
<canvas id="chartBar4" class="h-300"></canvas>
</div>
</div>
</div>
</div>


<div class="col-md-6">
<div class="card">
<div class="card-header">
<div class="card-title">Horizontal Bar Chart Style2</div>
</div>
<div class="card-body">
<div class="chartjs-wrapper-demo">
<canvas id="chartBar5" class="h-300"></canvas>
</div>
</div>
</div>
</div>


<div class="col-md-6">
<div class="card">
<div class="card-header">
<div class="card-title">Vertical Stacked Bar Chart</div>
</div>
<div class="card-body">
<div class="chartjs-wrapper-demo">
<canvas id="chartStacked1" class="h-300"></canvas>
</div>
</div>
</div>
</div>


<div class="col-md-6">
<div class="card">
<div class="card-header">
<div class="card-title">Horizontal Stacked Bar Chart</div>
</div>
<div class="card-body">
<div class="chartjs-wrapper-demo">
<canvas id="chartStacked2" class="h-300"></canvas>
</div>
</div>
</div>
</div>


<div class="col-md-6">
<div class="card">
<div class="card-header">
<div class="card-title">Line Chart</div>
</div>
<div class="card-body">
<div class="chartjs-wrapper-demo">
<canvas id="chartLine1" class="h-300"></canvas>
</div>
</div>
</div>
</div>


<div class="col-md-6">
<div class="card">
<div class="card-header">
<div class="card-title">Donut Chart</div>
</div>
<div class="card-body">
<div class="chartjs-wrapper-demo">
<canvas id="chartPie" class="h-300"></canvas>
</div>
</div>
</div>
</div>


<div class="col-md-6">
<div class="card">
<div class="card-header">
<div class="card-title">Pie Chart</div>
</div>
<div class="card-body">
<div class="chartjs-wrapper-demo">
<canvas id="chartDonut" class="h-300"></canvas>
</div>
</div>
</div>
</div>


<div class="col-md-6">
<div class="card">
<div class="card-header">
<div class="card-title">Area Chart</div>
</div>
<div class="card-body">
<div class="chartjs-wrapper-demo">
<canvas id="chartArea1" class="h-300"></canvas>
</div>
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

<script src="<?=base_url()?>/tools/admin/assets/plugins/chartjs/chart.min.js"></script>
<script src="<?=base_url()?>/tools/admin/assets/plugins/chartjs/chart-data.js"></script>

<script src="<?=base_url()?>/tools/admin/assets/js/script.js"></script>
</body>
</html>