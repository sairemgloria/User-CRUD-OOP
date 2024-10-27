<?php

date_default_timezone_set('Asia/Manila'); // Set the current time for specific location
session_start();

class Database
{
   private $hostname = 'localhost';
   private $database = 'users-crud-oop';
   private $username = 'root';
   private $password = '';
   private $conn;
   public $error; // Ensure this is defined to remove the error in IDE. Remove this if unnecessary.

   public function connect()
   {
      $this->conn = null;

      try {
         // Set PDO connection information
         $this->conn = new PDO("mysql:host={$this->hostname};dbname={$this->database}", $this->username, $this->password);
         // Set the PDO error mode to exception
         $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
         echo "Connection failed: " . $e->getMessage();
      }

      return $this->conn;
   }

   public function getDatabaseInfo()
   {
      // Calls the connect() method
      $this->connect();

      // Store and gather database info
      $databaseInfo = [
         'Hostname' => $this->hostname,
         'Database' => $this->database,
         'Username' => $this->username,
         'Password' => $this->password,
         'Page URI' => $_SERVER['REQUEST_URI'], // Display the URI page title
         'HTTP Status' => http_response_code()
      ];

      // Display database info. NOTE: Use this only for debugging
      echo '<pre>';
      print_r($databaseInfo);
      echo '</pre>';
   }
}

$db = new Database(); // Create instance of Database class
$db->getDatabaseInfo(); // Call the getDatabaseInfo() method