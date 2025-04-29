<?php


session_start();

require_once("db.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/custom.css">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    
</head>


<body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
    <a href="index.php" class="logo"><b>Job</b> Portal</a>

      <nav class="navbar navbar-static-top">
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li>
              <a href="login.php">Login</a>
            </li>
            <li>
              <a href="sign-up.php">Sign Up</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>



    <div class="content-wrapper" style="margin-left: 0px;">

      <?php
  
    $sql = "SELECT * FROM job_post INNER JOIN company ON job_post.id_company=company.id_company WHERE id_jobpost='$_GET[id]'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>

      <section id="candidates" class="content-header">
        <div class="container">
          <div class="row">
            <div class="col-md-9 bg-white padding-2">
              <div class="pull-left">
                <h2>
                  <b><i><?php echo $row['jobtitle']; ?></i></b>
                </h2>
              </div>
              <div class="pull-right">
                <a href="index.php" class="btn btn-default btn-lg btn-flat margin-top-20"><i
                    class="fa fa-arrow-circle-left"></i> Back</a>
              </div>
              <div class="clearfix"></div>
              <hr>
              <div>
                <p><span class="margin-right-10"><i class="fa fa-location-arrow text-green"></i>
                    <?php echo $row['city']; ?></span>
                  <i class="fa fa-calendar text-green"></i>
                  <?php echo date("d-M-Y", strtotime($row['createdat'])); ?>
                </p>
              </div>
              <div>
                <?php echo stripcslashes($row['description']); ?>
              </div>
              <?php
                  if (isset($_SESSION["id_user"]) && empty($_SESSION['companyLogged'])) { ?>
              <div>
                <a href="apply.php?id=<?php echo $row['id_jobpost']; ?>"
                  class="btn btn-success btn-flat margin-top-50">Apply</a>
              </div>
              <?php } ?>


            </div>
          </div>
        </div>
      </section>

      <?php
    }
}
?>



    </div>

  </div>

</body>

</html>