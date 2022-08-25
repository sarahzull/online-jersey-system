<?php 
session_start();
include('connection.php');

if(isset ($_GET["Id"])) {
  if($_SESSION['addcart']==0) {
    $sql1 = "INSERT INTO `orders` (`user_id`, `orders_date`) VALUES ('". $_SESSION['id']."',NOW())";
    mysqli_query($conn,$sql1);
    $_SESSION['addcart']=1;
  }

  if(isset($_POST['submit'])) {		
    $id = $_GET["Id"];
    $quantity = $_POST['quantity'];
    $pID = "SELECT j.jersey_id, j.jersey_name from jersey j JOIN order_details d ON j.jersey_id=d.jersey_id WHERE j.jersey_id=$id";
    $orderId = "SELECT orders_id FROM orders ORDER BY orders_id DESC LIMIT 1";

    $sql = "INSERT INTO `order_details` (`orders_id`, `jersey_id`, `quantity`) VALUES ('1004', '$id', '$quantity'))";
    $res = mysqli_query($conn,$sql);

    if(!$res) {
      echo $sql;
    }
    else {
      echo"<script language='javascript'>alert('Product succesfully added into cart');
            window.location='/products/';</script>";
    }
  }
  ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>

    <?php include('layouts/header.php') ?>
  </head>
  <body class="bg-light">
      <?php include('layouts/navbar.php'); ?> 
  
    <div class="container">
      <div class="card">
        <div class="card-body">
        <form method="POST" action="details.php?Id=<?php echo $_GET["Id"]; ?>">
        <?php
          $sql=mysqli_query($conn, "SELECT c.category_id, c.category_name, j.* FROM jersey j JOIN category c ON c.category_id=j.category_id where jersey_id='".$_GET["Id"]."'");
          while($data=mysqli_fetch_array($sql, MYSQLI_BOTH))
          {
            $path = $data['jersey_image'];
        ?>   
          <div class="row">
            <div class="col">
              <img src="/images/<?php echo $path; ?>" width="100%" >
            </div>
            <div class="col">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/products/">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product Details</li>
              </ol>
            </nav>
            <hr class="my-4">
            <h2>
              <strong><?php echo $data['jersey_name'];?></strong>
            </h2>

            <p>
              <h5>RM<?php echo $data['jersey_price'];?></h5>
            </p>

            <p>
              <strong>Size: </strong><?php echo $data['jersey_size']; ?>
            </p>
            
            <p>
              <strong>Category: </strong><?php echo $data['category_name']; ?>
            </p>

            <p>
              <strong>Quantity: </strong> <input type="number" class="form-control" style="width: 20%;" id="quantity" name="quantity" value="1" min="1">
            </p>

            <button class="btn btn-primary btn-md" type="submit" name="submit">Add to Cart</button>
            </div>
          </div>
        </div>
        <?php } ?>
        </form>
      </div>
    </div>
    
    <?php include('layouts/footer.php'); ?>
    
  </body>
</html>
<?php 
  } 
?>