<?php
include("../stockin/conn.php");

if(isset($_POST['add'])){
    $P_Name = $_POST['P_Name'];
    
    $insert = mysqli_query($conn, "INSERT INTO products (P_id, P_Name) VALUES ('', '$P_Name')");
    if($insert){
        header('location:select.php');
    }
    else{
        echo "Failed".mysqli_error($conn);
    }
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
      
        Product Name: <input type="text" name="P_Name"> <br>
     
        <button name="add">Add</button>
    </form>
</body>
</html>
