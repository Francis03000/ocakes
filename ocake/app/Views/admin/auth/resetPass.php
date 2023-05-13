<!DOCTYPE html>
<html>

<head>
    <title>Reset Password</title>
    <link rel="stylesheet" type="text/css" href="tools/user/signlog/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="tools/user/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script src="tools/user/js/bootstrap/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <form action="<?=site_url('admin/updatePass')?>" method="post">
            <div class="card ">
                <div class="p-2">
                    <h3 style="text-align: center">Reset Password</h3>
                </div>
                <div class="p-2">
                    <p><?php if($session->getFlashdata('msg')){ echo $session->getFlashdata('msg');} ?></p>
                </div>
                <input type="hidden" name="id" value="<?=$session->temp_id;?>" class="form-control">
                <div class="p-2">
                    <label for="">New Password</label>
                    <input type="text" name="password" class="form-control">
                </div>
                <div class="p-2">
                    <label for="">Confirm Password</label>
                    <input type="text" name="confirm_password" class="form-control">
                </div>
                <div class="p-2">
                    <button type="submit" class="btn btn-primary">Verify</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</body>

</html>