
<?php

    include 'connection.php';

    if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashed_password = md5($password);
    }

    

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$hashed_password' ";

    $result = mysqli_query($conn, $sql);

    if(!$result) {
        echo 'Error:'.$sql.'<br>'.$conn -> error;
    }

    if($result -> num_rows > 0) {

        session_start();
        $_SESSION['email'] = $email;

        header("Location: read.php");
        exit();
    } else {
        echo "Invalid username or password";
        echo "<br />";
        echo "<h3><a href='login.html'>Try again</a></h3>";
    }

?>