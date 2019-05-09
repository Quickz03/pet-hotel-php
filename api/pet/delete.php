<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection
include_once '../config/database.php';

// instantiate pets object
include_once '../objects/Pet.php';

$database = new Database();
$db = $database->getConnection();

$pet = new Pet($db);

// declare data
$data = json_decode(file_get_contents("php://input"));
 
// set pet id to be deleted
$pet->id = $data->id;

if($pet->delete()){
 
    // set response code - 200 ok
    http_response_code(200);
 
    // tell the user
    echo json_encode(array("message" => "Pet was deleted."));
}
 
// if unable to delete the pet
else{
 
    // set response code - 503 service unavailable
    http_response_code(503);
 
    // tell the user
    echo json_encode(array("message" => "Unable to delete pet."));
}