<?php
include('../stockin/conn.php');
session_start();
if (isset($_POST['add'])) {
     $name=$_POST['name'];
     $password=$_POST['password'];
     $select=mysqli_query($conn,"SELECT * FROM admin where `name`='$name'AND `password`='$password'");
     
     if(!$select){
          echo "Error occuring".mysqli_error($conn);
     }
     
     $count=mysqli_num_rows($select);

     if ($count>=1) {
          $_SESSION['name']=$_POST['name']; 
          $_SESSION['password']=$_POST['[password']; 
          header('location:home.php');
     }
     else{
          echo "Wrong credentials".mysqli_error($conn);
     }
     # code...
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
     <form action="" method="post">

Admin Name:<input type="text" name="name" required> <br>
Admin Password:<input type="password" name="password" required> <br>
<button name="add">Login</button>

     </form>
</body>
</html>