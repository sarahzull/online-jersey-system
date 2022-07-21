<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

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
              Register
            </div>
            <div class="card-body">
            <form method="POST" action="register-verify.php">
            <label for="username" class="form-label">Username</label>
            <div class="input-group mb-3">
            <span class="input-group-text" id="username"><i class="fa fa-user"></i></span>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" autofocus="" required>
            </div>   

            <form method="POST" action="register-verify.php">
            <label for="contact" class="form-label">Contact No.</label>
            <div class="input-group mb-3">
            <span class="input-group-text" id="contact"><i class="fa-solid fa-phone"></i></span>
            <input type="number" class="form-control" id="contact" name="contact" placeholder="Enter contact no." autofocus="" required>
            </div> 

            <label for="address" class="form-label">Home Address</label>
            <div class="input-group mb-3">
            <span class="input-group-text" id="address"><i class="fa-solid fa-house"></i></i></span>
            <input type="text" class="form-control" id="address" name="address" placeholder="Enter home address" autofocus="" required>
            </div> 

            <label for="email" class="form-label">Email</label>
            <div class="input-group mb-3">
            <span class="input-group-text" id="email"><i class="fa-solid fa-at"></i></span>
            <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" autofocus="" required>
            </div>  

            <label for="password" class="form-label">Password</label>
            <div class="input-group mb-3">
            <span class="input-group-text" id="password"><i class="fa fa-lock"></i></span>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" autofocus="" required>
            </div> 

            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-success px-4">
                        Register
                    </button>
                    <p class="text-muted mt-2">Already have an account? <a href="login.php">Login here</a></p>
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