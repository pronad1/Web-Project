<?php

session_start();

if (isset($_SESSION['id_user']) || isset($_SESSION['id_company'])) {
    header("Location: index.php");
    exit();
}
require_once("db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal</title>
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/login.css">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <link rel="stylesheet" href="css/_all-skins.min.css">

</head>

<body>

    <div class="login-box">
        <div class="login-logo">
            <a href="index.php"><b>Job</b> Portal</a>
        </div>

        <div class="login-box-body">
            <p class="login-box-msg">Company Login</p>

            <form method="post" action="checkcompanylogin.php">
                <div class="form-group has-feedback">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <a href="#">I forgot my password</a>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-12">
                        <?php
if (isset($_SESSION['loginError'])) {
    ?>
                        <div>
                            <p class="text-center">Invalid Email/Password! Try Again!</p>
                        </div>
                        <?php
               unset($_SESSION['loginError']);
}
?>
                        <?php
if (isset($_SESSION['companyLoginError'])) {
    ?>
                        <div>
                            <p class="text-center">
                                <?php echo $_SESSION['companyLoginError'] ?>
                            </p>
                        </div>
                        <?php
               unset($_SESSION['companyLoginError']);
}
?>
                    </div>
                </div>
            </form>

            <br>

        </div>
    </div>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

</html>