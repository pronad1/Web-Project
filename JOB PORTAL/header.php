<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Job Portal</title>
	<link rel="stylesheet" href="styles.css">
	<!-- <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600&display=swap" rel="stylesheet"> -->
</head>

<body>

	<header class="navbar">
		<div class="logo">
			<a href="index.php">
				<img src="images/logo.svg" alt="Job Portal">
			</a>
		</div>
		<nav class="nav-links">
			<a href="jobs.php">Jobs</a>
			<a href="#">Careers</a>
			<a href="#">Salaries</a>
			<a href="#">Companies</a>
		</nav>
		<div class="auth-links">
			<?php if (isset($_SESSION['user'])): ?>
			<a href="jobs.php" class="btn">Post a Job</a>
			<form action="logout.php" method="POST">
				<button type="submit" class="btn">Log Out</button>
			</form>
			<?php else: ?>
			<a href="register.php" class="btn">Sign Up</a>
			<a href="login.php" class="btn">Log In</a>
			<?php endif; ?>
		</div>
	</header>