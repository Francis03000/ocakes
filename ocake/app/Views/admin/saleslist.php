<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">

    <title>Sales List</title>
    <script src="https://kit.fontawesome.com/8494b77c9c.js" crossorigin="anonymous"></script>
    
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>/tools/admin/assets/img/favicon.png">
    <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/css/animate.css">
    <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/css/bootstrap-datetimepicker.min.css">
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

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Sales List</h4>
                <h6>Manage your sales</h6>
                </div>
                    <div class="page-btn">
                        <a  href="<?=site_url('admin/pos')?>" class="btn btn-added"><img src="<?=base_url()?>/tools/admin/assets/img/icons/plus.svg" alt="img" class="me-1">Add Sales</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-top">
                            <div class="search-set">
                                <div class="search-path">
                                    <a class="btn btn-filter" id="filter_search">
                                    <img src="<?=base_url()?>/tools/admin/assets/img/icons/filter.svg" alt="img">
                                    <span><img src="<?=base_url()?>/tools/admin/assets/img/icons/closes.svg" alt="img"></span>
                                </a>
                            </div>
                            <div class="search-input">
                                <a class="btn btn-searchset"><img src="<?=base_url()?>/tools/admin/assets/img/icons/search-white.svg" alt="img"></a>
                            </div>
                        </div>
                        <div class="wordset">
                            <ul>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="<?=base_url()?>/tools/admin/assets/img/icons/pdf.svg" alt="img"></a>
                                </li>
                                <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="<?=base_url()?>/tools/admin/assets/img/icons/excel.svg" alt="img"></a>
                                </li>
                                <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="<?=base_url()?>/tools/admin/assets/img/icons/printer.svg" alt="img"></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card" id="filter_inputs">
                        <div class="card-body pb-0">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Reference No">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="select">
                                        <option>Completed</option>
                                        <option>Paid</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <a class="btn btn-filters ms-auto"><img src="<?=base_url()?>/tools/admin/assets/img/icons/search-whites.svg" alt="img"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table  datanew">
                            <thead>
                                <tr>
                                    <th>
                                        <label class="checkboxs">
                                        <input type="checkbox" id="select-all">
                                        <span class="checkmarks"></span>
                                        </label>
                                    </th>
                                    <th>Order Code</th>
                                    <th>Customer Name</th>
                                    <!-- <th>Date</th> -->
                                    <th>Items</th>
                                    <th>Total</th>
                                    <th>Payment</th>
                                    <th>Paid</th>
                                    <th>Balance</th>
                                    <!-- <th>Paid</th> -->
                                    <th>Status</th>
                                    <!-- <th>Due</th> -->
                                    <!-- <th>Biller</th> -->
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $num = 1;
                                    foreach($sales as $data){?>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td><?=$data->order_code;?></td>
                                    <td><?=$data->firstname;?> <?=$data->lastname;?></td>
                                    <td><?=$data->items;?>
                                        <?php if ($data->items > 1){
                                                echo "Items";
                                            }else{
                                                echo "Item";
                                        }?>
                                    </td>
                                    <!-- <td><?//=$data->date;?></td> -->
                                    <!-- <td><span class="badges bg-lightgreen">Completed</span></td> -->
                                    <td><?=$data->total_price;?></td>
                                    <td><span class="badges bg-lightgreen"><?=$data->payment;?></span></td>
                                    <td><?php echo '&#8369;' . number_format ($data->downpayment)?></td>
                                    <td><?php echo '&#8369;' . number_format ($data->balance)?></td>
                                    <td> 
                                        <div style="text-align:center">
                                            <input class="" type="button" 
                                            style="justify-content:center; border-radius:5px; color:#ffffff;
                                                <?php if($data->stat=="Pending"){
                                                    echo "background-color:#25b831; border-color:#25b831";
                                                }elseif($data->stat=="Confirmed"){
                                                    echo "background-color:#A7F432; border-color:#A7F432";
                                                }elseif($data->stat=="Processing"){
                                                    echo "background-color:orange; border-color:orange";
                                                }elseif($data->stat=="Shipped"){
                                                    echo "background-color:#03adfc; border-color:#03adfc";
                                                }elseif($data->stat=="Delivered"){
                                                    echo "background-color:#F25278; border-color:#F25278";
                                                }elseif($data->stat=="Completed"){
                                                    echo "background-color:#034efc; border-color:#034efc";
                                                }elseif($data->stat=="Cancelled"){
                                                    echo "background-color:#ed2f2f; border-color:#ed2f2f";
                                                } ?>
                                            " value="<?=$data->stat;?>">
                                        </div>
                                    </td>
                                    <!-- <td class="text-red">100.00</td> --> 
                                    <!-- <td>Admin</td> -->
                                    <td class="text-center">
                                        <a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                                <li>
                                                <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#detailModal<?php echo $data->checkout_id;?>"><img src="<?=base_url()?>/tools/admin/assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
                                                </li>
                                                <!-- <li>
                                                <a href="<?//=base_url()?>/edit-sales.html" class="dropdown-item"><img src="<?//=base_url()?>/tools/admin/assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
                                                </li> -->
                                                <li>
                                                <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $data->checkout_id;?>"><img src="<?=base_url()?>/tools/admin/assets/img/icons/edit.svg" class="me-2" alt="img">Update Status</a>
                                                </li>
                                                <li>
                                                <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#showpayment<?php echo $data->checkout_id;?>"><img src="<?=base_url()?>/tools/admin/assets/img/icons/dollar-square.svg" class="me-2" alt="img">Show Payments</a>
                                                </li>
                                                <li>
                                                <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#createpayment"><img src="<?=base_url()?>/tools/admin/assets/img/icons/plus-circle.svg" class="me-2" alt="img">Create Payment</a>
                                                </li>
                                                <li>
                                                <a href="javascript:void(0);" class="dropdown-item"><img src="<?=base_url()?>/tools/admin/assets/img/icons/download.svg" class="me-2" alt="img">Download pdf</a>
                                                </li>
                                                <li>
                                                <a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="<?=base_url()?>/tools/admin/assets/img/icons/delete1.svg" class="me-2" alt="img">Delete Sale</a>
                                                </li>
                                        </ul>
                                    </td>
                                    
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php foreach($sales as $data){?>
    <!-- Sale Detail Modal--->
    <div class="modal fade" id="detailModal<?php echo $data->checkout_id;?>" tabindex="-1" aria-labelledby="detailModal<?php echo $data->checkout_id;?>" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sale Detail</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <div class="p-3">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="info-body custom-responsive-margin">
                                        <span><b>Name:</b> </span><?php echo $data->firstname?> <?php echo $data->lastname?><br>
                                        <span><b>Order ID:</b> </span><?php echo $data->order_code?><br>
                                        <span><b>Contact:</b> </span><?php echo $data->mobile?><br>
                                        <span><b>Purchased Items:</b> </span><?php echo $data->items?><br>
                                        <span><b>Proof of Payment:</b> </span><br><img style="height:160px" src="http://localhost/ocake/tools/uploads/<?php echo $data->image;?>" alt="image"><br>
                                        <!-- <span><b>Reference Number:</b> </span><?//php echo $data->reference?><br> -->
                                        <!-- <span><b>Refund:</b> </span><?//php echo'&#8369;' . number_format ($data->refund)?><br> -->
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="info-body custom-responsive-margin">
                                        <span><b>Total Price:</b> </span><?php echo '&#8369;' . number_format ($data->total_price)?><br>
                                        <span><b>Down Payment:</b> <?php echo '&#8369;' . number_format ($data->downpayment)?></span><br>
                                        <span><b>Balance:</b><?php echo '&#8369;' . number_format ($data->balance)?> </span><br>
                                        <span><b>Payment Method:</b> </span><?php echo $data->payment_method?><br>
                                        <span><b>Delivery Method:</b> </span><?php echo $data->delivery_method?><br>
                                        <span><b>Scheduled Delivery Date:</b> </span><?php echo $data->date?><br>
                                        <span><b>Address:</b> </span><?php echo $data->street?>, <?php echo $data->barangay?>, <?php echo $data->municipality?><br>
                                    </div>                                                     
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    <div class="info-body custom-responsive-margin">
                                        <br><span style="float:right; border-radius:5px; color:#ffffff;
                                                <?php if($data->stat=="Pending"){
                                                    echo "background-color:#25b831; border-color:#25b831";
                                                }elseif($data->stat=="Confirmed"){
                                                    echo "background-color:#A7F432; border-color:#A7F432";
                                                }elseif($data->stat=="Processing"){
                                                    echo "background-color:orange; border-color:orange";
                                                }elseif($data->stat=="Shipped"){
                                                    echo "background-color:#03adfc; border-color:#03adfc";
                                                }elseif($data->stat=="Delivered"){
                                                    echo "background-color:#F25278; border-color:#F25278";
                                                }elseif($data->stat=="Completed"){
                                                    echo "background-color:#034efc; border-color:#034efc";
                                                }elseif($data->stat=="Cancelled"){
                                                    echo "background-color:#ed2f2f; border-color:#ed2f2f";
                                                } ?>
                                            "> <?php echo $data->stat?>
                                        </span><br>
                                            <?php if($data->stat == "Cancelled") {?>
                                                <span style="float:right;"><b>Reason:</b> <?php echo $data->reason; ?> </span>
                                            <br><span style="float:right;"><b>Refund:</b> <?php echo'&#8369;' . number_format ($data->refund)?></span>
                                            <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Status Modal--->
    <div class="modal fade" id="editModal<?php echo $data->checkout_id;?>" tabindex="-1" aria-labelledby="editModal<?php echo $data->checkout_id;?>" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Status</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                    <div class="modal-body">
                        <!-- <div class="table-responsive"> -->
                        <?php $validation = \Config\Services::validation();?>
                        <form class="container mt-2" action="<?php echo site_url('admin/saleslist/update_sales/' . $data->checkout_id); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                            <?php if(session('success')){ echo session('success');}else{ echo session('error');}?>
                            <div class="row">
                                <input type="hidden" name="checkout_id" value="<?php echo $data->checkout_id?>">
                                <label for="stat">Status:</label><br>
                                    <select name="stat" class="form-control" id="stat">
                                        <option
                                            <?php if($data->stat == "Pending"){ echo "selected"; }?>
                                            value="Pending">Pending</option>
                                        <option
                                            <?php if($data->stat == "Confirmed"){ echo "selected"; }?>
                                            value="Confirmed">Confirmed</option>
                                        <option
                                            <?php if($data->stat == "Processing"){ echo "selected"; }?>
                                            value="Processing">Processing</option>
                                        <option
                                            <?php if($data->stat == "Shipped"){ echo "selected"; }?>
                                            value="Shipped">Shipped</option>
                                        <option
                                            <?php if($data->stat == "Delivered"){ echo "selected"; }?>
                                            value="Delivered">Delivered</option>
                                        <option hidden
                                            <?php if($data->stat == "Completed"){ echo "selected"; }?>
                                            value="Completed">Completed</option>
                                                                                        
                                        <option hidden
                                            <?php if($data->stat == "Cancelled"){ echo "selected"; }?>
                                            value="Cancelled">Cancelled</option>
                                    </select>
                            </div>
                                                                    
                            <div class="modal-footer" style="justify-content:right">
                                <button type="button" class="btn btn-secondary btn-lg"
                                    data-dismiss="modal">Cancel</button>
                                    <input class="btn btn-success btn-lg" type="submit" value="Update" name="submit" style="width:100px">
                            </div>
                        </form>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="showpayment<?php echo $data->checkout_id;?>" tabindex="-1" aria-labelledby="showpayment<?php echo $data->checkout_id;?>" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Show Payments</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                        <span><b>Proof of Payment:</b> </span><br>
                            <div class="text-center">
                                <img  src="http://localhost/ocake/tools/uploads/<?php echo $data->image;?>" alt="image"><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createpayment" tabindex="-1" aria-labelledby="createpayment" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Customer</label>
                                <div class="input-groupicon">
                                    <input type="text" value="2022-03-07" class="datetimepicker">
                                    <div class="addonset">
                                    <img src="<?=base_url()?>/tools/admin/assets/img/icons/calendars.svg" alt="img">
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Reference</label>
                                <input type="text" value="INV/SL0101">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Received Amount</label>
                                <input type="text" value="0.00">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Paying Amount</label>
                                <input type="text" value="0.00">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Payment type</label>
                                <select class="select">
                                <option>Cash</option>
                                <option>Online</option>
                                <option>Inprogress</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-0">
                                <label>Note</label>
                                <textarea class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-submit">Submit</button>
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editpayment" tabindex="-1" aria-labelledby="editpayment" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Payment</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Customer</label>
                                <div class="input-groupicon">
                                    <input type="text" value="2022-03-07" class="datetimepicker">
                                    <div class="addonset">
                                        <img src="<?=base_url()?>/tools/admin/assets/img/icons/datepicker.svg" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Reference</label>
                                <input type="text" value="INV/SL0101">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Received Amount</label>
                                <input type="text" value="0.00">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Paying Amount</label>
                                <input type="text" value="0.00">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Payment type</label>
                                <select class="select">
                                <option>Cash</option>
                                <option>Online</option>
                                <option>Inprogress</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-0">
                                <label>Note</label>
                                <textarea class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-submit">Submit</button>
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php }?>

<script src="<?=base_url()?>/tools/admin/assets/js/jquery-3.6.0.min.js"></script>
<script src="<?=base_url()?>/tools/admin/assets/js/feather.min.js"></script>
<script src="<?=base_url()?>/tools/admin/assets/js/jquery.slimscroll.min.js"></script>
<script src="<?=base_url()?>/tools/admin/assets/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>/tools/admin/assets/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>/tools/admin/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url()?>/tools/admin/assets/plugins/select2/js/select2.min.js"></script>
<script src="<?=base_url()?>/tools/admin/assets/js/moment.min.js"></script>
<script src="<?=base_url()?>/tools/admin/assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?=base_url()?>/tools/admin/assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="<?=base_url()?>/tools/admin/assets/plugins/sweetalert/sweetalerts.min.js"></script>
<script src="<?=base_url()?>/tools/admin/assets/js/script.js"></script>
</body>
</html>