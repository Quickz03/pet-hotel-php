<?php
class Database
{
   // specify your own database credentials
   private $host = "localhost";
   private $dbname = "pet_hotel";
   private $dbuser = "scoob";
   private $dbpass = "";
   public $conn;

   // get the database connection
   public function getConnection()
   {
      $this->conn = null;

      try {
         $this->conn = new PDO("pgsql:host=$this->host;dbname= $this->dbname", $this->dbuser, $this->dbpass);
      } catch (PDOException $e) {
         echo "Error : " . $e->getMessage() . "<br/>";
         die();
      }

      return $this->conn;
   }
}
