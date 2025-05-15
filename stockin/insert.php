<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Stock - Saint Anne Stock Management System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
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
        h4 {
            font-family: 'Roboto', sans-serif;
            font-weight: 700;
        }
        .card {
            background-color: rgba(255, 255, 255, 0.9);
            color: #000;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
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

    <!-- Add Stock Form -->
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h4>Add Stock</h4>
            </div>
            <div class="card-body">
                <?php
                include("conn.php");

                if (isset($_POST['add'])) {
                    $P_id = $_POST['P_id'];
                    $Date = $_POST['Date'];
                    $stockin_quantity = $_POST['stockin_quantity'];
                    $U_price = $_POST['U_price'];
                    
                    // Input Validation
                    if (!is_numeric($stockin_quantity) || !is_numeric($U_price)) {
                        echo "<div class='alert alert-danger'>Quantity and Unit Price must be numeric values.</div>";
                    } else {
                        // Insert Stock
                        $insert = mysqli_query($conn, "INSERT INTO stockin (P_id, `Date`, stockin_quantity, U_price) VALUES ('$P_id', '$Date', '$stockin_quantity', '$U_price')");
                        
                        if ($insert) {
                            echo "<script>
                                alert('Stock added successfully!');
                                window.location.href = 'select.php';
                            </script>";
                        } else {
                            echo "<div class='alert alert-danger'>Failed to add stock: " . mysqli_error($conn) . "</div>";
                        }
                    }
                }
                ?>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="P_id" class="form-label">Product ID</label>
                        <input type="text" name="P_id" id="P_id" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="Date" class="form-label">Date</label>
                        <input type="date" name="Date" id="Date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="stockin_quantity" class="form-label">Quantity</label>
                        <input type="number" name="stockin_quantity" id="stockin_quantity" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="U_price" class="form-label">Unit Price</label>
                        <input type="number" step="0.01" name="U_price" id="U_price" class="form-control" required>
                    </div>
                    <button type="submit" name="add" class="btn btn-success w-100">Add Stock</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
