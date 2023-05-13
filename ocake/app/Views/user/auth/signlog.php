<!DOCTYPE html>
<html>

<head>
    <title>SignUp and Login</title>
    <link rel="stylesheet" type="text/css" href="tools/user/signlog/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"> -->
</head>
<style>
#regForm {
    background-color: #ffffff;
    margin: 5px auto;
    font-family: Raleway;
    padding: 5px;
    width: 70%;
    min-width: 300px;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
    background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
    display: none;
}

button {
    border: none;
    padding: 10px 20px;
    cursor: pointer;
}

button:hover {
    opacity: 0.8;
}

#prevBtn {
    background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none;
    border-radius: 50%;
    display: inline-block;
    opacity: 0.5;
}

.step.active {
    opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
    background-color: #fecb00;
}
</style>

<body>

    <div class="container" id="container">

        <div class="form-container sign-up-container">
            <?= isset($msg)? $msg:''?>
            <form id="regForm" method="post" action="<?=site_url('save') ?>">
                <h1 style="margin-bottom:30px">Create Account</h1>
                <!-- <div class="social-container">
                        <a href="#" class="social"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="social"><i class="fa fa-google"></i></a>
                        <a href="#" class="social"><i class="fa fa-linkedin"></i></a>
                    </div>
                    <span>or use your email for registration</span> -->
                <!-- <input type="text" id="firstname" name="firstname" placeholder="firstname" required>
                <input type="text" id="lastname" name="lastname" placeholder="lastname" required>
                <input type="text" id="mobile" name="mobile" placeholder="mobile" required> -->
                <!-- <select type="text" id="municipality" name="municipality" placeholder="municipality">
                        <option value="" disabled selected>municipality</option>
                        <option>Naujan</option>
                    </select>
                    <select type="text" id="barangay" name="barangay" placeholder="barangay">
                            <option value="" disabled selected>barangay</option>
                        <?//php foreach($address as $data){?>
                            <option><?//php echo $data->barangay;?></option>
                        <?//php }?>
                    </select> -->
                <!-- <input type="email" id="email" name="email" placeholder="Email" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <button type="submit" style="color:#fecb00">Register</button> -->
                <div class="tab">
                    <input type="text" id="firstname" oninput="this.className = ''" name="firstname"
                        placeholder="firstname" required>
                    <input type="text" id="lastname" oninput="this.className = ''" name="lastname"
                        placeholder="lastname" required>

                    <input type="text" id="municipality" oninput="this.className = ''" name="mcp"
                        placeholder="municipality" value="Naujan" required>
                    <select type="text" id="barangay" name="brgy" placeholder="barangay" required>
                        <option value="" disabled selected>barangay</option>
                        <?php foreach($address as $data){?>
                        <option><?php echo $data->barangay;?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="tab">
                    <input type="number" id="age" oninput="this.className = ''" name="age" placeholder="age" required>
                    <select type="text" id="gender" name="gender" placeholder="gender">
                        <option value="" disabled selected>gender</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                    <input type="number" id="mobile" oninput="this.className = ''" name="mobile" placeholder="mobile"
                        required>
                </div>
                <div class="tab">
                    <input type="number" placeholder="dd" name="birthdate" oninput="this.className = ''">
                    <input type="text" placeholder="mm" name="birthdmonth" oninput="this.className = ''">
                    <input type="number" placeholder="yyyy" name="birthyear" oninput="this.className = ''">
                </div>
                <div class="tab">
                    <input type="email" id="email" oninput="this.className = ''" name="email" placeholder="Email"
                        required>
                    <input type="password" id="password" oninput="this.className = ''" name="password"
                        placeholder="Password" required>
                    <input type="password" id="confirm_password" oninput="this.className = ''" name="confirm_password"
                        placeholder="Confirm Password" required>
                </div>
                <div style="overflow:auto; margin-top:30px">
                    <div style="float:right;">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" style="color:#fecb00" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>
                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                </div>
            </form>
        </div>

        <div class="form-container sign-in-container">
            <form method="post" action="<?=site_url('login') ?>">
                <h1>Sign In</h1>
                <?= isset($msg)? $msg:''?>
                <div class="social-container">
                    <!-- <a href="#" class="social"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="social"><i class="fa fa-google"></i></a>
                    <a href="#" class="social"><i class="fa fa-linkedin"></i></a> -->
                </div>
                <!-- <span>or use your account</span> -->
                <input type="email" id="email" name="email" placeholder="Email" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <a class="small" href="<?=site_url('userforgotpassword')?>">Forgot Password?</a>

                <button type="submit" style="color:#fecb00"> Login</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <img style="height:200px; width:200px" src="http://localhost/ocake/tools/uploads/ocake_logo.gif/">
                    <h1 style="color:#fecb00">Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button style="margin-bottom:60px" class="ghost" id="signIn">Login</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <img style="height:200px; width:200px" src="http://localhost/ocake/tools/uploads/ocake_logo.gif/">
                    <h1 style="color:#fecb00">Hello, Friend!</h1>
                    <p>Enter your details and start journey with us</p>
                    <button style="margin-bottom:60px" class="ghost" id="signUp">Register</button>
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
    <script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length = 3)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= 4) {
            // ... the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false
                valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }
    </script>


</body>

</html>