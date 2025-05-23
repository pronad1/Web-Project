<?php
session_start();
require_once("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate inputs
    if (!isset($_POST['rating']) || !isset($_POST['review']) || !isset($_POST['jobpost_id'])) {
        header("Location: index.php?error=Missing required fields");
        exit();
    }

    $rating = mysqli_real_escape_string($conn, $_POST['rating']);
    $review = mysqli_real_escape_string($conn, $_POST['review']);
    $jobpost_id = mysqli_real_escape_string($conn, $_POST['jobpost_id']);

    // Validate rating
    if ($rating < 1 || $rating > 5) {
        header("Location: index.php?error=Invalid rating value");
        exit();
    }

    // Set reviewer ID based on session
    $id_user = 'NULL';
    $id_company = 'NULL';
    
    if (isset($_SESSION['id_user'])) {
        $id_user = $_SESSION['id_user'];
    } elseif (isset($_SESSION['id_company'])) {
        $id_company = $_SESSION['id_company'];
    } else {
        header("Location: index.php?error=Not logged in");
        exit();
    }

    // Verify job post exists
    $check = $conn->query("SELECT id_jobpost FROM job_post WHERE id_jobpost = $jobpost_id");
    if ($check->num_rows == 0) {
        header("Location: index.php?error=Invalid job post");
        exit();
    }

    $sql = "INSERT INTO reviews (id_user, id_company, id_jobpost, rating, review_text) 
            VALUES ($id_user, $id_company, $jobpost_id, '$rating', '$review')";    
    
    if($conn->query($sql)) {
        header("Location: index.php?msg=Review added successfully");
    } else {
        header("Location: index.php?error=Error adding review: " . $conn->error);
    }
}
?>