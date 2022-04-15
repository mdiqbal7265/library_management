<?php

session_start();
if (isset($_SESSION['email'])) {
    header('location: dashboard.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

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
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="dashboard.php"><b>Admin</b>Login</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="#" method="post" id="admin_login_form">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
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
                            <input type="submit" value="Sign In" class="btn btn-primary btn-block" id="admin_login_btn">
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

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

            $("#admin_login_form").on('submit', function(e) {
                e.preventDefault();
                $("#admin_login_btn").val("Please Wait...");
                var form = $(this);
                $.ajax({
                    type: "POST",
                    url: "lib/action.php",
                    data: form.serialize() + '&action=admin_login',
                    success: function(response) {
                        $("#admin_login_btn").val("Sign In");
                        form[0].reset();
                        if (response == "login") {
                            Toast.fire({
                                icon: 'success',
                                title: 'Login Successfully. Please Wait. We will redirect you to dashboard!'
                            });
                            setTimeout(() => {
                                window.location = 'dashboard.php';
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
            });
        });
    </script>
</body>

</html>