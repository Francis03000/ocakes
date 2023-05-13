<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <meta name="description" content="POS - Bootstrap Admin Template">
  <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
  <meta name="author" content="Dreamguys - Bootstrap Admin Template">
  <meta name="robots" content="noindex, nofollow">

  <title>Dreams Pos admin template</title>
  <script src="https://kit.fontawesome.com/8494b77c9c.js"crossorigin="anonymous"></script>
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
<h3 class="page-title">Morris Chart</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
<li class="breadcrumb-item active">Morris Charts</li>
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
<div id="morrisBar1" class="chart-set"></div>
</div>
</div>
</div>


<div class="col-md-6">
<div class="card">
<div class="card-header">
<div class="card-title">Stacked Bar Chart </div>
</div>
<div class="card-body">
<div id="morrisBar3" class="chart-set"></div>
</div>
</div>
</div>


<div class="col-md-6">
<div class="card">
<div class="card-header">
<div class="card-title">Line Chart</div>
</div>
<div class="card-body">
<div id="morrisLine1" class="chart-set"></div>
</div>
</div>
</div>


<div class="col-md-6">
<div class="card">
<div class="card-header">
<div class="card-title">Area Chart</div>
</div>
<div class="card-body">
<div id="morrisArea1" class="chart-set"></div>
</div>
</div>
</div>


<div class="col-md-6">
<div class="card">
<div class="card-header">
<div class="card-title">Line Chart</div>
</div>
<div class="card-body">
<div id="morrisBar6" class="chart-set"></div>
</div>
</div>
</div>


<div class="col-md-6">
<div class="card">
<div class="card-header">
<div class="card-title">Line Chart</div>
</div>
<div class="card-body">
<div id="morrisBar7" class="chart-set"></div>
</div>
</div>
</div>


<div class="col-md-6">
<div class="card">
<div class="card-header">
<div class="card-title">Donut Chart</div>
</div>
<div class="card-body">
<div id="morrisDonut1" class="chart-set"></div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>


<script src="<?=base_url()?>/tools/admin/assets/js/jquery-3.6.0.min.js"></script>

<script src="<?=base_url()?>/tools/admin/assets/js/feather.min.js"></script>

<script src="<?=base_url()?>/tools/admin/assets/js/jquery.slimscroll.min.js"></script>

<script src="<?=base_url()?>/tools/admin/assets/js/bootstrap.bundle.min.js"></script>

<script src="<?=base_url()?>/tools/admin/assets/plugins/morris/raphael-min.js"></script>
<script src="<?=base_url()?>/tools/admin/assets/plugins/morris/morris.min.js"></script>
<script src="<?=base_url()?>/tools/admin/assets/plugins/morris/chart-data.js"></script>

<script src="<?=base_url()?>/tools/admin/assets/js/script.js"></script>
</body>
</html>