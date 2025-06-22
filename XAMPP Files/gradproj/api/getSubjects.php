

<?php
// include database and object files
include_once '../database/database.php';
include_once '../objects/user.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare user object
$user = new User($db);

try
{
	$stmt = $user->getSubjects();

	if($stmt->rowCount() > 0)
	{
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$user_arr=array
		(
        "status" => true,
        "message" => "subjects retrived",
        "name" => $row['subjectname']
    	);
		print_r(json_encode($user_arr));
	}else
	{
		$user_arr=array
		(
        "status" => false,
        "message" => "subjects wasn't retrived"
    	);
		print_r(json_encode($user_arr));
	}
}
	catch(Exception $ex)
	{
        print_r(json_encode($ex -> getMessage()));
	}

?>