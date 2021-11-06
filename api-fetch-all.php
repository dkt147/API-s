<?php

header('Content-Type: application/json'); 
header('Access-Control-Allow-Origin: *'); 
include 'config.php';
$date = date('Y-m-d', strtotime('-30 days'));
$date2 = date('Y-m-d');
$sql = "SELECT * FROM `users` where created_on >= '$date' and created_on <= '$date2'";
$result = mysqli_query($con,$sql) or die("Failed");

if (mysqli_num_rows($result) > 0) {
	
	$output = mysqli_fetch_all($result,MYSQLI_ASSOC);
	echo json_encode($output);

}
else
{
	echo json_encode(array('message'=>'No Record Found','status'=>false));
}
?>
