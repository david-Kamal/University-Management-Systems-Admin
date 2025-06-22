<?php
// include database and object files
include_once 'database.php';
include_once 'user.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare user object
$user = new User($db);
// set ID property of user to be edited
$user->name = isset($_GET['name']) ? $_GET['name'] : die();
//$user->regrade = isset($_GET['regrade']) ? $_GET['regrade'] : die();

// read the details of user to be edited
$stmt = $user->getdoctor();

if($stmt->rowCount() > 0){
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // create array
    $user_arr=array(
        "status" => true,
        "message" => "Cool",
        "id" => $row['id'],
        "name" => $row['name'],
        "regrade" => $row['regrade']

    );
            
            /*
	anty 3yza
            */

}
else{
    $user_arr=array(
        "status" => false,
        "message" => "Invalid Name",
    );
}
// make it json format
print_r(json_encode($user_arr));
print_r(json_encode($user->name));
?>


