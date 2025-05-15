<?php
session_start();
if (empty($_SESSION['id_user'])) {
    header("Location: ../index.php");
    exit();
}
require_once("../db.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Job Portal</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../css/custom.css">
</head>

<body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">
        <header>
            <div class="nav-container">
                <nav>
                    <a href="index.php" class="logo"><b>Job</b> Portal</a>
                    <div class="nav-links">
                        <ul>
                            <li>
                                <a href="../jobs.php">Jobs</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <div class="content-wrapper" style="margin-left: 0px;">
            <section id="candidates" class="content-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="box box-solid">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Welcome
                                        <b><?php echo $_SESSION['name']; ?></b>
                                    </h3>
                                </div>
                                <div class="box-body no-padding">
                                    <ul class="nav nav-pills nav-stacked">
                                        <li class="active"><a href="index.php"><i class="fa fa-address-card-o"></i> My
                                                Applications</a></li>
                                        <li><a href="edit-profile.php"><i class="fa fa-user"></i> Edit Profile</a></li>
                                        <li><a href="../jobs.php"><i class="fa fa-list-ul"></i> Jobs</a></li>
                                        <li><a href="settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                                        <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i>
                                                Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 bg-white padding-2">
                            <h2><i>Recent Applications</i></h2>
                            <p>Below you will find job roles you have applied for</p>
                            <?php
             $sql = "SELECT * FROM job_post INNER JOIN apply_job_post ON job_post.id_jobpost=apply_job_post.id_jobpost WHERE apply_job_post.id_user='$_SESSION[id_user]'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
                            <div class="attachment-block clearfix padding-2">
                                <h4 class="attachment-heading"><a
                                        href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?>"><?php echo $row['jobtitle']; ?></a>
                                </h4>
                                <div class="attachment-text padding-2">
                                    <div class="pull-left"><i class="fa fa-calendar"></i>
                                        <?php echo $row['createdat']; ?>
                                    </div>
                                </div>
                            </div>

                            <?php
    }
}
?>

                        </div>
                    </div>
                </div>
            </section>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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