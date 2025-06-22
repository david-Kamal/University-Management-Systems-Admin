<?php

//Include config.php
include_once '../database/config.php';

$table= $pdo->prepare( " CREATE TABLE IF NOT EXISTS `attendance` (
`id` int(9) unsigned NOT NULL,
  `studentid` int(9) unsigned NOT NULL,
  `subjectid` int(9) unsigned NOT NULL,
  `numofhours` int(9) unsigned NOT NULL
)  ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;" );

$table->execute();

if($_SERVER["REQUEST_METHOD"]=="POST"){
	//POST data
	$studentid = $_POST['studentid'];
	$subjectid = $_POST['subjectid'];
	$numofhours  = $_POST['numofhours'];


	// Insert data into database
	$sql = $pdo->prepare("INSERT INTO `attendance`(`studentid`, `subjectid`, `numofhours`) 
	VALUES ('$studentid','$subjectid','$numofhours');");
	 	if($sql->execute()){
		$json = array("status" => 1, "msg" => "Done Attendance added!");
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
