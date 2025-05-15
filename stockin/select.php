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
               <th>Date</th>
               <th>Quantity</th>
               <th>Unit Price</th>
               <th>Total Price</th>
               <th colspan="2">Operations</th>
          </tr>

          <?php
          include('conn.php');
          $select=mysqli_query($conn,"SELECT * FROM stockin");
          while($row=mysqli_fetch_assoc($select)){
          
          ?>
     </thead>
     <tbody>
          <tr>
               <td><?php echo $row['P_id']?></td>
               <td><?php echo $row['Date']?></td>
               <td><?php echo $row['stockin_Quantity']?></td>
               <td><?php echo $row['U_price']?></td>
               <td><?php echo $row['T_price']?></td>
               <td><a href="update.php?P_id=<?php echo $row['P_id']?>">Edit</a></td>
               <td><a href="delete.php?P_id=<?php echo  $row['P_id']?>">Delete</a></td>
          </tr>

          <?php
          }
          
          ?>
     </tbody>
   </table>  
</body>
</html>