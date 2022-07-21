<?php 
session_start();
if(isset ($_SESSION["id"])) { 

include('connection.php');
$sql = mysqli_query($conn, "select * from user where user_id='".$_SESSION["id"]."'");
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
          <div class="row justify-content-center">
          <div class="col-md-7">
          <div class="card">
            <div class="card-header">
              Edit Profile
            </div>
            <div class="card-body">
            <form method="POST" action="edit-profile.php">
            <?php
            while($data=mysqli_fetch_array($sql, MYSQLI_BOTH))
            { ?>
            <label for="username" class="form-label">Username</label>
            <div class="input-group mb-3">
            <span class="input-group-text" id="username"><i class="fa fa-user"></i></span>
            <input type="text" class="form-control" id="username" name="username" autofocus="" required>
            </div>   

            <label for="password" class="form-label">Password</label>
            <div class="input-group mb-3">
            <span class="input-group-text" id="password"><i class="fa fa-lock"></i></span>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" autofocus="" required>
            </div> 
            <?php
            } ?>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-success px-4">
                        Edit Profile
                    </button>
                </div>
                
            </div>
            </div>
              </form>
            </div>
        </div>
          </div>
        </div>
      </div>

    <?php include('layouts/footer.php'); ?>
    
  </body>
</html>
<?php } ?>