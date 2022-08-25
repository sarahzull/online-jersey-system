<?php
include("connection.php");

$orderId = $_POST['orders_id'];
   
if(isset($_POST['submit']))
{	
  if(!empty($_FILES["proof"]["name"]))
  {
      $fileName = basename($_FILES["proof"]["name"]);
      $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
      
      $allowTypes = array('jpg','png','jpeg','gif','JPG','PNG','JPEG','GIF');
      if(in_array($fileType,$allowTypes))
      {
        $image = $_FILES['proof']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        
        $insert = mysqli_query($conn, "UPDATE orders SET proof= '".$imgContent."' WHERE orders_id = $orderId");
        if($insert)
        {
          echo"<script language='javascript'>alert('Upload success!');window.location='invoice.php';</script>";
        }
        else
        {
          echo"<script language='javascript'>alert('Upload failed.');window.location='payment.php';</script>";
        }
        
        }
      else
      {
        echo"<script language='javascript'>alert('Wrong image format.');window.location='payment.php';</script>";  
      }
  }
  else
  {
    echo"<script language='javascript'>alert('Please upload payment of proof.');window.location='payment.php';</script>";
  }
}
      