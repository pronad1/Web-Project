<?php

session_start();

if (isset($_SESSION['id_user']) || isset($_SESSION['id_company'])) {
    header("Location: index.php");
    exit();
}
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
</head>

<body>
	<header>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<a href="index.php" class="navbar-brand"><b>Job</b> Portal</a>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<?php if (empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
					<li>
						<a href="login.php">Login</a>
					</li>
					<li>
						<a href="sign-up.php">Sign Up</a>
					</li>
					<?php } else {

					    if (isset($_SESSION['id_user'])) {
					        ?>
					<li>
						<a href="user/index.php">Dashboard</a>
					</li>
					<?php
					    } elseif (isset($_SESSION['id_company'])) {
					        ?>
					<li>
						<a href="company/index.php">Dashboard</a>
					</li>
					<?php } ?>
					<li>
						<a href="logout.php">Logout</a>
					</li>
					<?php } ?>
				</ul>
			</div>
		</nav>
	</header>
	<div class="content-wrapper" style="margin-left: 0px;">
		<section class="content-header">
			<div class="container">
				<div class="row latest-job margin-top-50 margin-bottom-20">
					<h1 class="text-center margin-bottom-20">Sign Up</h1>
					<div class="col-md-6 latest-job ">
						<div class="small-box bg-yellow padding-5">
							<div class="inner">
								<h3 class="text-center">Candidates Registration</h3>
							</div>
							<a href="register-candidates.php" class="small-box-footer">
								Sign Up<i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
					</div>
					<div class="col-md-6 latest-job ">
						<div class="small-box bg-red padding-5">
							<div class="inner">
								<h3 class="text-center">Company Registration</h3>
							</div>
							<a href="register-company.php" class="small-box-footer">
								Sign Up<i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</body>

</html>