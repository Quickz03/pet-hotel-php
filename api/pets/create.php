<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection
include_once '../config/database.php';

// instantiate product object
include_once '../objects/pets.php';

$database = new Database();
$db = $database->getConnection();

$pet = new Pet($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// make sure data is not empty
if(
    !empty($data->pet_name) &&
    !empty($data->pet_color) &&
    !empty($data->pet_breed) &&
    !empty($data->check_in)
){

    // set product property values
    $pet->pet_name = $data->pet_name;
    $pet->pet_color = $data->pet_color;
    $pet->pet_breed = $data->pet_breed;
    $pet->check_in = $data->check_in;

    // create the pets
    if($pet->create()){

        // set response code - 201 created
        http_response_code(201);

        // tell the user
        echo json_encode(array("message" => "Pet was created."));
    }

    // if unable to create the pet, tell the user
    else{

        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("message" => "Unable to create pet."));
    }
}

// tell the user data is incomplete
else{

    // set response code - 400 bad request
    http_response_code(400);

    // tell the user
    echo json_encode(array("message" => "Unable to create pet. Data is incomplete."));
}
