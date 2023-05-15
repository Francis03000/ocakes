<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Forgot Password</title>

    <!-- Custom fonts for this template-->
    <!-- <link href="tools/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="tools/admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-prima">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2"><b>Forgot Your Password?</b></h1>
                                        <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                            and we'll send you a link to reset your password!</p>
                                    </div>
                                    <div class="p-2">
                                    <!-- ERROR MSG IF EMAIL IS NOT REGISTERED -->
                                            <p style="text-align:center"><?php if($session->getFlashdata('msg')){ echo $session->getFlashdata('msg');} ?></p>
                                        </div>
                                    <form action="<?=site_url('sendAdminResetCode')?>" method="post">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" name="email" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
            
                                        <button type="submit" class="btn btn-primary btn-user btn-block" style="background-color:#0d0e0f; border-color:#0d0e0f; color:#fecb00">
                                        <b>Send OTP</b>
                                    </button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 d-none d-lg-block bg-password-image">
                            <img style="height:410px; width:420px; margin-left:20px" src="http://localhost/ocake/tools/uploads/ocake_logo.gif/">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <!-- <script src="tools/admin/vendor/jquery/jquery.min.js"></script>
    <script src="tools/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

    <!-- Core plugin JavaScript-->
    <!-- <script src="tools/admin/vendor/jquery-easing/jquery.easing.min.js"></script> -->

    <!-- Custom scripts for all pages-->
    <!-- <script src="tools/admin/js/sb-admin-2.min.js"></script> -->

</body>

</html>