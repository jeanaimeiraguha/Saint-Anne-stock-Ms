<?php
include('conn.php');
if(isset($_GET['P_id'])){
    $P_id = $_GET['P_id'];
    $result = mysqli_query($conn, "SELECT * FROM stockin WHERE P_id='$P_id'");
        $row = mysqli_fetch_assoc($result);
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <form action="" method="post">
        Date: <input type="date" name="Date" value="<?php echo isset($row['Date']) ? $row['Date'] : ''; ?>"> <br>
        Quantity: <input type="text" name="stockin_quantity" value="<?php echo isset($row['stockin_quantity']) ? $row['stockin_quantity'] : ''; ?>"> <br>
        Unit Price: <input type="text" name="U_price" value="<?php echo isset($row['U_price']) ? $row['U_price'] : ''; ?>"> <br>
        Total Price: <input type="text" name="T_price" value="<?php echo isset($row['T_price']) ? $row['T_price'] : ''; ?>"> <br>
        <button name="add">Update</button>
    </form>
</body>
</html>

<?php
if(isset($_POST['add']) ){
    $Date = $_POST['Date'];
    $stockin_quantity = $_POST['stockin_quantity'];
    $U_price = $_POST['U_price'];
    $T_price = $_POST['T_price'];

    $update = mysqli_query($conn, "UPDATE stockin SET `Date`='$Date', stockin_quantity='$stockin_quantity', U_price='$U_price', T_price='$T_price' WHERE P_id='$P_id'");
    if($update){
        header('location:select.php');
        exit;
    }
}
?>
