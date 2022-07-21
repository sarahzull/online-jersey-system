<?php 
session_start();
include('connection.php');
 $sql = mysqli_query($conn, "select category.category_name as categoryname, brand.brand_name as brand, jersey.* from jersey inner join category on category.category_id=jersey.category_id inner join brand on brand.brand_id=jersey.brand_id");
      $count=1;
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>

    <?php include('layouts/header.php') ?>
  </head>
  <body class="bg-light">
      <?php include('layouts/navbar.php'); ?> 

       <div class="container">
          <div class="row">

            <?php

              while($data=mysqli_fetch_assoc($sql))
              {   

                    $path = $data['jersey_image'];
              ?>

              <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 p-3">
                <div class="card h-100" style="width:100%;">
                  <img src="../images/<?php echo $path; ?>" class="card-img-top" alt="..." style="height: 28vh;">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $data['jersey_name'];?></h5>
                    <p class="card-text">RM<?php echo $data['jersey_price'];?></p>
                    <a href="details.php?Id=<?php echo $data['jersey_id'];?>" class="btn btn-info text-white">Product Details</a>
                  </div>
                </div>
              </div>

              <?php 
                }
              ?>

          </div>
      </div>


    
           
    

    
    <?php include('layouts/footer.php'); ?>
    
  </body>
</html>