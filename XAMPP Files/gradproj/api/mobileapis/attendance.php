<?php

//Include config.php
require_once ('config.php');

$data_json = file_get_contents("php://input");
$data = json_decode($data_json, true);

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$studentid = $data['studentid'];

$subjects = $pdo->prepare( "SELECT * FROM `subjects`");
$subjects->execute();
	$allSubjects=$subjects->fetchAll(PDO::FETCH_ASSOC);
	

$studentSubject = $pdo->prepare( "SELECT subjects.subjectname ,attendance.numofhours FROM attendance JOIN subjects ON attendance.subjectid = subjects.id WHERE attendance.studentid = '$studentid'");

	$studentSubject->execute();
		$stuSubjects=$studentSubject->fetchAll(PDO::FETCH_ASSOC);
	

function filterSubjects($subjects,$studentSubject){
	$misMatch = array();	
	for($i=0;$i<count($subjects);$i++){
		for($x=0;$x<count($studentSubject);$x++){
		if (!in_array($subjects[$i]['subjectname'], $studentSubject[$x])) {
			 $misMatch[] = $subjects[$i]  ;
			
		}		
    }
}
return $misMatch;
}

	if(filterSubjects($allSubjects,$stuSubjects)){
		$remain=filterSubjects($allSubjects,$stuSubjects);
		$json = $remain;
	}else{
		$json = array("status" => 0, "msg" => "no subjects!");
	}
}else{
	$json = array("status" => 0, "msg" => "Request method not accepted");
}
//Output header 
	header('Content-type: application/json');
	echo json_encode($json); 
?>
