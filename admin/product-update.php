<?php 
session_start();
include('connection.php'); 
if(isset ($_GET["updateId"])) {
  if(isset($_POST["submit"])) {
    $id = $_POST["id"];
    $brand = $_POST["brand"];
    $category = $_POST["category"];
    $price = $_POST["price"];
    $productname = $_POST["productname"];
    $productsize = $_POST["productsize"];
    $productimage = $_POST["productimage"];

    $sql = ("UPDATE jersey Set brand_id='$brand', category_id='$category', jersey_price='$price', jersey_name='$productname', jersey_size='$productsize', jersey_image='$productimage', updated_at=NOW() WHERE jersey_id='$id'");
    $res = mysqli_query($conn, $sql);


      if($sql) {
          echo "<script>alert('Product has been updated');
                  window.location.href='products.php';  
              </script>";
      } else {
          die(mysqli_error($conn));
      }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Update Product</title>

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
          <h4 class="card-title">Update Product</h4>
          <hr class="my-4">

          <form method="POST" action="product-update.php?updateId=<?php echo $_GET["updateId"]; ?>">
          <?php
            $sql=mysqli_query($conn, "select * from jersey where jersey_id='".$_GET["updateId"]."'");
            while($data=mysqli_fetch_array($sql, MYSQLI_BOTH))
            {
          ?>
          <input type="hidden" name="id" value="<?php echo $data['jersey_id']?>">

          <div class="form-group">
          <label for="Brand">Brand</label>
            <select class="custom-select" name="brand">
                <?php $sql = mysqli_query($conn, "select * from brand");?>
                <option selected="selected">Choose Brand</option>
                  <?php while($row=mysqli_fetch_array($sql, MYSQLI_BOTH))
                    {?>
                    <option value="<?php echo $row['brand_id']; ?>"><?php echo $row['brand_name']; ?></option>
                  <?php
                  }
                  ?>
            </select>
          </div>

          <div class="form-group">
          <label for="Category">Category</label>
            <select class="custom-select" name="category">
            <option selected="selected">Choose Category</option>
              <?php $sql = mysqli_query($conn, "select * from category");?>
                  <?php while($row=mysqli_fetch_array($sql, MYSQLI_BOTH))
                    {?>
                    <option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
                  <?php
                  }
                  ?>
            </select>
          </div>

          <div class="form-group">
            <label for="Price">Price</label>
            <input type="number" class="form-control" min="1.0" id="jersey_price" name="price" placeholder="00.00" value="<?php echo $data['jersey_price']; ?>">
          </div>

          <div class="form-group">
            <label for="fullname" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="fullname" name="productname" value="<?php echo $data['jersey_name']; ?>">
          </div>

          <div class="form-group">
          <label for="Size">Size</label>
            <select class="form-control" id="ProductSize" name="productsize">
              <option selected="<?php echo $data['jersey_size']; ?>"><?php echo $data['jersey_size']; ?></option>
              <option value="S">S</option>
              <option value="M">M</option>
              <option value="L">L</option>
            </select>
          </div>
          
          <label for="Image">Upload Image</label>
          <div class="input-group">
            <div class="custom-file">
              <input id="ProductImage" type="file" class="custom-file-input" name="productimage">
              <label class="custom-file-label" for="ProductImage"><?php echo $data['jersey_image']; ?></label>
            </div>
          </div>
          
          <?php
            }?>
          <div class="float-right mt-3">
            <button type="submit" name="submit" class="btn btn-success px-4">
              Update Product
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
<?php 
} ?>