<?php
class Owner
{

   // database connection and table name
   private $conn;
   private $table_name = "owners";

   // object properties
   public $id;
   public $name;
   public $pet_id;

   // constructor with $db as database connection
   public function __construct($db)
   {
      $this->conn = $db;
   }

   // read products
   function read()
   {
      // select all query
      $query = "SELECT * FROM " . $this->table_name . ";";

      // prepare query statement
      $stmt = $this->conn->prepare($query);

      // execute query
      $stmt->execute();
      return $stmt;
   }

   // create product
   function create()
   {
      // query to insert record
      $query = "INSERT INTO " . $this->table_name . " ( \"name\" , \"pet_id\")
      VALUES (:name, :pet_id)";

      // prepare query
      $stmt = $this->conn->prepare($query);

      // sanitize
      $this->name = htmlspecialchars(strip_tags($this->name));
      $this->pet_id = htmlspecialchars(strip_tags($this->pet_id));

      // bind values
      $stmt->bindParam(':name', $this->name);
      $stmt->bindParam(':pet_id', $this->pet_id);

      // execute query
      if ($stmt->execute()) {
         return true;
      }

      return false;
   }

   function delete() 
   {
      $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
      
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));
 
    // bind id of record to delete
    $stmt->bindParam(1, $this->id);
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
   
   }
}
