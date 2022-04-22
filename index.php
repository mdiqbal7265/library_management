<?php

session_start();
if (isset($_SESSION['email'])) {
    if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'Admin'){
        header('location: dashboard.php');
    }else if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'User'){
        header('location: user-dashboard.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in (v2)</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <style>
        .parsley-errors-list {
            color: #e74c3c;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <!-- Login Box -->
    <div class="login-box" id="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="index.php" class="h1"><b>LMS</b>Login</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="#" method="post" id="login_form" data-parsley-validate>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" data-parsley-errors-container=".email_error_block" placeholder="Email" name="email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="error email_error_block"></div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" data-parsley-errors-container=".password_error_block" placeholder="Password" name="password" minlength="6" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="error password_error_block"></div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="rem">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <input type="submit" value="Sign In" class="btn btn-primary btn-block" id="login_btn">
                            <!-- <button type="submit" class="btn btn-primary btn-block">Sign In</button> -->
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center mt-2 mb-3">
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div>
                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="#" class="forgot-btn">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="#" class="text-center register-btn">Register a new membership</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- Register Box -->
    <div class="register-box" style="display: none;" id="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="index.php" class="h1"><b>LMS</b>Login</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form action="#" method="post" id="register_form" data-parsley-validate>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" data-parsley-errors-container=".name_error_block" placeholder="Full name" name="name" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="error name_error_block"></div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" data-parsley-errors-container=".email_error_block" placeholder="Email" name="email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="error email_error_block"></div>
                    <div class="input-group mb-3">
                        <input type="password" id="register_password" class="form-control" data-parsley-errors-container=".password_error_block" placeholder="Password" name="password" minlength="6" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="error password_error_block"></div>
                    <div class="input-group mb-3">
                        <input type="password" id="confirm_password" class="form-control" data-parsley-errors-container=".confirm_password_error_block" data-parsley-equalto="#register_password" placeholder="Retype password" name="confirm_password" minlength="6" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="error confirm_password_error_block"></div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <input type="submit" value="Register" class="btn btn-primary btn-block" id="register_btn">
                            <!-- <button type="submit" class="btn btn-primary btn-block">Register</button> -->
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center">
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i>
                        Sign up using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i>
                        Sign up using Google+
                    </a>
                </div>

                <a href="#" class="text-center login-btn">I already have a membership</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- Forgot Password Box -->
    <div class="login-box" style="display: none;" id="forgot-box">
        <div class="login-logo">
            <a href="index.php"><b>LMS</b>Login</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Request new password</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mt-3 mb-1">
                    <a href="#" class="login-btn">Login</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Parsley -->
    <script src="assets/dist/js/parsley.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
    <script>
        $(document).ready(function() {

            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timerProgressBar: true,
                timer: 5000
            });
            // Register Box Show
            $(".register-btn").click(function(e) {
                e.preventDefault();
                $("#register-box").show();
                $("#login-box").hide();
                $("#forgot-box").hide();
            });

            // Login Box Show
            $(".login-btn").click(function(e) {
                e.preventDefault();
                $("#forgot-box").hide();
                $("#register-box").hide();
                $("#login-box").show();
            });

            // Forgot Box Show
            $(".forgot-btn").click(function(e) {
                e.preventDefault();
                $("#forgot-box").show();
                $("#login-box").hide();
            });
            // Login Operation
            $("#login_form").on('submit', function(e) {
                e.preventDefault();
                $("#login_btn").val("Please Wait...");
                var form = $(this);
                form.parsley().validate();
                if (form.parsley().isValid()) {
                    $.ajax({
                        type: "POST",
                        url: "lib/action.php",
                        data: form.serialize() + '&action=user_login',
                        success: function(response) {
                            $("#login_btn").val("Sign In");
                            form[0].reset();
                            if (response == "login") {
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Login Successfully. Please Wait. We will redirect you to dashboard!'
                                });
                                setTimeout(() => {
                                    window.location = 'user-dashboard.php';
                                }, 2000);
                            } else if (response == "password_not_matched") {
                                Toast.fire({
                                    icon: 'error',
                                    title: 'Password didn\'t matched. Please try again!'
                                });
                            } else if (response == "data_not_found") {
                                Toast.fire({
                                    icon: 'error',
                                    title: 'Email didn\'t found in our database. Please try again!'
                                });
                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    title: 'Something went Wrong. Please try again!'
                                });
                            }
                            // console.log(response);
                        }
                    });
                }
            });

            // Register Operation
            $("#register_form").on('submit', function(e) {
                e.preventDefault();
                $("#register_btn").val("Please Wait...");
                var form = $(this);
                form.parsley().validate();

                if (form.parsley().isValid()) {
                    $.ajax({
                        type: "POST",
                        url: "lib/action.php",
                        data: form.serialize() + '&action=user_register',
                        success: function(response) {
                            $("#register_btn").val("Sign In");
                            form[0].reset();
                            if (response == 'register') {
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Registration Successfully. Please verify your email. We will send you verification link in your email!'
                                });
                            } else if (response == 'user_exists') {
                                Toast.fire({
                                    icon: 'error',
                                    title: 'Email already exists. Please try another email!'
                                });
                            } else if (response == 'something_wrong') {
                                Toast.fire({
                                    icon: 'error',
                                    title: 'Something went Wrong. Please try again!'
                                });
                            }

                            // console.log(response);
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>