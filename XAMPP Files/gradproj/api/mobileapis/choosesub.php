<?php
session_start();
$subject = $_POST['subject'];
$time = $_POST['time'];
//echo "id: " . $_POST['subid'];
$conn = mysqli_connect("localhost", "root", "", "modern");
if($conn == false){
    die(mysqli_connect_error());
}
$cantake = true;
$studentsubjects = array();
$st_sql = "SELECT subjectid FROM studentsubject WHERE studentid = '{$_SESSION['sid']}'";
$stresult = mysqli_query($conn, $st_sql);
for ($i=0; $i < $stresult->num_rows; $i++) {
	
	$row = $stresult->fetch_assoc();
	array_push($studentsubjects, $row['subjectid']);
}

$select_sql = "SELECT dependantsubjectid FROM dependantsubject WHERE subjectid = '{$subject}'";
$result = mysqli_query($conn, $select_sql);
for ($i=0; $i < $result->num_rows; $i++) {
	$row = $result->fetch_assoc();
	if(!in_array($row['dependantsubjectid'], $studentsubjects)){
		$cantake = false;
	}
}
if($cantake == false){
	$_SESSION['takesubject'] = "you can't take this subject";
	header("location: subjectsregistration.php");
	exit();
}
else{
	if(!in_array($subject, $studentsubjects)){
		$insert_sql = "INSERT INTO studentsubject (studentid,subjectid,date) VALUES ('{$_SESSION['sid']}','{$subject}','{$time}')";
		$insresult = mysqli_query($conn, $insert_sql);
		if($insresult == false){
			echo mysqli_error($conn);
			exit();
		}
		else{
			$_SESSION['takesubjectsuccess'] = "you registered in this subject successfully";
			header("location: subjectsregistration.php");
			exit();
		}
	}
	else{
		$_SESSION['alreadytaken'] = "you already has been registered in this subject";
		header("location: subjectsregistration.php");
		exit();
	}
}

//echo implode('|',$dates);
?>