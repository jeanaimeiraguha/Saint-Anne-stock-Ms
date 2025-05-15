<?php
include('conn.php');
$P_id=$_GET['P_id'];
$delete=mysqli_query($conn,"DELETE FROM stockout where P_id='$P_id'");
if($delete){
     echo "deleted";
     header('location:select.php');
}


?>