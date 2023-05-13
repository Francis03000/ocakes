<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Checkout</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="<?=site_url('home')?>"><i class=" lni lni-home"></i> Home</a></li>
                    <li><a href="<?=site_url('cart')?>">Cart</a></li>
                    <li>Checkout</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- <link rel="stylesheet" href="tools/user/css/reference.css" /> -->
<section class="checkout-wrapper section">
    <div class="container">
        <form action="<?=site_url('placeorder')?>" method="POST"  accept-charset="utf-8" enctype="multipart/form-data" style="background-color:none" >
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">
                        <ul id="accordionExample">
                            <li>                   
                                <h6 class="title" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                    aria-expanded="true" aria-controls="collapseThree">Your Personal Details </h6>
                                <section class="checkout-steps-form-content collapse show" id="collapseThree"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>User Name</label>
                                                <div class="row">
                                                    <div class="col-md-6 form-input form">
                                                        <input type="text" placeholder="First Name" name=" firstname" 
                                                            <?php foreach($userData as $data){?> value="<?php echo $data->firstname;?>"<?php }?> required>  
                                                    </div>
                                                    <div class="col-md-6 form-input form">
                                                        <input type="text" placeholder="Last Name" name="lastname" 
                                                            <?php foreach($userData as $data){?> value="<?php echo $data->lastname;?>"<?php }?> required>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Email Address</label>
                                                <div class="form-input form">
                                                    <input type="text" placeholder="Email Address" name="email" 
                                                        <?php foreach($userData as $data){?> value="<?php echo $data->email;?>"<?php }?> required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Phone Number</label>
                                                <div class="form-input form">
                                                    <input type="text" placeholder="Phone Number" name="mobile"
                                                    <?php foreach($userData as $data){?> value="<?php echo $data->mobile;?>"<?php }?> required>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-12">
                                            <div class="single-checkbox checkbox-style-3">
                                                <input type="checkbox" id="checkbox-3">
                                                <label for="checkbox-3"><span></span></label>
                                                <p>My delivery and mailing addresses are the same.</p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form button">
                                                <button class="btn" data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                    aria-expanded="false" aria-controls="collapseFour">next
                                                    step</button>
                                            </div>
                                        </div> -->
                                    </div>
                                </section>
                            </li>
                            
                            <li>
                                <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapsefive"
                                    aria-expanded="false" aria-controls="collapsefive">Payment Info</h6>
                                <section class="checkout-steps-form-content collapse" id="collapsefive"
                                    aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Payment Method</label>
                                                <div class="select-items">
                                                    <select type="payment_method" id="payment_method" name="payment_method" class="form-control" required>
                                                        <option value="" disabled selected>select</option>
                                                        <option value="COD">COD</option>
                                                        <option value="Gcash">Gcash</option>
                                                    </select>
                                                    <input type="radio" name="payment" id="box1" value="Downpayment" required>
                                                    <label for="box1">Down Paymnet</label>
                                                    <input type="radio" name="payment" id="box2" value="Fullpayment" required>
                                                    <label for="box2">Full Paymnet</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Scan QR Code</label>
                                                <div class="select-items">
                                                <input type="button" class="form-control" data-toggle="modal" data-target="#Modal" style="background-color:#none; border-color:#e6e6e6;" value="+ Scan ">  
                                                    <div class="modal fade" id="Modal" role="dialog">
                                                        <div class="modal-dialog" >
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="background-color:#0d0e0f">
                                                                    <h6 class="modal-title font-weight-bold">Scan QR Code</h6>
                                                                    <button type="button" class="close" style="border:none; background-color:#0d0e0f; color:#cda808; font-size:25px"
                                                                        data-dismiss="modal">&times;</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="mb-3 text-center">
                                                                        <img style="height:500px; justify-content:center" src="http://localhost/ocake/tools/uploads/reference.jpg">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">Close</button> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Delivery Method</label>
                                                <div class="select-items">
                                                    <select type="delivery_method" id="delivery_method" name="delivery_method" class="form-control" required>
                                                        <option value="" disabled selected>select</option>
                                                        <option value="Home Delivery">Home Delivery</option>
                                                        <option value="Pickup on Demand Delivery">Pickup on Demand Delivery</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Proof of Payment</label>
                                                <div class="select-items">
                                                <input type="button" class="form-control" data-toggle="modal" data-target="#Modal1" style="background-color:#none; border-color:#e6e6e6;" value="+ Add " required>
                                                
                                                    <div class="modal fade" id="Modal1" role="dialog">
                                                        <div class="modal-dialog" >
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="background-color:#0d0e0f">
                                                                    <h6 class="modal-title font-weight-bold">Proof of Payment</h6>
                                                                    <button type="button" class="close" style="border:none; background-color:#0d0e0f; color:#cda808; font-size:25px"
                                                                        data-dismiss="modal">&times;</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p style="color:#0e0d0f">Please upload a screenshot as a proof of payment.</p>
                                                                    <div class="mb-2 text-center">
                                                                        <div class="container mt-2">
                                                                            <div id="alertMessage" class="alert alert-warning mb-3" style="display: none">
                                                                                <span id="alertMsg"></span>
                                                                            </div>
                                                                            <div class="d-grid text-center">
                                                                                <img class="mb-2" id="ajaxImgUpload" alt="Preview Image" style="margin-left:15%" src="http://localhost/ocake/tools/uploads/gcash.png" />
                                                                            </div>
                                                                            <div class="mb-2">
                                                                                <input type="file" name="image" multiple="true" id="finput" 
                                                                                    class="form-control form-control-lg" accept=".jpg,.jpeg,.png" onchange="validateFileType()" required>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="container mt-3">
                                                    <div id="alertMessage" class="alert alert-warning mb-3" style="display: none">
                                                        <span id="alertMsg"></span>
                                                    </div>
                                                    <div class="d-grid text-center">
                                                        <img class="mb-3" id="ajaxImgUpload" alt="Preview Image" style="margin-left:15%" src="https://via.placeholder.com/300" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <input type="file" name="image" multiple="true" id="finput" onchange="onFileUpload(this);"
                                                            class="form-control form-control-lg"  accept="image/*" required>
                                                    </div>
                                                </div>    -->
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </li>

                            <li>
                                <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                    aria-expanded="false" aria-controls="collapseFour">Shipping Address</h6>
                                <section class="checkout-steps-form-content collapse" id="collapseFour"
                                    aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Municipality</label>
                                                <div class="form-input form">
                                                    <input type="text" placeholder="Municipality" name="municipality" value="Naujan" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Barangay</label>
                                                <div class="select-items">
                                                    <select id="mySelect" onchange="myFunction()" type="text" id="" name="" class="form-control" required>
                                                        <!-- <?//php foreach($userData as $data){?>
                                                            <option value="0"><?//php echo $data->barangay;?></option>
                                                        <?//php }?> -->
                                                        <option value="" disabled selected>select</option>
                                                        <?php foreach($address as $data){?>
                                                            <option value="<?php echo $data->barangay;?>,<?php echo $data->fee;?>"><?php echo $data->barangay;?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Street</label>
                                                <div class="form-input form">
                                                    <input type="text" placeholder="Street" name="street" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Delivery Date</label>
                                                <div class="form-input form">
                                                    <input type="date" id="datepicker" placeholder="Delivery/Pick-up Date" name="date" required>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" value="<?php echo ($Total);?> " name="total_price">
                                        <input type="hidden" value="<?php echo ($Downpayment);?> " name="downpayment">
                                        <input type="hidden" id="payment" value="<?php echo ($Balance);?> " name="balance">
                                        <input type="hidden" value="<?php echo $cart_count;?> " name="items">
                                        <input type="hidden" value="" id="barangay" name="barangay">
                                        <input type="hidden" value="" id="shipping_fee" name="shipping_fee">
                                    </div>
                                </section>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-sidebar">
                        <!-- <div class="checkout-sidebar-coupon">
                            <p>Appy Coupon to get discount!</p>
                            <form action="#">
                                <div class="single-form form-default">
                                    <div class="form-input form">
                                        <input type="text" placeholder="Coupon Code">
                                    </div>
                                    <div class="button">
                                        <button class="btn">apply</button>
                                    </div>
                                </div>
                            </form>
                        </div> -->
                        <div class="checkout-sidebar-price-table">
                            <h5 class="title">Pricing Table</h5>
                            <div class="sub-total-price">
                                <?php foreach($cartData as $data){?>
                                    <div class="total-price">
                                    <?php if($data->is_customized == 0) {?>
                                        <img style="height:40px" src="http://localhost/ocake/tools/uploads/<?php echo $data->image;?>" alt="<?php echo $data->flavor;?>">
                                            <?php }else{?>
                                        <img style="height:40px" src="<?php echo $data->image;?>" alt="<?php echo $data->flavor;?>">
                                            <?php }?>
                                            <span>
                                                <p class="price"><?=$data->occasion. ' Cake'?></p> 
                                                <p class="price"><?=$data->flavor?></p> 
                                            </span>
                                        <span>
                                            <p class="price"><?= '&#8369;'.$data->price?></p>
                                            <p class="price" id="pr">x<?=$data->quantity?></p>
                                        </span>
                                        <p class="price"><?= '&#8369;'.$data->price?></p> 
                                    </div>
                                <?php }?>
                            </div>
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Subotal Price:</p>
                                    <p class="price" name="total_price"><?php echo '&#8369;'. number_format($Total);?></p>
                                </div> 
                                
                                <div class="payable-price">
                                    <p class="value">Shipping Fee:</p>
                                    <p class="price" id="demo" name="shipping_fee"><?php echo '&#8369;'. 0; ?></p>
                                </div><br>
                                <div class="payable-price">
                                    <p class="value">Downpayment:</p>
                                    <p class="price" id="myDown" name="price"><?php echo '&#8369;'. number_format($Downpayment); ?></p>
                                </div>
                                <div class="payable-price">
                                    <p class="value">Price to Pay:</p>
                                    <p class="price" id="bal" value="" name="price"><?php echo '&#8369;'. number_format($Balance); ?></p>
                                </div>
                            </div>
                            <input type="hidden" id="dp" value="<?=$Downpayment?>">
                            <div class="price-table-btn button">   
                                <form>
                                    <?php foreach($cartData as $data){?>
                                        <input type="hidden" name="cart_id[]" value="<?=$data->cart_id?>">
                                        <input type="hidden" name="product_id[]" value="<?=$data->product_id?>">
                                        <input type="hidden" name="occasion[]" value="<?=$data->occasion?>">
                                        <input type="hidden" name="flavor[]" value="<?=$data->flavor?>">
                                        
                                        <input type="hidden" name="price[]" value="<?=$data->price?>">
                                        <input type="hidden" name="quantity[]" value="<?=$data->quantity?>">
                                    <?php }?>
                                    <div class="align-right">
                                        <button type="submit" class="btn btn-alt ">Place Order</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="checkout-sidebar-price-table mt-30">
                            <h5 class="title" style="color:red">REMINDER:</h5>
                            <div class="total-payable">
                                <div >
                                    <p class="value">~ A customized cake should be ordered one day before the scheduled delivery date.</p><br>
                                    <p class="value">~ Ordering over 2 cakes at a time need to make initial payment.</p>
                                </div>
                            </div>
                            
                        </div>
                        <!-- <div class="checkout-sidebar-banner mt-30">
                            <a href="product-grids.html">
                                <img src="tools/user/images/banner/banner.jpg" alt="#">
                            </a>
                        </div> -->
                    </div>
                </div>
            </div>
        </form>
    </div>
<!-- 
     <div class="single-form form-default">
                                                <label>Barangay</label>
                                                <div class="select-items">
                                                    <select id="mySelect" onchange="myFunction()" type="text" id="barangay" name="barangay" class="form-control" required>
                                                    
                                                        <option value="" disabled selected>select</option>
                                                        <?php foreach($address as $data){?>
                                                            <option value="<?//php echo $data->fee;?>"><?//php echo $data->barangay;?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                            </div>
    <p id="demo"></p> -->
</section>
<?php foreach($address as $data){?>
<script>
    function myFunction(){
        // var x = parseInt(document.getElementById("mySelect").value);
        // document.getElementById("demo").innerHTML = '&#8369;'+ x;
        // var y = parseInt(document.getElementById("dp").value);
        // var z = x + y;
        // document.getElementById("bal").innerHTML = '&#8369;'+ z;
        // document.getElementById("payment").value = z;
        // var y = parseInt(document.getElementById("dp").value);

        var one = $('#mySelect').val().split(',')[0];
        var two = parseInt($('#mySelect').val().split(',')[1]);
            document.getElementById("demo").innerHTML = '&#8369;'+ two;
        var y = parseInt(document.getElementById("dp").value);
        var z = two + y;
        document.getElementById("bal").innerHTML = '&#8369;'+ z;
        document.getElementById("payment").value = z;
        document.getElementById("barangay").value = one;
        document.getElementById("shipping_fee").value = two;
    }
</script>
<?php }?>

<script type="text/javascript">
    function validateFileType(){
        var fileName = document.getElementById("finput").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            //TO DO
        }else{
            alert("Only jpg/jpeg and png files are allowed!");
        }   
    }
</script>
<script>
        let DateToday=new Date();
        let month=DateToday.getMonth()+1;
        let day=DateToday.getDate()+3;
        let year=DateToday.getFullYear();
        if(month<10)
            month='0'+month.toString();
        if(day<10)
            day='0'+day.toString();
        let Today=year+'-'+month+'-'+day;
        let maxdate=year+1+'-'+month+'-'+day;
        document.getElementById('datepicker').setAttribute("min",Today);
</script>
<?php echo view('admin/include/photo-script'); ?>
<?//php echo view('admin/include/script'); ?>
