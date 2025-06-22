

<?php
// include database and object files
include_once 'database.php';
include_once 'user.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
 $data_json = file_get_contents("php://input");
$data = json_decode($data_json, true);

// prepare user object
$user = new User($db);

$username = $data['username'];
$password = $data['password'];

try
{
	$stmt = $user->adminSubmit($username,$password);
	if($stmt->rowCount() > 0)
	{
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$user_arr=array
		("status" => true,
		 "message" => "Login success",
         //"rows" => $stmt->mysqli_affected_rows
     );
		print_r(json_encode($user_arr));
	}else
	{
		$user_arr=array
		(
        "status" => false,
        "message" => "Login failed"
    	);
		print_r(json_encode($user_arr));
	}
}
	catch(Exception $ex)
	{
        print_r(json_encode($ex -> getMessage()));
	}

?>