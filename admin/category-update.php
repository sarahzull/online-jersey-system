<?php 
session_start();
include('connection.php'); 
if(isset ($_GET['updateId'])) {
  if(isset($_POST['submit'])) {
    $categoryId = $_POST['categoryId'];
    $categoryName = $_POST['categoryName'];
    $categoryType = $_POST['categoryType'];

    $sql= "UPDATE category SET category_name='$categoryName', category_type='$categoryType',updated_at=NOW() WHERE category_id='$categoryId'";
    $res = mysqli_query($conn, $sql);

    if($res)
    {
      echo "<script>alert('Category has been updated');
            window.location.href='categories.php';  
          </script>";
    } else {
      echo "<script>alert('Category has not updated');
            window.location.href='categories.php';  
          </script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Update Category</title>

  <style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* Firefox */
    input[type=number] {
      -moz-appearance: textfield;
    }
  </style>

  <?php include('layouts/header.php') ?>
</head>

<body class="bg-light">
  <?php include('layouts/navbar.php'); ?> 

  <div class="container">
    <div class="card">
        <div class="card-body">
          <h4 class="card-title">Update Category</h4>
          <hr class="my-4">

          <form method="POST" action="category-update.php?updateId=<?php echo $_GET["updateId"]; ?>">
          <?php
            $sql=mysqli_query($conn, "select * from category where category_id='".$_GET["updateId"]."'");
            while($data=mysqli_fetch_array($sql, MYSQLI_BOTH))
            {
          ?>
          <input type="hidden" name="categoryId" value="<?php echo $data["category_id"];?>">

          <div class="form-group">
            <label for="categoryName" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="categoryName" name="categoryName" value="<?php echo $data["category_name"];?>">
          </div>

          <div class="form-group">
            <label for="categoryType" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="categoryType" name="categoryType" value="<?php echo $data["category_type"];?>">
          </div>
          
          <?php
            }?>
          <div class="float-right mt-3">
            <button type="submit" name="submit" class="btn btn-success px-4">
              Update Category
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
<?php 
} ?>