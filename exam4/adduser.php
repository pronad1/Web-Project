<?php

session_start();

require_once("db.php");

if (isset($_POST)) {

    $firstname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lname']);
    $skills = mysqli_real_escape_string($conn, $_POST['skills']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password = base64_encode(strrev(md5($password)));

    $state = mysqli_real_escape_string($conn, $_POST['state']);

    
    $sql = "SELECT email FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {

        
        $sql = "INSERT INTO users(firstname, lastname, email, password,state,skills) VALUES ('$firstname', '$lastname', '$email', '$password','$state','$skills')";

        if ($conn->query($sql)===true) {
            
            $_SESSION['registerCompleted'] = true;
            header("Location: login-candidates.php");
            exit();
        } else {
            echo "Error " . $sql . "<br>" . $conn->error;
        }
    } else {
        $_SESSION['registerError'] = true;
        header("Location: register-candidates.php");
        exit();
    }

    $conn->close();

} else {
    header("Location: register-candidates.php");
    exit();
}
