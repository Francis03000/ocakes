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
              <h5 class="card-title">Apex Simple</h5>
            </div>
            <div class="card-body">
              <div id="s-line" class="chart-set"></div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Area Chart</h5>
            </div>
            <div class="card-body">
              <div id="s-line-area" class="chart-set"></div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Column Chart</h5>
            </div>
            <div class="card-body">
              <div id="s-col" class="chart-set"></div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Column Stacked Chart</h5>
            </div>
            <div class="card-body">
              <div id="s-col-stacked" class="chart-set"></div>
            </div>
          </div>
        </div>
        
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Bar Chart</h5>
            </div>
            <div class="card-body">
              <div id="s-bar" class="chart-set"></div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Mixed Chart</h5>
            </div>
            <div class="card-body">
              <div id="mixed-chart" class="chart-set"></div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Donut Chart</h5>
            </div>
            <div class="card-body">
              <div id="donut-chart" class="chart-set"></div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Radial Chart</h5>
            </div>
            <div class="card-body">
              <div id="radial-chart" class="chart-set"></div>
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
</body>
</html>