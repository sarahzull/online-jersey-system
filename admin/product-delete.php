<?php

include('connection.php');

if (isset($_GET["deleteId"])) {
    $id = $_GET["deleteId"];

    $sql = mysqli_query($conn, "DELETE from `jersey` WHERE jersey_id=$id");
    if ($sql) {
        echo "<script>alert('Product has been deleted');
                window.location.href='products.php';  
              </script>";
    } else {
        die (mysqli_error($conn));
    }
}