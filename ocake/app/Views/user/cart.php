<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Cart</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="<?=site_url('home')?>"><i class="lni lni-home"></i> Home</a></li>
                    <!-- <li><a href="<?//=site_url('productlist')?>">Shop</a></li> -->
                    <li>Cart</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
<script
  src="https://code.jquery.com/jquery-3.6.3.js"
  integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
  crossorigin="anonymous"></script>

<div class="shopping-cart section">
    <div class="container">
       <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th style="text-align: center; vertical-align: middle;"><input type="checkbox" name="selectAll" id="selectAll"></th>
                        <th style="text-align: center; vertical-align: middle;">Product Image</th>
                        <th style="text-align: center; vertical-align: middle;">Product Description</th>
                        <th style="text-align: center; vertical-align: middle;">Quantity</th>
                        <th style="text-align: center; vertical-align: middle;">Subtotal</th>
                        <th style="text-align: center; vertical-align: middle;">Actions</th>
                    </tr>
                </thead>
                <tbody id="cart-bodys">
                    <!-- <tr>
                        <td style="text-align: center; vertical-align: middle;"><input type="checkbox" name="selectAll" id="selectAll"></td>
                        <td style="text-align: center; vertical-align: middle;"><img style="height:100px; width:100px" src="tools/uploads/ocake_logo2.gif" alt="Logo"></td>
                        <td style="text-align: center; vertical-align: middle;">
                            <p>Name : CAKE 101</p>
                            <p>Flavor : CAKE 101</p>
                            <p>Unit Price : CAKE 101</p>
                        </td>
                        <td style="text-align: center; vertical-align: middle;"><input type="number" name="quantity" id="quantity"></td>
                        <td style="text-align: center; vertical-align: middle;">101</td>
                        <td style="text-align: center; vertical-align: middle;">
                            <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-12">

                <div class="total-amount">
                    <div class="row">
                        <div class="col-lg-8 col-md-6 col-12">
                            <!-- <div class="left">
                                <div class="coupon">
                                    <form action="#" target="_blank">
                                        <input name="Coupon" placeholder="Enter Your Coupon">
                                        <div class="button">
                                            <button class="btn">Apply Coupon</button>
                                        </div>
                                    </form>
                                </div>
                            </div> -->
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="right">
                                <ul>
                                    <li>Cart Subtotal<span><?php echo '&#8369;' . number_format ($subtotal). ".00"; ?></span></li>
                                </ul>
                                <div class="button">
                                    <input type="submit" class="btn" value="Checkout" >
                                    <!-- <a href="<?//=site_url('productgrid')?>" class="btn btn-alt">Continue shopping</a> -->
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
<script src="tools/user/js/order.js"></script>
</body>
</html>

<script>
    $(document).ready(function(){

        let arrayCart = ["checkbox","image","product_description","quantity","subtotal"]
        initData();
        function initData(){
            var totalamount = 0;
            $.ajax({
                url: '<?= base_url('user/cart/cart-user-detail') ?>',
                method: 'get',
                dataType: 'json',
                success: function(response) {
                    let product_container = $("#cart-bodys");
                    response.forEach((product) => {
                        let tabrow = $("<tr>");
                        const attriMap = new Map(Object.entries(product));
                        arrayCart.forEach((attri, i) => {
                            if (attri != "subtotal" && attri != "checkbox" && attri != "image" && attri!="product_description" && attri != "quantity") {
                                $("<td>", {
                                    class: "text-wrap",
                                    style:"text-align: center; vertical-align: middle;",
                                    html: attriMap.get(attri),
                                }).appendTo(tabrow);
                            }else if (attri == "checkbox") {
                                let td = $("<td>", {
                                    style:"text-align: center; vertical-align: middle;",
                                    class: "text-wrap",
                                });
                                $("<input>",{
                                    type:"checkbox",
                                    "data-id":product.cart_id,
                                    id:"selectedCartOrder",
                                }).appendTo(td);
                                td.appendTo(tabrow);
                            }else if (attri == "quantity") {
                                let td = $("<td>", {
                                    style:"text-align: center; vertical-align: middle;",
                                    class: "text-wrap",
                                });
                                $("<input>",{
                                    type:"number",
                                    style:"text-align: center;",
                                    "data-id":product.cart_id,
                                    value:product.quantity,
                                    id:"quantityOrder",
                                }).appendTo(td);
                                td.appendTo(tabrow);
                            }else if (attri == "image") {
                                let td = $("<td>", {
                                    style:"text-align: center; vertical-align: middle;",
                                    class: "text-wrap",
                                });
                                $("<img>",{
                                    style:"height:100px; width:100px",
                                    src:"tools/uploads/ocake_logo2.gif",
                                }).appendTo(td);
                                td.appendTo(tabrow);
                            }else if (attri == "product_description") {
                                let td = $("<td>", {
                                    style:"text-align: center; vertical-align: middle;",
                                    class: "text-wrap",
                                });
                                $("<p>",{
                                    html:"Product name : " + product.product_name,
                                }).appendTo(td);
                                $("<p>",{
                                    html:"Flavor : " + product.flavor,
                                }).appendTo(td);
                                $("<p>",{
                                    html:"Occasions : " + product.occasion,
                                }).appendTo(td);
                                $("<p>",{
                                    html:"Unit Price : " + product.price,
                                }).appendTo(td);
                                td.appendTo(tabrow);
                            } else if (attri == "subtotal") {
                                $("<td>", {
                                    class: "text-wrap",
                                    style:"text-align: center; vertical-align: middle;",
                                    html:parseFloat(attriMap.get("total_price")),
                                }).appendTo(tabrow);
                                // totalamount += parseFloat(attriMap.get("total_price"));
                            }
                            product_container.append(tabrow);
                        });
                    });
                }
            });
        }

        $("body").on("click","#quantityOrder",function(e){
            alert($(e.currentTarget).data("id"));
            alert($(e.currentTarget).val());
        });
    })
</script>