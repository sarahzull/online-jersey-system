<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products | Admin</title>

    <?php include('layouts/header.php') ?>
  </head>
  <body class="bg-light">
      <?php include('layouts/navbar.php'); ?> 

    <div class="container mb-4">
      <div class="card">
        <h2 class="card-header">All Products</h2>
        <div class="card-body">
          
          <div class="row align-item-start">
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"><a class="btn btn-primary ml-3 float-right" href="product-add.php">Add New Product</a></div>
          </div>
          <div class="row my-2"></div>

            <!-- table -->
              <table class="table table-bordered text-center" id="dataTable">
                <thead>
                  <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col" class="text-center">BRAND</th>
                    <th scope="col" class="text-center">CATEGORY</th>
                    <th scope="col" class="text-center">PRICE</th>
                    <th scope="col" class="text-center">NAME</th>
                    <th scope="col" class="text-center">SIZE</th>
                    <th scope="col" class="text-center" width="50px">IMAGE</th>
                    <th scope="col" class="text-center">ACTION</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  include('connection.php');
                  $sql = mysqli_query($conn, "select category.category_name as categoryname, brand.brand_name as brand, jersey.* from jersey inner join category on category.category_id=jersey.category_id inner join brand on brand.brand_id=jersey.brand_id");
                  $count=1;

                  while($data=mysqli_fetch_array($sql))
                  {   
                    $path = $data['jersey_image'];
                ?>
                  <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $data['jersey_id'];?></td>
                    <td><?php echo $data['brand'];?></td>
                    <td><?php echo $data['categoryname'];?></td>
                    <td><?php echo $data['jersey_price'];?></td>
                    <td><?php echo $data['jersey_name'];?></td>
                    <td><?php echo $data['jersey_size'];?></td>
                    <td>
                      <a href="/images/<?php echo $path; ?>" target="_BLANK"><img src="/images/<?php echo $path; ?>" class="rounded" width="30px" height="30px"></a>
                    </td>
                    <td>
                    <button type="button" class="btn btn-sm"><a href="product-update.php?updateId=<?php echo $data['jersey_id'] ?>"><i class="fa-solid fa-pen-to-square" style="color: #212529;"></i></a></button>
                    <button class="btn btn-sm"><a href="product-delete.php?deleteId=<?php echo $data['jersey_id'] ?>"><i class="fa-solid fa-trash" style="color: #212529;"></i></a></button>
                    </td>
                  </tr>
                  <?php 
                  $count++;
                  }
                  ?>
                </tbody>
              </table>
        </div>
      </div>
    </div>

    <?php include('layouts/footer.php'); ?>

    <script>
      // dataTable
      $(document).ready(function() {
        $('#dataTable').DataTable({
          pagingType: 'simple',
        });
      });

    </script>
  </body>
</html>