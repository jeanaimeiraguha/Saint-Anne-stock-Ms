<?php
include('../stockin/conn.php');

if (isset($_POST['add'])) {
     $name=$_POST['name'];
     $password=$_POST['password'];
     $insert=mysqli_query($conn,"INSERT INTO admin  (id,`name`,`password`) VALUES('','$name','$password')");

     if ($insert) {
          echo "Admin Added successfully";
          # code... 
     }
     else{
          echo "Failed".mysqli_error($conn);
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
<button name="add">Add</button>

     </form>
</body>
</html>