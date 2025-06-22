

<?php
// include database and object files
include_once '../database/database.php';
include_once '../objects/user.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare user object
$user = new User($db);

$name = $_GET['name'];
$degree = $_GET['degree'] ;

// read the details of user to be edited
try
{
$stmt = $user->insertDoctor($name,  $degree);

 $user_arr=array
 (
        "status" => true,
        "message" => "Inserted"
            );
// make it json format
print_r(json_encode($user_arr));
}catch(Exception $ex)
{
        print_r(json_encode($ex -> getMessage()));
}
?>


