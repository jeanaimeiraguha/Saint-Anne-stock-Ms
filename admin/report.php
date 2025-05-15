<head>
    <!-- Existing meta tags and Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Add Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background-image: url('https://www.godfrey.com/application/files/2416/5817/5706/godfrey-je-blog-mrkt-p1.gif');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #ffffff;
            padding-top: 60px; 
        }
        .navbar {
            background-color: rgba(0, 0, 0, 0.8);
        }
        .navbar a {
            color: #ffffff !important;
        }
        h1 {
            margin-top: 20px;
            font-weight: 700;
            font-family: 'Roboto', sans-serif;
            text-align: center;
            color: #ffffff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); 
        }
    </style>
</head>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Saint Anne Stock Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../products/select.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../stockin/select.php">Stockin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../stockout/select.php">Stockout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="report.php">Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>










<?php
include('../stockin/conn.php');

$date = isset($_POST['Date']) ? $_POST['Date'] : '';

$query = "
SELECT 
    products.P_Name, 
    SUM(stockin.stockin_Quantity) AS stockin_qty, 
    SUM(stockout.Quantity) AS stockout_qty 
FROM 
    products 
LEFT JOIN 
    stockin ON products.P_id = stockin.P_id 
LEFT JOIN 
    stockout ON products.P_id = stockout.P_id
GROUP BY 
    products.P_Name
";

$select = mysqli_query($conn, $query);

if (!$select) {
    echo "Failed: " . mysqli_error($conn);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Product Stock Status</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-4">

    <h2 class="mb-4">Product Stock Status</h2>

    <form method="POST" class="row g-3 align-items-center mb-4">
        <div class="col-auto">
            <label for="date" class="col-form-label">Select Date:</label>
        </div>
        <div class="col-auto">
            <input type="date" id="date" name="Date" class="form-control" required value="<?php echo htmlspecialchars($date); ?>" />
        </div>
        <div class="col-auto">
            <button type="submit" name="detect" class="btn btn-primary">Check Product Stocked In</button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Product Name</th>
                    <th>Stockin Quantity</th>
                    <th>Stockout Quantity</th>
                    <th>Stock Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($select)) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['P_Name']); ?></td>
                    <td><?php echo (int)$row['stockin_qty']; ?></td>
                    <td><?php echo (int)$row['stockout_qty']; ?></td>
                    <td>
                        <?php 
                            $stock = $row['stockin_qty'] - $row['stockout_qty']; 
                            if ($stock <= 0) {
                                echo '<span class="text-danger fw-bold">Out of Stock</span>';
                            } else {
                                echo '<span class="text-success fw-bold">' . $stock . '</span>';
                            }
                        ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <button type="button" onclick="window.print()" class="btn btn-secondary mt-3">Print Report</button>
</div>

<!-- Bootstrap JS Bundle with Popper (optional if you want interactive components) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
