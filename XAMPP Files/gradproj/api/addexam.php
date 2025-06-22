<?php

//Include config.php
include_once '../database/config.php';

$table= $pdo->prepare( " CREATE TABLE IF NOT EXISTS `examschedule` (
	`id` int(9) unsigned NOT NULL,
	  `subjectid` int(255) NOT NULL,
	  `date` char  NOT NULL,
	  `time` char NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;" );

$table->execute();
$data_json = file_get_contents("php://input");
$data = json_decode($data_json, true);

if($_SERVER["REQUEST_METHOD"]=="POST"){
	//POST data
	$subjectid = $data['subjectid'];
	$date = $data['date'];
	$time  = $data['time'];
	

	// Insert data into database
	$sql = $pdo->prepare("INSERT INTO `examschedule`(`subjectid`, `date`, `time`) 
	VALUES ('$subjectid','$date','$time');");
	 	if($sql->execute()){
		$json = array("status" => 1, "msg" => "Done User added!");
	}else{
		$json = array("status" => 0, "msg" => "Error adding user!");
	}


}else{
	$json = array("status" => 0, "msg" => "Request method not accepted");
}

//Output header 
	header('Content-type: application/json');
	echo json_encode($json); 


?>
