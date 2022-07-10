<?php

$id = $_GET['orderID'];

$db = mysqli_connect("localhost","root","","oj"); 
$sql = "SELECT proof FROM orders WHERE orders_id = $id";
$sth = $db->query($sql);
$result=mysqli_fetch_array($sth);
echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['proof'] ).'"/>';


?> 



