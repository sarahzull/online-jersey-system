<?php 
session_start();
include('connection.php');
if(isset ($_SESSION["id"])) { 
  if(isset($_POST["submit"])) {
    $id = $_SESSION["id"];
    $username = $_POST["username"];
    $contact = $_POST["contact"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = ("UPDATE user SET user_name='$username', user_contact='$contact', user_address='$address', user_email='$email', user_password='$password' WHERE user_id='$id'");
    $res = mysqli_query($conn, $sql);

    if($sql) {
        echo "<script>alert('Profile has been updated');
                window.location.href='account.php';  
            </script>";
    } else {
        die(mysqli_error($conn));
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
    <title>All Products</title>

    <!-- STYLE -->
    <style>
        /* For chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        /* For firefox */s
        input[type=number]{
        -moz-appearance: textfield;
        }
    </style>

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
            <form method="POST" action="account.php">
            <?php
            $sql = mysqli_query($conn, "select * from user where user_id='".$_SESSION["id"]."'");

            while($data=mysqli_fetch_array($sql, MYSQLI_BOTH))
            { ?>
            <label for="username" class="form-label">Username</label>
            <div class="input-group mb-3">
            <span class="input-group-text" id="username"><i class="fa fa-user"></i></span>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $data['user_name']?>">
            </div>   
            
            <label for="contact" class="form-label">Contact No.</label>
            <div class="input-group mb-3">
            <span class="input-group-text" id="contact"><i class="fa-solid fa-phone"></i></span>
            <input type="number" class="form-control" id="contact" name="contact" value="<?php echo $data['user_contact']?>">
            </div> 

            <label for="address" class="form-label">Home Address</label>
            <div class="input-group mb-3">
            <span class="input-group-text" id="address"><i class="fa-solid fa-house"></i></i></span>
            <input type="text" class="form-control" id="address" name="address" value="<?php echo $data['user_address']?>">
            </div> 

            <label for="email" class="form-label">Email</label>
            <div class="input-group mb-3">
            <span class="input-group-text" id="email"><i class="fa-solid fa-at"></i></span>
            <input type="text" class="form-control" id="email" name="email" value="<?php echo $data['user_email']?>">
            </div>  

            <label for="password" class="form-label">Password</label>
            <div class="input-group mb-3">
            <span class="input-group-text" id="password"><i class="fa fa-lock"></i></span>
            <input type="password" class="form-control" id="password" name="password">
            </div> 
            <?php
            } ?>
            <div class="row">
              <div class="col">
                <button type="submit" name="submit" class="btn btn-success px-4">
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