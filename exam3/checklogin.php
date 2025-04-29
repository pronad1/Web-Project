<?php

session_start();

require_once("db.php");

if (isset($_POST)) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);


    $password = base64_encode(strrev(md5($password)));


    $sql = "SELECT id_user, firstname, lastname, email FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['name'] = $row['firstname'] . " " . $row['lastname'];
        $_SESSION['id_user'] = $row['id_user'];
        
        header("Location: user/index.php");
        exit();
    } else {

        $_SESSION['loginError'] = $conn->error;
        header("Location: login-candidates.php");
        exit();
    }

    $conn->close();

} else {
    header("Location: login-candidates.php");
    exit();
}
