<?php
//save as plogin.php
include("connection.php");

$staffID = mysqli_real_escape_string($conn,$_POST['staffID']);
$password = mysqli_real_escape_string($conn,$_POST['spass']);

$sql = "SELECT * FROM staff s JOIN usertype u ON u.userTypeID = s.userTypeID WHERE s.staffID = '".$staffID."' AND s.staffPassword = '".$password."'";
echo $sql;
$qry = mysqli_query($conn,$sql);
$row = mysqli_num_rows($qry);

if($row > 0)
{
    $r = mysqli_fetch_assoc($qry);
    session_start();
    $_SESSION['userlogged'] = 2;
    $_SESSION['email'] = $r['staffEmail'];
    $_SESSION['staffName'] = $r['staffName'];
    $_SESSION['staffID'] = $r['staffID'];
    $_SESSION['staffPhoneNum'] = $r['staffPhoneNum'];
    
    if($r['userTypeID'] == "" || $r['userTypeID'] == 1)
        $_SESSION['userTypeID'] = 1;
    else
        $_SESSION['userTypeID'] = $r['userTypeID'];
        $_SESSION['userTypeName'] = $r['userTypeName'];
    
    header("Location: admin.php");
}
else
{
    echo"<script language='javascript'>alert('User does not exist.');window.location='index.php';</script>";
   
}
?>