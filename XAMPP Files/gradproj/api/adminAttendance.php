<?php
require_once ('config.php');
	header('Content-type: application/json');

$data_json = file_get_contents("php://input");
$data = json_decode($data_json, true);

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{

	$student = $data['student'];
	$subject = $data['subject'];
	$days = $data['days'] * 2;

	$select_sql = $pdo->prepare("SELECT * FROM attendance WHERE studentid = '$student' AND subjectid = '$subject' ");
    $select_sql->execute();
    $rowsNo=$select_sql->rowCount() ;
    if($rowsNo> 0){
    	$row = $select_sql->fetch(PDO::FETCH_ASSOC);
   			$newHours = $row['numofhours'] + $days;
			$rowNo = $row["id"];
			$upd_sql = $pdo->prepare("UPDATE attendance SET numofhours = '$newHours' WHERE id = '$rowNo'");
		  $updresult = $upd_sql->execute();
		  	$json = array("status" => 1, "msg" => "Done");
		}

	}else{
	$json = array("status" => 0, "msg" => "Request method not accepted");
		}

	// $insert_sql = $pdo->prepare("INSERT INTO attendance (studentid,subjectid,numofhours) VALUES ('$student','$subject','$hours')");
	// $result = mysqli_query($conn, $insert_sql);
	
			header('Content-type: application/json');
	echo json_encode($json); 

?>