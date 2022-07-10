<?php
/* php & mysql db connection file */
$user = "root"; //mysql username
$pass = ""; //mysql password
$host = "localhost"; //server name or ip address
$dbname = "oj"; //your db name
//$dbconn = mysql_connect($host, $user, $pass);
$dbconn = mysqli_connect($host, $user, $pass, $dbname)  or die("Could not connect database");
mysqli_select_db($dbconn, $dbname) or die("Could not select database");;

// /*
// if(isset($dbconn)){
// 	mysql_select_db($dbname, $dbconn) or die("<center>Error: " . mysql_error() . "</center>");
// }
// else{
// 	echo "<center>Error: Could not connect to the database.</center>";
// }*/
// if (mysqli_connect_errno())
// {
// 	echo "Failed to connect to MySQL: " . mysqli_connect_error();
// }
// /*else
// 	echo 'ok';*/
?>