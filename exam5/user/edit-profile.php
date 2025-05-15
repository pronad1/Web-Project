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
                                <div>
                                    <ul>
                                        <li><a href="index.php"><i class="fa fa-address-card-o"></i> My
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
                            <h2><i>Edit Profile</i></h2>
                            <form action="update-profile.php" method="post" enctype="multipart/form-data">
                                <?php
                                 $sql = "SELECT * FROM users WHERE id_user='$_SESSION[id_user]'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
                                <div class="row">
                                    <div class="col-md-6 latest-job ">
                                        <div class="form-group">
                                            <label for="fname">First Name</label>
                                            <input type="text" class="form-control input-lg" id="fname" name="fname"
                                                placeholder="First Name" onkeypress="return validateName(event);"
                                                value="<?php echo $row['firstname']; ?>"
                                                required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="lname">Last Name</label>
                                            <input type="text" class="form-control input-lg" id="lname" name="lname"
                                                placeholder="Last Name" onkeypress="return validateName(event);"
                                                value="<?php echo $row['lastname']; ?>"
                                                required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email address</label>
                                            <input type="email" class="form-control input-lg" id="email"
                                                placeholder="Email"
                                                value="<?php echo $row['email']; ?>"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 latest-job ">
                                        <div class="form-group">
                                            <label for="state">State</label>
                                            <input type="text" class="form-control input-lg" id="state" name="state"
                                                placeholder="state" onkeypress="return validateName(event);"
                                                value="<?php echo $row['state']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Skills</label>
                                            <textarea class="form-control input-lg" rows="4" name="skills"
                                                onkeypress="return validateName(event);"><?php echo $row['skills']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-flat btn-success">Update
                                                Profile</button>
                                        </div>
                                    </div>
                                </div>
                                <?php
    }
}
?>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>

</html>