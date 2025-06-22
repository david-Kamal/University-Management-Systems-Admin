<?php

//Include config.php
include_once '../database/config.php';
header('Content-type: application/json');

$table= $pdo->prepare( " CREATE TABLE IF NOT EXISTS `doctor` (
  `id` int(9) UNSIGNED NOT NULL,
  `name` char(255) NOT NULL,
  `regrade` char(255) NOT NULL
)  ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;" );

$table->execute();

$data_json = file_get_contents("php://input");
$data = json_decode($data_json, true);

if($_SERVER["REQUEST_METHOD"]=="POST"){
	//POST data
	$name = $data['name'];
	$regrade = $data['regrade'];
	


	// Insert data into database
	$sql = $pdo->prepare("INSERT INTO `doctor`(`name`, `regrade`) 
	VALUES ('$name','$regrade');");
	 	if($sql->execute()){
		$json = array("status" => 1, "msg" => "Done User added!");
	}else{
		$json = array("status" => 0, "msg" => "Error adding user!");
	}


}else{
	$json = array("status" => 0, "msg" => "Request method not accepted");
}

//Output header 
	//header('Content-type: application/json');
	echo json_encode($json); 


?>
