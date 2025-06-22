<?php 

$dsn 	= 'mysql:host=localhost;dbname=modern';
$user 	= 'root';
$pass 	= '';
$option = array(
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

try
{
	$pdo = new PDO($dsn,$user,$pass,$option);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
	echo "Failed" . $ex->getMessage();
}