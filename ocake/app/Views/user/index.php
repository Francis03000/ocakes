 <!-- Start Hero Area -->
 <!--Start of Tawk.to Script-->
 <script type="text/javascript">
var Tawk_API = Tawk_API || {},
    Tawk_LoadStart = new Date();
(function() {
    var s1 = document.createElement("script"),
        s0 = document.getElementsByTagName("script")[0];
    s1.async = true;
    s1.src = 'https://embed.tawk.to/6459a2b06a9aad4bc5799e38/1gvv270de';
    s1.charset = 'UTF-8';
    s1.setAttribute('crossorigin', '*');
    s0.parentNode.insertBefore(s1, s0);
})();
 </script>

 <!--End of Tawk.to Script-->
 <section class="hero-area">
     <div class="container">
         <div class="row">
             <div class="col-lg-8 col-12 custom-padding-right">
                 <div class="slider-head">
                     <!-- Start Hero Slider -->
                     <div class="hero-slider">
                         <!-- Start Single Slider -->
                         <div class="single-slider" style="background-image: url(tools/user/images/hero/2.png);">
                             <div class="content">
                                 <h2><span>No restocking fee (35 savings)</span>
                                     Birthday Cake
                                 </h2>
                                 <h3><span>Now Only</span> ₱320.99</h3>
                                 <div class="button">
                                     <a href="product-grids.html" class="btn">Shop Now</a>
                                 </div>
                             </div>
                         </div>
                         <!-- End Single Slider -->
                         <!-- Start Single Slider -->
                         <div class="single-slider" style="background-image: url(tools/user/images/hero/3.png);">
                             <div class="content">
                                 <h2><span>Strawberry Flavor</span>
                                     Anniversary Cake
                                 </h2>
                                 <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                     incididunt ut labore et dolore magna aliqua.</p> -->
                                 <h3><span>Combo Only:</span> ₱590.00</h3>
                                 <div class="button">
                                     <a href="product-grids.html" class="btn">Shop Now</a>
                                 </div>
                             </div>
                         </div>
                         <!-- End Single Slider -->
                     </div>
                     <!-- End Hero Slider -->
                 </div>
             </div>
             <div class="col-lg-4 col-12">
                 <div class="row">
                     <div class="col-lg-12 col-md-6 col-12 md-custom-padding">
                         <!-- Start Small Banner -->
                         <div class="hero-small-banner" style="background-image: url('tools/user/images/hero/1.png');">
                             <div class="content">
                                 <h2>
                                     <span>Blue Velvet Flavor</span>
                                     Birthday Cake
                                 </h2>
                                 <h3>₱259.99</h3>
                             </div>
                         </div>
                         <!-- End Small Banner -->
                     </div>
                     <div class="col-lg-12 col-md-6 col-12">
                         <!-- Start Small Banner -->
                         <div class="hero-small-banner style2">
                             <div class="content">
                                 <h2>Weekly Sale!</h2>
                                 <p>Saving up to 50% off all online store items this week.</p>
                                 <div class="button">
                                     <a class="btn" href="product-grids.html">Shop Now</a>
                                 </div>
                             </div>
                         </div>
                         <!-- Start Small Banner -->
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- End Hero Area -->

 <!-- Start Trending Product Area -->
 <section class="trending-product section" style="margin-top: 12px;">
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <div class="section-title">
                     <h2>Trending Product</h2>
                     <p>Cakes are special. Every birthday, every celebration ends with something sweet, a cake, and
                         people remember. It's all about the memories.</p>
                 </div>
             </div>
         </div>
         <div class="row">
             <?php foreach($productData as $data){?>
             <div class="col-lg-3 col-md- col-12">
                 <!-- Start Single Product -->
                 <div class="single-product">
                     <div class="product-image">
                         <?php if($data->is_customized == 0) {?>
                         <img src="http://localhost/ocake/tools/uploads/<?php echo $data->image;?>"
                             alt="<?php echo $data->flavor;?>">
                         <?php }else{?>
                         <img src="<?php echo $data->image;?>" alt="<?php echo $data->flavor;?>">
                         <?php }?>
                         <div class="button">
                             <form id="add-to-cart-form" action="<?=site_url('add_cart')?>" method="POST">
                                 <!-- <input type="hidden" name="uid" value=""> -->
                                 <input type="hidden" name="occasion" value="<?=$data->occasion;?>">
                                 <input type="hidden" name="flavor" value="<?=$data->flavor;?>">
                                 <input type="hidden" name="price" value="<?=$data->price;?>">
                                 <input type="hidden" name="pid" value="<?=$data->id;?>">
                                 <!-- <input type="hidden" name="img" value="<?=$data->image;?>"> -->
                                 <button type="submit" class="btn" onclick="confirmAddToCart()"><i
                                         class="lni lni-cart"></i>
                                     Add to Cart</button>
                             </form>
                         </div>
                     </div>
                     <div class="product-info">
                         <span class="category" style="color:#0d0e0f"><?php echo $data->flavor;?></span>
                         <h4 class="title">
                             <a href="<?=site_url('productgrid')?>"><?php echo $data->occasion;?></a>
                         </h4>
                         <ul class="review">
                             <li><i class="lni lni-star-filled"></i></li>
                             <li style="color:#0d0e0f"><i class="lni lni-star-filled"></i></li>
                             <li><i class="lni lni-star-filled"></i></li>
                             <li><i class="lni lni-star-filled"></i></li>
                             <li><i class="lni lni-star"></i></li>
                             <li><span style="color:#0d0e0f">4.0 Review(s)</span></li>
                         </ul>
                         <div class="price">
                             <span style="color:#0d0e0f"><?php echo '&#8369; ' .$data->price;?></span>
                         </div>
                     </div>
                 </div>
                 <!-- End Single Product -->
             </div>
             <?php }?>
         </div>
     </div>
 </section>
 <!-- End Trending Product Area -->

 <!-- Start Call Action Area -->
 <section class="call-action section">
     <div class="container">
         <div class="row ">
             <div class="col-lg-8 offset-lg-2 col-12">
                 <div class="inner">
                     <div class="content">
                         <h2 class="wow fadeInUp" data-wow-delay=".4s">Currently You are using free<br>
                             Lite version of ShopGrids</h2>
                         <p class="wow fadeInUp" data-wow-delay=".6s">Please, purchase full version of the template
                             to get all pages,<br> features and commercial license.</p>
                         <div class="button wow fadeInUp" data-wow-delay=".8s">
                             <a href="javascript:void(0)" class="btn">Purchase Now</a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- End Call Action Area -->


 <!-- Start Banner Area -->
 <section class="banner section">
     <div class="container">
         <div class="row">
             <div class="col-lg-6 col-md-6 col-12">
                 <div class="single-banner" style="background-image:url('tools/user/images/banner/banner-1-bg.png')">
                     <div class="content">
                         <h2>Christmas Cake</h2>
                         <p>Space Gray Aluminum Case with <br>Black/Volt Real Sport Band </p>
                         <div class="button">
                             <a href="<?=site_url('productgrid')?>" class="btn">View Details</a>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-lg-6 col-md-6 col-12">
                 <div class="single-banner custom-responsive-margin"
                     style="background-image:url('tools/user/images/banner/banner-2-bg.png')">
                     <div class="content">
                         <h2>New Year Cake</h2>
                         <p>Lorem ipsum dolor sit amet, <br>eiusmod tempor
                             incididunt ut labore.</p>
                         <div class="button">
                             <a href="<?=site_url('productgrid')?>" class="btn">Shop Now</a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- End Banner Area -->

 <!-- Start Shipping Info -->
 <section class="shipping-info">
     <div class="container">
         <ul>
             <!-- Free Shipping -->
             <li>
                 <div class="media-icon">
                     <i class="lni lni-delivery"></i>
                 </div>
                 <div class="media-body">
                     <h5>Free Shipping</h5>
                     <span>On order over ₱99</span>
                 </div>
             </li>
             <!-- Money Return -->
             <li>
                 <div class="media-icon">
                     <i class="lni lni-support"></i>
                 </div>
                 <div class="media-body">
                     <h5>24/7 Support.</h5>
                     <span>Live Chat Or Call.</span>
                 </div>
             </li>
             <!-- Support 24/7 -->
             <li>
                 <div class="media-icon">
                     <i class="lni lni-credit-cards"></i>
                 </div>
                 <div class="media-body">
                     <h5>Online Payment.</h5>
                     <span>Secure Payment Services.</span>
                 </div>
             </li>
             <!-- Safe Payment -->
             <li>
                 <div class="media-icon">
                     <i class="lni lni-reload"></i>
                 </div>
                 <div class="media-body">
                     <h5>Easy Return.</h5>
                     <span>Hassle Free Shopping.</span>
                 </div>
             </li>
         </ul>
     </div>
 </section>
 <!-- End Shipping Info -->

 <script src="<?=base_url()?>/tools/admin/assets/js/jquery-3.6.0.min.js"></script>
 <script src="<?=base_url()?>/tools/admin/assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
 <script src="<?=base_url()?>/tools/admin/assets/plugins/sweetalert/sweetalerts.min.js"></script>

 <script>
function confirmAddToCart() {

    Swal.fire({
        position: 'top',
        icon: 'success',
        title: 'Successfully added to cart!',
        showConfirmButton: false,

        timer: 1500
    })
    document.getElementById('add-to-cart-form').submit();


}
 </script>