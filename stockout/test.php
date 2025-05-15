<?php
include("conn.php");

if (isset($_POST['add'])) {
    $P_id = $_POST['P_id'];
    $Date = $_POST['Date'];
    $Quantity = $_POST['Quantity'];

    // Check if product exists
    $product_check = mysqli_query($conn, "SELECT * FROM products WHERE id = '$P_id'");
    
    if ($product_check && mysqli_num_rows($product_check) > 0) {
        $product = mysqli_fetch_assoc($product_check);

        // Check if stock is sufficient
        if ($product['stock'] >= $Quantity) {
            // Insert stockout and update product stock
            $insert = mysqli_query($conn, "INSERT INTO stockout (P_id, `Date`, Quantity) VALUES ('$P_id', '$Date', '$Quantity')");
            $new_stock = $product['stock'] - $Quantity;
            $update = mysqli_query($conn, "UPDATE products SET stock = '$new_stock' WHERE id = '$P_id'");

            if ($insert && $update) {
                header('Location: select.php');
                exit;
            } else {
                echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Error: Insufficient stock for this product.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Error: Product not found.</div>";
    }
}
?>
