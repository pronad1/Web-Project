<?php
session_start();
if (empty($_SESSION['id_user'])) {
    header("Location: ../index.php");
    exit();
}
require_once("../db.php");
if (isset($_POST)) {
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password = base64_encode(strrev(md5($password)));
    $sql = "UPDATE users SET password='$password' WHERE id_user='$_SESSION[id_user]'";
    if ($conn->query($sql) === true) {
        header("Location: index.php");
        exit();
    } else {
        echo $conn->error;
    }
    $conn->close();
} else {
    header("Location: settings.php");
    exit();
}
