<?php 

include "connection.php"; 

if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

    $sql = "DELETE FROM `users` WHERE `id`='$user_id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {

        echo "Record deleted successfully <a href='read.php' class='btn btn-info'>Back Home</a>";

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 

?>