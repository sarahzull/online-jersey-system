<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage | Admin</title>

    <?php include('layouts/header.php') ?>
  </head>
  <body class="bg-light">
      <?php include('layouts/navbar.php'); ?> 

    <div class="container">
      <div class="card">
        <div class="card-body">
          <h1 class="display-4">Hello, admin!</h1>
          <p class="lead">What to do today?</p>
          <hr class="my-4">
          <div id="whattodo" class="list-group">
            <a class="list-group-item list-group-item-action" href="order-details.php">View Order Details</a>
            <a class="list-group-item list-group-item-action" href="#list-item-2">Proof Payment</a>
            <a class="list-group-item list-group-item-action" href="#list-item-3">Accept Successful Order</a>
            <a class="list-group-item list-group-item-action" href="#list-item-4">View Shipping</a>
          </div>
        </div>
      </div>
    </div>
    
    <?php include('layouts/footer.php'); ?>
    
  </body>
</html>