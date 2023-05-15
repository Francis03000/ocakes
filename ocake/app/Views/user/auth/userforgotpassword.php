<!DOCTYPE html>
<html>

<head>
    <title>SignUp and Login</title>
    <link rel="stylesheet" type="text/css" href="tools/user/signlog/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-in-container">
        <div class="p-2">
            <!-- ERROR MSG IF EMAIL IS NOT REGISTERED -->
                    <p style="text-align:center"><?php if($session->getFlashdata('msg')){ echo $session->getFlashdata('msg');} ?></p>
                </div>
            <form action="<?=site_url('sendResetCode')?>" method="post">
                <h1>Reset Password</h1><br>
                <input type="email" class="form-control form-control-user"
                    id="exampleInputEmail" name="email" aria-describedby="emailHelp"
                    placeholder="Enter Email Address..."><br>
                                
                <button type="submit" style="color:white;">Send PIN</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                <h1>Forgot Password?</h1>
                <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                            and we'll send you a link to reset your password!</p>
                    <!-- <button class="ghost" id="signIn">Login</button> -->
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });
        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>


</body>

</html>