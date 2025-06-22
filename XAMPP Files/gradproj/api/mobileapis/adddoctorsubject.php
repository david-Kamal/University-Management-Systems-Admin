<?php

//Include config.php
include_once 'config.php';

$table= $pdo->prepare( " CREATE TABLE IF NOT EXISTS `doctorsubject` (
`id` int(9) unsigned NOT NULL,
  `doctorid` int(9) unsigned NOT NULL,
  `subjectid` int(9) unsigned NOT NULL
)  ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;" );

$table->execute();

$data_json = file_get_contents("php://input");
$data = json_decode($data_json, true);

if($_SERVER["REQUEST_METHOD"]=="POST"){
	//POST data
	$doctorid = $data['doctorid'];
	$subjectid = $data['subjectid'];


	// Insert data into database
	$sql = $pdo->prepare("INSERT INTO `doctorsubject`(`doctorid`, `subjectid`) 
	VALUES ('$doctorid','$subjectid');");
	 	if($sql->execute()){
		$json = array("status" => 1, "msg" => "Done Doctor's subject  added!");
	}else{
		$json = array("status" => 0, "msg" => "Error in request!");
	}


}else{
	$json = array("status" => 0, "msg" => "Request method not accepted");
}

//Output header 
	header('Content-type: application/json');
	echo json_encode($json); 


?>
