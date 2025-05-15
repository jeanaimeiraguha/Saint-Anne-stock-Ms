<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product - Saint Anne Stock Management System</title>

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
        .btn-warning {
            color: #fff;
            background-color: #f0ad4e;
            border-color: #f0ad4e;
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

    <!-- Edit Product Form -->
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark">
                <h4>Edit Product</h4>
            </div>
            <div class="card-body">
                <?php
                include('../stockin/conn.php');

                if (isset($_GET['P_id'])) {
                    $P_id = $_GET['P_id'];
                    $result = mysqli_query($conn, "SELECT * FROM products WHERE P_id='$P_id'");
                    $row = mysqli_fetch_assoc($result);
                } else {
                    echo "<div class='alert alert-danger'>Product ID is missing. Please try again.</div>";
                    exit;
                }

                if (isset($_POST['update'])) {
                    $P_Name = $_POST['P_Name'];
                    
                    $update = mysqli_query($conn, "UPDATE products SET P_Name='$P_Name' WHERE P_id='$P_id'");
                    if ($update) {
                        echo "<script>
                            alert('Product updated successfully!');
                            window.location.href = 'select.php';
                        </script>";
                    } else {
                        echo "<div class='alert alert-danger'>Failed to update product: " . mysqli_error($conn) . "</div>";
                    }
                }
                ?>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="P_Name" class="form-label">Product Name</label>
                        <input type="text" name="P_Name" id="P_Name" value="<?php echo $row['P_Name'] ?>" class="form-control" required>
                    </div>
                    <button type="submit" name="update" class="btn btn-warning w-100">Update Product</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
