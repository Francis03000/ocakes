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
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-12">

                <div class="total-amount">
                    <div class="row">
                        <div class="col-lg-8 col-md-6 col-12">
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="right">
                                <ul>
                                    <li>Cart Subtotal<span id="pinakatotal"></span></li>
                                </ul>
                                <div class="button">
                                    <button class="btn" id="checkout">Checkout</button>
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

        let arrayCart = ["checkbox","image","product_description","quantity","subtotal","deleteAction"]
        let model = [];
        initData();
        function initData(){
            $("#cart-bodys").empty();
            model = [];
            var totalamount = 0;
            $.ajax({
                url: '<?= base_url('user/cart/cart-user-detail') ?>',
                method: 'get',
                dataType: 'json',
                success: function(response) {
                    let product_container = $("#cart-bodys");
                    response.forEach((product,m) => {
                        model.push(product);
                        let tabrow = $("<tr>");
                        const attriMap = new Map(Object.entries(product));
                        arrayCart.forEach((attri, i) => {
                            if (attri != "subtotal" && attri != "deleteAction" && attri != "checkbox" && attri != "image" && attri!="product_description" && attri != "quantity") {
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
                                    checked:product.is_check == 1 ? true : false,
                                }).appendTo(td);
                                td.appendTo(tabrow);
                            }else if (attri == "quantity") {
                                let td = $("<td>", {
                                    style:"text-align: center; vertical-align: middle;",
                                    class: "text-wrap",
                                });
                                 let btn = $("<button>",{
                                    class:"btn btn-danger btn-sm",
                                    "data-id":product.cart_id,
                                    "data-index":m,
                                    id:"minusqt",
                                });

                                $("<i>",{
                                    class:"fa fa-minus",
                                }).appendTo(btn);

                                btn.appendTo(td);
                                
                                $("<input>",{
                                    type:"number",
                                    style:"text-align: center;",
                                    min:"1",
                                    value:product.quantity,
                                    id:"quantityOrder-"+product.cart_id,
                                }).appendTo(td);
                                let btn1 = $("<button>",{
                                    class:"btn btn-danger btn-sm",
                                    "data-id":product.cart_id,
                                    "data-index":m,
                                    id:"addqt",
                                });
                                $("<i>",{
                                    class:"fa fa-plus",
                                }).appendTo(btn1);

                                btn1.appendTo(td);
                                td.appendTo(tabrow);
                            }else if (attri == "image") {
                                let td = $("<td>", {
                                    style:"text-align: center; vertical-align: middle;",
                                    class: "text-wrap",
                                });
                                $("<img>",{
                                    style:"height:100px; width:100px",
                                    src:"tools/uploads/"+product.image,
                                }).appendTo(td);
                                td.appendTo(tabrow);
                            }else if (attri == "deleteAction") {
                                let td = $("<td>", {
                                    style:"text-align: center; vertical-align: middle;",
                                    class: "text-wrap",
                                });
                                let btn = $("<button>",{
                                    class:"btn btn-danger btn-sm",
                                    "data-id":product.cart_id,
                                    id:"cartProductRemove",
                                });

                                $("<i>",{
                                    class:"fa fa-trash",
                                }).appendTo(btn);

                                btn.appendTo(td);
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
                                    id:"cart-"+product.cart_id,
                                    html:parseFloat(attriMap.get("total_price")),
                                }).appendTo(tabrow);
                                // totalamount += parseFloat(attriMap.get("total_price"));
                            }
                            product_container.append(tabrow);
                        });
                    });
                    updateSubtotalLast();
                }
            });
        }

        $("body").on("click","#selectedCartOrder",function(e){
            var id = $(e.currentTarget).data("id");

             if($(e.currentTarget).is(":checked")){
                $.ajax({
                    url: '<?= base_url('user/cart/cart-update-checkout') ?>',
                    method: 'post',
                    data:{cart_id:id,is_check:1},
                    dataType: 'json',
                    success: function(response) {
                        initData();
                    }
                });
             }else{
                $.ajax({
                    url: '<?= base_url('user/cart/cart-update-checkout') ?>',
                    method: 'post',
                    data:{cart_id:id,is_check:0},
                    dataType: 'json',
                    success: function(response) {
                        initData();
                    }
                });
             }

            
        });

        $("body").on("click","#addqt",function(e){
            var id = $(e.currentTarget).data("id");
            var index = $(e.currentTarget).data("index");
            var newquantity = parseInt(model[index].quantity)+1;
            var newtotal_price = parseFloat(model[index].price) * newquantity;

            $.ajax({
                url: '<?= base_url('user/cart/cart-update') ?>',
                method: 'post',
                data:{cart_id:id,quantity:newquantity,total_price:newtotal_price},
                dataType: 'json',
                success: function(response) {
                    initData();
                }
            });
        });

        $("#checkout").click(function(){
            location.href = "checkout";
        })

        $("body").on("click","#minusqt",function(e){
            var id = $(e.currentTarget).data("id");
            var index = $(e.currentTarget).data("index");
            var newquantity = parseInt(model[index].quantity)-1;
            var newtotal_price = parseFloat(model[index].price) * newquantity;

            $.ajax({
                url: '<?= base_url('user/cart/cart-update') ?>',
                method: 'post',
                data:{cart_id:id,quantity:newquantity,total_price:newtotal_price},
                dataType: 'json',
                success: function(response) {
                    initData();
                }
            });
        });

        function updateSubtotalLast(){
            var totalamount = 0;
            $.ajax({
                url: '<?= base_url('user/cart/cart-user-detail') ?>',
                method: 'get',
                dataType: 'json',
                success: function(response) {
                    response.forEach((totals) => {
                        totalamount+=parseFloat(totals.total_price);
                    });
                    $("#pinakatotal").html(totalamount);
                }
            });
        }

        $("body").on("click","#cartProductRemove",function(e){
            var id = $(e.currentTarget).data("id");
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, remove it!'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Remove!',
                'Product has been remove from your cart',
                'success'
                ).then(()=>{
                     $.ajax({
                        url: '<?= base_url('user/cart/cart-delete') ?>',
                        method: 'post',
                        data:{cart_id:id},
                        dataType: 'json',
                        success: function(response) {
                            initData();
                        }
                    });
                }
                )
            }
            });
        });
    })
</script>