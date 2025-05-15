<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="css/bootstrap.min.css">

     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
<a href="insert.php" class="btn btn-primary mt-4 me-3">Add New</a>
<table class="table table-bordered table-striped table-hover container ">
    <thead class="table-dark">
        <tr>
            <th>Product ID</th>
            <th>Date</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Total Price</th>
            <th colspan="2">Operations</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include('conn.php');
        $select = mysqli_query($conn, "SELECT * FROM stockin");
        while ($row = mysqli_fetch_assoc($select)) {
            $product_id = $row['P_id'];

            $stockincalc = mysqli_query($conn, "SELECT SUM(stockin_Quantity) AS total_in FROM stockin WHERE P_id = $product_id");
            $stockin_row = mysqli_fetch_assoc($stockincalc);
            $total_in = $stockin_row['total_in'];

            $stockoutcalc = mysqli_query($conn, "SELECT SUM(Quantity) AS total_out FROM stockout WHERE P_id = $product_id");
            $stockout_row = mysqli_fetch_assoc($stockoutcalc);
            $total_out = $stockout_row['total_out'] ;

            $result = $total_in - $total_out;
        ?>
        <tr>
            <td><?php echo $row['P_id'] ?></td>
            <td><?php echo $row['Date'] ?></td>
            <td><?php echo $result ?></td>
            <td><?php echo $row['U_price'] ?></td>
            <td><?php echo $result * floatval($row['U_price']) ?></td>
            <td><a href="update.php?P_id=<?php echo $row['P_id'] ?>" class="btn btn-sm btn-warning">Edit</a></td>
            <td><a href="delete.php?P_id=<?php echo $row['P_id'] ?>" class="btn btn-sm btn-danger">Delete</a></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
  
</body>
</html>