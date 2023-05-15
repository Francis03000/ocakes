<!DOCTYPE html>
<html>

<head>
    <title>OTP</title>
    <link rel="stylesheet" type="text/css" href="tools/user/signlog/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="tools/user/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script src="tools/user/js/bootstrap/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<style>
    .form-gap {
    padding-top: 70px;
}
</style>
</head>

<body>

<div class="form-gap"></div>
<div class="container">
	<div class="row" style=" padding-top: 50px;" >
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body" >
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>Please enter 6 digit pin.</p>
                  <div class="panel-body">

                    <form form action="<?=site_url('admin/verifyResetCode')?>" method="post" autocomplete="off" class="form" >
                   
                    <p><?php if($session->getFlashdata('msg')){ echo $session->getFlashdata('msg');} ?></p>
                    
                    <input type="hidden" name="email" value="<?=$session->temp_email;?>">
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-exclamation-sign color-blue"></i></span>
                          <input type="text" name="verification_code" class="form-control" placeholder="xxxxxx" class="form-control" >
                        </div>
                      </div>
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
            <form action="<?=site_url('verifyResetCode')?>" method="post">
            <div class="card ">
                <div class="p-2">
                    <h3 style="text-align: center">Forgot Password</h3>
                </div>
                <div class="p-2">
                    <p><?php if($session->getFlashdata('msg')){ echo $session->getFlashdata('msg');} ?></p>
                </div>
                <input type="hidden" name="email" value="<?=$session->temp_email;?>">
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