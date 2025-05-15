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

<body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper">

    <header>
      <div class="nav-container">
        <nav>
          <a href="index.php" class="logo"><b>Job</b> Portal</a>
          <div class="nav-links">

            <ul>
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
      </div>
    </header>

    <div class="content" style="max-width: 50%">

      <div class="col-md-12 latest-job margin-top-50 margin-bottom-20">
        <h1 class="text-center">Latest Jobs</h1>
      </div>


      <input type="text" id="live_search" class="form-control" placeholder="Search job" autocomplete="off">


    </div>
  </div>

  <div id="searchresult"></div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {

      $("#live_search").keyup(function() {

        var input = $(this).val();
        //alert(input);
        if (input != "") {

          $.ajax({
            url: "search.php",
            method: "POST",
            data: {
              input: input
            },
            success: function(data) {
              $("#searchresult").html(data);
            }
          });

        } else {
          $("#searchresult").css("display", "none");
        }
      });
    });
  </script>
</body>

</html>

</html>