<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saint Anne Stock Management System</title>

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
        h1 {
            margin-top: 20px;
            font-weight: 700;
            font-family: 'Roboto', sans-serif;
            text-align: center;
            color: #ffffff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); 
        }
        .container {
            background-color: rgba(255, 255, 255, 0.9);
            color: #000;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
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

    <!-- Product List -->
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Product List</h3>
            <a href="insert.php" class="btn btn-primary">Add New</a>
        </div>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th colspan="2">Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('../stockin/conn.php');
                $result = mysqli_query($conn, "SELECT * FROM products");
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['P_id']; ?></td>
                    <td><?php echo $row['P_Name']; ?></td>
                    <td>
                        <a href="update.php?P_id=<?php echo $row['P_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                    <td>
                        <a href="delete.php?P_id=<?php echo $row['P_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>  
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
