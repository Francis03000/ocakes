<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Ocake</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="tools/user/images/logo/white-logo.png" />

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="tools/user/css/bootstrap.min.css" />
    <link rel="stylesheet" href="tools/user/css/LineIcons.3.0.css" />
    <link rel="stylesheet" href="tools/user/css/tiny-slider.css" />
    <link rel="stylesheet" href="tools/user/css/glightbox.min.css" />
    <link rel="stylesheet" href="tools/user/css/main.css" />
    <link rel="stylesheet" href="tools/user/css/comment.css" />
</head>

<body>
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Product Details</h1>
                    </div>
                </div>
                
                <?php foreach ($product as $data) {?>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="<?=site_url('home')?>"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="<?=site_url(strtolower($data->occasion))?>"><?php echo $data->occasion;?> Category</a></li>
                        <li>Product Details</li>
                    </ul>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Item Details -->
    <section class="item-details section">
        <div class="container">
            <div class="top-area">
            <?php $num = 1;    
            foreach ($product as $data) { ?>
            <form action="<?=site_url('add_cart')?>" method="POST">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-images">
                            <main id="gallery">
                                <div class="main-img" style="height:350px; width:350px; margin-left:150px">
                                <img src="http://localhost/ocake/tools/uploads/<?php echo $data->image;?>" id="current" alt="#">
                                </div>
                                <!-- <div class="images">
                                    <img src="tools/user/images/product-details/01.jpg" class="img" alt="#">
                                    <img src="tools/user/images/product-details/02.jpg" class="img" alt="#">
                                    <img src="tools/user/images/product-details/03.jpg" class="img" alt="#">
                                    <img src="tools/user/images/product-details/04.jpg" class="img" alt="#">
                                    <img src="tools/user/images/product-details/05.jpg" class="img" alt="#">
                                </div> -->
                            </main>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info">
                            <h2 class="title" style="color:#081828"><?php echo $data->occasion; ?> Cake</h2>
                            <h2 class="price">&#8369 <?php echo $data->price; ?><span></span></h2>
                            <p class="category"><i class="lni lni-tag"></i> Flavor:<a href="javascript:void(0)"><?php echo $data->flavor; ?></a></p>
                            <p class="info-text"></p>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-12">
                                    <!-- <div class="form-group quantity">
                                        <label for="color">Quantity</label>
                                        <select class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div> -->
                                </div>
                                <div class="col-lg-3 col-md-4 col-12">
                                    <div class="form-group quantity">
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-4 col-12">
                                    <div class="button pt-50">
                                        <a href="<?=site_url('details')?>" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                                    </div>
                                </div>
                                <!-- <div class="col-lg-4 col-md-4 col-12">
                                    <div class="form-group quantity">
                                        <label for="color">Quantity</label>
                                        <select class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="form-group color-option">
                                        <label class="title-label" for="size">Choose color</label>
                                        <div class="single-checkbox checkbox-style-1">
                                            <input type="checkbox" id="checkbox-1" checked>
                                            <label for="checkbox-1"><span></span></label>
                                        </div>
                                        <div class="single-checkbox checkbox-style-2">
                                            <input type="checkbox" id="checkbox-2">
                                            <label for="checkbox-2"><span></span></label>
                                        </div>
                                        <div class="single-checkbox checkbox-style-3">
                                            <input type="checkbox" id="checkbox-3">
                                            <label for="checkbox-3"><span></span></label>
                                        </div>
                                        <div class="single-checkbox checkbox-style-4">
                                            <input type="checkbox" id="checkbox-4">
                                            <label for="checkbox-4"><span></span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="color">Battery capacity</label>
                                        <select class="form-control" id="color">
                                            <option>5100 mAh</option>
                                            <option>6200 mAh</option>
                                            <option>8000 mAh</option>
                                        </select>
                                    </div>
                                </div>  -->
                            </div>
                            <!-- <div class="bottom-content">
                                <div class="row align-items-end">
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="button">
                                            <a href="<?//=site_url('details')?>" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="wish-button">
                                            <button class="btn"><i class="lni lni-reload"></i> Compare</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="wish-button">
                                            <button class="btn"><i class="lni lni-heart"></i> To Wishlist</button>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </form>
            <?php }?>
            </div>
            <div class="product-details-info">
                <div class="single-block">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <h5 style="margin-bottom:5px; color:black">Comments</h5>
                            <div class="info-body custom-responsive-margin">
                            <?php foreach ($feedback as $data) { ?>
                                <div class="card" style="box-shadow: 1px 1px; padding:5px 5px 5px 20px; margin-bottom:5px">
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="http://localhost/ocake/tools/uploads/<?php echo $data->profile;?>" width="50" height="50" class="rounded-circle mt-1">
                                        </div>
                                        
                                        <div class="col-8">
                                            <div class="comment-box ml-2">
                                                <h4 style="color:black; font-size:14px"><b><?php echo $data->firstname;?> <?php echo $data->lastname;?><b></h4>
                                                <div class="rating"> 
                                                    <span class="fa fa-star checked"></span>
                                                    <?php if($data->rate == "2" || $data->rate == "3" || $data->rate == "4" || $data->rate == "5" ){ 
                                                            echo
                                                                '<span class="fa fa-star checked"></span>';
                                                        }else{
                                                            echo
                                                                '<span class="fa fa-star"></span>';
                                                    }?>
                                                    <?php if($data->rate == "3" || $data->rate == "4" || $data->rate == "5" ){ 
                                                            echo
                                                                '<span class="fa fa-star checked"></span>';
                                                        }else{
                                                            echo
                                                                '<span class="fa fa-star"></span>';
                                                    }?>
                                                    <?php if($data->rate == "4" || $data->rate == "5" ){ 
                                                            echo
                                                                '<span class="fa fa-star checked"></span>';
                                                        }else{
                                                            echo
                                                                '<span class="fa fa-star"></span>';
                                                    }?>
                                                    <?php if($data->rate == "5" ){ 
                                                            echo
                                                                '<span class="fa fa-star checked"></span>';
                                                        }else{
                                                            echo
                                                                '<span class="fa fa-star"></span>';
                                                    }?>
                                                </div>
                                                <div class="comment-area">
                                                    <?php echo $data->feedback;?>
                                                    <!-- <textarea class="form-control" placeholder="what is your view?" rows="4"></textarea> -->
                                                </div><br>
                                                
                                                <!-- <div class="comment-btns mt-2">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="pull-left">
                                                                    <button class="btn btn-success btn-sm">Cancel</button> 
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="pull-right">
                                                                    <button class="btn btn-success send btn-sm">Send <i class="fa fa-long-arrow-right ml-1"></i></button>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                        <div class="comment-area" style="margin-left:18%; margin-bottom:3%">
                                                    <?php if(empty($data->feedback_image)){
                                                        echo '
                                                        ';
                                                    }else{
                                                        echo "<img src='http://localhost/ocake/tools/uploads/$data->feedback_image' width='100' height='100'>";
                                                
                                                    }?>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                                <!-- <h4>Shipping Options:</h4>
                                <ul class="normal-list">
                                    <li><span>Courier:</span> 2 - 4 days, $22.50</li>
                                    <li><span>Standard Shipping:</span> up to one week, $10.00</li>
                                    <li><span>UPS Ground Shipping:</span> 4 - 6 days, $18.00</li>
                                    <li><span>Unishop Global Export:</span> 3 - 4 days, $25.00</li>
                                </ul> -->
                                <!-- <h4>Details</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat.</p>
                                <h4>Features</h4>
                                <ul class="features">
                                    <li>Capture 4K30 Video and 12MP Photos</li>
                                    <li>Game-Style Controller with Touchscreen</li>
                                    <li>View Live Camera Feed</li>
                                    <li>Full Control of HERO6 Black</li>
                                    <li>Use App for Dedicated Camera Operation</li>
                                </ul> -->
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="info-body">
                                <!-- <h4>Reviews</h4>
                                <ul class="normal-list">
                                    <li><span></span></li>
                                </ul> -->
                                <!-- <h4>Specifications</h4>
                                <ul class="normal-list">
                                    <li><span>Weight:</span> 35.5oz (1006g)</li>
                                    <li><span>Maximum Speed:</span> 35 mph (15 m/s)</li>
                                    <li><span>Maximum Distance:</span> Up to 9,840ft (3,000m)</li>
                                    <li><span>Operating Frequency:</span> 2.4GHz</li>
                                    <li><span>Manufacturer:</span> GoPro, USA</li>
                                </ul>
                                <h4>Shipping Options:</h4>
                                <ul class="normal-list">
                                    <li><span>Courier:</span> 2 - 4 days, $22.50</li>
                                    <li><span>Local Shipping:</span> up to one week, $10.00</li>
                                    <li><span>UPS Ground Shipping:</span> 4 - 6 days, $18.00</li>
                                    <li><span>Unishop Global Export:</span> 3 - 4 days, $25.00</li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Item Details -->

    <!-- Review Modal -->
    <div class="modal fade review-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Leave a Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="review-name">Your Name</label>
                                <input class="form-control" type="text" id="review-name" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="review-email">Your Email</label>
                                <input class="form-control" type="email" id="review-email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="review-subject">Subject</label>
                                <input class="form-control" type="text" id="review-subject" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="review-rating">Rating</label>
                                <select class="form-control" id="review-rating">
                                    <option>5 Stars</option>
                                    <option>4 Stars</option>
                                    <option>3 Stars</option>
                                    <option>2 Stars</option>
                                    <option>1 Star</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="review-message">Review</label>
                        <textarea class="form-control" id="review-message" rows="8" required></textarea>
                    </div>
                </div>
                <div class="modal-footer button">
                    <button type="button" class="btn">Submit Review</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Review Modal -->

    
    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="tools/user/js/bootstrap.min.js"></script>
    <script src="tools/user/js/tiny-slider.js"></script>
    <script src="tools/user/js/glightbox.min.js"></script>
    <script src="tools/user/js/main.js"></script>
    <script type="text/javascript">
        const current = document.getElementById("current");
        const opacity = 0.6;
        const imgs = document.querySelectorAll(".img");
        imgs.forEach(img => {
            img.addEventListener("click", (e) => {
                //reset opacity
                imgs.forEach(img => {
                    img.style.opacity = 1;
                });
                current.src = e.target.src;
                //adding class 
                //current.classList.add("fade-in");
                //opacity
                e.target.style.opacity = opacity;
            });
        });
    </script>
    
</body>

</html>