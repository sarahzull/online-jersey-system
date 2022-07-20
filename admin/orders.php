<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Orders | Admin</title>

    <?php include('layouts/header.php') ?>
  </head>
  <body class="bg-light">
      <?php include('layouts/navbar.php'); ?> 

    <div class="container">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title">All Orders</h2>
          <hr class="my-4">
            <div class="alert alert-secondary alert-dismissible fade show" role="alert">
              Click on <b>Unassigned</b> status to verify customer's payment
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <!-- table -->
              <table class="table table-bordered" id="dataTable">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col" class="text-center">Customer</th>
                    <th scope="col" class="text-center">Date</th>
                    <th scope="col" class="text-center">Status</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  include('connection.php');
                  $sql = mysqli_query($conn, "select user.user_name as username, orders.* from orders inner join user on user.user_id=orders.user_id");
                  $count=1;

                  while($data=mysqli_fetch_array($sql)) {
                ?>
                  <tr class="text-center">
                    <th><?php echo $count; ?></th>
                    <td><?php echo $data['orders_id'];?></td>
                    <td><?php echo $data['username'];?></td>
                    <td><?php echo $data['orders_date'];?></td>
                    <td>
                      <?php if(($data['status']==2)) {?>
                            <span class="badge badge-success">Accepted</span><?php
                          }
                          if(($data['status']==1)) {?>
                            <a href="accept-order.php?Id=<?php echo $data['orders_id'];?>" class="badge badge-light">Unassigned</a>
                          <?php
                          } if(($data['status']==3)) {?>
                            <span class="badge badge-danger">Rejected</span><?php
                          }?>
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