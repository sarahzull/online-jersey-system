<?php include('connection.php'); 
session_start();
if(isset($_POST["submit"])) {
  $categoryName = $_POST["categoryName"];
  $categoryType = $_POST["categoryType"];

  if(!$conn) {
      die("Cannot connect to database " . mysqli_connect_error($conn));
  } else {

      $query = "INSERT INTO `category` (`category_name`, `category_type`) 
      VALUES ('$categoryName', '$categoryType')";

      $result = mysqli_query($conn, $query);
          if(!$result){
              die ("invalid query " . mysqli_error($conn));
          }
          else 
          {
              echo "<script>alert('Category has successfully created');
                  window.location.href='categories.php';</script>";
          }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Add Product</title>

  <style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* Firefox */
    input[type=number] {
      -moz-appearance: textfield;
    }
  </style>

  <?php include('layouts/header.php') ?>
</head>

<body class="bg-light">
  <?php include('layouts/navbar.php'); ?> 

  <div class="container">
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">Add Category</h4>
          <hr class="my-4">

          <form method="POST" action="category-add.php">
          <div class="form-group">
            <label for="categoryName" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="categoryName" name="categoryName" required>
          </div>

          <div class="form-group">
            <label for="categoryType" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="categoryType" name="categoryType" required>
          </div>

          <div class="float-right mt-3">
            <button type="submit" name="submit" class="btn btn-success px-4">
              Save Category
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
