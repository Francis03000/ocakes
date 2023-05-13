<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">

    <title>Product List</title>
    <script src="https://kit.fontawesome.com/8494b77c9c.js" crossorigin="anonymous"></script>

    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>/tools/admin/assets/img/favicon.png">
    <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/css/animate.css">
    <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/css/style.css">
    <!-- Modal -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
                        <h4>Product List</h4>
                        <h6>Manage your products</h6>
                    </div>
                    <div class="page-btn">
                        <a type="button" class="btn btn-added"><img
                                src="<?=base_url()?>/tools/admin/assets/img/icons/plus.svg" alt="img" class="me-1"
                                data-toggle="modal" data-target="#myModal">Add New Product</a>
                    </div>
                </div>
                <div class="container">
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content" style="width:600px">
                                <div style="margin-top:5%; margin-left:5%; margin-right:5%">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Add Product</h4>
                                </div>
                                <div class="modal-body">
                                    <?php $validation = \Config\Services::validation();?>
                                    <form class="container mt-2" action="<?=site_url('admin/addproduct')?>"
                                        method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                        <?php if(session('success')){ echo session('success');}else{ echo session('error');}?>
                                        <div class="row">
                                            <div class="col-lg-3 col-12">
                                                <label>Product Code</label>
                                                <input type="text" class="form-control" name="product_code">

                                                <label>Product Name</label>
                                                <input type="text" class="form-control" name="product_name">

                                                <label>Price</label>
                                                <input type="text" class="form-control" name="price">

                                                <label>Stock</label>
                                                <input type="text" class="form-control" name="stock">

                                                <label>Product Image</label>
                                                <div class="container mt-3">
                                                    <div id="alertMessage" class="alert alert-warning mb-3"
                                                        style="display: none">
                                                        <span id="alertMsg"></span>
                                                    </div>
                                                    <div class="d-grid text-center"
                                                        style="height:100px; width:100px; margin-left:5%">
                                                        <img class="mb-3" id="ajaxImgUpload" alt="Preview Image"
                                                            src="https://via.placeholder.com/300" />
                                                    </div>
                                                    <div class="mt-2 mb-3">
                                                        <input type="file" name="image" multiple="true" id="finput"
                                                            onchange="onFileUpload(this);" class="form-control"
                                                            style="width:20%" accept="image/*">
                                                    </div>
                                                </div>

                                                <!-- <label> Product Image</label>
                                        <div class="image-upload">
                                            <input type="file" name="image">
                                            <div class="image-uploads">
                                                <img src=/tools/admin/assets/img/icons/upload.svg" alt="img">
                                                <h4>Drag and drop a file to upload</h4>
                                            </div>
                                        </div> -->
                                            </div>

                                            <div class="col-lg-3 col-12">
                                                <label>Category</label>
                                                <select id="mySelect" onchange="myFunction()" class="select"
                                                    name="occasion">
                                                    <option disabled selected>Select</option>
                                                    <!-- <option>Birthday</option>
                                        <option>Christening</option>
                                        <option>Wedding</a></li>
                                        <option>Graduation</option>
                                        <option>Valentine</option>
                                        <option>Halloween</option>
                                        <option>Christmas</option>
                                        <option>New Year</option> -->
                                                    <?php foreach($category as $data){?>
                                                    <option
                                                        value="<?php echo $data->category_name;?>,<?php echo $data->category_id;?>">
                                                        <?php echo $data->category_name;?></option>
                                                    <?php }?>
                                                </select><br><br>

                                                <input type="hidden" value="" id="occasion" name="occasion">
                                                <input type="hidden" value="" id="cat_id" name="cat_id">

                                                <label>Flavor</label>
                                                <select class="select" name="flavor">
                                                    <option disabled selected>Select</option>
                                                    <option>None</option>
                                                    <?php foreach($flavor as $data){?>
                                                    <option><?php echo $data->flavor;?></option>
                                                    <?php }?>
                                                </select><br><br>

                                                <label>Status</label>
                                                <select name="status" class="form-control" id="status">
                                                    <option disabled selected>Select</option>
                                                    <option>Available</option>
                                                    <option>Unavailable</option>
                                                </select><br>

                                                <label>Availability</label>
                                                <select class="select" name="availability">
                                                    <option disabled selected>Select</option>
                                                    <option>None</option>
                                                    <option>Pre Order</option>
                                                    <option>Ready Maade</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="modal-footer" style="padding-left:25%">
                                            <button type="button" class="btn btn-secondary btn-lg"
                                                data-dismiss="modal">Cancel</button>
                                            <input class="btn btn-success btn-lg" type="submit" value="Add"
                                                name="submit" style="width:100px">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-top">
                            <div class="search-set">
                                <div class="search-path">
                                    <a class="btn btn-filter" id="filter_search">
                                        <img src="<?=base_url()?>/tools/admin/assets/img/icons/filter.svg" alt="img">
                                        <span><img src="<?=base_url()?>/tools/admin/assets/img/icons/closes.svg"
                                                alt="img"></span>
                                    </a>
                                </div>
                                <div class="search-input">
                                    <a class="btn btn-searchset"><img
                                            src="<?=base_url()?>/tools/admin/assets/img/icons/search-white.svg"
                                            alt="img"></a>
                                </div>
                            </div>
                            <div class="wordset">
                                <ul>
                                    <li>
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                                src="<?=base_url()?>/tools/admin/assets/img/icons/pdf.svg"
                                                alt="img"></a>
                                    </li>
                                    <li>
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                                src="<?=base_url()?>/tools/admin/assets/img/icons/excel.svg"
                                                alt="img"></a>
                                    </li>
                                    <li>
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                                src="<?=base_url()?>/tools/admin/assets/img/icons/printer.svg"
                                                alt="img"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="card mb-0" id="filter_inputs">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-lg col-sm-6 col-12">
                                                <div class="form-group">
                                                    <select class="select">
                                                        <option>Choose Product</option>
                                                        <option>Macbook pro</option>
                                                        <option>Orange</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg col-sm-6 col-12">
                                                <div class="form-group">
                                                    <select class="select">
                                                        <option>Choose Category</option>
                                                        <option>Computers</option>
                                                        <option>Fruits</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg col-sm-6 col-12">
                                                <div class="form-group">
                                                    <select class="select">
                                                        <option>Choose Sub Category</option>
                                                        <option>Computer</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg col-sm-6 col-12">
                                                <div class="form-group">
                                                    <select class="select">
                                                        <option>Brand</option>
                                                        <option>N/D</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg col-sm-6 col-12 ">
                                                <div class="form-group">
                                                    <select class="select">
                                                        <option>Price</option>
                                                        <option>150.00</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-1 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <a class="btn btn-filters ms-auto"><img
                                                            src="<?=base_url()?>/tools/admin/assets/img/icons/search-whites.svg"
                                                            alt="img"></a>
                                                </div>
                                            </div>
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
                                        <th>Product Image</th>
                                        <th>Category </th>
                                        <th>Flavor</th>
                                        <th>Stock</th>
                                        <th>Price</th>
                                        <th>Availability</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $num = 1;
                      foreach($product as $data){?>
                                    <tr>
                                        <td>
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>
                                        <td class="productimgname">
                                            <a href="javascript:void(0);" class="product-img">
                                                <img src="http://localhost/ocake/tools/uploads/<?php echo $data->image;?>"
                                                    alt="product">
                                            </a>
                                            <a href="javascript:void(0);"><?=$data->product_name;?></a>
                                        </td>
                                        <td><?=$data->occasion;?></td>
                                        <td><?=$data->flavor;?></td>
                                        <td><?=$data->stock;?></td>
                                        <td><?=$data->price;?></td>
                                        <td><?=$data->availability;?></td>
                                        <td>
                                            <div style="text-align:center">
                                                <input class="" type="button" style="justify-content:center; border-radius:5px; color:#ffffff;
                                    <?php if($data->status=="Available"){
                                        echo "background-color:#25b831; border-color:#25b831";
                                    }elseif($data->status=="Unavailable"){
                                        echo "background-color:#ed2f2f; border-color:#ed2f2f";
                                    } ?>
                                        " value="<?=$data->status;?>">
                                            </div>
                                        </td>
                                        <td>
                                            <!-- <a class="me-3" type="button">
                            <img src="<?//=base_url()?>/tools/admin/assets/img/icons/eye.svg" alt="img" data-toggle="modal" data-target="#viewModal">
                            </a> -->
                                            <a class="me-3" type="button">
                                                <img src="<?=base_url()?>/tools/admin/assets/img/icons/edit.svg"
                                                    alt="img" data-toggle="modal"
                                                    data-target="#editModal<?php echo $data->id;?>">
                                            </a>
                                            <a class="confirm-text"
                                                href="<?php echo site_url('admin/productlist/delete_prod/' . $data->id); ?>">
                                                <img src="<?=base_url()?>/tools/admin/assets/img/icons/delete.svg"
                                                    alt="img">
                                            </a>
                                        </td>
                                        <div class="container">
                                            <!-- Modal -->
                                            <div class="modal fade" id="editModal<?php echo $data->id;?>" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content" style="width:600px">
                                                        <div style="margin-top:5%; margin-left:5%; margin-right:5%">
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Edit Product</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php $validation = \Config\Services::validation();?>
                                                            <form class="container mt-2"
                                                                action="<?php echo site_url('admin/productlist/update_prod/' . $data->id); ?>"
                                                                method="post" accept-charset="utf-8"
                                                                enctype="multipart/form-data">
                                                                <?php if(session('success')){ echo session('success');}else{ echo session('error');}?>
                                                                <div class="row">
                                                                    <input type="hidden" name="prod_id"
                                                                        value="<?php echo $data->id?>">
                                                                    <div class="col-lg-6 col-12">
                                                                        <label>Category</label>
                                                                        <select class="select" onchange="myFunction()"
                                                                            name="occasion">
                                                                            <option selected>
                                                                                <?php echo $data->occasion?></option>
                                                                            <?php foreach($category as $c){?>
                                                                            <option><?php echo $c->category_name;?>
                                                                            </option>
                                                                            <?php }?>
                                                                        </select>

                                                                        <label>Flavor</label>
                                                                        <select class="select" name="flavor">
                                                                            <option selected><?php echo $data->flavor?>
                                                                            </option>
                                                                            <?php foreach($flavor as $f){?>
                                                                            <option><?php echo $f->flavor;?></option>
                                                                            <?php }?>
                                                                        </select>

                                                                        <label> Product Image</label>
                                                                        <div class="mt-3">
                                                                            <div id="alertMessage"
                                                                                class="alert alert-warning mb-3"
                                                                                style="display: none">
                                                                                <span id="alertMsg"></span>
                                                                            </div>
                                                                            <div class="d-grid text-center">
                                                                                <img class="mb-3" id="ajaxImgUpload"
                                                                                    style="float:center;margin-left:25%"
                                                                                    alt="Preview Image"
                                                                                    src="http://localhost/ocake/tools/uploads/<?php echo $data->image;?>"
                                                                                    height='50%' width='50%' />
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <input type="file" name="image"
                                                                                    multiple="true" id="finput"
                                                                                    onchange="onFileUpload(this);"
                                                                                    class="form-control form-control-lg "
                                                                                    accept="image/*">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-12">
                                                                        <label>Product Code</label>
                                                                        <input type="text" class="form-control"
                                                                            name="product_code"
                                                                            value="<?php echo $data->product_code?>">
                                                                        <label>Product Name</label>
                                                                        <input type="text" class="form-control"
                                                                            name="product_name"
                                                                            value="<?php echo $data->product_name?>">

                                                                        <label>Status</label>
                                                                        <select name="status" class="form-control"
                                                                            id="status">
                                                                            <option
                                                                                <?php if($data->status == "Available"){ echo "selected"; }?>
                                                                                value="Available">Available</option>
                                                                            <option
                                                                                <?php if($data->status == "Unavailable"){ echo "selected"; }?>
                                                                                value="Unavailable">Unavailable</option>
                                                                        </select>

                                                                        <label>Availability</label>
                                                                        <select name="availability" class="form-control"
                                                                            id="availability">
                                                                            <option
                                                                                <?php if($data->availability == "Pre Order"){ echo "selected"; }?>
                                                                                value="Pre Order">Pre Order</option>
                                                                            <option
                                                                                <?php if($data->availability == "Ready Made"){ echo "selected"; }?>
                                                                                value="Ready Made">Ready Made</option>
                                                                        </select>

                                                                        <label>Price</label>
                                                                        <input type="text" class="form-control"
                                                                            name="price"
                                                                            value="<?php echo $data->price?>">

                                                                        <label>Stock</label>
                                                                        <input type="text" class="form-control"
                                                                            name="stock"
                                                                            value="<?php echo $data->stock?>">


                                                                        <input type="hidden"
                                                                            value="<?php echo $data->cat_id?>"
                                                                            id="cat_id" name="cat_id">
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer" style="justify-content:right">
                                                                    <button type="button"
                                                                        class="btn btn-secondary btn-lg"
                                                                        data-dismiss="modal">Cancel</button>
                                                                    <input class="btn btn-success btn-lg" type="submit"
                                                                        value="Save" name="submit" style="width:100px">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

    <?php foreach($category as $data){?>
    <script>
    function myFunction() {
        // var x = parseInt(document.getElementById("mySelect").value);
        // document.getElementById("demo").innerHTML = '&#8369;'+ x;
        // var y = parseInt(document.getElementById("dp").value);
        // var z = x + y;
        // document.getElementById("bal").innerHTML = '&#8369;'+ z;
        // document.getElementById("payment").value = z;
        // var y = parseInt(document.getElementById("dp").value);

        var one = $('#mySelect').val().split(',')[0];
        var two = parseInt($('#mySelect').val().split(',')[1]);
        document.getElementById("occasion").value = one;
        document.getElementById("cat_id").value = two;
    }
    </script>
    <?php }?>

    <?php echo view('admin/include/photo-script'); ?>
    <script src="<?=base_url()?>/tools/admin/assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?=base_url()?>/tools/admin/assets/js/feather.min.js"></script>
    <script src="<?=base_url()?>/tools/admin/assets/js/jquery.slimscroll.min.js"></script>
    <script src="<?=base_url()?>/tools/admin/assets/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>/tools/admin/assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?=base_url()?>/tools/admin/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>/tools/admin/assets/plugins/select2/js/select2.min.js"></script>
    <script src="<?=base_url()?>/tools/admin/assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="<?=base_url()?>/tools/admin/assets/plugins/sweetalert/sweetalerts.min.js"></script>
    <script src="<?=base_url()?>/tools/admin/assets/js/script.js"></script>
</body>

</html>