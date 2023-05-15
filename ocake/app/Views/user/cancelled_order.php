
    <!-- <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>/assets/img/favicon.png">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="<?=base_url()?>/assets/css/style.css"> -->

<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Your Orders</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="<?=site_url('home')?>"><i class="lni lni-home"></i> Home</a></li>
                    <!-- <li><a href="<?//=site_url('productlist')?>">Shop</a></li> -->
                    <li>Your Orders</li>
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
        
<div class="btn-group mt-3 " style="margin-left:8%">
<a href="<?=site_url('orders')?>" class="btn btn-primary" role="button" style="background-color:#0d0e0f; border-color:#0d0e0f; color:#cda808">To Deliver</a>
  <a href="<?=site_url('to_received')?>" class="btn btn-primary" role="button" style="background-color:#0d0e0f; border-color:#0d0e0f; color:#cda808">To Received</a>
  <a href="<?=site_url('to_rate')?>" class="btn btn-primary" role="button" style="background-color:#0d0e0f; border-color:#0d0e0f; color:#cda808">To Rate</a>
  <a href="<?=site_url('completedorder')?>" class="btn btn-primary" role="button" style="background-color:#0d0e0f; border-color:#0d0e0f; color:#cda808">Completed</a>
  <a href="<?=site_url('cancelledorder')?>" class="btn btn-primary" role="button" style="background-color:#cda808; border-color:#cda808; color:#0d0e0f">Cancelled</a>
</div>

<div class="mt-5 mb-5">
    <div class="container">
        <div class="cart-list-head">
            <div class="p-3 text-center text-lg  rounded-top" style="background-color:#cda808; color:#0d0e0f"><span class="text-uppercase">Cancelled Orders </span></div>
            
            <div class="cart-single-list">
                <div class="row">
                    <div>
                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
                        <div class="container padding-bottom-3x">
                            <div class="text-center cart-single-list flex-wrap flex-sm-nowrap justify-content-between py-2 px-2 bg-secondary">
                                <div class="row align-items-center">
                                    <div class="col-lg-2 col-md-2 col-12">
                                        <h5 class="product-name">
                                            <p>Items</p>
                                        </h5>
                                    </div>
                                    <div class="col-lg-1 col-md-2 col-12">
                                        <h5 class="product-name">
                                            <p>Price</p>
                                        </h5>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-12">
                                        <p></p>
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-12">
                                        <p></p>
                                    </div>
                                    <div class="col-lg-1 col-md-2 col-12">
                                        <p></p>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-12">
                                        <h5 class="product-name">
                                            <p>Status</p>
                                        </h5>
                                    </div>
                                    <div class="col-lg-3 col-md-2 col-12">
                                        <h5 class="product-name">
                                            <p>Details</p>
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <?php if(empty($status)){
								echo '
                                    <div class="d-flex flex-wrap justify-content-xl-between" >
                                        <div class="col-lg-12 col-md-12 col-12">
											<div class ="text-muted" style="font-size:25px; text-align:center; margin-top:7%; margin-bottom:5%">
												No cancelled orders found.
											</div>
										</div>
									</div>
                                ';
							}?>
                            <?php foreach ($status as $data) {?>
                                <div class="pt-3 pb-3 text-center cart-single-list flex-wrap flex-sm-nowrap justify-content-between py-2 px-2 bg-secondary">
                                    <div class="row align-items-center">
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p><?=$data->items;?>
                                                <?php if ($data->items > 1){
                                                        echo "Items";
                                                    }else{
                                                        echo "Item";
                                                }?>
                                            </p>
                                        </div>
                                        <div class="col-lg-1 col-md-2 col-12">
                                            <p><?php echo '&#8369;' . number_format ($data->total_price); ?></p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-12"> 
                                        </div>
                                        <div class="col-lg-1 col-md-2 col-12">
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <div style="text-align:center">
                                                    <input class="btn" type="button" 
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
                                        </div>
                                        <div class="col-lg-3 col-md-2 col-12">
                                            
                                                <input type="submit" role="button" name="details" value="View" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal<?php echo $data->order_code;?>">
                                            
                                            <!-- <form action="<?//=site_url('orderdetails')?>" method="POST">
                                                <input type="hidden" name="details" value="<?//=$data->order_code;?>">
                                                <input type="submit" role="button" value="View" class="btn btn-primary">
                                            </form> -->
                                        </div>
                                        <!-- <div class="col-lg-3 col-md-2 col-12">
                                            <a class="btn btn-primary" href="<?//php echo site_url('orderdetails/view/')/*.$data->order_code*/; ?>" role="button">View Details</a>
                                        </div> -->
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php foreach($status as $data){?>
    <!-- Update Status Modal--->
    <div class="modal fade" id="viewModal<?php echo $data->order_code;?>" tabindex="-1" aria-labelledby="viewModal<?php echo $data->order_code;?>" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cancelled Orders</h5>
                    <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                        <?php foreach($details as $datum){?>
                            <?php if($data->order_code==$datum->order_code) {?>
                                <div class="p-3">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <?php if($datum->is_customized == 0) {?>
                                                <img style="height:160px" src="http://localhost/ocake/tools/uploads/<?php echo $datum->image;?>" alt="<?php echo $datum->flavor;?>">
                                                  <?php }else{?>
                                                <img style="height:160px" src="<?php echo $datum->image;?>" alt="<?php echo $datum->flavor;?>">
                                                  <?php }?><br>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <span><b>Ocassion:</b> <?php echo $datum->occasion; ?> Cake</span><br>
                                            <span><b>Flavor:</b> <?php echo $datum->flavor; ?> Flavor</span><br>
                                            <span><b>Price:</b> <?php echo '&#8369;' . number_format ($datum->price); ?></span><br>
                                            <span><b>Quantity:</b> x<?php echo $datum->quantity; ?></span><br>
                                            <?php if($datum->is_customized == 1) {?>
                                            <span><b>Message:</b> <?php echo $datum->message; ?> </span>
                                            <?php }else{?>
                                                <p> </p>
                                            <?php }?><br>
                                            <div class="button">
                                                <form action="<?=site_url('add_cart')?>" method="POST">
                                                        <!-- <input type="hidden" name="uid" value=""> -->
                                                            <input type="hidden" name="occasion"
                                                                value="<?=$datum->occasion;?>">
                                                            <input type="hidden" name="flavor" value="<?=$datum->flavor;?>">
                                                            <input type="hidden" name="price" value="<?=$datum->price;?>">
                                                            <input type="hidden" name="pid" value="<?=$datum->id;?>">
                                                            <!-- <input type="hidden" name="img" value="<?=$datum->image;?>"> -->
                                                            <button type="submit" class="btn"><i class="lni lni-cart"></i>
                                                                Buy Again</button>
                                                        </form>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                        <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }?>

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