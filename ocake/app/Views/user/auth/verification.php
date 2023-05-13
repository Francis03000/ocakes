<!DOCTYPE html>
<html>

<head>
    <title>SignUp and Login</title>
    <link rel="stylesheet" type="text/css" href="tools/user/signlog/style.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link href="tools/user/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script src="tools/user/js/bootstrap/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

<style>
    .form-gap {
    padding-top: 10px;
}
</style>
</head>

<body>
    <div class="form-gap"></div>
<div class="container" style="width:500px;">
	<div class="row" style=" margin-top: 100px;" >
		<div class="col-md-12 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body" >
                <div class="text-center">
                  <h3><i class="fa-regular fa-envelope fa-4x"></i></h3>
                  <h2 class="text-center">Verify Email</h2>
                  <p>Please enter 6 digit pin.</p>
                  <span style="color:red">An otp has been sent to your email which expire within 5 minuste.</span>
                  <div class="panel-body">

                    <form form action="<?=site_url('verify')?>" method="post" autocomplete="off" class="form" >
                   
                    <p><?php if($session->getFlashdata('msg')){ echo $session->getFlashdata('msg');} ?></p>
                    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-exclamation-sign color-blue"></i></span>
                          <input type="text" name="verification_code" class="form-control" placeholder="xxxxxx" class="form-control" >
                        </div>
                      </div><br>
                      <div class="form-group">
                        <!-- <input class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit"> -->
                        <button type="submit" class="btn btn-primary">Verify</button>
                      </div>
                      
                     
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
    <!-- <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <form action="<?=site_url('verify')?>" method="post">
            <div class="card ">
                <div class="p-2">
                    <h3 style="text-align: center">Verify Email</h3>
                </div>
                <div class="p-2">
                    <p><?php if($session->getFlashdata('msg')){ echo $session->getFlashdata('msg');} ?></p>
                </div>
                <div class="p-2">
                    <label for="">Please enter 6 digit pin.</label>
                    <input type="text" name="verification_code" class="form-control">
                </div>
                <div class="p-2">
                    <button type="submit" class="btn btn-primary">Verify</button>
                </div>
            </div>
            </form>
        </div>
    </div> -->
</body>

</html>