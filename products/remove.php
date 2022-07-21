<?php
include ('connection.php');

$id = $_GET['id'];

$del = mysqli_query($conn,"DELETE FROM order_details WHERE id = '$id'"); // delete query

if($del)
{
    mysqli_close($conn); 
    header("location:cart.php");
    exit;	
}
else
{
  echo"<script language='javascript'>alert('Error removing cart');
            window.location='/products/cart.php';</script>";
}
?>