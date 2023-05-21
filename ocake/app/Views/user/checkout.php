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
                                                <label>Delivery Method</label>
                                                <div class="select-items">
                                                    <select type="delivery_method" id="delivery_method" name="delivery_method" class="form-control" required>
                                                        <option>select</option>
                                                        <option value="Home Delivery">Home Delivery</option>
                                                        <option value="Pickup on Demand Delivery">Pickup on Demand Delivery</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Municipality</label>
                                                <div class="form-input form">
                                                    <input type="text" placeholder="Municipality" id="mp" name="municipality" value="Naujan" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Barangay</label>
                                                <div class="select-items">
                                                    <select id="mySelect" onchange="myFunction()" type="text" id="" name="" class="form-control" required>
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
                                                    <input type="text" placeholder="Street" id="st" name="street" required>
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
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Delivery Time</label>
                                                <div class="form-input form">
                                                    <input type="time" id="timepicker" placeholder="Delivery/Pick-up Time" name="time" required>
                                                </div>
                                            </div>
                                        </div>
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
                                            <input type="radio" name="payment" id="box1" value="Downpayment" required>
                                            <label for="box1">Down Payment</label>
                                            <input type="radio" name="payment" id="box2" value="Fullpayment" required>
                                            <label for="box2">Full Payment</label>
                                        </div>
                                    </div>
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
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Proof of Payment</label>
                                                <div class="select-items">
                                                <input type="button" class="form-control" data-toggle="modal" data-target="#Modal1" style="background-color:#none; border-color:#e6e6e6;" value="+ Add " id="proof" required>
                                                
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
                                        <input type="hidden" id="tp5" name="total_prices">
                                        <input type="hidden" id="dphide" name="downpayment">
                                        <input type="hidden" id="bl" name="balance">
                                        <input type="hidden" value="<?php echo $cart_count;?> " name="items">
                                        <input type="hidden" value="Antipolo" id="barangay" name="barangay">
                                        <input type="hidden"  id="shipping_fee" name="shipping_fee">
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
                            <div class="sub-total-price" id="tocheckProduct">
                                
                            </div>
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Subotal Price:</p>
                                    <p class="price" name="total_price" id="tp">0</p>
                                </div> 
                                
                                <div class="payable-price">
                                    <p class="value">Shipping Fee:</p>
                                    <p class="price" id="demo">0</p>
                                </div><br>
                                <div class="payable-price" id="dw">
                                    <p class="value">Downpayment:</p>
                                    <p class="price" id="myDown" name="price">0</p>
                                </div>
                                <div class="payable-price" id="fulldp">
                                    <p class="value">Fullpayment:</p>
                                    <p class="price" id="myFull" name="price">0</p>
                                </div>
                                <div class="payable-price">
                                    <p class="value">Price to Pay:</p>
                                    <p class="price" id="balance" name="price">0</p>
                                </div>
                            </div>
                            <input type="hidden" name="fullpayment" id="fullDP">
                            <input type="hidden" name="isDP" id="isDP">
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
                    </div>
                </div>
            </div>
        </form>
    </div>
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
                <button type="button" id="gca" class="btn btn-default">Close</button> 
            </div>
        </div>
    </div>
</div>
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
            document.getElementById("demo").innerHTML = two;
        var y = parseInt(document.getElementById("dp").value);
        var z = two + y;
        document.getElementById("barangay").value = one;
        if($("#delivery_method").val()==="Pickup on Demand Delivery"){
            document.getElementById("shipping_fee").value = 0;
        }else{
            document.getElementById("shipping_fee").value = two;
        }
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
    $(document).ready(function(){

        $("#fulldp").hide();

        let model = [];
        let arrayCart = ["image","occasion","quantity","totalpr"]
        initData();
        function initData(){
            $("#tocheckProduct").empty();
            model = [];
            var totalamount = 0;
             $.ajax({
                url: '<?= base_url('check/out/data') ?>',
                method: 'get',
                dataType: 'json',
                success: function(response) {
                    let product_container = $("#tocheckProduct");
                    response.forEach((product,m) => {
                        totalamount += parseFloat(product.total_price);
                        model.push(product);
                        let tabrow = $("<div>",{class:"total-price",});
                        const attriMap = new Map(Object.entries(product));
                        arrayCart.forEach((attri, i) => {
                            if (attri == "image") {
                                $("<img>",{
                                    style:"height:40px",
                                    src:"tools/uploads/"+product.image,
                                    alt:product.flavor,
                                }).appendTo(tabrow);
                            }else if (attri == "occasion") {
                                let span1 = $("<span>");
                                $("<p>",{
                                    class:"price",
                                   html:product.occasion + " Cake",
                                }).appendTo(span1);
                                $("<p>",{
                                    class:"price",
                                   html:product.flavor,
                                }).appendTo(span1);
                                span1.appendTo(tabrow);
                            }else if (attri == "quantity") {
                                let span2 = $("<span>");
                                $("<p>",{
                                    class:"price",
                                   html:"₱ " + product.price,
                                }).appendTo(span2);
                                $("<p>",{
                                    class:"price",
                                   html:"QT: " +product.quantity,
                                }).appendTo(span2);
                                span2.appendTo(tabrow);
                            }else if (attri == "totalpr") {
                                $("<p>",{
                                    class:"price",
                                    html:"ST: " +product.total_price,
                                }).appendTo(tabrow);
                            }
                        product_container.append(tabrow);
                        });
                    });

                    $("#tp").html(totalamount);
                    $("#myDown").html(totalamount/2);
                }
            });
        }

        $("#gca").click(function(){
            $("#Modal").modal('hide');
        });

        $("#mySelect").change(function(){
            $("#balance").html(parseFloat($("#myDown").html())+parseFloat($("#demo").html()));
            $("#box1").attr("disabled", false); 
            $("#box2").attr("disabled", false); 
        });

        $('#mySelect').attr("disabled", true); 
        $('#payment_method').attr("disabled", true); 
        $('#st').attr("readonly", true); 
        
        $("#delivery_method").change(function(){
            if($("#delivery_method").val()==="Pickup on Demand Delivery"){
                $('#mySelect').val("Antipolo,90").attr("selected", "selected");
                $('#mySelect').attr("disabled", true); 
                $('#st').attr("readonly", true).val("Maganda"); 
                $("#balance").html(parseFloat($("#myDown").html())+parseFloat($("#demo").html()));
                document.getElementById("shipping_fee").value = 0;
                $("#box1").attr("disabled", false); 
                $("#box2").attr("disabled", false); 
            }else{
                $("#balance").html(parseFloat($("#myDown").html())+parseFloat($("#demo").html()));
                $('#mySelect').val("").attr("selected", "selected");
                $('#mySelect').attr("disabled", false); 
                $('#st').removeAttr('readonly').val(''); 
            }
        });
        
        // mySelect
        if($("#mySelect").val()===null){
            $("#box1").attr("disabled", true); 
            $("#box2").attr("disabled", true); 
            $("#proof").attr("disabled", true);
        } 

        $("#box1").click(function(){
            $("#dw").show();
            $("#isDP").val(1);
            $("#fulldp").hide();
            $("#balance").html(parseFloat($("#myDown").html())+parseFloat($("#demo").html()));
            $("#tp5").val(parseFloat($("#tp").html()));
            $("#dphide").val(parseFloat($("#myDown").html()));
            $("#bl").val(parseFloat($("#balance").html()));
            $('#payment_method').attr("disabled", false); 
        });

        $("#box2").click(function(){
            $("#fulldp").show();
            $("#dw").hide();
            $("#isDP").val(0);
            $("#myFull").html(parseFloat($("#tp").html())+parseFloat($("#demo").html()));
            $("#balance").html(0);
            $("#tp5").val(parseFloat($("#tp").html()));
            $("#dphide").val(parseFloat($("#myFull").html()));
            $("#bl").val(0);
            $('#payment_method').attr("disabled", false); 
        });

        $('#payment_method').change(function(){
            $("#Modal").modal('show');
        });
    });
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
