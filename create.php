<?php

include 'connection.php';

if(isset($_POST['submit'])) {

    $firstname = $_POST['firstname'];

    $lastname = $_POST['lastname'];

    $email = $_POST['email'];

    $password = md5($_POST['password']);

    $gender = $_POST['gender'];

    $sql = "INSERT INTO users (fname, lname, email, password, gender) VALUES ('$firstname', '$lastname', '$email', '$password', '$gender') " ;

    $result = mysqli_query($conn, $sql);

    if ($result == true) {
        header('location: read.php');
    } else {
        echo 'Error:'.$sql.'<br>'.conn -> error;
    }
    $conn -> close();
}

?>
