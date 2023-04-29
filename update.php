<?php 
include "connection.php";

    if (isset($_POST['update'])) {

        $firstname = $_POST['firstname'];

        $user_id = $_POST['id'];

        $lastname = $_POST['lastname'];

        $email = $_POST['email'];

        $password = $_POST['password'];

        $gender = $_POST['gender']; 

        $sql = "UPDATE `users` SET `fname`='$firstname',`lname`='$lastname',`email`='$email',`password`='$password',`gender`='$gender' WHERE `id`='$user_id'"; 

        $result = mysqli_query($conn, $sql); 

        if ($result == TRUE) {
            echo "Record updated successfully.";
        } else {
            echo "Error:" . $sql . "<br>" . $conn->error;
        }
    } 

if (isset($_GET['id'])) {

    $user_id = $_GET['id']; 

    $sql = "SELECT * FROM `users` WHERE `id`='$user_id'";
    $result = $conn -> query($sql); 

    if ($result -> num_rows > 0) {     

        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $firstname = $row['fname'];
            $lastname = $row['lname'];
            $email = $row['email'];
            $password  = $row['password'];
            $gender = $row['gender'];
            
        } 
    } 
        
}
         
