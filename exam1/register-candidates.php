<?php

session_start();

if (isset($_SESSION['id_user']) || isset($_SESSION['id_company'])) {
    header("Location: index.php");
    exit();
}
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
                    <h1 class="text-center margin-bottom-20">CREATE YOUR PROFILE</h1>
                    <form method="post" id="registerCandidates" action="adduser.php" enctype="multipart/form-data">
                        <div class="col-md-6 latest-job ">
                            <div class="form-group">
                                <input class="form-control input-lg" type="text" id="fname" name="fname"
                                    placeholder="First Name *" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control input-lg" type="text" id="lname" name="lname"
                                    placeholder="Last Name *" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control input-lg" type="text" id="email" name="email"
                                    placeholder="Email *" required>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-flat btn-success">Register</button>
                            </div>
                            <?php
              if (isset($_SESSION['registerError'])) {
                  ?>
                            <div class="form-group">
                                <label style="color: red;">Email Already Exists! Choose A Different Email!</label>
                            </div>
                            <?php
               unset($_SESSION['registerError']);
              }
?>

                            <?php if (isset($_SESSION['uploadError'])) { ?>
                            <div class="form-group">
                                <label
                                    style="color: red;"><?php echo $_SESSION['uploadError']; ?></label>
                            </div>
                            <?php unset($_SESSION['uploadError']);
                            } ?>

                        </div>
                        <div class="col-md-6 latest-job ">
                            <div class="form-group">
                                <input class="form-control input-lg" type="password" id="password" name="password"
                                    placeholder="Password *" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control input-lg" type="password" id="cpassword" name="cpassword"
                                    placeholder="Confirm Password *" required>
                            </div>
                            <div class="form-group" id="passwordError" style="display:none;">
                                <label style="color: red;">Passwords do not match!</label>
                            </div>

                            <div class="form-group">
                                <textarea class="form-control input-lg" rows="4" id="skills" name="skills"
                                    placeholder="Enter Skills"></textarea>
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
        $("#registerCandidates").on("submit", function(e) {
            e.preventDefault();
            if ($('#password').val() != $('#cpassword').val()) {
                $('#passwordError').show();
            } else {
                $(this).unbind('submit').submit();
            }
        });
    </script>
</body>

</html>