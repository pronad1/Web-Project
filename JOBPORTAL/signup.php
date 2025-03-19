<?php
include 'config.php';
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if email already exists
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $error = "User already exists with this email!";
    } elseif ($password !== $confirm_password) {
        $error = "Passwords do not match!";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Encrypt password

        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";
        
        if ($conn->query($sql) === true) {
            $_SESSION['user'] = $email; // Store user session
            header("Location: home.php"); // Redirect to home page
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
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
            <h2>Sign Up</h2>
            <?php if ($error): ?>
            <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>
            <form action="" method="post">
                <input type="text" name="name" placeholder="Full Name" required><br><br>
                <input type="email" name="email" placeholder="Email" required><br><br>
                <input type="password" name="password" placeholder="Password" required><br><br>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required><br><br>
                <button type="submit" class="btn">Register</button>
            </form>
        </div>
    </footer>

</body>