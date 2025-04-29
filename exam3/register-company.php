<?php

session_start();

if (isset($_SESSION['id_user']) || isset($_SESSION['id_company'])) {
    header("Location: index.php");
    exit();
}
require_once("db.php");
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
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <link rel="stylesheet" href="css/_all-skins.min.css">

</head>

<body>


    <div>
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

        <section class="content-header">
            <div class="container">
                <div class="row latest-job margin-top-50 margin-bottom-20 bg-white">
                    <h1 class="text-center margin-bottom-20">CREATE COMPANY PROFILE</h1>
                    <form method="post" id="registerCompanies" action="addcompany.php" enctype="multipart/form-data">
                        <div class="col-md-6 latest-job ">
                            <div class="form-group">
                                <input class="form-control input-lg" type="text" name="name" placeholder="Full Name"
                                    required>
                            </div>
                            <div class="form-group">
                                <input class="form-control input-lg" type="text" name="companyname"
                                    placeholder="Company Name" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control input-lg" type="text" name="website" placeholder="Website">
                            </div>
                            <div class="form-group">
                                <input class="form-control input-lg" type="text" name="email" placeholder="Email"
                                    required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-flat btn-success">Register</button>
                            </div>
                            <?php
              if (isset($_SESSION['registerError'])) {
                  ?>
                            <div>
                                <p class="text-center" style="color: red;">Email Already Exists! Choose A Different
                                    Email!</p>
                            </div>
                            <?php
               unset($_SESSION['registerError']);
              }
?>

                        </div>
                        <div class="col-md-6 latest-job ">
                            <div class="form-group">
                                <input class="form-control input-lg" type="password" name="password"
                                    placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control input-lg" type="password" name="cpassword"
                                    placeholder="Confirm Password" required>
                            </div>

                            <div class="form-group">
                                <input class="form-control input-lg" type="text" name="contactno"
                                    placeholder="Phone Number" minlength="10" maxlength="10" autocomplete="off"
                                    onkeypress="return validatePhone(event);" required>
                            </div>
                            <div class="form-group">
                                <select class="form-control  input-lg" id="country" name="country" required>
                                    <option selected="" value="">Select Country</option>
                                    <?php
    $sql="SELECT * FROM countries";
$result=$conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<option value='".$row['name']."' data-id='".$row['id']."'>".$row['name']."</option>";
    }
}
?>

                                </select>
                            </div>

                        </div>
                    </form>

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


    <script>
        $("#registerCompanies").on("submit", function(e) {
            e.preventDefault();
            if ($('input[name="password"]').val() != $('input[name="cpassword"]').val()) {
                $('#passwordError').show();
            } else {
                $('#passwordError').hide();
                $(this).unbind('submit').submit();
            }
        });
    </script>

</body>

</html>