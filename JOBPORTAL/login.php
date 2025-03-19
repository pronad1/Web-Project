<?php
session_start();
include 'config.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user'] = $row['name'];
            header("Location: employee.php");
            exit();
        } else {
            $error = "Invalid password!";
        }
    } else {
        $error = "No user found!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Job Portal</title>
</head>

<body>

    <!-- Navbar -->
    <header class="navbar">
        <div class="logo">
            <a href="/">
                <img src="logo.svg" alt="Pixel Positions">
            </a>
        </div>
        <nav class="nav-links">
            <a href="/">Jobs</a>
            <a href="#">Careers</a>
            <a href="#">Salaries</a>
            <a href="#">Companies</a>
        </nav>
        <div class="auth-links">
            <?php if (isset($_SESSION['user'])): ?>
            <a href="jobs.php" class="btn">Post a Job</a>
            <form action="logout.php" method="POST">
                <button type="submit" class="btn">Log Out</button>
            </form>
            <?php else: ?>
            <a href="signup.php" class="btn">Sign Up</a>
            <a href="login.php" class="btn">Log In</a>
            <?php endif; ?>
        </div>
    </header>

    <footer class="footer">
        <div class="login-container">
            <h2>Login</h2>

            <?php if ($error): ?>
            <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>

            <form action="" method="post">
                <input type="email" name="email" placeholder="Email" required><br><br>
                <input type="password" name="password" placeholder="Password" required><br><br>
                <button type="submit" class="btn">Login</button>
            </form>

        </div>
    </footer>

</body>

</html>