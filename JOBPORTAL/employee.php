<?php
include 'config.php';
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
	<title>Job Portal</title>
</head>

<body>

	<!-- Navbar -->
	<header class="navbar">
		<div class="logo">
			<a href="/">
				<img src="logo.svg" alt="Pixel Positions">
			</a>
		</div>
		<nav class="nav-links">
			<a href="/">Jobs</a>
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
			<a href="signup.php" class="btn">Sign Up</a>
			<a href="login.php" class="btn">Log In</a>
			<?php endif; ?>
		</div>
	</header>

	<!-- Footer -->
	<footer class="footer">
		<div class="job-search">
			<h2>Let's Find Your Next Job</h2>
			<input type="text" placeholder="Web Developer...">
		</div>
		<p>&copy; <?php echo date('Y'); ?> Job
			Portal. All rights reserved.</p>
	</footer>

</body>

</html>