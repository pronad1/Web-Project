<?php
session_start();
require_once("db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Job Portal</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="css/custom.css">
</head>

<body>
	<div>
		<header>
			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="container">
					<div class="navbar-header">
						<a href="index.php" class="navbar-brand">Job Portal</a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li><a href="#candidates">Candidates</a></li>
							<li><a href="#company">Company</a></li>
							<li><a href="#about">About US</a></li>
							<?php if (empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
							<li><a href="login.php">Login</a></li>
							<li><a href="sign-up.php">Sign Up</a></li>
							<?php } else {
							    if (isset($_SESSION['id_user'])) { ?>
							<li><a href="user/index.php">Dashboard</a></li>
							<?php } elseif (isset($_SESSION['id_company'])) { ?>
							<li><a href="company/index.php">Dashboard</a></li>
							<?php } ?>
							<li><a href="logout.php">Logout</a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</nav>
		</header>
		<div style="margin-left: 0px;">

			<section class="content-header bg-main">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center index-head">
							<h1>All <strong>JOBS</strong> In One Place</h1>
							<p>One search, global reach</p>
							<p><a class="btn btn-success btn-lg" href="jobs.php" role="button">Search Jobs</a></p>
						</div>
					</div>
				</div>
			</section>
			<section class="content-header">
				<div class="container">
					<div class="row">
						<div class="latest-job margin-bottom-20">
							<h1 class="text-center">Latest Jobs</h1>
							<?php
                $sql = "SELECT * FROM job_post ORDER BY Rand() LIMIT 4";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sql1 = "SELECT * FROM company WHERE id_company='" . $row['id_company'] . "'";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) {
            while ($row1 = $result1->fetch_assoc()) {
                ?>
							<div class="panel panel-default margin-bottom-20">
								<div class="panel-body">
									<div class="row">
										<div class="col-sm-9">
											<h4 class="job-title">
												<a
													href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?>">
													<?php echo htmlspecialchars($row['jobtitle']); ?>
												</a>
											</h4>
											<div class="job-meta" style="margin-bottom:8px;">
												<span><i class="fa fa-building"></i>
													<?php echo htmlspecialchars($row1['companyname']); ?></span>
												&nbsp;|&nbsp;
												<span><i class="fa fa-map-marker"></i>
													<?php echo htmlspecialchars($row1['city']); ?></span>
												&nbsp;|&nbsp;
												<span><i class="fa fa-briefcase"></i>
													<?php echo htmlspecialchars($row['experience']); ?>
													Years Experience</span>
											</div>
											<?php if (isset($_SESSION['id_user']) || isset($_SESSION['id_company'])) { ?>
											<div class="rating-form">
												<form method="POST" action="add-review.php" class="form-inline">
													<div class="form-group">
														<select name="rating" class="form-control input-sm">
															<option value="5">★★★★★</option>
															<option value="4">★★★★☆</option>
															<option value="3">★★★☆☆</option>
															<option value="2">★★☆☆☆</option>
															<option value="1">★☆☆☆☆</option>
														</select>
													</div>
													<div class="form-group">
														<input type="text" name="review" class="form-control input-sm"
															placeholder="Write a review" required>
													</div>
													<input type="hidden" name="jobpost_id"
														value="<?php echo $row['id_jobpost']; ?>">
													<button type="submit" class="btn btn-primary btn-sm">Rate</button>
												</form>
											</div>
											<?php } else { ?>
											<p><small><a href="login.php">Login</a> to rate this job</small></p>
											<?php } ?>
										</div>
										<div class="col-sm-3 text-right">
											<div style="font-size:18px; color:#00a65a; font-weight:bold;">
												$<?php echo htmlspecialchars($row['maximumsalary']); ?>/Month
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
            }
        }
    }
} else {
    echo '<div class="alert alert-info text-center">No jobs found.</div>';
}
?>
						</div>
					</div>
				</div>
			</section>

			<section id="candidates" class="content-header">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center latest-job margin-bottom-20">
							<h1>Candidates</h1>
							<p>Finding a job just got easier. Create a profile and apply with single mouse click.</p>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-md-4">
							<div class="thumbnail candidate-img">
								<img src="img/browse.jpg" alt="Browse Jobs">
								<div class="caption">
									<h3 class="text-center">Browse Jobs</h3>
								</div>
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="thumbnail candidate-img">
								<img src="img/interviewed.jpeg" alt="Apply & Get Interviewed">
								<div class="caption">
									<h3 class="text-center">Apply & Get Interviewed</h3>
								</div>
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="thumbnail candidate-img">
								<img src="img/career.jpg" alt="Start A Career">
								<div class="caption">
									<h3 class="text-center">Start A Career</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section id="company" class="content-header">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center latest-job margin-bottom-20">
							<h1>Companies</h1>
							<p>Hiring? Register your company for free, browse our talented pool, post and track job
								applications</p>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-md-4">
							<div class="thumbnail company-img">
								<img src="img/postjob.png" alt="Browse Jobs">
								<div class="caption">
									<h3 class="text-center">Post A Job</h3>
								</div>
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="thumbnail company-img">
								<img src="img/manage.jpg" alt="Apply & Get Interviewed">
								<div class="caption">
									<h3 class="text-center">Manage & Track</h3>
								</div>
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="thumbnail company-img">
								<img src="img/hire.png" alt="Start A Career">
								<div class="caption">
									<h3 class="text-center">Hire</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section id="statistics" class="content-header">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center latest-job margin-bottom-20">
							<h1>Our Statistics</h1>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 col-xs-4 no-padding">
							<div class="small-box bg-aqua">
								<div class="inner">
									<?php
            $sql = "SELECT * FROM job_post";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $totalno = $result->num_rows;
} else {
    $totalno = 0;
}
?>
									<h3><?php echo $totalno; ?></h3>
									<p>Job Offers</p>
								</div>
								<div class="icon">
									<i class="ion ion-ios-paper"></i>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-xs-4">
							<div class="small-box bg-green">
								<div class="inner">
									<?php
  $sql = "SELECT * FROM company ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $totalno = $result->num_rows;
} else {
    $totalno = 0;
}
?>
									<h3><?php echo $totalno; ?></h3>

									<p>Registered Company</p>
								</div>
								<div class="icon">
									<i class="ion ion-briefcase"></i>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-xs-4">
							<div class="small-box bg-red">
								<div class="inner">
									<?php
  $sql = "SELECT * FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $totalno = $result->num_rows;
} else {
    $totalno = 0;
}
?>
									<h3><?php echo $totalno; ?></h3>
									<p>Daily Users</p>
								</div>
								<div class="icon">
									<i class="ion ion-person-stalker"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section id="about" class="content-header">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center latest-job margin-bottom-20">
							<h1>About US</h1>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<img src="img/browse.jpg" class="img-responsive">
						</div>
						<div class="col-md-6 about-text margin-bottom-20">
							<p>The online job portal application allows job seekers and recruiters to connect.The
								application provides the ability for job seekers to create their accounts, upload their
								profile and resume, search for jobs, apply for jobs, view different job openings. The
								application provides the ability for companies to create their accounts, search
								candidates, create job postings, and view candidates applications.
							</p>
							<p>
								This website is used to provide a platform for potential candidates to get their dream
								job and excel in yheir career.
								This site can be used as a paving path for both companies and job-seekers for a better
								life .

							</p>

						</div>
					</div>
				</div>
			</section>

		</div>
		<footer class="main-footer" style="margin-left: 0px;">
			<div class="text-center">
				<strong>Copyright &copy; 2025 <a href="#">Job Portal</a>.</strong> All rights
				reserved.
			</div>
		</footer>
	</div>
</body>

</html>