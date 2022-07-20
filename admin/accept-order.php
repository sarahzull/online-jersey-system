<?php 
session_start();
include('connection.php'); 
if(isset ($_GET["Id"])) {
  if(isset($_POST["status"])) {
    $status = $_POST["status"];

    $sql = "UPDATE orders SET `status`='$status' WHERE `orders_id`='".$_GET["Id"]."'" ;
    $res = mysqli_query($conn,$sql);

    if($res && $status=2) {
      echo "<script>alert('Order has been accepted/rejected');
              window.location.href='orders.php';  
          </script>";
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
    <title>Accept Order</title>

    <?php include('layouts/header.php') ?>
  </head>
  <body class="bg-light">
      <?php include('layouts/navbar.php'); ?> 

    <div class="container">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title">Accept Order</h2>
          <hr class="my-4">

          <!-- table -->
          <table class="table table-bordered">
          <form method="POST" action="accept-order.php?Id=<?php echo $_GET["Id"]; ?>">
            <tbody>
              <thead>
                <tr class="text-center">
                  <th scope="row">Order ID</th>
                  <th scope="row">Customer Name</th>
                  <th scope="row">Date of Purchase</th>
                  <th scope="row">Proof Payment</th>
                  <th scope="row">Status</th>
                </tr>
              </thead>
              <tbody>
            <?php 
                include('connection.php');
                $sql = mysqli_query($conn, "select user.user_name as username, orders.* from orders inner join user on user.user_id=orders.user_id where orders_id='".$_GET["Id"]."'");

                while($data=mysqli_fetch_array($sql)) {
            ?>
              <tr class="text-center">
                <td><?php echo $data['orders_id'];?></td>
                <td><?php echo $data['username'];?></td>
                <td><?php echo $data['orders_date'];?></td>
                <td><?php echo $data['proof'];?></td>
                <td>
                  <button type="submit" name="status" value="2" class="btn btn-success btn-sm">Accept</button>
                  <button type="submit" name="status"  value="3" class="btn btn-danger btn-sm">Reject</button>
                </td>
              </tr>
            <?php 
                }
            ?>
            </tbody>
            </form>
          </table>
        </div>
      </div>
    </div>

  <?php include('layouts/footer.php'); ?>
    
  </body>
</html>

<?php 
}
?>