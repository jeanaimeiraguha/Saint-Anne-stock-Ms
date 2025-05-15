<?php
include('conn.php');

$P_id=$_GET['P_id'];
$select=mysqli_query($conn, "SELECT * FROM stockout where P_id='$P_id'");
$row=mysqli_fetch_array($select);

?>



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
include("conn.php");

if (isset($_POST['add'])) {
    $P_id = $_POST['P_id'];
    $Date = $_POST['Date'];
    $Quantity = $_POST['Quantity'];

    $update = mysqli_query($conn, "UPDATE stockout set   `Date`='$Date' , Quantity='$Quantity' where P_id='$P_id'" );
    if ($update) {
        header('Location: select.php');
        exit;
    } else {
        echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Add Stock Out</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
<body>
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4>Add Stock Out</h4>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="P_id" class="form-label">Product ID</label>
                    <input type="text" id="P_id" name="P_id" class="form-control" required />
                </div>
                <div class="mb-3">
                    <label for="Date" class="form-label">Date</label>
                    <input type="date" id="Date" name="Date" class="form-control" required  value="<?php echo $row['Date']?>" />
                </div>
                <div class="mb-3">
                    <label for="Quantity" class="form-label">Quantity</label>
                    <input type="number" id="Quantity" name="Quantity" class="form-control" required min="1"   value="<?php echo $row['Quantity']?>"/>
                </div>
                <button type="submit" name="add" class="btn btn-success">Add</button>
                <a href="select.php" class="btn btn-secondary ms-2">Cancel</a>
            </form>
        </div>
    </div>
</div>

<link rel="stylesheet" href="css/bootstrap.min.css">
</body>
</html>
