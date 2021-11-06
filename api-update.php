<?php
$con = mysqli_connect("localhost","root","","test");

header('Content-Type: application/json'); 
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: PUT'); 
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With'); 

$data = json_decode(file_get_contents("php://input"), true); 

$id = $data['sid'];
$name = $data['sname'];
$age = $data['sage'];
$city = $data['scity']; 

$sql = "UPDATE `students` SET `StudentName`={$name}, `Age`={$age}, `City`={$city} WHERE id = {$id}";

if (mysqli_query($con,$sql)) {

/*	
$id            = $_POST['id'];   
$name          = $_POST['name'];
$password      = md5($_POST['password']);
$email         = $_POST['email'];
$nic           = $_POST['nic'];
$number        = $_POST['number'];
$gender        = $_POST['gender'];
$city          = $_POST['city'];
$state         = $_POST['state'];
$country       = $_POST['country'];
$latitude      = $_POST['latitude'];
$longitude     = $_POST['longitude'];
$mining_status = $_POST['mining_status'];
$status        = $_POST['status'];
$license_id    = $_POST['license_id'];
$created_on    = $_POST['created_on'];
$updated_on    = $_POST['updated_on'];
$Payment       = $_POST['Payment'];

	$sql = "INSERT INTO `users`(`name`, `username`, `password`, `email`, `nic`, `number`, `gender`, `city`, `state`, `country`, `latitude`, `longitude`, `mining_status`, `status`, `license_id`, `created_on`, `updated_on`, `Payment`) VALUES ('$name','$password','$email','nic','number','gender','city','state','country','latitude','longitude','mining_status','status','license_id','created_on','updated_on','Payment')";
	*/

	echo json_encode(array("response"=>'success',"status"=>0,"message"=>"Updated Successfully"));
	
}
else{
	echo json_encode(array("response"=>'error',"status"=>1,"message"=>"Update Error"));	
}

?>