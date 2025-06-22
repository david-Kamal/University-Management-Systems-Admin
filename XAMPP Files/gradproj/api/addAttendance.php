<?php

//Include config.php
require_once ('config.php');

$data_json = file_get_contents("php://input");
$data = json_decode($data_json, true);

if($_SERVER["REQUEST_METHOD"]=="POST")
{
$studentid = $data['studentid'];
$subjectid = $data['subjectid'];
$hours = $data['hours'];

$subjects = $pdo->prepare( "SELECT * FROM attendance WHERE studentid = '$studentid' AND subjectid = '$subjectid'");
$subjects->execute();
	$allSubjects=$subjects->fetchAll(PDO::FETCH_ASSOC);
	
	//$selresult=$studentAtt->fetchAll(PDO::FETCH_ASSOC);

    if($subjects->num_rows > 0)
    {
    	$row = $subjects->fetchAll(PDO::FETCH_ASSOC);
    	print($row) ;
    	
		// $newHours = $selresult['numofhours'] + $hours;
		// $upd_sql = $pdo->prepare( "UPDATE attendance SET numofhours = '$newHours' WHERE id = '$row['studentid']'");

		// if($upd_sql -> execute();)
		// {
		// 	$json = array("status" => 1, "msg" => "done");

		// }else{
		// $json = array("status" => 0, "msg" => "error");
		// 	}
     }


}else{
	$json = array("status" => 0, "msg" => "Request method not accepted");
}
//Output header 
	header('Content-type: application/json');
	echo json_encode($json); 
?>
