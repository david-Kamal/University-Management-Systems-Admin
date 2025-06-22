<?php

//Include config.php
include_once '../database/config.php';
header('Content-type: application/json');
$table= $pdo->prepare( " CREATE TABLE IF NOT EXISTS `student` (
	`id` int(9) unsigned NOT NULL,
	  `fullname` char(255) NOT NULL,
	  `age` int(3) unsigned NOT NULL,
	  `mail` varchar(255) NOT NULL,
	  `year` varchar(255) NOT NULL,
	  `username` char(255) NOT NULL,
	  `password` varchar(255) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;" );

$table->execute();
	
	$data_json = file_get_contents("php://input");
	$data = json_decode($data_json, true);

if($_SERVER["REQUEST_METHOD"]=="POST"){
	//POST data
	$fullname = $data['fullname'];
	$age = $data['age'];
	$mail  = $data['mail'];
	$year = $data['year'];
	$username  = $data['username'];
	$password  = $data['password'];

	// Insert data into database
	$sql = $pdo->prepare("INSERT INTO `student`(`fullname`, `age`, `mail`, `year`, `username`, `password`) 
	VALUES ('$fullname','$age','$mail','$year','$username','$password');");
	 	if($sql->execute()){
		$json = array("status" => 1, "msg" => "Done User added!");
	}else{
		$json = array("status" => 0, "msg" => "Error adding user!");
	}


}else{
	$json = array("status" => 0, "msg" => "Request method not accepted");
}

//Output header 
	
	echo json_encode($json); 


?>
