<!DOCTYPE html>
<html>

<head>
    <title>OTP</title>
    <link rel="stylesheet" type="text/css" href="tools/user/signlog/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="tools/user/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script src="tools/user/js/bootstrap/bootstrap.bundle.min.js"></script>

<style>
.pass-image{
    height: 120px;
    width:120px;
    padding:1px;
    text-align: center;
    align-items: center;
}
.container-fluid, .card{
    text-align: center;
    align-items: center;
}

</style>
</head>

<body>
    <div class="container-fluid" >
        <div class="d-flex justify-content-center">
        <div class="card" style="width: 30rem;">
            <img class=" pass-image" src="https://icon-library.com/images/reset-password-icon/reset-password-icon-29.jpg"  alt="...">
            <div class="card-body">
            <h2>Password Successfully Changed.</h2>
                <a href="<?=site_url('signin')?>" class="btn btn-primary">Go to login page.</a>
            </div>
            </div>
            <!-- <div class="card">
                <div class="p-2">
                    <h2>Password Successfully Changed.</h2>
                </div>
                <div class="p-2">
                    <a href="<?=site_url('signin')?>">Go to login page.</a>
                </div>
            </div> -->
        </div>
    </div>
</body>

</html>