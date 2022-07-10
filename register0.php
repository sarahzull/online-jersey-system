<?php
/* include db connection file */
include("dbconn.php");

/* capture values from HTML form */

$user_name = $_POST['username'];
$user_contact = $_POST['contact'];
$user_address = $_POST['address'];
$user_email = $_POST['email'];
$user_password = $_POST['password'];
$role_id = 3;// customer


$sql0 = "SELECT user_email FROM user WHERE user_email  = '".$user_email."'";
echo $sql0;
$query0 = mysqli_query($dbconn, $sql0) or die ("Error: " . mysqli_error($dbconn));

$row0 = mysqli_num_rows($query0);
if($row0 != 0){
	echo "Record is existed";
}
else{
	/* execute SQL INSERT command */
	$sql2 = "INSERT INTO user (user_name, user_contact, user_address, user_email, user_password,role_id )
	VALUES ('" . $user_name . "',  '" . $user_contact . "',  '" . $user_address .  "','" . $user_email . "','" . $user_password . "','" . $role_id . "')";
	
	mysqli_query($dbconn, $sql2) or die ("Error: " . mysqli_error($dbconn));
	
	/* display a message */
	echo "Data has been saved";
	//header("Location: account.php");
}

/* close db connection */
mysqli_close($dbconn);
?>