<!DOCTYPE html>
<html>

<head>
    <title>SignUp and Login</title>
    <link rel="stylesheet" href="<?=base_url()?>/tools/admin/assets/css/bootstrap.min.css" />
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
                <div class="tab">
                    <input type="text" id="firstname" oninput="validateInput(this, 'letters')" name="firstname"
                        pattern="[A-Za-z]+" placeholder="firstname" required>
                    <input type="text" id="lastname" oninput="validateInput(this, 'letters')" name="lastname"
                        pattern="[A-Za-z]+" placeholder="lastname" required>

                    <input type="text" id="municipality" oninput="this.className = ''" name="mcp"
                        placeholder="municipality" value="Naujan" required>
                    <select type="text" id="barangay" name="brgy" placeholder="barangay" required>
                        <option value="barangay">barangay</option>
                        <?php foreach($address as $data){?>
                        <option value="<?php echo $data->barangay;?>"><?php echo $data->barangay;?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="tab">

                    <select type="text" id="gender" name="gender" placeholder="gender">
                        <option value="gender">gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <input type="text" id="mobile" oninput="validateInput(this, 'numbers')" name="mobile"
                        pattern="[0-9]*" title="Please input numbers only" inputmode="numeric" placeholder="mobile"
                        required>
                    Birthday <input type="date" name="birthdate" oninput="this.className = ''">

                </div>
                <!-- <div class="tab">
                    <input type="number" placeholder="dd" name="birthdate" oninput="this.className = ''">
                    <input type="text" placeholder="mm" name="birthdmonth" oninput="this.className = ''">
                    <input type="number" placeholder="yyyy" name="birthyear" oninput="this.className = ''">
                </div> -->
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
    <script src="<?=base_url()?>/tools/admin/assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?=base_url()?>/tools/admin/assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="<?=base_url()?>/tools/admin/assets/plugins/sweetalert/sweetalerts.min.js"></script>

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

        var mi = document.getElementsByClassName("tab");
        var yi = mi[currentTab].getElementsByTagName("input");
        var yis = mi[currentTab].getElementsByTagName("select");

        if (n == 1) {
            var valid = true;
            var valid1 = true;
            var message = "";
            var message1 = "";
            for (i = 0; i < yi.length; i++) {
                // If a field is empty...
                // console.log(yi[i].value=="");
                if (yi[i].value == "") {
                    // add an "invalid" class to the field:
                    message += yi[i].name + ",";
                    yi[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }

            if (yis.length != 0) {
                if (yis[0].value === "barangay") {
                    message += "barangay ";
                    valid1 = false;
                } else if (yis[0].value === "gender") {
                    message += "gender ";
                    valid1 = false;
                }
            }

            if (!valid || !valid1) {
                Swal.fire({
                    text: message + "is required to fill",
                    icon: 'warning',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ok'
                });
            } else {
                mi[currentTab].style.display = "none";
                currentTab = currentTab + n;
                if (currentTab >= 4) {
                    // ... the form gets submitted:
                    document.getElementById("regForm").submit();
                    return false;
                } else {
                    showTab(currentTab);
                }
            }
        } else {
            mi[currentTab].style.display = "none";
            currentTab = currentTab + n;
            showTab(currentTab);
        }
    }

    // function validateForm() {
    //     // This function deals with validation of the form fields
    //     var x, y, i, valid = true;
    //     x = document.getElementsByClassName("tab");
    //     y = x[currentTab].getElementsByTagName("input");
    //     // A loop that checks every input field in the current tab:
    //     for (i = 0; i < y.length; i++) {
    //         // If a field is empty...
    //         if (y[i].value == "") {
    //             // add an "invalid" class to the field:
    //             y[i].className += " invalid";
    //             // and set the current valid status to false
    //             valid = false;
    //         }
    //     }
    //     // If the valid status is true, mark the step as finished and valid:
    //     if (valid) {
    //         document.getElementsByClassName("step")[currentTab].className += " finish";
    //     }
    //     return valid; // return the valid status
    // }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }

    function validateInput(input, validationType) {
        if (validationType === 'letters') {
            input.value = input.value.replace(/[^A-Za-z]/g, ''); // Remove any non-letter characters
        } else if (validationType === 'numbers') {
            input.value = input.value.replace(/\D/g, ''); // Remove any non-digit characters
        }
    }
    </script>



</body>

</html>