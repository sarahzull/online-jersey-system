<?php include('connection.php'); 

if(isset($_POST["submit"])) {
  $brand = $_POST["brand"];
  $category = $_POST["category"];
  $price = $_POST["price"];
  $productname = $_POST["productname"];
  $productsize = $_POST["productsize"];
  $productimage = $_POST["productimage"];

  if(!$conn) {
      die("Cannot connect to database " . mysqli_connect_error($conn));
  } else {

      $query = "INSERT INTO `jersey` (`brand_id`, `category_id`, `jersey_price`, `jersey_name`, `jersey_size`, `jersey_image`, `created_at`) 
      VALUES ('$brand', '$category','$price', '$productname', '$productsize', '$productimage', NOW())";

      $result = mysqli_query($conn, $query);
          if(!$result){
              die ("invalid query " . mysqli_error($conn));
          }
          else 
          {
              echo "<script>alert('Product has successfully created');
                  window.location.href='products.php';</script>";
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
          <h4 class="card-title">Add Product</h4>
          <hr class="my-4">

          <form method="POST" action="product-add.php">
          <div class="form-group">
          <label for="Brand">Brand</label>
            <select class="custom-select" name="brand" required>
              <?php $sql = mysqli_query($conn, "select * from brand");?>
                <option selected="selected">Choose Brand</option>
                  <?php while($data=mysqli_fetch_array($sql, MYSQLI_BOTH))
                    {?>
                    <option value="<?php echo $data['brand_id']; ?>"><?php echo $data['brand_name']; ?></option>
                  <?php
                  }
                  ?>
            </select>
          </div>

          <div class="form-group">
          <label for="Category">Category</label>
            <select class="custom-select" name="category" required>
              <?php $sql = mysqli_query($conn, "select * from category");?>
                <option selected="selected">Choose Category</option>
                  <?php while($data=mysqli_fetch_array($sql, MYSQLI_BOTH))
                    {?>
                    <option value="<?php echo $data['category_id']; ?>"><?php echo $data['category_name']; ?></option>
                  <?php
                  }
                  ?>
            </select>
          </div>

          <div class="form-group">
            <label for="Price">Price</label>
            <input type="number" class="form-control" min="1.0" id="jersey_price" name="price" placeholder="00.00" required>
          </div>

          <div class="form-group">
            <label for="fullname" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="fullname" name="productname" required>
          </div>

          <div class="form-group">
          <label for="Size">Size</label>
            <select class="form-control" id="ProductSize" name="productsize" required>
              <option selected="selected">Choose Size</option>
              <option value="S">S</option>
              <option value="M">M</option>
              <option value="L">L</option>
            </select>
          </div>
          
          <label for="Image">Upload Image</label>
          <div class="input-group">
            <div class="custom-file">
              <input id="ProductImage" type="file" class="custom-file-input" name="productimage" required>
              <label class="custom-file-label" for="ProductImage">Choose Image</label>
            </div>
          </div>

          <div class="float-right mt-3">
            <button type="submit" name="submit" class="btn btn-success px-4">
              Save Product
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
    <script>
      bsCustomFileInput.init()
    </script>
</body>
</html>
