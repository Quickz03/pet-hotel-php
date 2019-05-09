<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/database.php';
include_once '../objects/Pet.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$pet = new Pet($db);

// query products
$stmt = $pet->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {

   // products array
   $pets_arr = array();
   $pets_arr["pets"] = array();

   // retrieve our table contents
   // fetch() is faster than fetchAll()
   // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
   while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      // extract row
      // this will make $row['name'] to
      // just $name only
      extract($row);

      $pets_item = array(
         "id" => $id,
         "pet_name" => $pet_name,
         "pet_color" => $pet_color,
         "pet_breed" => $pet_breed,
         "checked_in" => $checked_in,
      );

      array_push($pets_arr["pets"], $pets_item);
   }

   // set response code - 200 OK
   http_response_code(200);

   // show products data in json format
   echo json_encode($pets_arr);
} else {

   // set response code - 404 Not found
   http_response_code(404);

   // tell the user no products found
   echo json_encode(
      array("message" => "No pets found.")
   );
}
