<?php

//Include config.php
include_once 'config.php';

$data_json = file_get_contents("php://input");
$data = json_decode($data_json, true);

if($_SERVER["REQUEST_METHOD"]=="POST")
{
//POST data
	$username = $data['username'];
	$password = $data['password'];

	$sql = $pdo->prepare("SELECT id FROM `student` WHERE username = '$username'
							and password = '$password'
						;");
$sql->execute();
 	if($sql->rowCount() > 0)
	{
		$row = $sql->fetch(PDO::FETCH_ASSOC);

		$user_arr=array
		("status" => true,
		 "message" => "Login success",
          "rows" => $row
     	);
	}else
	{
		$user_arr=array
		(
        "status" => false,
        "message" => "Login failed"
    	);
	}

}
else{
$user_arr = array("status" => 0, "msg" => "Request method not accepted");
}

//Output header 
header('Content-type: application/json');
echo json_encode($user_arr); 
?>