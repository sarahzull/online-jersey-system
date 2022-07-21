<?php
include("connection.php");

$username = $_POST['username'];
$password = $_POST['password'];

if (!conn) {
	die ("Connection problem : " .mysqli_connect_error($conn));
} else {
	$qry = "SELECT * FROM user WHERE user_name = '".$username."'";
	$res = mysqli_query($conn, $qry);
	
	if (mysqli_num_rows($res) == 0) {
		echo "<script>alert('Username doesn't exists');window.location.href='login.php';</script>";
	} else {
		$row = mysqli_fetch_array($res, MYSQLI_BOTH);

		if ($row["user_password"] == $password) {
			session_start();
			$_SESSION["username"] = $row["user_name"];
			$_SESSION["id"] = $row["user_id"];
			$_SESSION["role"] = $row["role_id"];

			if ($_SESSION["role"] == 3) {
				header("Location:/products");
			} else {
				header("Location:/admin");
			}
		} else {
			echo "<script>alert('You have entered wrong password!');window.location.href='login.php';</script>";
		}
	}

}

mysqli_close($conn);

// if($username == "admin" && $password == "admin")
// 
// 	$_SESSION['addcart'] = 0;
// 	$_SESSION['username'] = "admin";	
// 	header("Location: /admin");
// }
// else{

// 	$sql = "SELECT * FROM user WHERE user_name = '$username' AND user_password = '$password'";
// 	echo $sql;
// 	$query = mysqli_query($conn, $sql) or die("Error: " . mysqli_error($conn));
// 	$row = mysqli_num_rows($query);
// 	if($row == 0){
// 		echo "<script>alert('Wrong username/password. Please enter correct username/password.');window.location.href='login.php';</script>";
// 	}
// 	else{
// 		$r = mysqli_fetch_assoc($query);
//     $_SESSION['addcart'] = 0;
// 		$_SESSION['username'] = $r['user_name'];
// 		$_SESSION['password'] = $r['user_password'];
// 		$_SESSION['id'] = $r['user_id';
// 		header("Location:/products");
// 	}
// } 

