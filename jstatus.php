<?php

include "dbconn.php"; // Using database connection file here

$id = $_GET['orders_id']; // get id through query string

   $update =  mysqli_query($conn,"UPDATE orders SET status= '1' WHERE orders_id = $id");

       mysqli_close($conn);
       header("location:admin-page.php");
        exit;

?>