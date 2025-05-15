<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
     <a href="insert.php">Add New</a>
   <table border="1">
     <thead>
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
               <td><a href="update.php?P_id=<?php echo $row['P_id']; ?>">Edit</a></td>
               <td><a href="delete.php?P_id=<?php echo $row['P_id']; ?>">Delete</a></td>
          </tr>
          <?php
          }
          ?>
     </tbody>
   </table>  
</body>
</html>
