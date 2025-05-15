<?php
include('../stockin/conn.php');
if(isset($_GET['P_id'])){
    $P_id = $_GET['P_id'];
    $result = mysqli_query($conn, "SELECT * FROM products WHERE P_id='$P_id'");
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
Product Name: <input type="text" name="P_Name" value="<?php echo $row['P_Name'] ?>"> <br>
       
        <button name="add">Update</button>
    </form>
</body>
</html>

<?php
if(isset($_POST['add']) ){
    $P_Name = $_POST['P_Name'];
//     $Quantity = $_POST['Quantity'];
    

    $update = mysqli_query($conn, "UPDATE products SET  P_Name='$P_Name' WHERE P_id='$P_id'");
    if($update){
        header('location:select.php');
        exit;
    }
}
?>
