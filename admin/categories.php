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
    <title>All Categories | Admin</title>

    <?php include('layouts/header.php') ?>
  </head>
  <body class="bg-light">
      <?php include('layouts/navbar.php'); ?> 

    <div class="container mb-4">
      <div class="card">
        <h2 class="card-header">All Categories</h2>
        <div class="card-body">
          
          <div class="row align-item-start">
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"><a class="btn btn-primary ml-3 float-right" href="category-add.php">Add New Category</a></div>
          </div>
          <div class="row my-2"></div>

            <!-- table -->
              <table class="table table-bordered text-center" id="dataTable">
                <thead>
                  <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col" class="text-center">NAME</th>
                    <th scope="col" class="text-center">TYPE</th>
                    <th scope="col" class="text-center">ACTION</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  include('connection.php');
                  $sql = mysqli_query($conn, "select * from category");

                  while($data=mysqli_fetch_array($sql))
                  {  
                ?>
                  <tr>
                    <td><?php echo $data['category_id'];?></td>
                    <td><?php echo $data['category_name'];?></td>
                    <td><?php echo $data['category_type'];?></td>
                    <td>
                    <button type="button" class="btn btn-sm"><a href="category-update.php?updateId=<?php echo $data['category_id'] ?>"><i class="fa-solid fa-pen-to-square" style="color: #212529;"></i></a></button>
                    <button class="btn btn-sm"><a href="category-delete.php?deleteId=<?php echo $data['category_id'] ?>"><i class="fa-solid fa-trash" style="color: #212529;"></i></a></button>
                    </td>
                  </tr>
                  <?php 
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