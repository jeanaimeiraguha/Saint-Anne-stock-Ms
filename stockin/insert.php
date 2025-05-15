<?php
include("conn.php");

if(isset($_POST['add'])){
      $P_id = $_POST['P_id'];
    $Date = $_POST['Date'];
    $stockin_quantity = $_POST['stockin_quantity'];
    $U_price = $_POST['U_price'];
    $T_price = $_POST['T_price'];
    $insert = mysqli_query($conn, "INSERT INTO stockin (P_id, `Date`, stockin_quantity, U_price, T_price) VALUES ('$P_id', '$Date', '$stockin_quantity', '$U_price', '$T_price')");
    if($insert){
        header('location:select.php');
    }
    else{
        echo "failed".mysqli_error($conn);
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
          Product Id: <input type="text" name="P_id"> <br>
        Date: <input type="date" name="Date"> <br>
        Quantity: <input type="text" name="stockin_quantity"> <br>
        Unit Price: <input type="text" name="U_price"> <br>
        Total Price: <input type="text" name="T_price"> <br>
        <button name="add">Add</button>
    </form>
</body>
</html>
