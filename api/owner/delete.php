<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection
include_once '../config/database.php';

// instantiate owner object
include_once '../objects/Owner.php';

$database = new Database();
$db = $database->getConnection();

$owner = new Owner($db);

// declare data
$data = json_decode(file_get_contents("php://input"));
 
// set owner id to be deleted
$owner->id = $data->id;

if($owner->delete()){
 
    // set response code - 200 ok
    http_response_code(200);
 
    // tell the user
    echo json_encode(array("message" => "Owner was deleted."));
}
 
// if unable to delete the pet
else{
 
    // set response code - 503 service unavailable
    http_response_code(503);
 
    // tell the user
    echo json_encode(array("message" => "Unable to delete owner."));
}