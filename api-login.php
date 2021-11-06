<?php

include 'config.php';

$password      = md5($_POST['password']);
$username      = $_POST['username'];


    $checkUserquery="SELECT * FROM users WHERE username='{$username}' and password='{$password}'";
    $resultant=mysqli_query($con,$checkUserquery);



    if(mysqli_num_rows($resultant)>0){

      $response['error']="200";
      $response['message']="login success";
    }
    else{
      $response['error']="400";
      $response['message']="Wrong credentials";

    }
   

  echo json_encode($response);
    
?>

