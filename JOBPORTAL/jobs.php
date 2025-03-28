<?php
include 'config.php';
session_start();

// Redirect if not logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $salary = $_POST['salary'];
    $location = $_POST['location'];
    $schedule = $_POST['schedule'];
    $url = $_POST['url'];
    $tags = $_POST['tags'];

    // Insert data into the jobs table
    $stmt = $conn->prepare("INSERT INTO jobs (title, salary, location, schedule, url, tags) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $title, $salary, $location, $schedule, $url, $tags);

    if ($stmt->execute()) {
        header("Location: employee.php");
        $success_message = "Job posted successfully!";
    } else {
        $error_message = "Error posting job: " . $conn->error;
    }

    $stmt->close();
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Post a Job - Job Portal</title>
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
        <div class="auth-links">,
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

    <!-- Footer -->
    <footer class="footer">
        <main class="job-posting">
            <div>
                <h1>Post a New Job</h1>
            </div>


            <?php if (!empty($success_message)): ?>
            <p class="success"><?php echo $success_message; ?></p>
            <?php endif; ?>

            <?php if (!empty($error_message)): ?>
            <p class="error"><?php echo $error_message; ?></p>
            <?php endif; ?>

            <form method="POST" action="">
                <label for="title">Job Title:</label><br>
                <input type="text" name="title" placeholder="CEO"><br><br>

                <label for="salary">Salary:</label><br>
                <input type="text" name="salary" placeholder="$90,000 USD"><br><br>

                <label for="location">Location:</label><br>
                <input type="text" name="location" placeholder="Dhaka"><br><br>


                <label for="url">Job URL:</label><br>
                <input type="url" name="url" placeholder="https://www.facebook.com/prosenjit.mondal" required><br><br>

                <label for="tags">Tags (comma-separated):</label><br>
                <input type="text" name="tags" placeholder="php,html,css"><br><br>

                <label for="schedule">Schedule:</label><br>
                <select name="schedule">
                    <option value="Full Time">Full Time</option>
                    <option value="Part Time">Part Time</option>
                    <option value="Remote">Remote</option>
                </select><br><br>

                <button type="submit" class="btn">Post Job</button>
            </form>
        </main>
        <p>&copy; <?php echo date('Y'); ?> Job
            Portal. All rights reserved.</p>
    </footer>

</body>

</html>