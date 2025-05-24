<?php
session_start();
if (empty($_SESSION['id_company'])) {
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
  <div class="wrapper">
        <header>
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <a href="index.php" class="navbar-brand"><b>Job</b> Portal</a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="../jobs.php">Jobs</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
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
                <div>
                  <ul>
                    <li><a href="index.php"><i class="fa fa-dashboard"></i>
                        Dashboard</a></li>
                    <li><a href="create-job-post.php"><i class="fa fa-file-o"></i> Create Job
                        Post</a></li>
                    <li><a href="my-job-post.php"><i class="fa fa-file-o"></i> My Job Post</a></li>
                    <li><a href="settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                    <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i>
                        Logout</a></li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="col-md-9 bg-white padding-2">
              <h2><i>Create Job Post</i></h2>
              <div class="row">
                <form method="post" action="addpost.php">
                  <div class="col-md-12 latest-job ">
                    <div class="form-group">
                      <input class="form-control input-lg" type="text" id="jobtitle" name="jobtitle"
                        placeholder="Job Title">
                    </div>
                    <div class="form-group">
                      <textarea class="form-control input-lg" id="description" name="description"
                        placeholder="Job Description"></textarea>
                    </div>
                    <div class="form-group">
                      <input type="number" class="form-control  input-lg" id="minimumsalary" min="1000" max="1000000"
                        autocomplete="off" name="minimumsalary" placeholder="Minimum Salary" required="">
                    </div>
                    <div class="form-group">
                      <input type="number" class="form-control  input-lg" id="maximumsalary" name="maximumsalary"
                        min="1000" max="1000000" placeholder="Maximum Salary" required="">
                    </div>
                    <div class="form-group">
                      <input type="number" class="form-control  input-lg" id="experience" autocomplete="off"
                        name="experience" placeholder="Experience (in Years) Required" required="">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control  input-lg" id="qualification" name="qualification"
                        placeholder="Qualification Required" required="">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-flat btn-success">Create</button>
                    </div>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</body>

</html>