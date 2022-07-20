<?php
  include('connection.php');
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipping List | Admin</title>

    <?php include('layouts/header.php') ?>
  </head>
  <body class="bg-light">
      <?php include('layouts/navbar.php'); ?> 

    <div class="container">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title">Shipping List</h2>
          <hr class="my-4">

            <!-- table -->
              <table class="table table-bordered" id="none">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th scope="col" class="text-center">Customers</th>
                    <th scope="col" class="text-center">Product(s)</th>
                    <th scope="col" class="text-center">Total</th>
                    <th scope="col" class="text-center">Status</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  $sql = "SELECT u.user_id, u.user_name, u.user_address, u.user_contact, o.orders_id FROM `orders` o JOIN `user` u ON u.user_id=o.user_id WHERE o.status=2";
                  $count=1;
                  $qry = mysqli_query($conn, $sql);
                  $row = mysqli_num_rows($qry);

                  if($row > 0) {
                    while($data=mysqli_fetch_assoc($qry)) {
                ?>
                  <tr class="text-center">
                    <th><?php echo $count; ?></th>

                    <td class="text-left">
                        <p>Name : <?php echo $data['user_name'];?></p>
                        <p>Address : <?php echo $data['user_address'];?></p>
                        <p>Phone No : <?php echo $data['user_contact'];?></p>
                    </td>

                    <td>
                    <?php
                    $ordersId = $data['orders_id'];
                    $sql1 = "SELECT j.jersey_name, j.jersey_price, o.orders_id, d.quantity FROM `order_details` d JOIN `jersey` j ON j.jersey_id=d.jersey_id JOIN `orders` o ON o.orders_id=d.orders_id WHERE o.orders_id=$ordersId AND o.status=1";
                    
                    $qry1=mysqli_query($conn,$sql1);
                    //$row1=mysqli_num_rows($qry1);
                    
                    if((mysqli_num_rows($qry)) > 0) 
                    {
                      while($data1 = mysqli_fetch_array($qry1)) 
                      {
                      ?>
                        <div class="d-block text-wrap text-left">
                          <p><?php echo $data1['jersey_name'];?> (x<?php echo $data1['quantity'];?>)</p>
                        </div>

                      <?php
                      } //close while
                    } //close if
                    ?>
                    </td>

                    <?php 
                    $orderId1 = $data['orders_id'];
                    $sql2 = "SELECT j.jersey_name, j.jersey_price, d.quantity, SUM(d.quantity*j.jersey_price) AS 'Total' FROM `order_details` d JOIN `jersey` j ON j.jersey_Id=d.jersey_Id WHERE d.orders_id=$orderId1";
                    $qry2=mysqli_query($conn,$sql2);
                    //$row2=mysqli_num_rows($qry2);

                    if((mysqli_num_rows($qry)) > 0) 
                    {
                      while($data2 = mysqli_fetch_array($qry2)) 
                      {
                    ?>

                    <td>
                      RM<?php echo $data2['Total']; ?>
                    </td>

                    <td>
                      <span class="badge badge-success">Shipped</span>
                    </td>

                  </tr>
                  <?php 
                      } //close while
                    } //close if
                  ?>
                <?php
                    $count++;
                    } //close while
                  } //close if
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