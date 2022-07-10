<?php

include('connection.php');

if (isset($_GET["deleteId"])) {
    $id = $_GET["deleteId"];

    $sql = mysqli_query($conn, "DELETE from `category` WHERE category_id=$id");
    if ($sql) {
        echo "<script>alert('Category has been deleted');
                window.location.href='categories.php';  
              </script>";
    } else {
        die (mysqli_error($conn));
    }
}