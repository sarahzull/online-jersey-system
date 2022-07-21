<?php 
session_start();
include('connection.php');

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>

    <?php include('layouts/header.php') ?>
  </head>
  <body class="bg-light">
      <?php include('layouts/navbar.php'); ?> 
  
      <div class="container">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title">My Cart</h2>
          <hr class="my-4">

          <!-- table -->
          <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col" class="text-center" style="width: 70%;">Product</th>
              <th scope="col" class="text-center">Quantity</th>
              <th scope="col" class="text-center">Subtotal</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $sql = "SELECT d.id, j.jersey_name, j.jersey_price, d.quantity, d.quantity*j.jersey_price AS 'Total' FROM order_details d JOIN jersey j ON j.jersey_id=d.jersey_id WHERE orders_id = (SELECT MAX(orders_id) FROM order_details)";
              $qry = mysqli_query($conn, $sql);
              $row = mysqli_num_rows($qry);

              if($row > 0) {
                $count = 1;
                while($data=mysqli_fetch_assoc($qry)) {
            ?>
            <tr>
              <td class="text-left">
                  <p><?php echo $data['jersey_name'];?></p>
                  <p class="font-weight-light">Price: RM<?php echo $data['jersey_price'];?></p>
                  <small><a href="remove.php?id=<?php echo $data['id']; ?>" class="text-decoration-none">Remove</a></small>
              </td>

              <td class="text-center">
                <?php echo $data['quantity'];?>
              </td>

              <td class="text-center">
                RM<?php echo $data['Total'];?>
              </td>
              <br>
            <?php
              $count++;
              }
            } 
            ?>
            </tr>
            <?php 
              $postage=10.00;
              $sql ="SELECT j.jersey_name, j.jersey_price, d.quantity, SUM(d.quantity) AS 'quantityTotal', SUM(d.quantity*j.jersey_price) AS 'Total' FROM order_details d JOIN jersey j ON j.jersey_id=d.jersey_id WHERE orders_id=(SELECT MAX(orders_id) FROM order_details)";

              $qry=mysqli_query($conn,$sql);
              $row=mysqli_num_rows($qry);

              if($row > 0)
              {   
                $count = 1;
                while($data = mysqli_fetch_assoc($qry))
              {
            ?>
            <tr>
              <td class="text-right">
                <p><strong>Subtotal</strong></p>
                <p><strong>Postage</strong></p>
                <p><strong>Total</strong></p>
              </td>
             <td colspan="2" class="text-right">
                <p>RM<?php echo $data['Total'];?></p>
                <p>RM<?php echo $postage;?></p>
                <p>RM<?php echo $data['Total']+$postage;?></p>
             </td>
            </tr>
            <?php
              $count++;
              } 
              } 
            ?>
            <tr>
              <td></td>
              <td colspan="2">
                <form action="payment.php">
                <button type="submit" class="btn btn-success btn-block" name="submit">Checkout</button>
              </form>
              </td>
            </tr>
          </tbody>
        </table>
            
        </div>
      </div>
    </div>
    
    <?php include('layouts/footer.php'); ?>
    
  </body>
</html>
