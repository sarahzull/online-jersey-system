<?php 
session_start();
include('connection.php')
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
      <div class="row">
        <div class="col-sm-6">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="/images/product-2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="/images/product-4.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="/images/product-6.jpg" class="d-block w-100" alt="...">
            </div>
          </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </button>
        </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body text-center">
              <h4 class="text-center">THANK YOU!</h4>
              <hr class="my-2">
              
              <p>Transfer to the account below and submit your receipt</p> 

              <?php
                $postage = 10.00;
                $sql = "SELECT j.jersey_name, j.jersey_price, d.quantity,o.orders_id,SUM(d.quantity) AS 'quantityTotal', SUM(d.quantity* j.jersey_price) AS 'Total' FROM order_details d JOIN jersey j ON j.jersey_id = d.jersey_id JOIN orders o ON o.orders_id = d.orders_id WHERE o.orders_id = (SELECT MAX(orders_id) FROM order_details);"; 
     
                $qry=mysqli_query($conn,$sql);
                $row = mysqli_num_rows($qry);
                
                if($row > 0)
                {   
                  $counter = 1;
                  while($d = mysqli_fetch_assoc($qry))
                {
              ?>
              <p><mark>Total payment: <strong><?php echo number_format($d['Total'] + $postage,2);?></strong></mark></p>

              <p class="mb-0">Online Jersey Store (CIMB)</p>
              <p><b>7626667691</b></p>
              </p>

              <form method="post" action="proof.php" enctype="multipart/form-data">  
              <label for="proof"></label>
              <input type=hidden value="<?php echo $d['orders_id'];?>" name="orders_id">
              <input class="img" type="file" id="proof" accept="image/jpeg" name="proof">        
              
              <p><button class="btn btn-success btn-sm btn-block mt-4" type="submit" name="submit">Proceed</button></p>

              </form> 
              <?php
              $counter++; 
                } 
              } 
              ?>
            </div>
        </div>
        <div class="col"></div>
      </div>
    </div>
    
    <?php include('layouts/footer.php'); ?>
    
  </body>
</html>