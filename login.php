<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <h2>Login Form</h2>
    <form action="" method="post" class="form">
        <label for="email">Email:</label>
        <input type="email" name="email" class="form-control"><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" class="form-control"><br><br>
        <input type="submit" value="Login" class="btn btn-secondary">
    </form>
    </div>
</body>
</html>

<?php

    include 'connection.php';

    if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
    }

    $sql = "SELECT * FROM users WHERE email = '$username' AND password = '$password' ";

    $result = mysqli_query($conn, $sql);

    if(!$result) {
        echo 'Error:'.$sql.'<br>'.$conn -> error;
    }

    if($result -> num_rows > 0) {

        session_start();
        $_SESSION['email'] = $email;

        header("Location: read.php");
        exit();
    } 

?>