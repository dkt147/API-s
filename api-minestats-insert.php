<?php
include 'config.php';

header('Content-Type: application/json'); 
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: POST'); 
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With'); 

$data = json_decode(file_get_contents("php://input"), true); 

if ($con) {
	
session_start();


$total_token   = $data['total_token'];
$created_on      = "2020-5-12";
$updated_on      = date("Y-m-d");


if (isset($_SESSION["user_id"])) {

$user_id       = $_SESSION["create_user_id"];

}
else{
$user_id       = 0;	

}

	$sql = "INSERT INTO `mining_stats`(`user_id_fk`, `total_token`, `created_on`, `updated_on`) VALUES ('{$user_id}','{$total_token}','{$created_on}','{$updated_on}')";
}

if (mysqli_query($con,$sql)) {


	echo json_encode(array("response"=>'success',"status"=>0,"message"=>"Submitted Successfully"));
	
}
else{
	echo json_encode(array("response"=>'error',"status"=>1,"message"=>"Error"));	
}

?>