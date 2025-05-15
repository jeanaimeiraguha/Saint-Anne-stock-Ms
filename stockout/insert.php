<?php
include("conn.php");

if(isset($_POST['add'])){
    $P_id = $_POST['P_id'];
    $Date = $_POST['Date'];
    $Quantity = $_POST['Quantity'];
    
    $insert = mysqli_query($conn, "INSERT INTO stockout (P_id, `Date`, Quantity) VALUES ('$P_id', '$Date','$Quantity')");
    if($insert){
        header('location:select.php');
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
      
        Product ID: <input type="text" name="P_id"> <br>
   Date: <input type="date" name="Date"> <br>
       Quantity: <input type="text" name="Quantity"> <br>
     
        <button name="add">Add</button>
    </form>
</body>
</html>
