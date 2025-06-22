<?php
function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
$name = test_input($_POST['name']);
$user = test_input($_POST['user']);
$pass = test_input($_POST['pass']);

$conn = mysqli_connect("localhost","root","","modern");
if($conn == false){
	die(mysqli_connect_error());
}
$insert_sql = "INSERT INTO users (name , username , password) VALUES ('{$name}','{$user}','{$pass}')";
$result = mysqli_query($conn, $insert_sql);
if($result == false){
	echo mysqli_error($conn);
}
else{
	header("location: successful.php");
	exit();
}

?>