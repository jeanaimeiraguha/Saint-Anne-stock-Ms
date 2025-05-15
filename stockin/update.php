<?php
include('conn.php');

if (isset($_GET['P_id'])) {
    $P_id = $_GET['P_id'];
    $result = mysqli_query($conn, "SELECT * FROM stockin WHERE P_id='$P_id'");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: select.php");
    exit();
}

if (isset($_POST['update'])) {
    $P_id = $_POST['P_id'];
    $date = $_POST['date'];
    $quantity = $_POST['quantity'];
    $unit_price = $_POST['unit_price'];

    // Update the stockin record
    $update_query = "UPDATE stockin SET Date='$date', stockin_Quantity='$quantity', U_price='$unit_price' WHERE P_id='$P_id'";
    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('Record updated successfully!'); window.location.href='select.php';</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Stockin - Saint Anne Stock Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Update Stockin</h2>
        <form method="post">
            <div class="mb-3">
                <label for="P_id" class="form-label">Product ID</label>
                <input type="text" class="form-control" id="P_id" name="P_id" value="<?php echo $row['P_id']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="<?php echo $row['Date']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $row['stockin_Quantity']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="unit_price" class="form-label">Unit Price</label>
                <input type="number" class="form-control" id="unit_price" name="unit_price" value="<?php echo $row['U_price']; ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="select.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
