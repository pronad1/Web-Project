<?php
session_save_path(sys_get_temp_dir());
session_start();
require_once("../db.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $sql = "SELECT id_admin, username FROM admin WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        $_SESSION['id_admin'] = $row['id_admin'];
        $_SESSION['admin_logged_in'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        $_SESSION['loginError'] = "Invalid username or password.";
        header("Location: index.php");
        exit();
    }
    $conn->close();
} else {
    header("Location: index.php");
    exit();
}
