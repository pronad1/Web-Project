<?php
session_start();
require_once("db.php");
if (isset($_POST)) {
    $companyname = mysqli_real_escape_string($conn, $_POST['companyname']);
    $contactno = mysqli_real_escape_string($conn, $_POST['contactno']);
    $website = mysqli_real_escape_string($conn, $_POST['website']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $password = base64_encode(strrev(md5($password)));
    $sql = "SELECT email FROM company WHERE email='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        $sql = "INSERT INTO company(name, companyname, country, state, city, contactno, website, email, password) VALUES ('$name', '$companyname', '$country', '$state', '$city', '$contactno', '$website', '$email', '$password')";

        if ($conn->query($sql)===true) {

            $_SESSION['registerCompleted'] = true;
            header("Location: login-company.php");
            exit();
        } else {
            echo "Error " . $sql . "<br>" . $conn->error;
        }
    } else {
        $_SESSION['registerError'] = true;
        header("Location: register-company.php");
        exit();
    }
    $conn->close();
} else {
    header("Location: register-company.php");
    exit();
}
