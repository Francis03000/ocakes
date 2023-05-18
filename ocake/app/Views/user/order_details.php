<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Order Details</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="<?=site_url('home')?>"><i class="lni lni-home"></i> Home</a></li>
                    <li><a href="<?=site_url('orders')?>">Orders</a></li>
                    <li>Order Details</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="http://localhost/ocake/tools/user/css/order.css" rel="stylesheet">
        <link href="http://localhost/ocake/tools/user/css/orderdetails.css" rel="stylesheet">

<div class="shopping-cart section">
    <div class="container">
   
        <div class="cart-list-head">
            <div class="cart-list-title">
                <div class="row">
                    <div>
                        <h6 class="m-0 font-weight-bold" style="color:#cda808;"> Shipping Details</h6>
                    </div>
                </div>
            </div>
            <div class="cart-single-list">
                <div class="row">
                    <div>
                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
                        <div class="container padding-bottom-3x mb-1">
                            <div class="card mb-1">
                                <div class="p-3 text-center text-lg  rounded-top" style="background-color:#0d0e0f; color:#cda808;"><span class="text-uppercase">Tracking Order No - </span><span class="text-medium">
                                    <?php foreach($stat as $data){?>
                                        <?php echo $data->order_code;?>
                                    <?php }?></span>
                                </div>
                                    <div class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-2 px-2 bg-secondary">
                                        <?php foreach($status as $datum){?>
                                                <div class="w-100 text-center py-1 px-2"><span class="text-medium">Shipped Via:</span> UPS Ground</div>
                                                <div class="w-100 text-center py-1 px-2"><span class="text-medium">Status:</span><?php echo $data->stat;?></div>
                                                <div class="w-100 text-center py-1 px-2"><span class="text-medium">Expected Date:</span><?php echo $datum->date;?> </span><?php echo $datum->time;?></div>
                                        <?php }?>  
                                    </div>
                                    <div class="card-body">
                                        <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                                            <div class="step completed">
                                                <div class="step-icon-wrap" >
                                                <div class="step-icon"><i class="pe-7s-medal"></i></div>
                                                </div>
                                                <h4 class="step-title">Pending Order</h4>
                                            </div>
                                                <?php foreach($stat as $data){?>
                                                    <?php if($data->stat == "Confirmed" || $data->stat == "Processing" || $data->stat == "Shipped" || $data->stat == "Delivered" ){ 
                                                            echo
                                                                '<div class="step completed">
                                                                    <div class="step-icon-wrap">
                                                                    <div class="step-icon"><i class="pe-7s-cart"></i></div>
                                                                    </div>
                                                                    <h4 class="step-title">Confirmed Order</h4>
                                                                </div>';
                                                        }else{
                                                            echo
                                                                '<div class="step">
                                                                    <div class="step-icon-wrap">
                                                                    <div class="step-icon"><i class="pe-7s-cart"></i></div>
                                                                    </div>
                                                                    <h4 class="step-title">Confirmed Order</h4>
                                                                </div>';
                                                    }?>

                                                    <?php if($data->stat == "Processing" || $data->stat == "Shipped" || $data->stat == "Delivered" ){ 
                                                            echo
                                                                '<div class="step completed">
                                                                    <div class="step-icon-wrap">
                                                                    <div class="step-icon"><i class="pe-7s-config"></i></div>
                                                                    </div>
                                                                    <h4 class="step-title">Processing Order</h4>
                                                                </div>';
                                                        }else{
                                                            echo
                                                                '<div class="step">
                                                                    <div class="step-icon-wrap">
                                                                    <div class="step-icon"><i class="pe-7s-config"></i></div>
                                                                    </div>
                                                                    <h4 class="step-title">Processing Order</h4>
                                                                </div>';
                                                    }?>

                                                    <?php if($data->stat == "Shipped" || $data->stat == "Delivered" ){ 
                                                            echo
                                                                '<div class="step completed">
                                                                    <div class="step-icon-wrap">
                                                                    <div class="step-icon"><i class="pe-7s-car"></i></div>
                                                                    </div>
                                                                    <h4 class="step-title">Product Dispatched</h4>
                                                                </div>';
                                                        }else{
                                                            echo
                                                                '<div class="step">
                                                                    <div class="step-icon-wrap">
                                                                    <div class="step-icon"><i class="pe-7s-car"></i></div>
                                                                    </div>
                                                                    <h4 class="step-title">Product Dispatched</h4>
                                                                </div>';
                                                    }?>

                                                    <?php if($data->stat == "Delivered" ){ 
                                                            echo
                                                                '<div class="step completed">
                                                                    <div class="step-icon-wrap">
                                                                    <div class="step-icon"><i class="pe-7s-home"></i></div>
                                                                    </div>
                                                                    <h4 class="step-title">Product Delivered</h4>
                                                                </div>';
                                                        }else{
                                                            echo
                                                                '<div class="step">
                                                                    <div class="step-icon-wrap">
                                                                    <div class="step-icon"><i class="pe-7s-home"></i></div>
                                                                    </div>
                                                                    <h4 class="step-title">Product Delivered</h4>
                                                                </div>';
                                                    }?>
                                                <?php }?>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="d-flex flex-wrap flex-md-nowrap justify-content-center justify-content-sm-between align-items-center">
                                    <div class="custom-control custom-checkbox mr-3">
                                        <input class="custom-control-input" type="checkbox" id="notify_me" checked="">
                                        <label class="custom-control-label" for="notify_me">Notify me when order is delivered</label>
                                    </div>
                                    <div class="text-left text-sm-right"><a class="btn btn-outline-primary btn-rounded btn-sm" href="orderDetails" data-toggle="modal" data-target="#orderDetails">View Order Details</a></div>
                                    </div>
                                </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="total-amount">
                    <div class="row">
                        <div class="col-lg-5 col-md-6 col-12">
                            <div class="right">
                                <h6 class="font-weight-bold" style="color:#cda808;"> Transaction Details</h6>
                                <div class="checkout-sidebar-price-table mt-10">
                                    <h5 class="title">Shipping Address</h5>
                                    <div >
                                        <div>
                                            <label for="Name">Name: <?php echo $datum->firstname;?> <?php echo $datum->lastname;?></label><br>
                                            <label for="Address">Addresss: <?php echo $datum->street;?>, <?php echo $datum->barangay;?>, <?php echo $datum->municipality;?></label><br>
                                            <label for="Phone Number"> Phone Number: <?php echo $datum->mobile;?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout-sidebar-price-table mt-10">
                                    <h5 class="title">Order Details</h5>
                                    <div >
                                        <?//php foreach($order as $data){?>
                                        <div>
                                        <label for="Payment Method">Payment Method: <?php echo $datum->payment_method?></label><br>
                                        <label for="Delivery Method">Delivery Method: <?php echo $datum->delivery_method?></label><br>
                                        <label for="Scheduled Delivery Date">Scheduled Delivery Date: <?php echo $datum->date?> </span><?php echo $datum->time;?></label><br>
                                        </div>
                                        <?//php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6 col-12">
                            <div class="right mb-4">
                            <h6 class="m-0 font-weight-bold" style="color:#cda808;"> Ordered Items</h6>
                                <div class="checkout-sidebar-price-table mt-10">
                                    <h5 class="title"><?=$data->items;?>
                                        <?php if ($data->items > 1){
                                                echo "Items";
                                            }else{
                                                echo "Item";
                                        }?>
                                    </h5>
                                    <div class="sub-total-price">
                                        <?php foreach($order as $data){?>
                                        <div class="total-price">
                                            <p class="value"><?php if($data->is_customized == 0) {?>
                                                <img style="height:50px" src="http://localhost/ocake/tools/uploads/<?php echo $data->image;?>" alt="<?php echo $data->flavor;?>">
                                                  <?php }else{?>
                                                <img style="height:50px" src="<?php echo $data->image;?>" alt="<?php echo $data->flavor;?>">
                                                  <?php }?><br></p>
                                            <p class="product-des">
                                                <span><em></em> <?='&#8369;'.$data->price; ?></span><br>
                                                <span><em></em>x1 <?php //echo $data->price; ?></span>
                                            </p>
                                            <p class="price"><?= '&#8369;'.$data->price?></p>
                                        </div>
                                        <?php }?>
                                    </div>
                                    <div class="total-payable">
                                        <div class="payable-price">
                                            <p class="value">Subotal Price:</p>
                                            <p class="price" name="total_price"><?php echo '&#8369;'. number_format($data->total_price);?></p>
                                        </div> 
                                        
                                        <div class="payable-price">
                                            <p class="value">Shipping Fee:</p>
                                            <p class="price" name="shipping_fee"><?php echo '&#8369;'. number_format($data->shipping_fee);; ?></p>
                                        </div><br>
                                        <div class="payable-price">
                                            <p class="value">Downpayment:</p>
                                            <p class="price" name="price"><?php echo '&#8369;'. number_format($data->downpayment); ?></p>
                                        </div>
                                        <div class="payable-price">
                                            <p class="value">Price to Pay:</p>
                                            <p class="price" name="price"><?php echo '&#8369;'. number_format($data->balance); ?></p>
                                        </div>
                                    </div>
                                    <div class="price-table-btn button">
                                    <!-- <?php //foreach($order as $data){?>
                                    <form action="<?//=site_url('placeorder')?>" method="POST">
                                    <input type="hidden" name="cart_id[]" value="<?//=$data->cart_id?>">
                                    <input type="hidden" name="product_id[]" value="<?//=$data->product_id?>">
                                    <input type="hidden" name="occasion[]" value="<?//=$data->occasion?>">
                                    <input type="hidden" name="flavor[]" value="<?//=$data->flavor?>">
                                    
                                    <input type="hidden" name="price[]" value="<?//=$data->price?>">
                                    <input type="hidden" name="quantity[]" value="<?//=$data->quantity?>">
                                    <?php //}?> -->
                                    <button type="submit" class="btn" data-toggle="modal" data-target="#Modal<?php echo $data->checkout_id;?>"
                                        style="
                                                <?php if($data->stat == "Pending" || $data->stat == "Confirmed" || $data->stat == "Processing" || $data->stat == "Shipped"){
                                                   echo "cursor:no-allowed; pointer-events:none; background-color:#212529";
                                                }?>
                                        ">Order Received
                                    </button>
                                        <div class="modal fade" id="Modal<?php echo $data->checkout_id;?>"
                                                role="dialog">
                                            <div class="modal-dialog" >
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background-color:#0d0e0f">
                                                        <h6 class="modal-title font-weight-bold">Did you already received your order/s?</h6>
                                                        <button type="button" class="close" style="border:none; background-color:#0d0e0f; color:#cda808; font-size:25px"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="mt-2" name="form"
                                                            action="<?php echo site_url('order_received/'.$data->checkout_id); ?>"
                                                            method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                                            <?php if(session('success')){ echo session('success');}else{ echo session('error');}?>
                                                            <div class="row">
                                                                <div class="col-lg-6 col-12"> 
                                                                    <p class="value"><?php if($data->is_customized == 0) {?>
                                                                        <img style="height:120px" src="http://localhost/ocake/tools/uploads/<?php echo $data->image;?>" alt="<?php echo $data->flavor;?>">
                                                                        <?php }else{?>
                                                                        <img style="height:120px" src="<?php echo $data->image;?>" alt="<?php echo $data->flavor;?>">
                                                                        <?php }?><br>
                                                                    </p>
                                                                </div>
                                                                <div class="col-lg-6 col-12">
                                                                    <p><?= $data->occasion?> Cake</p>
                                                                    <p><?= $data->flavor?> Flavor</p>
                                                                    <p>x<?= $data->quantity?></p>
                                                                    <p><?= '&#8369;'.$data->price?></p>
                                                                </div>
                                                            </div> 
                                                            <div class="mb-3 mt-2">
                                                                <input type="hidden" value="guguguuuu" name="">
                                                                <input type="hidden" value="<?php echo $data->user_id;?>" name="user_id">
                                                                <input type="hidden" value="<?php echo $data->id;?>" name="prod_id">
                                                                <input type="hidden" value="<?php echo $data->cart_id;?>" name="cart_id">
                                                                <input type="hidden" value="Completed" name="received_status"><br>
                                                                <input class="button btn btn-danger" style="float:right"
                                                                type="submit" value="Received" name="submit">
                                                            </div>
                                                                    
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <!-- <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <button type="submit" class="btn" data-toggle="modal" data-target="#myModal<?php echo $data->checkout_id;?>"
                                        style="
                                                <?php if($data->stat == "Shipped" || $data->stat == "Delivered"){
                                                   echo "cursor:no-allowed; pointer-events:none; background-color:#212529";
                                                }?>
                                        ">Cancel Order
                                    </button>
                                        <div class="modal fade" id="myModal<?php echo $data->checkout_id;?>"
                                                role="dialog">
                                            <div class="modal-dialog" >
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background-color:#0d0e0f">
                                                        <h6 class="modal-title font-weight-bold">Are you sure you want to cancel your order?</h6>
                                                        <button type="button" class="close" style="border:none; background-color:#0d0e0f; color:#cda808; font-size:25px"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="mt-2"
                                                            action="<?php echo site_url('cancel_order/'.$data->checkout_id); ?>"
                                                            method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                                            <?php if(session('success')){ echo session('success');}else{ echo session('error');}?>
                                                            <div class="mb-3">
                                                                <div class="sub-total-price" style="color:#0d0e0f">
                                                                    <?php if($data->stat == "Pending"){
                                                                            echo '<p>Your order is currently <b>PENDING</b>. If you cancel, your <b>DOWNPAYMENT</b> will be <b>REFUNDED.</b><p>';
                                                                        }elseif($data->stat == "Confirmed"){
                                                                            echo 'Your order was already <b>CONFIRMED</b>. If you cancel, your <b>DOWNPAYMENT</b> will be <b>REFUNDED</b> in <b>HALF.</b><p>';
                                                                        }elseif($data->stat == "Processing"){
                                                                            echo "<p>Your order was in <b>PROCESS</b>. If you cancel, your <b>DOWNPAYMENT</b> will <b>NOT</b> be <b>REFUNDED.</b></p>";
                                                                    }?>

                                                                    <?php if($data->stat == "Pending"){
                                                                            echo "REFUND: &#8369 $data->downpayment";
                                                                        }elseif($data->stat == "Confirmed"){
                                                                            echo "REFUND: &#8369 $Refund";
                                                                        }elseif($data->stat == "Processing"){
                                                                            echo "REFUND: &#8369 0";
                                                                    }?>

                                                                    <?php if($data->stat == "Pending"){
                                                                            echo "<input type='hidden' name='refund' value='$data->downpayment'>";
                                                                        }elseif($data->stat == "Confirmed"){
                                                                            echo "<input type='hidden' name='refund' value='$Refund'>";
                                                                        }elseif($data->stat == "Processing"){
                                                                            echo '<input type="hidden" name="refund" value="0">';;
                                                                    }?>


                                                                    <!-- <form action="/action_page.php"> -->
                                                                        <p style="margin-left:30px; margin-top:10px">Please select your age:</p>
                                                                        <input style="margin-left: 50px; margin-top:5px" type="radio" id="reason1" name="reason" value="Changed of mind" required>
                                                                        <label for="reason1">I changed my mind.</label><br>
                                                                        <input style="margin-left: 50px" type="radio" id="reason2" name="reason" value="Buy later" required>
                                                                        <label for="reason2">I will buy later.</label><br>  
                                                                        <input style="margin-left: 50px" type="radio" id="reason3" name="reason" value="Will change order" required>
                                                                        <label for="reason3">I will change my order.</label><br>
                                                                        <input style="margin-left: 50px" type="radio" id="reason4" name="reason" value="Not enough money" required>
                                                                        <label for="reason4">I don't have enough money to buy.</label><br><br>
                                                                        <!-- <input type="submit" value="Submit"> -->
                                                                    <!-- </form> -->
                                                                
                                                                    <!-- <?//php foreach($order as $data){?>
                                                                    <div class="total-price mb-3">
                                                                        <p class="value"><?//php if($data->is_customized == 0) {?>
                                                                            <img style="height:50px" src="http://localhost/ocake/tools/uploads/<?//php echo $data->image;?>" alt="<?//php echo $data->flavor;?>">
                                                                            <?//php }else{?>
                                                                            <img style="height:50px" src="<?//php echo $data->image;?>" alt="<?//php echo $data->flavor;?>">
                                                                            <?//php }?><br>
                                                                        </p>
                                                                        <p class="product-des">
                                                                            <span><em></em> <?//='&#8369;'.$data->price; ?></span><br>
                                                                            <span><em></em>x<?//php echo $data->quantity;?>  <?php //echo $data->price; ?></span>
                                                                        </p>
                                                                        <p class="price"><?//= '&#8369;'.$data->price?></p>
                                                                    </div>
                                                                    <?//php }?> -->
                                                                </div>
                                                                <input type="hidden" value="Cancelled" name="cancel_status">
                                                                <input class="button btn btn-danger" style="float:right"
                                                                type="submit" value="Submit" name="submit">
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <!-- <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
</div>


<a href="#" class="scroll-top">
    <i class="lni lni-chevron-up"></i>
</a>

<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="tools/user/js/bootstrap.min.js"></script>
<script src="tools/user/js/tiny-slider.js"></script>
<script src="tools/user/js/glightbox.min.js"></script>
<!-- <script src="tools/user/js/main.js"></script>
<script src="tools/user/js/order.js"></script>
<script src="tools/user/bootstrap.min.js"></script>
<script src="tools/user/owl.carousel.min.js"></script>
<script src="tools/user/slick.min.js"></script>
<script src="tools/user/waypoints.min.js"></script> -->

<?//php echo view('admin/include/photo-script'); ?>
<?//php echo view('admin/include/script'); ?>
</body>

</html>