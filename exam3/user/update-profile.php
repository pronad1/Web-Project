<?php


session_start();

if (empty($_SESSION['id_user'])) {
    header("Location: ../index.php");
    exit();
}

require_once("../db.php");

if (isset($_POST)) {

    $firstname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lname']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $skills = mysqli_real_escape_string($conn, $_POST['skills']);

    

    $sql = "UPDATE users SET firstname='$firstname', lastname='$lastname', state='$state', skills='$skills'";

    
    $sql .= " WHERE id_user='$_SESSION[id_user]'";

    if ($conn->query($sql) === true) {
        $_SESSION['name'] = $firstname.' '.$lastname;
        header("Location: index.php");
        exit();
    } else {
        echo "Error ". $sql . "<br>" . $conn->error;
    }
    $conn->close();

} else {
    header("Location: edit-profile.php");
    exit();
}
