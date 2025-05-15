<?php
session_start();
require_once("db.php");
if (isset($_POST)) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password = base64_encode(strrev(md5($password)));
    $sql = "SELECT id_company,name, companyname, email FROM company WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['id_company'] = $row['id_company'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        header("Location: company/index.php");
        exit();
    } else {
        $_SESSION['loginError'] = $conn->error;
        header("Location: login-company.php");
        exit();
    }
    $conn->close();
} else {
    header("Location: login-company.php");
    exit();
}
