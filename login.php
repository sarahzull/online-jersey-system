<?php
session_start();
/* include db connection file */
include("dbconn.php");

/* capture values from HTML form */
$username = $_POST['username'];
$password = $_POST['password'];	

if($username == "admin" && $password == "admin"){
	$_SESSION['username'] = "Administrator";	
	header("Location: /admin");
}
else{
	/* execute SQL command */
	$sql = "SELECT * FROM user WHERE user_name = '$username'
			AND user_password = '$password'";
	echo $sql;
	$query = mysqli_query($dbconn, $sql) or die("Error: " . mysqli_error($dbconn));
	$row = mysqli_num_rows($query);
	if($row == 0){
		echo "Invalid Username/Password. Click here to <a href='account.php'>login</a>.";
	}
	else{
		$r = mysqli_fetch_assoc($query);
		$_SESSION['user_name'] = $r['user_name'];
		$_SESSION['user_password'] = $r['user_password'];
		header("Location:index.php");
	}
} 

if(isset($_POST['btn'])){
	
} else {
	echo "hello";
}
mysqli_close($dbconn);
?>