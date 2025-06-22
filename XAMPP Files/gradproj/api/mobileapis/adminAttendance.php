<?php
require_once ('config.php');
function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

$student = test_input($_POST['student']);
$subject = test_input($_POST['subject']);
$hours = test_input($_POST['days'] * 2);
	$select_sql = $pdo->prepare("SELECT * FROM attendance WHERE studentid = '$student' AND subjectid = '$subject' ");
    $select_sql->execute();
    $rowsNo=$select_sql->rowCount() ;
    if($rowsNo> 0){
    	$row = $select_sql->fetch(PDO::FETCH_ASSOC);
   			$newHours = $row['numofhours'] + $hours;
			$rowNo = $row["id"];
			$upd_sql = $pdo->prepare("UPDATE attendance SET numofhours = '$newHours' WHERE id = '$rowNo'");
		  $updresult = $upd_sql->execute();
		}

	// $insert_sql = $pdo->prepare("INSERT INTO attendance (studentid,subjectid,numofhours) VALUES ('$student','$subject','$hours')");
	// $result = mysqli_query($conn, $insert_sql);
	
		

?>