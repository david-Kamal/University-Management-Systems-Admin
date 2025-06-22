<?php

//Include config.php
include_once 'config.php';

$table= $pdo->prepare( " CREATE TABLE IF NOT EXISTS `result` (
	`id` int(9) unsigned NOT NULL,
  `studentid` int(9) unsigned NOT NULL,
  `subjectid` int(9) unsigned NOT NULL,
  `result` char(255) NOT NULL
)  ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;" );

$table->execute();
$data_json = file_get_contents("php://input");
$data = json_decode($data_json, true);

if($_SERVER["REQUEST_METHOD"]=="POST"){
	//POST data
	$studentid = $data['studentid'];
	$subjectid = $data['subjectid'];
	$result  = $data['result'];


	// Insert data into database
	$sql = $pdo->prepare("INSERT INTO `result`(`studentid`, `subjectid`, `result`) 
	VALUES ('$studentid','$subjectid','$result');");
	 	if($sql->execute()){
		$json = array("status" => 1, "msg" => "Done Result added!");
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
