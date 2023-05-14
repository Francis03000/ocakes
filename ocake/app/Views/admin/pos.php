<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0"/>
    <meta name="description" content="POS - Bootstrap Admin Template" />
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects" />
    <meta name="author" content="Dreamguys - Bootstrap Admin Template" />
    <meta name="robots" content="noindex, nofollow" />

    <title>Dreams Pos admin template</title>
    <script  src="https://kit.fontawesome.com/8494b77c9c.js"  crossorigin="anonymous"></script>
    
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>/tools/admin/assets/img/favicon.png"/>
    <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/css/animate.css" />
    <link  rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/plugins/owlcarousel/owl.carousel.min.css"/>
    <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/plugins/owlcarousel/owl.theme.default.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/plugins/select2/css/select2.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/css/bootstrap-datetimepicker.min.css" />
    <link  rel="stylesheet"  href="<?=base_url()?>/tools/admin/assets/plugins/fontawesome/css/fontawesome.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/plugins/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/css/style.css" />
  </head>
  <body>
<?php
      function createRandomPassword() {
        $chars = "003232303232023232023456789";
        srand((double)microtime()*1000000);
        $i = 0;
        $pass = '' ;
        while ($i < 5) {

          $num = rand() % 33;

          $tmp = substr($chars, $num, 1);

          $pass = $pass . $tmp;

          $i++;

        }
        return $pass;
      }
    $finalcode=createRandomPassword();

?>

    <!-- <div id="global-loader">
      <div class="whirly-loader"></div>
    </div> -->
    <div class="main-wrappers">
      
      <?php echo view('admin/include/topbar'); ?>
      <?//php echo view('admin/include/sidebar'); ?>

      <div class="page-wrapper ms-0">
        <div class="content">
          <div class="row">
            <div class="col-lg-8 col-sm-12 tabs_wrapper">
              <div class="page-header">
                <div class="page-title">
                  <h4>Categories</h4>
                  <h6>Manage your purchases</h6>
                </div>
              </div>
              
              <ul class="tabs owl-carousel owl-theme owl-product border-0">
              <?php foreach($category as $data){?>
                <li id="<?php echo $data->category_id;?>" name="cat">
                   <input hidden id="id" value="<?php echo $data->category_id;?>"/>
                  <a class="product-details">
                    <img src="http://localhost/ocake/tools/uploads/<?php echo $data->cat_image;?>" style="height:50px" alt="img" />
                    <h6 style="margin-bottom:15px"><?php echo $data->category_name;?></h6>
                  </a>
                </li>
                <?php }?>
              </ul>
              
              <div class="tabs_container">
              <div class="row" id="product_container">
                  
                </div>
              </div>
                
            </div>
            <div class="col-lg-4 col-sm-12">
              <div class="order-list">
                <div class="orderid">
                  <h4>Order List</h4>
                  <h5 id="invoiceNumber">Transaction id : #<?php echo $finalcode; ?></h5>
                  <input type="hidden" id="invoiceNumberId" value="<?php echo $finalcode; ?>">
                </div>
              </div>
              <div class="card card-order">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <a
                        href="javascript:void(0);"
                        class="btn btn-adds"
                        data-bs-toggle="modal"
                        data-bs-target="#create"
                        ><i class="fa fa-plus me-2"></i>Add Customer</a
                      >
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label>Product Code</label>
                        <input type="text" placeholder="Scanned Product code goes here." autofocus/>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="select-split">
                        <div class="select-group w-100">
                          <select class="select" id="customer_id" name="customer_id">
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- <div class="col-lg-12">
                      <div class="select-split">
                        <div class="select-group w-100">
                          <select class="select">
                            <option>Product</option>
                            <option>Barcode</option>
                          </select>
                        </div>
                      </div>
                    </div> -->
                    <!-- <div class="col-12">
                      <div class="text-end">
                        <a class="btn btn-scanner-set"
                          ><img
                            src="<?=base_url()?>/tools/admin/assets/img/icons/scanner1.svg"
                            alt="img"
                            class="me-2"
                          />Scan bardcode</a
                        >
                      </div>
                    </div> -->
                  </div>
                </div>
                <div class="split-card"></div>
                <div class="card-body pt-0">
                  <ul class="product-lists">
                    <li>Product Name</li>
                    <li>Unit Price</li>
                    <li>Quantity</li>
                    <li>Total Amount</li>
                  </ul>
                  <div  class="product-table" id="prod_list">
                  </div>
                </div>
                <div class="split-card"></div>
                <div class="card-body pt-0 pb-2">
                  <div class="setvalue">
                    <ul>
                      <li>
                        <h5>Subtotal</h5>
                        <h6 id="sub-total"> 0.00 </h6>
                        <input type="hidden" id="subtotals">
                      </li><br>
                      <li>
                        <h5>Cash</h5>
                        <h6 id="cashpay"> 0.00 </h6>
                      </li>
                      <li class="total-value">
                        <h5>Change</h5>
                        <h6 id="cashchange"> 0.00 </h6>
                      </li>
                    </ul>
                  </div>
                  <div class="setvaluecash">
                    <ul>
                      <li>
                        <a href="javascript:void(0);" id="paymentmethod" class="paymentmethod">
                          <img src="<?=base_url()?>/tools/admin/assets/img/icons/cash.svg" alt="img" class="me-2"/>
                          Cash
                        </a>
                      </li>
                      <li>
                        <a href="javascript:void(0);" class="paymentmethod">
                          <img src="<?=base_url()?>/tools/admin/assets/img/icons/scan.svg" alt="img" class="me-2"/>
                          Scan
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="btn-pos">
                    <ul>
                      <li>
                        <a
                          class="btn"
                          data-bs-toggle="modal"
                          data-bs-target="#calculator"
                          ><img
                            src="<?=base_url()?>/tools/admin/assets/img/icons/transcation.svg"
                            alt="img"
                            class="me-1"
                          />
                          Calculator</a
                        >
                      </li>
                      <li>
                        <a
                          class="btn"
                          data-bs-toggle="modal"
                          data-bs-target="#recents"
                          ><img
                            src="<?=base_url()?>/tools/admin/assets/img/icons/transcation.svg"
                            alt="img"
                            class="me-1"
                          />
                          Transaction</a
                        >
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="calculator" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Define Quantity</h5>
            <button
              type="button"
              class="close"
              data-bs-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="calculator-set">
              <div class="calculatortotal">
                <h4>0</h4>
              </div>
              <ul>
                <li>
                  <a href="javascript:void(0);">1</a>
                </li>
                <li>
                  <a href="javascript:void(0);">2</a>
                </li>
                <li>
                  <a href="javascript:void(0);">3</a>
                </li>
                <li>
                  <a href="javascript:void(0);">4</a>
                </li>
                <li>
                  <a href="javascript:void(0);">5</a>
                </li>
                <li>
                  <a href="javascript:void(0);">6</a>
                </li>
                <li>
                  <a href="javascript:void(0);">7</a>
                </li>
                <li>
                  <a href="javascript:void(0);">8</a>
                </li>
                <li>
                  <a href="javascript:void(0);">9</a>
                </li>
                <li>
                  <a href="javascript:void(0);" class="btn btn-closes"
                    ><img src="<?=base_url()?>/tools/admin/assets/img/icons/close-circle.svg" alt="img"
                  /></a>
                </li>
                <li>
                  <a href="javascript:void(0);">0</a>
                </li>
                <li>
                  <a href="javascript:void(0);" class="btn btn-reverse"
                    ><img src="<?=base_url()?>/tools/admin/assets/img/icons/reverse.svg" alt="img"
                  /></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="recents" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Recent Transactions</h5>
            <button
              type="button"
              class="close"
              data-bs-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="tabs-sets">
              <ul class="nav nav-tabs" id="myTabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <button
                    class="nav-link active"
                    id="purchase-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#purchase"
                    type="button"
                    aria-controls="purchase"
                    aria-selected="true"
                    role="tab"
                  >
                    Purchase
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button
                    class="nav-link"
                    id="payment-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#payment"
                    type="button"
                    aria-controls="payment"
                    aria-selected="false"
                    role="tab"
                  >
                    Payment
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button
                    class="nav-link"
                    id="return-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#return"
                    type="button"
                    aria-controls="return"
                    aria-selected="false"
                    role="tab"
                  >
                    Return
                  </button>
                </li>
              </ul>
              <div class="tab-content">
                <div
                  class="tab-pane fade show active"
                  id="purchase"
                  role="tabpanel"
                  aria-labelledby="purchase-tab"
                >
                  <div class="table-top">
                    <div class="search-set">
                      <div class="search-input">
                        <a class="btn btn-searchset"
                          ><img
                            src="<?=base_url()?>/tools/admin/assets/img/icons/search-white.svg"
                            alt="img"
                        /></a>
                      </div>
                    </div>
                    <div class="wordset">
                      <ul>
                        <li>
                          <a
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="pdf"
                            ><img src="<?=base_url()?>/tools/admin/assets/img/icons/pdf.svg" alt="img"
                          /></a>
                        </li>
                        <li>
                          <a
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="excel"
                            ><img src="<?=base_url()?>/tools/admin/assets/img/icons/excel.svg" alt="img"
                          /></a>
                        </li>
                        <li>
                          <a
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="print"
                            ><img src="<?=base_url()?>/tools/admin/assets/img/icons/printer.svg" alt="img"
                          /></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table datanew">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Reference</th>
                          <th>Customer</th>
                          <th>Amount</th>
                          <th class="text-end">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>2022-03-07</td>
                          <td>INV/SL0101</td>
                          <td>Walk-in Customer</td>
                          <td>$ 1500.00</td>
                          <td>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/eye.svg" alt="img" />
                            </a>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/edit.svg" alt="img" />
                            </a>
                            <a
                              class="me-3 confirm-text"
                              href="javascript:void(0);"
                            >
                              <img
                                src="<?=base_url()?>/tools/admin/assets/img/icons/delete.svg"
                                alt="img"
                              />
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>2022-03-07</td>
                          <td>INV/SL0101</td>
                          <td>Walk-in Customer</td>
                          <td>$ 1500.00</td>
                          <td>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/eye.svg" alt="img" />
                            </a>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/edit.svg" alt="img" />
                            </a>
                            <a
                              class="me-3 confirm-text"
                              href="javascript:void(0);"
                            >
                              <img
                                src="<?=base_url()?>/tools/admin/assets/img/icons/delete.svg"
                                alt="img"
                              />
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>2022-03-07</td>
                          <td>INV/SL0101</td>
                          <td>Walk-in Customer</td>
                          <td>$ 1500.00</td>
                          <td>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/eye.svg" alt="img" />
                            </a>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/edit.svg" alt="img" />
                            </a>
                            <a
                              class="me-3 confirm-text"
                              href="javascript:void(0);"
                            >
                              <img
                                src="<?=base_url()?>/tools/admin/assets/img/icons/delete.svg"
                                alt="img"
                              />
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>2022-03-07</td>
                          <td>INV/SL0101</td>
                          <td>Walk-in Customer</td>
                          <td>$ 1500.00</td>
                          <td>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/eye.svg" alt="img" />
                            </a>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/edit.svg" alt="img" />
                            </a>
                            <a
                              class="me-3 confirm-text"
                              href="javascript:void(0);"
                            >
                              <img
                                src="<?=base_url()?>/tools/admin/assets/img/icons/delete.svg"
                                alt="img"
                              />
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>2022-03-07</td>
                          <td>INV/SL0101</td>
                          <td>Walk-in Customer</td>
                          <td>$ 1500.00</td>
                          <td>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/eye.svg" alt="img" />
                            </a>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/edit.svg" alt="img" />
                            </a>
                            <a
                              class="me-3 confirm-text"
                              href="javascript:void(0);"
                            >
                              <img
                                src="<?=base_url()?>/tools/admin/assets/img/icons/delete.svg"
                                alt="img"
                              />
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>2022-03-07</td>
                          <td>INV/SL0101</td>
                          <td>Walk-in Customer</td>
                          <td>$ 1500.00</td>
                          <td>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/eye.svg" alt="img" />
                            </a>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/edit.svg" alt="img" />
                            </a>
                            <a
                              class="me-3 confirm-text"
                              href="javascript:void(0);"
                            >
                              <img
                                src="<?=base_url()?>/tools/admin/assets/img/icons/delete.svg"
                                alt="img"
                              />
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>2022-03-07</td>
                          <td>INV/SL0101</td>
                          <td>Walk-in Customer</td>
                          <td>$ 1500.00</td>
                          <td>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/eye.svg" alt="img" />
                            </a>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/edit.svg" alt="img" />
                            </a>
                            <a
                              class="me-3 confirm-text"
                              href="javascript:void(0);"
                            >
                              <img
                                src="<?=base_url()?>/tools/admin/assets/img/icons/delete.svg"
                                alt="img"
                              />
                            </a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="tab-pane fade" id="payment" role="tabpanel">
                  <div class="table-top">
                    <div class="search-set">
                      <div class="search-input">
                        <a class="btn btn-searchset"
                          ><img
                            src="<?=base_url()?>/tools/admin/assets/img/icons/search-white.svg"
                            alt="img"
                        /></a>
                      </div>
                    </div>
                    <div class="wordset">
                      <ul>
                        <li>
                          <a
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="pdf"
                            ><img src="<?=base_url()?>/tools/admin/assets/img/icons/pdf.svg" alt="img"
                          /></a>
                        </li>
                        <li>
                          <a
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="excel"
                            ><img src="<?=base_url()?>/tools/admin/assets/img/icons/excel.svg" alt="img"
                          /></a>
                        </li>
                        <li>
                          <a
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="print"
                            ><img src="<?=base_url()?>/tools/admin/assets/img/icons/printer.svg" alt="img"
                          /></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table datanew">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Reference</th>
                          <th>Customer</th>
                          <th>Amount</th>
                          <th class="text-end">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>2022-03-07</td>
                          <td>0101</td>
                          <td>Walk-in Customer</td>
                          <td>$ 1500.00</td>
                          <td>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/eye.svg" alt="img" />
                            </a>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/edit.svg" alt="img" />
                            </a>
                            <a
                              class="me-3 confirm-text"
                              href="javascript:void(0);"
                            >
                              <img
                                src="<?=base_url()?>/tools/admin/assets/img/icons/delete.svg"
                                alt="img"
                              />
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>2022-03-07</td>
                          <td>0102</td>
                          <td>Walk-in Customer</td>
                          <td>$ 1500.00</td>
                          <td>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/eye.svg" alt="img" />
                            </a>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/edit.svg" alt="img" />
                            </a>
                            <a
                              class="me-3 confirm-text"
                              href="javascript:void(0);"
                            >
                              <img
                                src="<?=base_url()?>/tools/admin/assets/img/icons/delete.svg"
                                alt="img"
                              />
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>2022-03-07</td>
                          <td>0103</td>
                          <td>Walk-in Customer</td>
                          <td>$ 1500.00</td>
                          <td>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/eye.svg" alt="img" />
                            </a>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/edit.svg" alt="img" />
                            </a>
                            <a
                              class="me-3 confirm-text"
                              href="javascript:void(0);"
                            >
                              <img
                                src="<?=base_url()?>/tools/admin/assets/img/icons/delete.svg"
                                alt="img"
                              />
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>2022-03-07</td>
                          <td>0104</td>
                          <td>Walk-in Customer</td>
                          <td>$ 1500.00</td>
                          <td>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/eye.svg" alt="img" />
                            </a>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/edit.svg" alt="img" />
                            </a>
                            <a
                              class="me-3 confirm-text"
                              href="javascript:void(0);"
                            >
                              <img
                                src="<?=base_url()?>/tools/admin/assets/img/icons/delete.svg"
                                alt="img"
                              />
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>2022-03-07</td>
                          <td>0105</td>
                          <td>Walk-in Customer</td>
                          <td>$ 1500.00</td>
                          <td>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/eye.svg" alt="img" />
                            </a>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/edit.svg" alt="img" />
                            </a>
                            <a
                              class="me-3 confirm-text"
                              href="javascript:void(0);"
                            >
                              <img
                                src="<?=base_url()?>/tools/admin/assets/img/icons/delete.svg"
                                alt="img"
                              />
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>2022-03-07</td>
                          <td>0106</td>
                          <td>Walk-in Customer</td>
                          <td>$ 1500.00</td>
                          <td>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/eye.svg" alt="img" />
                            </a>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/edit.svg" alt="img" />
                            </a>
                            <a
                              class="me-3 confirm-text"
                              href="javascript:void(0);"
                            >
                              <img
                                src="<?=base_url()?>/tools/admin/assets/img/icons/delete.svg"
                                alt="img"
                              />
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>2022-03-07</td>
                          <td>0107</td>
                          <td>Walk-in Customer</td>
                          <td>$ 1500.00</td>
                          <td>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/eye.svg" alt="img" />
                            </a>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/edit.svg" alt="img" />
                            </a>
                            <a
                              class="me-3 confirm-text"
                              href="javascript:void(0);"
                            >
                              <img
                                src="<?=base_url()?>/tools/admin/assets/img/icons/delete.svg"
                                alt="img"
                              />
                            </a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="tab-pane fade" id="return" role="tabpanel">
                  <div class="table-top">
                    <div class="search-set">
                      <div class="search-input">
                        <a class="btn btn-searchset"
                          ><img
                            src="<?=base_url()?>/tools/admin/assets/img/icons/search-white.svg"
                            alt="img"
                        /></a>
                      </div>
                    </div>
                    <div class="wordset">
                      <ul>
                        <li>
                          <a
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="pdf"
                            ><img src="<?=base_url()?>/tools/admin/assets/img/icons/pdf.svg" alt="img"
                          /></a>
                        </li>
                        <li>
                          <a
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="excel"
                            ><img src="<?=base_url()?>/tools/admin/assets/img/icons/excel.svg" alt="img"
                          /></a>
                        </li>
                        <li>
                          <a
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="print"
                            ><img src="<?=base_url()?>/tools/admin/assets/img/icons/printer.svg" alt="img"
                          /></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table datanew">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Reference</th>
                          <th>Customer</th>
                          <th>Amount</th>
                          <th class="text-end">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>2022-03-07</td>
                          <td>0101</td>
                          <td>Walk-in Customer</td>
                          <td>$ 1500.00</td>
                          <td>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/eye.svg" alt="img" />
                            </a>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/edit.svg" alt="img" />
                            </a>
                            <a
                              class="me-3 confirm-text"
                              href="javascript:void(0);"
                            >
                              <img
                                src="<?=base_url()?>/tools/admin/assets/img/icons/delete.svg"
                                alt="img"
                              />
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>2022-03-07</td>
                          <td>0102</td>
                          <td>Walk-in Customer</td>
                          <td>$ 1500.00</td>
                          <td>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/eye.svg" alt="img" />
                            </a>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/edit.svg" alt="img" />
                            </a>
                            <a
                              class="me-3 confirm-text"
                              href="javascript:void(0);"
                            >
                              <img
                                src="<?=base_url()?>/tools/admin/assets/img/icons/delete.svg"
                                alt="img"
                              />
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>2022-03-07</td>
                          <td>0103</td>
                          <td>Walk-in Customer</td>
                          <td>$ 1500.00</td>
                          <td>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/eye.svg" alt="img" />
                            </a>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/edit.svg" alt="img" />
                            </a>
                            <a
                              class="me-3 confirm-text"
                              href="javascript:void(0);"
                            >
                              <img
                                src="<?=base_url()?>/tools/admin/assets/img/icons/delete.svg"
                                alt="img"
                              />
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>2022-03-07</td>
                          <td>0104</td>
                          <td>Walk-in Customer</td>
                          <td>$ 1500.00</td>
                          <td>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/eye.svg" alt="img" />
                            </a>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/edit.svg" alt="img" />
                            </a>
                            <a
                              class="me-3 confirm-text"
                              href="javascript:void(0);"
                            >
                              <img
                                src="<?=base_url()?>/tools/admin/assets/img/icons/delete.svg"
                                alt="img"
                              />
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>2022-03-07</td>
                          <td>0105</td>
                          <td>Walk-in Customer</td>
                          <td>$ 1500.00</td>
                          <td>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/eye.svg" alt="img" />
                            </a>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/edit.svg" alt="img" />
                            </a>
                            <a
                              class="me-3 confirm-text"
                              href="javascript:void(0);"
                            >
                              <img
                                src="<?=base_url()?>/tools/admin/assets/img/icons/delete.svg"
                                alt="img"
                              />
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>2022-03-07</td>
                          <td>0106</td>
                          <td>Walk-in Customer</td>
                          <td>$ 1500.00</td>
                          <td>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/eye.svg" alt="img" />
                            </a>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/edit.svg" alt="img" />
                            </a>
                            <a
                              class="me-3 confirm-text"
                              href="javascript:void(0);"
                            >
                              <img
                                src="<?=base_url()?>/tools/admin/assets/img/icons/delete.svg"
                                alt="img"
                              />
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>2022-03-07</td>
                          <td>0107</td>
                          <td>Walk-in Customer</td>
                          <td>$ 1500.00</td>
                          <td>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/eye.svg" alt="img" />
                            </a>
                            <a class="me-3" href="javascript:void(0);">
                              <img src="<?=base_url()?>/tools/admin/assets/img/icons/edit.svg" alt="img" />
                            </a>
                            <a
                              class="me-3 confirm-text"
                              href="javascript:void(0);"
                            >
                              <img
                                src="<?=base_url()?>/tools/admin/assets/img/icons/delete.svg"
                                alt="img"
                              />
                            </a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div
      class="modal fade"
      id="create"
      tabindex="-1"
      aria-labelledby="create"
        aria-hidden="true"  >
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Customer</h5>
            <button
              type="button"
              class="close"
              data-bs-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="formMain">
            <div class="row">
              <div class="col-lg-4 col-sm-12 col-12">
                <div class="form-group">
                  <label>Customer FirstName</label>
                  <input type="text" id="customer_fname" name="customer_fname"/>
                </div>
              </div>
              <div class="col-lg-4 col-sm-12 col-12">
                <div class="form-group">
                  <label>Customer MiddleName</label>
                  <input type="text"  id="customer_mname" name="customer_mname"/>
                </div>
              </div>
              <div class="col-lg-4 col-sm-12 col-12">
                <div class="form-group">
                  <label>Customer LastName</label>
                  <input type="text"  id="customer_lname" name="customer_lname"/>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-sm-12 col-12">
                <div class="form-group">
                  <label>Email</label>
                  <input type="text"  id="customer_email" name="customer_email"/>
                </div>
              </div>
              <div class="col-lg-6 col-sm-12 col-12">
                <div class="form-group">
                  <label>Phone</label>
                  <input type="text"  id="customer_contact" name="customer_contact"/>
                </div>
              </div>
              <div class="col-lg-6 col-sm-12 col-12">
                <div class="form-group">
                  <label>Country</label>
                  <input type="text"  id="customer_country" name="customer_country"/>
                </div>
              </div>
              <div class="col-lg-6 col-sm-12 col-12">
                <div class="form-group">
                  <label>Address</label>
                  <input type="text"  id="customer_address" name="customer_address"/>
                </div>
              </div>
            </div>
            </form>
            <div class="col-lg-12">
              <a class="btn btn-submit me-2" id="addCustomer">Submit</a>
              <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div
      class="modal fade"
      id="printReciept"
      tabindex="-1"
      aria-labelledby="printReciept"
        aria-hidden="true"  >
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">printReciept</h5>
            <button
              type="button"
              class="close"
              data-bs-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">

          </div>
        </div>
      </div>
    </div>
    

<?php foreach($prod as $data){?>
<script>
    function myFunction(){
        var x = document.getElementById("id").value;
       
        document.getElementById("p").value = x;
        document.getElementById("shipping_fee").value = two;
    }
</script>
<?php }?>
    <script src="<?=base_url()?>/tools/admin/assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?=base_url()?>/tools/admin/assets/js/feather.min.js"></script>
    <script src="<?=base_url()?>/tools/admin/assets/js/jquery.slimscroll.min.js"></script>
    <script src="<?=base_url()?>/tools/admin/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>/tools/admin/assets/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>/tools/admin/assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?=base_url()?>/tools/admin/assets/plugins/select2/js/select2.min.js"></script>
    <script src="<?=base_url()?>/tools/admin/assets/plugins/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?=base_url()?>/tools/admin/assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="<?=base_url()?>/tools/admin/assets/plugins/sweetalert/sweetalerts.min.js"></script>
    <script src="<?=base_url()?>/tools/admin/assets/js/script.js"></script>
  </body>
</html>

<script>
  $(document).ready(function(){

    initData();
    initProductContainer();

    initTableInvoice();

    function initProductContainer(){
      $.ajax({
            url: '<?= base_url('admin/pos/products-list') ?>',
            method: 'get',
            dataType: 'json',
            success: function(response) {
              let product_container = $("#product_container");
              response.forEach((product) => {

                product_container.append('<div class="col-lg-3 col-sm-6 d-flex" id="productAddToCart" data-id="'+product.id+'">'+
                                          '<div class="tab_content active" data-tab="'+product.cat_id+'">'+
                                            '<div class="productset flex-fill ">'+
                                              '<div class="productsetimg">'+
                                                '<img src="http://localhost/ocake/tools/uploads/'+product.image+'" alt="img"/>'+
                                                '<div class="check-product">'+
                                                  '<i class="fa fa-check"></i>'+
                                                '</div>'+
                                              '</div>'+
                                              '<div class="productsetcontent">'+
                                                '<h5>'+product.occasion+' Cake</h5>'+
                                                '<h4>'+product.flavor+'</h4>'+
                                                '<h6>'+product.price+'</h6>'+
                                              '</div>'+
                                            '</div>'+
                                          '</div>'+
                                        '</div>');
                
              });
            }
          });
    }

    var modelContainer = [];

    function initTableInvoice(){
      var subtotal = 0;
      modelContainer=[];
      $.ajax({
            url: '<?= base_url('admin/pos/getInvoice') ?>',
            method: 'get',
            dataType: 'json',
            data:{invoice_numbers: $("#invoiceNumberId").val()},
            success: function(response) {
              let product_container = $("#prod_list");
              response.forEach((product) => {
                modelContainer.push({product_ids:product.product_id,stock:parseInt(product.stock)-parseInt(product.quantity)});
              subtotal += parseInt(product.totalAmount);
                product_container.append('<ul class="product-lists"><li>'+
                                        '<div class="productimg">'+
                                          '<div class="productimgs">'+
                                            '<img src="http://localhost/ocake/tools/uploads/'+product.image+'" alt="img" />'+
                                          '</div>'+
                                          '<div class="productcontet">'+
                                            '<h4>'+product.flavor+
                                              '<a href="javascript:void(0);" class="ms-2" data-bs-toggle="modal" data-bs-target="#edit">'+
                                              '<img src="<?=base_url()?>/tools/admin/assets/img/icons/edit-5.svg" alt="img"/></a>'+
                                            '</h4>'+
                                            '<div class="productlinkset">'+
                                              '<h5>'+product.occasion+' Cake</h5>'+
                                            '</div>'+
                                          '</div>'+
                                        '</div>'+
                                      '</li>'+
                                      '<li>'+product.price+'</li>'+
                                      '<li>'+product.quantity+'</li>'+
                                      '<li>'+product.totalAmount+'</li>'+
                                      '<li>'+
                                      '<a class="confirm-text" href="javascript:void(0);">'+
                                      '<img src="<?=base_url()?>/tools/admin/assets/img/icons/delete-2.svg" alt="img" /></a>'+
                                    '</li></ul>');
                $("#sub-total").html(subtotal);
                $("#subtotals").val(subtotal);
                
              });
            }
          });
    }

    $("body").on("click", "#productAddToCart", (e) =>
      addToCart($(e.currentTarget).data("id"))
    );

    function addToCart(product_id){
      var invoicenum = $("#invoiceNumberId").val();

      let formData = {invoicenumber: invoicenum, prod_id:product_id}

      $.ajax({
            url: '<?= base_url('admin/pos/invoiceAvailability') ?>',
            method: 'post',
            data: formData,
            dataType: 'json',
            success: function(response) {
              if(response.length==0){
                $.ajax({
                    url: '<?= base_url('admin/pos/selectProd') ?>',
                    method: 'post',
                    data: {p_id:product_id},
                    dataType: 'json',
                    success: function(response) {
                      let dataA = {invoice_number:invoicenum,product_id:product_id,quantity:1,totalAmount:response[0].price} 
                      $.ajax({
                          url: '<?= base_url('admin/pos/addtoinvoice') ?>',
                          method: 'post',
                          data: dataA,
                          dataType: 'json',
                          success: function(responses) {
                            $("#prod_list").empty();
                            initTableInvoice();
                          }
                        });
                    }
                  });
              }else{
                var newquantity = parseInt(response[0].quantity);
                var newtotal = parseFloat(response[0].totalAmount);
                var newproduct_id = parseFloat(response[0].product_id);
                $.ajax({
                    url: '<?= base_url('admin/pos/selectProd') ?>',
                    method: 'post',
                    data: {p_id:newproduct_id},
                    dataType: 'json',
                    success: function(responses) {
                      let dataA = {id:response[0].id,invoice_number:invoicenum,product_id:newproduct_id,quantity: newquantity + 1,totalAmount: newtotal + parseFloat(responses[0].price)} 
                      $.ajax({
                          url: '<?= base_url('admin/pos/updatetoinvoice') ?>',
                          method: 'post',
                          data: dataA,
                          dataType: 'json',
                          success: function(response) {
                            $("#prod_list").empty();
                            initTableInvoice();
                          }
                        });
                    }
                  });
                  }
            }
          });
      
    }

    function initData(){
      $.ajax({
            url: '<?= base_url('customers/index') ?>',
            method: 'get',
            dataType: 'json',
            success: function(response) {
              let optionData = $("#customer_id");
                optionData.append('<option>Choose Customer</option>');

              response.forEach((customer) => {

                optionData.append('<option value='+customer.id+'>'+customer.customer_fname +" "+customer.customer_mname+" "+customer.customer_lname+'</option>');
                
              });
            }
          });
    }

    $("#paymentmethod").click(async function(){
      const { value: amountPay } = await Swal.fire({
      title: "Input Amount to Pay",
      input: "text",
      inputLabel: "Payment",
      inputPlaceholder: "Amount",
    });

    if (amountPay >= parseFloat($("#subtotals").val())) {
      let change = amountPay - parseFloat($("#subtotals").val());
      Swal.fire({
        position: "center",
        icon: "success",
        title: "Transaction Completed",
        showConfirmButton: false,
        timer: 1500,
      });
      modelContainer.forEach((prod_id) => {
        let formdatas = {product_id:prod_id.product_ids,stock: prod_id.stock};
        $.ajax({
              url: '<?= base_url('admin/pos/updateProductStocks') ?>',
              method: 'post',
              data: formdatas,
              dataType: 'json',
              success: function(response) {

              }
            });
      });

        let formdata = {customer_id:$("#customer_id").val(),totalAmount: parseFloat($("#subtotals").val()), payable: parseFloat(amountPay), change: parseFloat(change), remarks:"REMARKS TO"};
      $.ajax({
            url: '<?= base_url('admin/pos/store') ?>',
            method: 'post',
            data: formdata,
            dataType: 'json',
            success: function(response) {
              Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
              }).then(
                $("#cashpay").html(amountPay),
                $("#cashchange").html(change),
                setTimeout(() => { 
                // window.location.reload();
                $("#printReciept").modal('show');
                }, 1000),
              );
            }
          });
    } else {
      Swal.fire({
        position: "center",
        icon: "warning",
        title: "Kulang Bayad Mo!",
        showConfirmButton: false,
        timer: 1500,
      });
      setTimeout(() => {
        $("#paymentmethod").click();
      }, 1000);
    }
  });

    $("#addCustomer").click(function(){
      let formData = $("#formMain").serializeArray();
      $.ajax({
            url: '<?= base_url('customers/save') ?>',
            method: 'post',
            data: formData,
            dataType: 'json',
            success: function(response) {
              Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
              }).then(
                $("#create").modal('hide'),
                $("#customer_id").empty(),
                initData(),
              )
            }
          });
    })
  })
</script>
