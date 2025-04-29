<?php

//To Handle Session Variables on This Page
session_start();


//Including Database Connection From db.php file to avoid rewriting in all files
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

    <link rel="stylesheet" href="../css/custom.css">
</head>

<body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper">

    <header class="main-header">

    <a href="index.php" class="logo"><b>Job</b> Portal</a>
      <nav class="navbar navbar-static-top"> 
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
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
          <div class="row">
            <div class="col-md-12 latest-job margin-top-50 margin-bottom-20">
              <h1 class="text-center">Latest Jobs</h1>
              <div class="input-group input-group-lg">
                <input type="text" id="searchBar" class="form-control" placeholder="Search job">
                <span class="input-group-btn">
                  <button id="searchBtn" type="button" class="btn btn-info btn-flat">Go!</button>
                </span>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <script>
      function Pagination() {
        $("#pagination").twbsPagination({
          totalPages: <?php echo $total_pages; ?> ,
          visible: 5,
          onPageClick: function(e, page) {
            e.preventDefault();
            $("#target-content").html("loading....");
            $("#target-content").load("jobpagination.php?page=" + page);
          }
        });
      }
    </script>

    <script>
      $(function() {
        Pagination();
      });
    </script>

    <script>
      $("#searchBtn").on("click", function(e) {
        e.preventDefault();
        var searchResult = $("#searchBar").val();
        var filter = "searchBar";
        if (searchResult != "") {
          $("#pagination").twbsPagination('destroy');
          Search(searchResult, filter);
        } else {
          $("#pagination").twbsPagination('destroy');
          Pagination();
        }
      });
    </script>

    <script>
      $(".experienceSearch").on("click", function(e) {
        e.preventDefault();
        var searchResult = $(this).data("target");
        var filter = "experience";
        if (searchResult != "") {
          $("#pagination").twbsPagination('destroy');
          Search(searchResult, filter);
        } else {
          $("#pagination").twbsPagination('destroy');
          Pagination();
        }
      });
    </script>

    <script>
      $(".citySearch").on("click", function(e) {
        e.preventDefault();
        var searchResult = $(this).data("target");
        var filter = "city";
        if (searchResult != "") {
          $("#pagination").twbsPagination('destroy');
          Search(searchResult, filter);
        } else {
          $("#pagination").twbsPagination('destroy');
          Pagination();
        }
      });
    </script>

    <script>
      function Search(val, filter) {
        $("#pagination").twbsPagination({
          totalPages: <?php echo $total_pages; ?> ,
          visible: 5,
          onPageClick: function(e, page) {
            e.preventDefault();
            val = encodeURIComponent(val);
            $("#target-content").html("loading....");
            $("#target-content").load("search.php?page=" + page + "&search=" + val + "&filter=" + filter);
          }
        });
      }
    </script>


</body>

</html>