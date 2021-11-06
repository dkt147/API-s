<?php
include 'config.php';

header('Content-Type: application/json'); 
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: POST'); 
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With'); 

$data = json_decode(file_get_contents("php://input"), true); 

if ($con) {
	
session_start();


$token_mined   = $data['token_mined'];
$mined_on      = date("Y-m-d");

if (isset($_SESSION["user_id"])) {

$user_id       = $_SESSION["user_id"];

}
else{
$user_id       = 0;	

}

	$sql = "INSERT INTO `daily_mining_status`(`token_mined`, `mined_on`, `user_id`) VALUES ('{$token_mined}','{$mined_on}','{$user_id}')";
}

if (mysqli_query($con,$sql)) {


	echo json_encode(array("response"=>'success',"status"=>0,"message"=>"Submitted Successfully"));
	
}
else{
	echo json_encode(array("response"=>'error',"status"=>1,"message"=>"Error"));	
}

?>