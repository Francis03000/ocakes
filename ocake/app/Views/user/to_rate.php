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
  <a href="<?=site_url('to_rate')?>" class="btn btn-primary" role="button" style="background-color:#cda808; border-color:#cda808; color:#0d0e0f">To Rate</a>
  <a href="<?=site_url('completedorder')?>" class="btn btn-primary" role="button" style="background-color:#0d0e0f; border-color:#0d0e0f; color:#cda808">Completed</a>
  <a href="<?=site_url('cancelledorder')?>" class="btn btn-primary" role="button" style="background-color:#0d0e0f; border-color:#0d0e0f; color:#cda808">Cancelled</a>
</div>

<div class="mt-5 mb-5">
    <div class="container">
        <div class="cart-list-head">
            <div class="p-3 text-center text-lg  rounded-top" style="background-color:#cda808; color:#0d0e0f"><span class="text-uppercase">Delivered Orders </span></div>
            
            <div class="cart-single-list">
                <div class="row">
                    <div>
                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
                        <div class="container padding-bottom-3x">
                            <div class="text-center cart-single-list flex-wrap flex-sm-nowrap justify-content-between py-2 px-2 bg-secondary">
                                <div class="row align-items-center">
                                    <div class="col-lg-2 col-md-2 col-12">
                                        <h5 class="product-name">
                                            <p>Image</p>
                                        </h5>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-12">
                                        <h5 class="product-name">
                                            <p>Description</p>
                                        </h5>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-12">
                                        <h5 class="product-name">
                                            <p>Flavor</p>
                                        </h5>
                                    </div>
                                    <!-- <div class="col-lg-1 col-md-1 col-12">
                                        <p></p>
                                    </div> -->
                                    <div class="col-lg-1 col-md-2 col-12">
                                    <h5 class="product-name">
                                            <p>Quantity</p>
                                        </h5>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-12">
                                        <h5 class="product-name">
                                            <p>Price</p>
                                        </h5>
                                    </div>
                                    <div class="col-lg-3 col-md-2 col-12">
                                        <h5 class="product-name">
                                            <p>Details</p>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <?php if(empty($fetchCart)){
								echo '
                                    <div class="d-flex flex-wrap justify-content-xl-between" >
                                        <div class="col-lg-12 col-md-12 col-12">
											<div class ="text-muted" style="font-size:25px; text-align:center; margin-top:7%; margin-bottom:5%">
												No products to rate found.
											</div>
										</div>
									</div>
                                ';
							}?>
                            <?php foreach ($fetchCart as $data) {?>
                                <div class="pt-3 pb-3 text-center cart-single-list flex-wrap flex-sm-nowrap justify-content-between py-2 px-2 bg-secondary">
                                    <div class="row align-items-center">
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <?php if($data->is_customized == 0) {?>
                                                <img style="height:50px" src="http://localhost/ocake/tools/uploads/<?php echo $data->image;?>" alt="<?php echo $data->flavor;?>">
                                                  <?php }else{?>
                                                <img style="height:50px" src="<?php echo $data->image;?>" alt="<?php echo $data->flavor;?>">
                                                  <?php }?><br>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p><?php echo $data->occasion; ?> Cake</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                        <p><?php echo $data->flavor; ?></p>
                                        </div>
                                        <!-- <div class="col-lg-1 col-md-1 col-12"> 
                                        </div> -->
                                        <div class="col-lg-1 col-md-2 col-12">
                                        <p><?php echo $data->quantity; ?></p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                        <p><?php echo '&#8369;' . number_format ($data->price); ?></p>
                                        </div>
                                        <div class="col-lg-3 col-md-2 col-12">
                                            <input type="submit" role="button" name="details" value="Rate" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal<?php echo $data->cart_id;?>">
                                            <!-- <form action="<?//=site_url('orderdetails')?>" method="POST">
                                                <input type="hidden" name="details" value="<?=$data->order_code;?>">
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

<?php foreach($fetchCart as $data){?>
    <!-- Update Status Modal--->
    <div class="modal fade" id="viewModal<?php echo $data->cart_id;?>" tabindex="-1" aria-labelledby="viewModal<?php echo $data->cart_id;?>" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header"  style="background-color:#0d0e0f">
                    <h5 class="modal-title">How would you like our product?</h5>
                    <button type="button" class="modal-close" style="border:none; background-color:#0d0e0f; color:#cda808; font-size:25px" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                                <div class="p-3">
                                    <div class="row">
                                        <div class="col-lg-4 col-12">
                                            <div class="table-responsive">
                                                <?php if($data->is_customized == 0) {?>
                                                    <img style="height:160px" src="http://localhost/ocake/tools/uploads/<?php echo $data->image;?>" alt="<?php echo $data->flavor;?>">
                                                        <?php }else{?>
                                                    <img style="height:160px" src="<?php echo $data->image;?>" alt="<?php echo $data->flavor;?>">
                                                <?php }?><br>
                                            </div>
                                                        <span><b>Ocassion:</b> <?php echo $data->occasion; ?> Cake</span><br>
                                                        <span><b>Flavor:</b> <?php echo $data->flavor; ?> Flavor</span><br>
                                                        <span><b>Price:</b> <?php echo '&#8369;' . number_format ($data->price); ?></span><br>
                                                        <span><b>Quantity:</b> x<?php echo $data->quantity; ?></span><br>
                                                        <?php if($data->is_customized == 1) {?>
                                                        <span><b>Message:</b> <?php echo $data->message; ?> </span>
                                                        <?php }else{?>
                                                            <p> </p>
                                                        <?php }?><br>
                                        </div>
                                        <div class="col-lg-8 col-12">
                                            <form class="mt-2" name="form"
                                                action="<?php echo site_url('addrate'); ?>"
                                                method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                                <?php if(session('success')){ echo session('success');}else{ echo session('error');}?>
                                                                            
                                                <label for="Rate Us">Rate Us: </label><br>
                                                <div class="rate">
                                                    <input type="radio" id="<?php echo $data->cart_id;?>star5" name="rate" value="5" />
                                                    <label for="<?php echo $data->cart_id;?>star5" title="5 star">5 stars</label>
                                                    <input type="radio" id="<?php echo $data->cart_id;?>star4" name="rate" value="4" />
                                                    <label for="<?php echo $data->cart_id;?>star4" title="4 star">4 stars</label>
                                                    <input type="radio" id="<?php echo $data->cart_id;?>star3" name="rate" value="3" />
                                                    <label for="<?php echo $data->cart_id;?>star3" title="3 star">3 stars</label>
                                                    <input type="radio" id="<?php echo $data->cart_id;?>star2" name="rate" value="2" />
                                                    <label for="<?php echo $data->cart_id;?>star2" title="2 star">2 stars</label>
                                                    <input type="radio" id="<?php echo $data->cart_id;?>star1" name="rate" value="1" />
                                                    <label for="<?php echo $data->cart_id;?>star1" title="1 star">1 star</label>
                                                </div><br><br>
                                                <div class="mb-3 mt-2">
                                                    <div class="sub-total-price">
                                                        <?//php foreach($order as $data){?>
                                                            <label for="Feedback">Feedback: </label>
                                                        <div align="center">
                                                            <textarea style="width:400px; height:100px" id="<?php echo $data->cart_id;?>" name="feedback" 
                                                            placeholder="What's your feedback?"></textarea>
                                                        </div>
                                                        <?//php }?>
                                                    </div>
                                                        <input type="hidden" value="<?php echo $data->user_id;?>" name="user_id">
                                                        <input type="hidden" value="<?php echo $data->id;?>" name="prod_id">
                                                        <input type="hidden" value="<?php echo $data->cart_id;?>" name="cart_id">
                                                        <input class="button btn btn-danger" style="margin-left:379px; background-color:#cda808; border-color:#cda808; "
                                                        type="submit" value="Submit" name="submit">
                                                </div>                            
                                            </form>
                                        </div>
                                    </div>
                                </div>
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