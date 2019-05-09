<?php
class Pet
{

   // database connection and table name
   private $conn;
   private $table_name = "pets";

   // object properties
   public $id;
   public $pet_name;
   public $pet_color;
   public $pet_breed;
   public $checked_in;

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
      $query = "INSERT INTO " . $this->table_name . " ( \"pet_name\" , \"pet_color\", \"pet_breed\", \"checked_in\" )
      VALUES (:pet_name, :pet_color, :pet_breed, :checked_in);";

      // prepare query
      $stmt = $this->conn->prepare($query);

      // sanitize
      $this->pet_name = htmlspecialchars(strip_tags($this->pet_name));
      $this->pet_color = htmlspecialchars(strip_tags($this->pet_color));
      $this->pet_breed = htmlspecialchars(strip_tags($this->pet_breed));
      $this->checked_in = htmlspecialchars(strip_tags($this->checked_in));

      // bind values
      $stmt->bindParam(':pet_name', $this->pet_name);
      $stmt->bindParam(':pet_color', $this->pet_color);
      $stmt->bindParam(':pet_breed', $this->pet_breed);
      $stmt->bindParam(':checked_in', $this->checked_in);

      // execute query
      if ($stmt->execute()) {
         return true;
      }

      return false;
   }




}
