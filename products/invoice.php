<?php 
session_start();
include('connection.php');
if (isset ($_SESSION["id"])) { 
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
            <div class="card-header">
                Invoice
                <strong><?php echo date("d-m-Y") ?></strong>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h6 class="mb-3">From:</h6>
                        <div>
                            <strong>Online Jersey</strong>
                        </div>
                        <div>Cheras, Selangor</div>
                        <div>Malaysia</div>
                        <div>Email: info@oj.com</div>
                        <div>Phone: +91 9800000000</div>
                    </div>
                    <div class="col-sm-6">
                        <?php
                        $sql = mysqli_query($conn, "select * from user where user_id='".$_SESSION["id"]."'");
                        while($data=mysqli_fetch_array($sql, MYSQLI_BOTH))
                        { 
                        ?>
                        <h6 class="mb-3">To:</h6>
                        <div>
                            <strong><?php echo $data['user_name']?></strong>
                        </div>
                        <div><?php echo $data['user_address']?></div>
                        <div>Email: <?php echo $data['user_email']?></div>
                        <div>Phone: <?php echo $data['user_contact']?></div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="center">#</th>
                                <th>Item</th>
                                <th class="right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $postage = 10;
                            $sql = "SELECT u.user_id, u.user_name, u.user_email, u.user_contact, d.id, j.jersey_name, o.orders_id, j.jersey_price, d.quantity, d.quantity * j.jersey_price AS 'Total' FROM order_details d JOIN jersey j ON j.jersey_id=d.id JOIN orders o ON o.orders_id = d.orders_id JOIN user u ON u.user_id = o.user_id WHERE o.orders_id = (SELECT MAX(orders_id) FROM order_details)";

                            $qry=mysqli_query($conn,$sql);
                            $row=mysqli_num_rows($qry);

                            if($row > 0)
                            {   
                              $counter = 1;
                              while($d = mysqli_fetch_assoc($qry))
                              {
                            ?>
                            <tr>
                                <td class="center"><?php echo $counter?></td>
                                <td class="left strong"><?php echo $d['jersey_name'];?></td>
                                <td class="right">RM<?php echo $d['Total'];?></td>
                            </tr>
                            <?php
                              $counter++;
                              }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                  <?php
                    $postage = 10.00;
                    $sql = "SELECT j.jersey_name, j.jersey_price, d.quantity,SUM(d.quantity) AS 'quantityTotal', SUM(d.quantity*j.jersey_price) AS 'Total' FROM order_details d JOIN jersey j ON j.jersey_id = d.jersey_id WHERE orders_id = (SELECT MAX(orders_id) FROM order_details)"; 
        
                    $qry=mysqli_query($conn,$sql);
                    $row=mysqli_num_rows($qry);
                    
                    if($row > 0)
                    {   
                      $counter = 1;
                      while($d = mysqli_fetch_assoc($qry))
                      {
                  ?>
                    <div class="col-lg-4 col-sm-5">
                    </div>
                    <div class="col-lg-5 col-sm-5 ml-auto">
                        <table class="table table-clear">
                            <tbody>
                                <tr>
                                    <td class="left">
                                        <strong>Subtotal</strong>
                                    </td>
                                    <td class="right">RM <?php echo $d['Total'];?></td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong>Postage</strong>
                                    </td>
                                    <td class="right">RM <?php echo number_format($postage, 2);?></td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong>Total</strong>
                                    </td>
                                    <td class="right">
                                        <strong>RM <?php echo number_format($d['Total'] + $postage,2);?></strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                  <?php
                  $counter++;
                    } 
                  } 
                  ?>
                </div>
            </div>
        </div>
    </div>
  </div>

    <?php include('layouts/footer.php'); ?>
    
  </body>
</html>
<?php 
}
?>