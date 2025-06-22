<?php

//Include config.php
require_once ('config.php');
if($_SERVER["REQUEST_METHOD"]=="GET"){
	$studentId = 1;
$subjects = $pdo->prepare( "SELECT year FROM `student`");
$subjects->execute();
	$allSubjects=$subjects->fetchAll(PDO::FETCH_ASSOC);
	

$studentSubject = $pdo->prepare( "SELECT year FROM `student`WHERE id = '$studentId';");
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

	if($allSubjects){
		$json = $allSubjects;
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
