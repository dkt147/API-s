<?php
include 'config.php';

header('Content-Type: application/json'); 
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: POST'); 
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With'); 

$data = json_decode(file_get_contents("php://input"), true); 

/*
$name = $data['sname'];
$age = $data['sage'];
$city = $data['scity']; 

$sql = "INSERT INTO `students`(`StudentName`, `Age`, `City`) VALUES ('{$name}','{$age}','{$city}')";
*/
if ($con) {
	

$id            = $data['id'];   
session_start();
$_SESSION["user_id"] = $id;

$name          = $data['name'];
$password      = md5($data['password']);
$username      = $data['username'];
$email         = $data['email'];
$nic           = $data['nic'];
$number        = $data['number'];
$gender        = $data['gender'];
$city          = $data['city'];
$state         = $data['state'];
$country       = $data['country'];
$latitude      = $data['latitude'];
$longitude     = $data['longitude'];
$mining_status = $data['mining_status'];
$status        = $data['status'];
$license_id    = $data['license_id'];
$created_on    = $data['created_on'];
$updated_on    = $data['updated_on'];
$Payment       = $data['Payment'];

	$sql = "INSERT INTO `users`(`name`, `username`, `password`, `email`, `nic`, `number`, `gender`, `city`, `state`, `country`, `latitude`, `longitude`, `mining_status`, `status`, `license_id`, `created_on`, `updated_on`, `Payment`) VALUES ('{$name}','{$username}','{$password}','{$email}','{$nic}','{$number}','{$gender}','{$city}','{$state}','{$country}','{$latitude}','{$longitude}','{$mining_status}','{$status}','{$license_id}','{$created_on}','{$updated_on}','{$Payment}')";
}

if (mysqli_query($con,$sql)) {


	echo json_encode(array("response"=>'success',"status"=>0,"message"=>"Submitted Successfully"));
	
}
else{
	echo json_encode(array("response"=>'error',"status"=>1,"message"=>"Error"));	
}

?>