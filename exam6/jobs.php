<?php
session_start();
require_once("db.php");
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
  <link rel="stylesheet" href="css/custom.css">
</head>

<body>
  <div class="wrapper">

    <header>
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <a href="index.php" class="navbar-brand"><b>Job</b> Portal</a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
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

    <div class="container" style="margin-top:90px;">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="latest-job margin-top-50 margin-bottom-20">
            <h1 class="text-center">Latest Jobs</h1>
          </div>
          <div class="form-group">
            <input type="text" id="live_search" class="form-control input-lg text-center" placeholder="Search job"
              autocomplete="off">
          </div>
          <div id="searchresult"></div>
        </div>
      </div>
    </div>

    <section class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 latest-job margin-bottom-20">
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
                      <a href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?>">
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
                          <input type="text" name="review" class="form-control input-sm" placeholder="Write a review" required>
                        </div>
                        <input type="hidden" name="jobpost_id" value="<?php echo $row['id_jobpost']; ?>">
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

    <footer class="main-footer">
      <div class="container">
        <strong>Copyright &copy; 2025 <a href="#">Job Portal</a>.</strong> All rights
        reserved.
      </div>
    </footer>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#live_search").keyup(function() {
        var input = $(this).val();
        if (input != "") {
          $.ajax({
            url: "search.php",
            method: "POST",
            data: {
              input: input
            },
            success: function(data) {
              $("#searchresult").html(data).show();
            }
          });
        } else {
          $("#searchresult").html("").hide();
        }
      });
    });
  </script>
</body>

</html>