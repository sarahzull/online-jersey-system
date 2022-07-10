<?php
//save as plogin.php
include("connection.php");

$username = mysqli_real_escape_string($conn,$_POST['username']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
$sql = "SELECT * FROM customer c JOIN usertype u ON u.userTypeID = c.userTypeID WHERE c.username = '".$username."' AND c.Password = '".md5($password)."'";
echo $sql;
$qry = mysqli_query($conn,$sql);
$row = mysqli_num_rows($qry);

if($row > 0)
{
    $r = mysqli_fetch_assoc($qry);
    session_start();
    $_SESSION['userlogged'] = 1;
    $_SESSION['addcart'] = 0;
    $_SESSION['email'] = $mail;
    $_SESSION['customerName'] = $r['customerName'];
    $_SESSION['customerID'] = $r['customerID'];
    $_SESSION['contactNum'] = $r['contactNum'];
    $_SESSION['address'] = $r['address'];
    
    if($r['userTypeID'] == "" || $r['userTypeID'] == 2)
        $_SESSION['userTypeID'] = 2;
    else
        $_SESSION['userTypeID'] = $r['userTypeID'];
        $_SESSION['userTypeName'] = $r['userTypeName'];
    
    header("Location: home.php");
}
else
{
    echo"<script language='javascript'>alert('User does not exist.');window.location='index.php';</script>";
   
}
?>