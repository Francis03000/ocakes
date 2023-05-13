<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta  name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0"/>
    <meta name="description" content="POS - Bootstrap Admin Template" />
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive"/>
    <meta name="author" content="Dreamguys - Bootstrap Admin Template" />
    <meta name="robots" content="noindex, nofollow" />
    
    <title>Admin-Dashboard</title>
    <script src="https://kit.fontawesome.com/8494b77c9c.js" crossorigin="anonymous"></script>

    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>/tools/admin/assets/img/favicon.png"/>
    <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/css/animate.css" />
    <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/plugins/fontawesome/css/fontawesome.min.css"/>
    <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/plugins/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/css/style.css" />
  </head>
  <body>
    <!-- <div id="global-loader">
      <div class="whirly-loader"></div>
    </div> -->

    <div class="main-wrapper">
      <?php echo view('admin/include/topbar'); ?>

      <?php echo view('admin/include/sidebar'); ?>

      <div class="page-wrapper">
        <div class="content">
          <div class="row">
            <div class="col-lg-3 col-sm-6 col-12">
              <div class="dash-widget">
                <div class="dash-widgetimg">
                  <span
                    ><img src="<?=base_url()?>/tools/admin/assets/img/icons/dash1.svg" alt="img"
                  /></span>
                </div>
                <div class="dash-widgetcontent">
                  
                  <h5>
                    ₱<span class="counters" data-count="<?=$monthly[0]->total;?>"
                      ><?=$monthly[0]->total;?></span
                    >
                  </h5>
                  <h6>Total Monthly Sale</h6>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
              <div class="dash-widget dash1">
                <div class="dash-widgetimg">
                  <span
                    ><img src="<?=base_url()?>/tools/admin/assets/img/icons/dash2.svg" alt="img"
                  /></span>
                </div>
                <div class="dash-widgetcontent">
                  <h5>
                    ₱<span class="counters" data-count="<?=$weekly[0]->total?>"
                      ><?=$weekly[0]->total?></span
                    >
                  </h5>
                  <h6>Total Weekly Sale</h6>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
              <div class="dash-widget dash2">
                <div class="dash-widgetimg">
                  <span
                    ><img src="<?=base_url()?>/tools/admin/assets/img/icons/dash3.svg" alt="img"
                  /></span>
                </div>
                <div class="dash-widgetcontent">
                  <h5>
                    ₱<span class="counters" data-count="<?=$yearly[0]->total?>"
                      ><?=$yearly[0]->total?></span
                    >
                  </h5>
                  <h6>Total Year Sale</h6>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
              <div class="dash-widget dash3">
                <div class="dash-widgetimg">
                  <span
                    ><img src="<?=base_url()?>/tools/admin/assets/img/icons/dash4.svg" alt="img"
                  /></span>
                </div>
                <div class="dash-widgetcontent">
                  <h5>
                    ₱<span class="counters" data-count="<?=$yearly[0]->total?>"><?=$yearly[0]->total?></span>
                  </h5>
                  <h6>Total Sale Amount</h6>
                </div>
              </div>
            </div>
            <!-- Customers Card Example -->
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
              <div class="dash-count">
                <div class="dash-counts">
                  <h4><?php echo $users_count;?> 
                        <?php if ($users_count > 1){
                           echo "Customers";
                        }else{
                           echo "Customer";
                        }?></h4>
                  <h5>Customers</h5>
                </div>
                <div class="dash-imgs">
                  <i data-feather="user"></i>
                </div>
              </div>
            </div>
            <!-- Orders Card Example -->
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
              <div class="dash-count das1">
                <div class="dash-counts">
                  <h4>100</h4>
                  <h5>Suppliers</h5>
                </div>
                <div class="dash-imgs">
                  <i data-feather="user-check"></i>
                </div>
              </div>
            </div>
            <!-- Products Card Example -->
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
              <div class="dash-count das2">
                <div class="dash-counts">
                  <h4><?php echo $product_count;?> 
                        <?php if ($product_count > 1){
                          echo "Cakes";
                        }else{
                          echo "Cake";
                        }?></h4>
                  <h5>Products</h5>
                </div>
                <div class="dash-imgs">
                  <i data-feather="file-text"></i>
                </div>
              </div>
            </div>
            <!-- AddOns Card Example -->
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
              <div class="dash-count das3">
                <div class="dash-counts">
                  <h4><?php echo $addons_count;?> 
                          <?php if ($addons_count > 1){
                            echo "AddOns";
                          }else{
                            echo "AddOn";
                          }?></h4>
                  <h5>Add Ons</h5>
                </div>
                <div class="dash-imgs">
                  <i data-feather="file"></i>
                </div>
              </div>
            </div>
            <!-- Pending Orders Card Example -->
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
              <div class="dash-count">
                <div class="dash-counts">
                  <h4><?php echo $pending_count;?> 
                        <?php if ($pending_count > 1){
                          echo "Orders";
                        }else{
                          echo "Order";
                        }?></h4>
                  <h5>Pending Orders</h5>
                </div>
                <div class="dash-imgs">
                  <i data-feather="user"></i>
                </div>
              </div>
            </div>
            <!-- Shipped Orders Card Example -->
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
              <div class="dash-count das1">
                <div class="dash-counts">
                  <h4><?php echo $shipped_count;?> 
                        <?php if ($shipped_count > 1){
                          echo "Orders";
                        }else{
                          echo "Order";
                        }?></h4>
                  <h5>Shipped Orders</h5>
                </div>
                <div class="dash-imgs">
                  <i data-feather="user-check"></i>
                </div>
              </div>
            </div>
            <!-- Cancelled Orders Card Example -->
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
              <div class="dash-count das2">
                <div class="dash-counts">
                  <h4><?php echo $cancelled_count;?> 
                        <?php if ($cancelled_count > 1){
                           echo "Orders";
                        }else{
                          echo "Order";
                        }?></h4>
                  <h5>Cancelled Orders</h5>
                </div>
                <div class="dash-imgs">
                  <i data-feather="file-text"></i>
                </div>
              </div>
            </div>
            <!-- Completed Oreders Card Example -->
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
              <div class="dash-count das3">
                <div class="dash-counts">
                  <h4><?php echo $completed_count;?> 
                        <?php if ($completed_count > 1){
                          echo "Orders";
                        }else{
                          echo "Order";
                        }?></h4>
                  <h5>Completed Orders</h5>
                </div>
                <div class="dash-imgs">
                  <i data-feather="file"></i>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-7 col-sm-12 col-12 d-flex">
              <div class="card flex-fill">
                <div
                  class="card-header pb-0 d-flex justify-content-between align-items-center"
                >
                  <h5 class="card-title mb-0">Top Barangay</h5>
                  
                </div>
                <div class="card-body">
                  <div id="brgy_chart"></div>
                </div>
              </div>
            </div>
            <div class="col-lg-5 col-sm-12 col-12 d-flex">
              <div class="card flex-fill">
                <div
                  class="card-header pb-0 d-flex justify-content-between align-items-center"
                >
                  <h4 class="card-title mb-0">Top Grossing Products</h4>
                  <div class="dropdown">
                    <a
                      href="javascript:void(0);"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                      class="dropset"
                    >
                      <i class="fa fa-ellipsis-v"></i>
                    </a>
                    <ul
                      class="dropdown-menu"
                      aria-labelledby="dropdownMenuButton"
                    >
                      <li>
                        <a href="productlist.html" class="dropdown-item"
                          >Product List</a
                        >
                      </li>
                      <li>
                        <a href="addproduct.html" class="dropdown-item"
                          >Product Add</a
                        >
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive dataview">
                    <table class="table datatable">
                      <thead>
                        <tr>
                          <th>Sno</th>
                          <th>Products</th>
                          <th>Price</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($grossing as $key => $prod):?>
                        <tr>
                          <td><?=$key+1?></td>
                          <td class="productimgname">
                            <a href="javascript:void(0)" class="product-img">
                              <?php if($prod->is_customized == 0):?>
                              <img
                                src="<?=base_url('tools/uploads')?>/<?=$prod->image?>"
                                alt="product"
                              />
                              <?php else: ?>
                                <img
                                src="<?=$prod->image?>"
                                alt="product"
                              />
                              <?php endif;?>
                            </a>
                            <a href="productlist.html">
                              
                                <?=$prod->product_name?> (<?=$prod->flavor?>)
                               
                            </a>
                          </td>
                          <td>₱<?=$prod->price?></td>
                        </tr>
                        <?php endforeach;?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card mb-0">
            <div class="card-body">
              <h4 class="card-title">Expired Products</h4>
              <div class="table-responsive dataview">
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th>SNo</th>
                      <th>Product Code</th>
                      <th>Product Name</th>
                      <th>Brand Name</th>
                      <th>Category Name</th>
                      <th>Expiry Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td><a href="javascript:void(0);">IT0001</a></td>
                      <td class="productimgname">
                        <a class="product-img" href="productlist.html">
                          <img
                            src="<?=base_url()?>/tools/admin/assets/img/product/product2.jpg"
                            alt="product"
                          />
                        </a>
                        <a href="productlist.html">Orange</a>
                      </td>
                      <td>N/D</td>
                      <td>Fruits</td>
                      <td>12-12-2022</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td><a href="javascript:void(0);">IT0002</a></td>
                      <td class="productimgname">
                        <a class="product-img" href="productlist.html">
                          <img
                            src="<?=base_url()?>/tools/admin/assets/img/product/product3.jpg"
                            alt="product"
                          />
                        </a>
                        <a href="productlist.html">Pineapple</a>
                      </td>
                      <td>N/D</td>
                      <td>Fruits</td>
                      <td>25-11-2022</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td><a href="javascript:void(0);">IT0003</a></td>
                      <td class="productimgname">
                        <a class="product-img" href="productlist.html">
                          <img
                            src="<?=base_url()?>/tools/admin/assets/img/product/product4.jpg"
                            alt="product"
                          />
                        </a>
                        <a href="productlist.html">Stawberry</a>
                      </td>
                      <td>N/D</td>
                      <td>Fruits</td>
                      <td>19-11-2022</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td><a href="javascript:void(0);">IT0004</a></td>
                      <td class="productimgname">
                        <a class="product-img" href="productlist.html">
                          <img
                            src="<?=base_url()?>/tools/admin/assets/img/product/product5.jpg"
                            alt="product"
                          />
                        </a>
                        <a href="productlist.html">Avocat</a>
                      </td>
                      <td>N/D</td>
                      <td>Fruits</td>
                      <td>20-11-2022</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    

    <script src="<?=base_url()?>/tools/admin/assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?=base_url()?>/tools/admin/assets/js/feather.min.js"></script>
    <script src="<?=base_url()?>/tools/admin/assets/js/jquery.slimscroll.min.js"></script>
    <script src="<?=base_url()?>/tools/admin/assets/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>/tools/admin/assets/js/dataTables.bootstrap4.min.js"></script>
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
            rotate: -45
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
    </script>
  </body>
</html>
