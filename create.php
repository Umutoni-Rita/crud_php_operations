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
        echo 'New record created succesfully';
    } else {
        echo 'Error:'.$sql.'<br>'.conn -> error;
    }
    $conn -> close();
}

?>

<html>
    <a href="signup.html"><br><br>Back</a>
    <a href="read.php"><br><br> View record from database</a>
</html>