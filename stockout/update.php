<?php
include('conn.php');
$P_id = $_GET['P_id'];
$select = mysqli_query($conn, "SELECT * FROM stockout WHERE p_id='$P_id'");
$row = mysqli_fetch_array($select);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Stockout</title>
</head>
<body>
    <form action="" method="post">
        Product Id: <input type="text" name="P_id" value="<?php echo $row['P_id']; ?>" readonly> <br>
        Date: <input type="date" name="Date" value="<?php echo $row['Date']; ?>"> <br>
        Quantity: <input type="text" name="Quantity" value="<?php echo $row['Quantity']; ?>"> <br>
        <button name="add">Update</button>
    </form>
</body>
</html>

<?php
if (isset($_POST['add'])) {
    $P_id = $_POST['P_id'];
    $Date = $_POST['Date'];
    $Quantity = $_POST['Quantity'];

    $update = mysqli_query($conn, "UPDATE stockout SET `Date`='$Date', Quantity='$Quantity' WHERE P_id='$P_id'");

    if ($update) {
        header('Location: select.php');
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>
