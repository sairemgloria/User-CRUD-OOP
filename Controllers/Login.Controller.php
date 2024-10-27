<?php

class Login extends Database
{
   // Properties or Fields
   private $table = 'users';

   public $name;
   public $password;

   // Create constructor
   public function __construct()
   {
      $this->connect();
   }

   // Check user credentials
   public function checkUserCredentials()
   {
      // Create select query
      $query = "SELECT * FROM {$this->table} WHERE name = :name AND password = :password";

      // Prepare the statement
      $stmt = $this->connect()->prepare($query);

      // Bind the parameters
      $stmt->bindParam(':name', $this->name);
      $stmt->bindParam(':password', $this->password);

      // Execute the statement
      $stmt->execute();

      // Fetch the result
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

      // Create condition
      if ($rows == false) {
         // Create error handler
         echo '<strong>Invalid</strong> : User not found';
         echo '<br><a href="../login.php">Go back</a>';
      } else {
         // Loop and display get the result
         foreach ($rows as $row) {
            // Store user data in the session
            $_SESSION['user'] = [
               'ID' => $row['id'],
               'UID' => $row['uid'],
               'Name' => $row['name'],
               'Password' => $row['password'],
            ];
         }

         header('Location: ../dashboard.php');
         exit();
      }
   }

   // Create method for checking of empty fields
   private function checkLoginEmptyFields()
   {
      // Get the input fields or properties
      $fields = [
         'name' => $this->name,
         'password' => $this->password
      ];

      $emptyFields = []; // Array to store empty fields

      // Loop the array $fields to get the input field name and this value
      foreach ($fields as $field => $value) {
         // Create validation for checking of empty fields
         if (empty($value)) {
            $emptyFields[] = $field;
         }
      }

      // Create condition and display the validation
      if (count($emptyFields) == count($fields)) {
         // Display all fields empty
         $_SESSION['allFieldsEmpty'] = 'All fields are empty';
         header('Location: ../login.php');
         die();
      } elseif (!empty($emptyFields)) {
         // Display the fields that are empty
         $_SESSION['emptyField'] = 'Empty fields are: <strong style="color:red;">' . implode(", ", $emptyFields) . '</strong>';
         header('Location: ../login.php');
         die();
      }

      return $emptyFields; // Return empty fields so the calling method can decide what to do
   }

   // Create method for login
   public function processUserLoginData()
   {
      // Check for empty fields first
      $emptyFields = $this->checkLoginEmptyFields();

      // If no fields are empty, proceed with the insert query
      if (empty($emptyFields)) {
         $this->checkUserCredentials();
      }
   }
}
