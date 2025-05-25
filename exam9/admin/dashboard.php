<?php
session_start();
require_once("../db.php");
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}
$company_sql = "SELECT c.*, COUNT(j.id_jobpost) AS job_posts FROM company c LEFT JOIN job_post j ON c.id_company = j.id_company GROUP BY c.id_company";
$company_result = mysqli_query($conn, $company_sql);
$total_companies = mysqli_num_rows($company_result);
$user_sql = "SELECT * FROM users";
$user_result = mysqli_query($conn, $user_sql);
$total_users = mysqli_num_rows($user_result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Admin Dashboard</h1>
        <div class="row" style="margin-top:40px;">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">Total Companies</div>
                    <div class="panel-body">
                        <h2><?php echo $total_companies; ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-success">
                    <div class="panel-heading">Total Candidates</div>
                    <div class="panel-body">
                        <h2><?php echo $total_users; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <h3>Company Details</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Job Posts</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($company = mysqli_fetch_assoc($company_result)) { ?>
                <tr>
                    <td><?php echo $company['id_company']; ?>
                    </td>
                    <td><?php echo $company['name']; ?>
                    </td>
                    <td><?php echo $company['email']; ?>
                    </td>
                    <td><?php echo $company['contactno']; ?>
                    </td>
                    <td><?php echo $company['job_posts']; ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <h3>Candidate Details</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user = mysqli_fetch_assoc($user_result)) { ?>
                <tr>
                    <td><?php echo $user['id_user']; ?>
                    </td>
                    <td><?php echo $user['firstname'] . ' ' . $user['lastname']; ?>
                    </td>
                    <td><?php echo $user['email']; ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="text-center" style="margin-top:30px;">
            <a href="../index.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
</body>

</html>