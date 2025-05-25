<?php
session_start();
if (empty($_SESSION['id_company'])) {
    header("Location: ../index.php");
    exit();
}
require_once("../db.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST)) {
    if (!isset($_POST['jobtitle']) || !isset($_POST['description']) ||
        !isset($_POST['minimumsalary']) || !isset($_POST['maximumsalary']) ||
        !isset($_POST['experience']) || !isset($_POST['qualification'])) {
        die("Error: All fields are required");
    }

    // Define variables first
    $jobtitle = mysqli_real_escape_string($conn, $_POST['jobtitle']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $minimumsalary = mysqli_real_escape_string($conn, $_POST['minimumsalary']);
    $maximumsalary = mysqli_real_escape_string($conn, $_POST['maximumsalary']);
    $experience = mysqli_real_escape_string($conn, $_POST['experience']);
    $qualification = mysqli_real_escape_string($conn, $_POST['qualification']);

    // Then prepare and execute the statement
    $stmt = $conn->prepare("INSERT INTO job_post(id_company, jobtitle, description, minimumsalary, maximumsalary, experience, qualification) VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("issssss", $_SESSION['id_company'], $jobtitle, $description, $minimumsalary, $maximumsalary, $experience, $qualification);
    
    if ($stmt->execute()) {
        $_SESSION['jobPostSuccess'] = true;
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error . "<br>";
        echo "SQL Error: " . $conn->error;
    }
    $stmt->close();
    $conn->close();
} else {
    header("Location: create-job-post.php");
    exit();
}
