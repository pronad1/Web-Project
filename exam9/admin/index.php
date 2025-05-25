<?php
session_start();
require_once("../db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Login - Job Portal</title>
	<link rel="stylesheet" href="../css/custom.css">
	<link rel="stylesheet" href="../css/login.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<div class="login-box">
		<div class="login-logo">
			<a href="#"><b>Admin</b> Login</a>
		</div>
		<div class="login-box-body">
			<p class="login-box-msg">Sign in to start your session</p>
			<form method="post" action="checklogin.php">
				<div class="form-group has-feedback">
					<input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" name="password" class="form-control" placeholder="Password" required>
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-8">
						<!-- Optionally add a 'Forgot password' link -->
					</div>
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
					</div>
				</div>
			</form>
			<br>
			<?php
            if (isset($_SESSION['loginError'])) {
                echo '<div><p class="text-center text-danger">Invalid Username or Password!</p></div>';
                unset($_SESSION['loginError']);
            }
?>
		</div>
	</div>
</body>
</html>