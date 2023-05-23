<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <meta name="description" content="POS - Bootstrap Admin Template" />
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects" />
    <meta name="author" content="Dreamguys - Bootstrap Admin Template" />
    <meta name="robots" content="noindex, nofollow" />

    <title>Dreams Pos admin template</title>
    <script src="https://kit.fontawesome.com/8494b77c9c.js" crossorigin="anonymous"></script>

    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>/tools/admin/assets/img/favicon.png" />
    <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/css/animate.css" />
    <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/plugins/owlcarousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/plugins/owlcarousel/owl.theme.default.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/plugins/select2/css/select2.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/plugins/fontawesome/css/fontawesome.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/plugins/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/css/style.css" />

    <style>
    #receipt_modal {
        background-image: url('<?=base_url()?>/tools/uploads/cake-bg.jpg');
        background-repeat: no-repeat;
        background-size: cover;

    }

    */
    </style>
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
                            <div class="d-flex justify-content-end">
                                <div class="col-lg-12">
                                    <div class="select-split">
                                        <div class="select-group w-100">
                                            <select class="select" id="product_availability"
                                                name="product_availability">
                                                <option value="0">All Products</option>
                                                <option value="1">Ready Made</option>
                                                <option value="2">Pre Order</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <ul class="tabs owl-carousel owl-theme owl-product border-0">
                            <?php foreach($category as $data){?>
                            <li id="<?php echo $data->category_id;?>" name="cat" class="categ">
                                <input hidden id="id" value="<?php echo $data->category_id;?>" />
                                <a class="product-details">
                                    <img src="http://localhost/ocake/tools/uploads/<?php echo $data->cat_image;?>"
                                        style="height:50px" alt="img" />
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
                                        <a href="javascript:void(0);" class="btn btn-adds" data-bs-toggle="modal"
                                            data-bs-target="#create"><i class="fa fa-plus me-2"></i>Add Customer</a>
                                    </div>
                                    <!-- <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Product Code</label>
                                            <input type="text" placeholder="Scanned Product code goes here."
                                                autofocus />
                                        </div>
                                    </div> -->
                                    <div class="col-lg-12">
                                        <div class="select-split">
                                            <div class="select-group w-100">
                                                <select class="select" id="customer_id" name="customer_id">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
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
                                <div class="product-table" id="prod_list">
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
                                            <button id="paymentmethod" class="paymentmethod">
                                                <img src="<?=base_url()?>/tools/admin/assets/img/icons/cash.svg"
                                                    alt="img" class="me-2" />
                                                Cash
                                            </button>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="paymentmethod" id="gcashpic">
                                                <img src="<?=base_url()?>/tools/admin/assets/img/icons/scan.svg"
                                                    alt="img" class="me-2" />
                                                Scan
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12" id="preorderprod">
                                    <a href="javascript:void(0);" class="btn btn-adds" data-bs-toggle="modal"
                                        data-bs-target="#preorder"><i class="fa fa-plus me-2"></i>Add Pre Order
                                        Detail</a>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Remarks</label>
                                        <textarea name="remarks" id="remarks" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="btn-pos">
                                    <ul>
                                        <li>
                                            <a class="btn" data-bs-toggle="modal" id="calcuT"><img
                                                    src="<?=base_url()?>/tools/admin/assets/img/icons/transcation.svg"
                                                    alt="img" class="me-1" />
                                                Calculator</a>
                                        </li>
                                        <li>
                                            <a class="btn" data-bs-toggle="modal" data-bs-target="#recents"
                                                id="history"><img
                                                    src="<?=base_url()?>/tools/admin/assets/img/icons/transcation.svg"
                                                    alt="img" class="me-1" />
                                                Transaction</a>
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
                    <h5 class="modal-title">Calculator</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
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
                                <a href="javascript:void(0);" data-id="1" id="cal">*</a>
                                <a href="javascript:void(0);" data-id="1" id="cal">/</a>

                            </li>
                            <li>
                                <a href="javascript:void(0);" data-id="1" id="cal">-</a>


                            </li>
                            <li>
                                <a href="javascript:void(0);" data-id="1" id="cal">+</a>
                            </li>

                            <li>
                                <a href="javascript:void(0);" data-id="1" id="cal">1</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-id="1" id="cal">2</a>
                            </li>

                            <li>
                                <a href="javascript:void(0);" data-id="1" id="cal">3</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-id="1" id="cal">4</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-id="1" id="cal">5</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-id="1" id="cal">6</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-id="1" id="cal">7</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-id="1" id="cal">8</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-id="1" id="cal">9</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-id="1" id="cal">00</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">0</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-id="1" id="cal">.</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="clear-calculator-total bg-warning">CLEAR</a>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="delete-single-value bg-danger">x</a>
                            </li>
                            <li>
                                <a class="equal-total bg-success"> = </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="recents" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Recent Transactions</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Ready Made</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">Pre Order</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Invoice Number</th>
                                            <th>Customer Fullname</th>
                                            <th>Total Amount Purchase</th>
                                            <th>Transaction Date</th>
                                        </tr>
                                    </thead>
                                    <tbody id="transhis"></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Invoice Number</th>
                                            <th>Customer Fullname</th>
                                            <th>Total Amount Purchase</th>
                                            <th>Status</th>
                                            <th>Transaction Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="transhispreord"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="gcash" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">GCASH QR CODE</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <center><img src="<?=base_url()?>/tools/uploads/reference.jpg" alt="img" class="me-1"
                                    style="height:550px;" /></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="create" tabindex="-1" aria-labelledby="create" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Customer</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formMain">
                        <div class="row">
                            <div class="col-lg-4 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Customer FirstName</label>
                                    <input type="text" id="customer_fname" name="customer_fname" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Customer MiddleName</label>
                                    <input type="text" id="customer_mname" name="customer_mname" />
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Customer LastName</label>
                                    <input type="text" id="customer_lname" name="customer_lname" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" id="customer_email" name="customer_email" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" id="customer_contact" name="customer_contact" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input type="text" id="customer_country" name="customer_country" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" id="customer_address" name="customer_address" />
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

    <div class="modal fade" id="preorder" tabindex="-1" aria-labelledby="preorder" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pre Order Detail</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formMain">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Choose Mode of Transaction</label>
                                    <select name="modeoftransaction" id="modeoftransaction" class="select">
                                        <option value="0">Choose</option>
                                        <option value="1">Pick Up</option>
                                        <option value="2">Deliver</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="shop_add">
                            <div class="col-lg-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Shop Address</label>
                                    <input type="text" id="shop_address" name="shop_address" readonly
                                        value="General Tinio Nueva Ecija" />
                                </div>
                            </div>
                        </div>
                        <div class="row" id="deliver_add">
                            <div class="col-lg-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Delivery Address</label>
                                    <input type="text" id="delivery_address" name="delivery_address" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input class="form-control" type="date" id="date_pickup_or_deliver"
                                        name="date_pickup_or_deliver" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Time</label>
                                    <input class="form-control" type="time" id="time_pickup_or_deliver"
                                        name="time_pickup_or_deliver" />
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="col-lg-12">
                        <a class="btn btn-submit me-2" id="proc">Proceed</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="upstat" tabindex="-1" aria-labelledby="upstat" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Transaction Status</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formMain">
                        <input type="hidden" name="transid" id="transid">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Choose Status</label>
                                    <select name="modeoftransaction" id="transstat" class="select">
                                        <option value="0">Choose</option>
                                        <option value="1">Done</option>
                                        <option value="2">Pending / OnProcess</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="col-lg-12">
                        <a class="btn btn-submit me-2" id="upstatus">Update</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="printReciept" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="printReciept" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div id="printR">
                    <div class="modal-header bg-white">
                        <img style="height:100px; width: 100px; "
                            src="http://localhost/ocake/tools/uploads/ocake_logo2.gif/">
                        <div class="row " style="width: 70%; margin: auto">
                            <div class="col" style="padding-right: 70px;">
                                <h2 class="fw-medium m-0" style="font-family: Lucida Handwriting; color: #FF1493">OCAKES
                                </h2>
                                <p class="m-0">Address: General Tinio Barcenaga </p>
                                <p class="m-0">Municipality: Naujan</p>
                                <p class="m-0">Phone: 09261364720</p>
                            </div>
                            <div class="col">
                                <h2 class="fw-medium m-0" style="font-family: Lucida Handwriting; color: #FF1493">
                                    INVOICE
                                </h2>
                                <p class="m-0">Date: <?php echo date("m/d/Y"); ?></p>
                                <p class="m-0">Invoice #: <span id="inv"></span></p>

                            </div>

                        </div>

                        <img style="height:100px; width: 100px; "
                            src="http://localhost/ocake/tools/uploads/ocake_logo2.gif/">


                    </div>
                    <div class="modal-body" id="receipt_modal">

                        <div class="row">
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Bill To</h3>
                                    </div>
                                    <div class="card-body">
                                        <p>Name: <span id="cusname"></span></p>

                                    </div>
                                </div>
                            </div>


                        </div>

                        <table class="table table-bordered bg-white">

                            <thead class="bg-danger-subtle">
                                <tr>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Line Total</th>
                                </tr>
                            </thead>

                            <tbody id="prod_pur"></tbody>
                            <br>


                        </table>

                        <br>
                        <h3 class="text-center ">Thank You For Your Purchase!</h3>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="printthis">Print</button>
                </div>
            </div>
        </div>
    </div>


    <?php foreach($prod as $data){?>
    <script>
    function myFunction() {
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
$(document).ready(function() {



    $("#paymentmethod").prop('disabled', true);

    $("#gcashpic").click(function() {
        $("#gcash").modal('show');
    })

    date_pickup_or_deliver.min = new Date().toISOString().split("T")[0];

    $("#shop_add").hide();
    $("#deliver_add").hide();

    $("#modeoftransaction").change(function() {
        if ($("#modeoftransaction").val() === "1") {
            $("#deliver_add").hide();
            $("#shop_add").show();
        } else if ($("#modeoftransaction").val() === "2") {
            $("#shop_add").hide();
            $("#deliver_add").show();
        }
    })

    initData();
    initProductContainer();

    initTableInvoice();

    $("#proc").click(function() {
        $("#preorder").modal('hide');
    });


    $("#printthis").click(function() {
        const printContents = document.getElementById("printR").innerHTML;
        const originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    });

    window.addEventListener("afterprint", (event) => {
        window.location.reload();
    });


    let attriTrans = ["inv_num", "fullName", "totalAmount", "status", "created_at", "act"];

    $("#history").click(function() {
        initTransHistory();
    });

    function initTransHistory() {
        let tablename = $("#transhis").empty();
        $.ajax({
            url: '<?= base_url('admin/pos/invoicebillposhistory') ?>',
            method: 'get',
            data: {
                isPickup: 0
            },
            dataType: 'json',
            success: function(response) {
                response.forEach((history) => {
                    let tabrow = $("<tr>");
                    const attriMap = new Map(Object.entries(history));
                    attriTrans.forEach((attri, i) => {
                        if (attri === "fullName") {
                            $("<td>", {
                                class: "text-wrap",
                                html: attriMap.get("customer_fname") + " " +
                                    attriMap.get("customer_mname") + " " +
                                    attriMap.get("customer_lname"),
                            }).appendTo(tabrow);
                        } else if (attri !== "status" && attri !== "act") {
                            $("<td>", {
                                class: "text-wrap",
                                html: attriMap.get(attri),
                            }).appendTo(tabrow);
                        }
                        tablename.append(tabrow);
                    });
                });
            }
        });
    }

    $("#pills-profile-tab").click(function() {
        initTransHistories();
    })

    function initTransHistories() {
        let tablename = $("#transhispreord").empty();
        $.ajax({
            url: '<?= base_url('admin/pos/invoicebillposhistory') ?>',
            method: 'get',
            data: {
                isPickup: 1
            },
            dataType: 'json',
            success: function(response) {

                response.forEach((history) => {
                    let tabrow = $("<tr>");
                    const attriMap = new Map(Object.entries(history));
                    attriTrans.forEach((attri, i) => {
                        if (attri === "fullName") {
                            $("<td>", {
                                class: "text-wrap",
                                html: attriMap.get("customer_fname") + " " +
                                    attriMap.get("customer_mname") + " " +
                                    attriMap.get("customer_lname"),
                            }).appendTo(tabrow);
                        } else if (attri === "status") {

                            let tds = $("<td>", {
                                class: "text-wrap",
                            });

                            if (attriMap.get("status") === "1") {

                                tds.append(
                                    '<span class="badge rounded-pill bg-success">Done</span>'
                                );

                                tds.appendTo(tabrow);

                            } else if (attriMap.get("status") === "2") {

                                tds.append(
                                    '<span class="badge rounded-pill bg-warning">Pending / OnProcess</span>'
                                );

                                tds.appendTo(tabrow);

                            }

                        } else if (attri === "act") {
                            let actbtn = $("<td>", {
                                class: "text-wrap",
                            });
                            actbtn.append(
                                '<button type="button" class="btn btn-primary btn-sm" id="updateStatusBtn" data-id="' +
                                history.pos_id +
                                '"><i class="fa fa-pencil"></i></button>');
                            actbtn.appendTo(tabrow);
                        } else {
                            $("<td>", {
                                class: "text-wrap",
                                html: attriMap.get(attri),
                            }).appendTo(tabrow);
                        }
                        tablename.append(tabrow);
                    });
                });
            }
        });
    }


    $("body").on("click", "#updateStatusBtn", (e) => {
        $("#transid").val($(e.currentTarget).data("id"));
        $("#upstat").modal('show');
    });

    $("#upstatus").click(function() {
        $.ajax({
            url: '<?= base_url('admin/pos/upstatus') ?>',
            method: 'post',
            data: {
                pos_id: parseInt($("#transid").val()),
                status: parseInt($("#transstat").val())
            },
            dataType: 'json',
            success: function(response) {
                initTransHistories();
                $("#upstat").modal('hide');
            }
        });
    });


    function initProductContainer() {
        $.ajax({
            url: '<?= base_url('admin/pos/products-list') ?>',
            method: 'get',
            data: {
                availability: $("#product_availability").val()
            },
            dataType: 'json',
            success: function(response) {
                let product_container = $("#product_container");
                response.forEach((product) => {

                    product_container.append(
                        '<div class="col-lg-3 col-sm-6 d-flex" id="productAddToCart" data-id="' +
                        product.id + '">' +
                        '<div class="tab_content active" data-tab="' + product.cat_id +
                        '">' +
                        '<div class="productset flex-fill ">' +
                        '<div class="productsetimg">' +
                        '<img src="http://localhost/ocake/tools/uploads/' + product
                        .image + '" alt="img"/>' +
                        '<div class="check-product">' +
                        '<i class="fa fa-check"></i>' +
                        '</div>' +
                        '</div>' +
                        '<div class="productsetcontent">' +
                        '<h5>' + product.occasion + ' Cake</h5>' +
                        '<h4>' + product.flavor + '</h4>' +
                        '<h6>' + product.price + '</h6>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>');

                });
            }
        });
    }

    $("#preorderprod").hide();

    $("#product_availability").change(function() {
        $(".categ").removeClass('active');
        $("#product_container").empty();
        initProductContainer();

        if ($("#product_availability").val() === "2") {
            $("#preorderprod").show();
        } else if ($("#product_availability").val() === "1") {
            $("#preorderprod").hide();
        }
    })

    var modelContainer = [];

    availabilitypreord = 0;

    function initTableInvoice() {
        var subtotal = 0;
        modelContainer = [];
        $("#prod_list").empty();
        $.ajax({
            url: '<?= base_url('admin/pos/getInvoice') ?>',
            method: 'get',
            dataType: 'json',
            data: {
                invoice_numbers: $("#invoiceNumberId").val()
            },
            success: function(response) {
                let product_container = $("#prod_list");
                response.forEach((product) => {
                    modelContainer.push({
                        product_ids: product.product_id,
                        stock: parseInt(product.stock) - parseInt(product.quantity)
                    });
                    subtotal += parseInt(product.totalAmount);

                    if (product.availability === "Pre Order") {
                        availabilitypreord = 1;
                    }
                    product_container.append('<ul class="product-lists"><li>' +
                        '<div class="productimg">' +
                        '<div class="productimgs">' +
                        '<img src="http://localhost/ocake/tools/uploads/' + product
                        .image + '" alt="img" />' +
                        '</div>' +
                        '<div class="productcontet">' +
                        '<h4>' + product.flavor +
                        '<a href="javascript:void(0);" class="ms-2" data-bs-toggle="modal" data-bs-target="#edit">' +
                        '<img src="<?=base_url()?>/tools/admin/assets/img/icons/edit-5.svg" alt="img"/></a>' +
                        '</h4>' +
                        '<div class="productlinkset">' +
                        '<h5>' + product.occasion + ' Cake</h5>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</li>' +
                        '<li>' + product.price + '</li>' +
                        '<li>' + product.quantity + '</li>' +
                        '<li>' + product.totalAmount + '</li>' +
                        '<li>' +
                        '<a class="confirm-text" data-id="' + product.invid +
                        '" id="delete-invoice">' +
                        '<img src="<?=base_url()?>/tools/admin/assets/img/icons/delete-2.svg" alt="img" /></a>' +
                        '</li></ul>');
                    $("#sub-total").html(subtotal);
                    $("#subtotals").val(subtotal);

                    if (availabilitypreord === 1) {
                        $("#preorderprod").show();
                    } else {
                        $("#preorderprod").hide();
                    }

                });

                $("#sub-total").html(subtotal);
                $("#subtotals").val(subtotal);
                if (modelContainer.length != 0) {
                    $('#paymentmethod').prop('disabled', false);
                }
            }
        });

    }

    $("body").on("click", "#productAddToCart", (e) =>
        addToCart($(e.currentTarget).data("id"))
    );

    $("body").on("click", "#delete-invoice", (e) => {
        Swal.fire({
            title: 'Are you sure you want to remove this product on your cart ?',
            showCancelButton: true,
            confirmButtonText: 'OK',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url('admin/pos/deleteinvoice') ?>',
                    method: 'post',
                    data: {
                        invid: $(e.currentTarget).data("id")
                    },
                    dataType: 'json',
                    success: function(response) {
                        initTableInvoice();
                    }
                });
            } else {
                Swal.fire({
                    position: 'center',
                    icon: 'info',
                    title: 'Changes are not saved',
                    showConfirmButton: false,
                    timer: 1000
                })
            }
        });
    })

    function addToCart(product_id) {
        var invoicenum = $("#invoiceNumberId").val();

        let formData = {
            invoicenumber: invoicenum,
            prod_id: product_id
        }

        $.ajax({
            url: '<?= base_url('admin/pos/invoiceAvailability') ?>',
            method: 'post',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.length == 0) {
                    $.ajax({
                        url: '<?= base_url('admin/pos/selectProd') ?>',
                        method: 'post',
                        data: {
                            p_id: product_id
                        },
                        dataType: 'json',
                        success: function(response) {
                            let dataA = {
                                invoice_number: invoicenum,
                                product_id: product_id,
                                quantity: 1,
                                totalAmount: response[0].price
                            }
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
                } else {
                    var newquantity = parseInt(response[0].quantity);
                    var newtotal = parseFloat(response[0].totalAmount);
                    var newproduct_id = parseFloat(response[0].product_id);
                    $.ajax({
                        url: '<?= base_url('admin/pos/selectProd') ?>',
                        method: 'post',
                        data: {
                            p_id: newproduct_id
                        },
                        dataType: 'json',
                        success: function(responses) {
                            let dataA = {
                                id: response[0].id,
                                invoice_number: invoicenum,
                                product_id: newproduct_id,
                                quantity: newquantity + 1,
                                totalAmount: newtotal + parseFloat(responses[0]
                                    .price)
                            }
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

    function initData() {
        $.ajax({
            url: '<?= base_url('customers/index') ?>',
            method: 'get',
            dataType: 'json',
            success: function(response) {
                let optionData = $("#customer_id");
                optionData.append('<option>Choose Customer</option>');

                response.forEach((customer) => {

                    optionData.append('<option value=' + customer.id + '>' + customer
                        .customer_fname + " " + customer.customer_mname + " " + customer
                        .customer_lname + '</option>');

                });
            }
        });
    }

    $("#paymentmethod").click(async function() {
        const {
            value: amountPay
        } = await Swal.fire({
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
                let formdatas = {
                    product_id: prod_id.product_ids,
                    stock: prod_id.stock
                };
                $.ajax({
                    url: '<?= base_url('admin/pos/updateProductStockss') ?>',
                    method: 'post',
                    data: formdatas,
                    dataType: 'json',
                    success: function(response) {

                    }
                });
            });

            let formdata;


            var add = "";
            if ($("#modeoftransaction").val() === "1") {
                add = $("#shop_address").val();
            } else if ($("#modeoftransaction").val() === "2") {
                add = $("#delivery_address").val();
            }


            if ($("#product_availability").val() === "1" || availabilitypreord == 0) {
                formdata = {
                    inv_num: $("#invoiceNumberId").val(),
                    customer_id: $("#customer_id").val(),
                    totalAmount: parseFloat($("#subtotals").val()),
                    payable: parseFloat(amountPay),
                    change: parseFloat(change),
                    remarks: $("#remarks").val(),
                    isPreOrder: "0"
                };
            } else if ($("#product_availability").val() === "2" || availabilitypreord == 1) {
                formdata = {
                    inv_num: $("#invoiceNumberId").val(),
                    customer_id: $("#customer_id").val(),
                    totalAmount: parseFloat($("#subtotals").val()),
                    payable: parseFloat(amountPay),
                    change: parseFloat(change),
                    remarks: $("#remarks").val(),
                    pre_order_address: add,
                    isPickup: parseInt($("#modeoftransaction").val()),
                    time_pickup_or_deliver: $("#time_pickup_or_deliver").val(),
                    date_pickup_or_deliver: $("#date_pickup_or_deliver").val(),
                    isPreOrder: "1"
                };
            }

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
                            getrecieptdata();
                        }, 3000),
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

    let recieptAttr = [
        "product_name",
        "quantity",
        "price",
        "totalAmount",
        "subtotal"
    ];

    function getrecieptdata() {
        let prod_pur_body = $("#prod_pur").empty();
        var totalamount = 0;
        $.ajax({
            url: '<?= base_url('admin/pos/invoicebill') ?>',
            method: 'post',
            data: {
                invoice_number: $("#invoiceNumberId").val()
            },
            dataType: 'json',
            success: function(response) {
                $("#inv").html(response[0].invoice_number);
                response.forEach((purchaseval) => {
                    let tabrow = $("<tr>");
                    const attriMap = new Map(Object.entries(purchaseval));
                    recieptAttr.forEach((attri, i) => {
                        if (attri != "subtotal") {
                            $("<td>", {
                                class: "text-wrap",
                                html: attriMap.get(attri),
                            }).appendTo(tabrow);
                        } else if (attri == "subtotal") {
                            totalamount += parseFloat(attriMap.get("totalAmount"));
                        }
                        prod_pur_body.append(tabrow);
                    });
                    // $("<td>", {
                    //     class: "text-wrap",
                    //     html: attriMap.get(attri),
                    // }).appendTo(tableRow);
                    // tabrow.append('<td>'+purchaseval.product_name+'<br>'+purchaseval.occasion+' Cake</td>');
                    // tabrow.append('<td>'+purchaseval.quantity+'</td>');
                    // tabrow.append('<td>'+purchaseval.price+'</td>');
                    // tabrow.append('<td>'+purchaseval.totalAmount+'</td>');
                    // prod_pur_body.append(tabrow);
                });

                let tabrow = $("<tr>");
                var payable = 0;
                var change = 0;
                tabrow.append(
                    '<td colspan="3" >SubTotal:</td>'
                );
                tabrow.append(
                    '<td >' + totalamount + "</td>"
                );
                prod_pur_body.append(tabrow);


                $.ajax({
                    url: '<?= base_url('admin/pos/invoicebillpos') ?>',
                    method: 'post',
                    data: {
                        invoice_number: $("#invoiceNumberId").val()
                    },
                    dataType: 'json',
                    success: function(responses) {

                        $("#cusname").html(responses[0].customer_fname + " " +
                            responses[0].customer_mname + " " + responses[0]
                            .customer_lname);
                        let tabrowss = $("<tr>");
                        tabrowss.append(
                            '<td colspan="3" >Payable:</td>'
                        );
                        tabrowss.append(
                            '<td >' + responses[0].payable + "</td>"
                        );

                        prod_pur_body.append(tabrowss);

                        let tabrowsss = $("<tr>");

                        tabrowsss.append(
                            '<td colspan="3" >Change:</td>'
                        );
                        tabrowsss.append(
                            '<td >' + responses[0].change + "</td>"
                        );

                        prod_pur_body.append(tabrowsss);
                    }
                });

                $("#printReciept").modal('show');
            }
        });
    }

    $("#addCustomer").click(function() {
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
                    $("#cashpay").html(amountPay),
                    $("#cashchange").html(change),
                    setTimeout(() => {
                        window.location.reload();
                        // $("#printReciept").modal('show');
                    }, 500),
                );
            }
        });
    });

    //CALCULATOR script
    $("#calcuT").click(function() {
        $("#calculator").modal('show');

        const display = document.querySelector(".calculatortotal h4");
        const buttons = document.querySelectorAll(".calculator-set ul li a");
        let total = 0;
        let display_is_Zero = true;

        buttons.forEach((button) => {
            button.addEventListener("click", buttonClick);
        });

        function buttonClick() {
            if (display_is_Zero) {
                display.innerText = "";
                display_is_Zero = false;
            }

            const value = this.innerText;

            if (!isNaN(value) || value === ".") {
                display.innerText += value;
            } else if (value === "+" || value === "-" || value === "*" || value === "/") {
                display.innerText += value;
            } else if (value === "CLEAR") {
                display.innerText = "0";
                display_is_Zero = true;
            } else if (value === "x") {
                display.innerText = display.innerText.slice(0, -1);
                if (display.innerText === "") {
                    display.innerText = "0";
                    display_is_Zero = true;
                }
            } else if (value === "=") {
                try {
                    total = eval(display.innerText);
                    display.innerText = total;
                } catch (error) {
                    display.innerText = "Error";
                }
            }
        }

        $('#calculator').on('hidden.bs.modal', function() {
            buttons.forEach((button) => {
                button.removeEventListener("click", buttonClick);
            });
            display.innerText = "0";
            display_is_Zero = true;
        });
    });







});
</script>