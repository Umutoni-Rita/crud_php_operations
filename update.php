<?php 
include "connection.php";

    if (isset($_POST['update'])) {

        $firstname = $_POST['firstname'];

        $user_id = $_POST['user_id'];

        $lastname = $_POST['lastname'];

        $email = $_POST['email'];

        $password = md5($_POST['password']);

        $gender = $_POST['gender']; 

        $sql = "UPDATE `users` SET `fname`='$firstname',`lname`='$lastname',`email`='$email',`password`='$password',`gender`='$gender' WHERE `id`='$user_id'"; 

        $result = mysqli_query($conn, $sql); 

        if ($result == TRUE) {
            echo "Record updated successfully. </br> <a href='read.php' class='btn btn-custom'>Back Home</a> ";
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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <title>Update User Information</title>
</head>
<body>
    <div class="container">
    <h2>Update User Information</h2>
    <form method="post">
      <fieldset>
        <legend>Personal information:</legend>
        <div class="mb-3">
        First name:<br>
        <input type="text" name="firstname" value="<?php echo $firstname; ?>" class="form-control">
        <input type="hidden" name="user_id" value="<?php echo $id; ?>">
        </div>
        <div class="mb-3">
        Last name:<br>
        <input type="text" name="lastname" value="<?php echo $lastname; ?>" class="form-control">
        </div>
        <div class="mb-3">
        Email:<br>
        <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" readonly>
        <br></div>
        Password:<br>
        <input type="password" name="password" value="<?php echo $password; ?>" class="form-control">
        <div class="mb-3">
        Gender:<br>
        <input type="radio" name="gender" value="Male" <?php if($gender == 'Male'){ echo "checked";} ?> >Male
        <input type="radio" name="gender" value="Female" <?php if($gender == 'Female'){ echo "checked";} ?>>Female
        </div><br>
        <input type="submit" value="Update" name="update" class="update-btn" >
      </fieldset>
    </form> 
    </div>
</body>
</html>
         
