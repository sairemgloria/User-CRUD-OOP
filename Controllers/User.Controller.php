<?php

class User extends Database
{
   // Properties or Fields
   private $table = 'users';

   public $id;
   public $uid;
   public $name;
   public $password;
   public $created_at;
   public $updated_at;
   public $currentDate;

   // Create constructor
   public function __construct()
   {
      $this->connect();
      $this->currentDate = date('Y-m-d H:i:s');
   }

   // Create user method
   public function createUser()
   {
      // Create insert query
      $query = "INSERT INTO {$this->table} (uid, name, password) VALUES (:uid, :name, :password)";

      // Prepare the statement
      $stmt = $this->connect()->prepare($query);

      // Clean the data
      $this->uid = htmlspecialchars(strip_tags($this->uid));
      $this->name = htmlspecialchars(strip_tags($this->name));
      $this->password = htmlspecialchars(strip_tags($this->password));

      // Bind the parameters
      $stmt->bindParam(':uid', $this->uid);
      $stmt->bindParam(':name', $this->name);
      $stmt->bindParam(':password', $this->password);

      // Execute the statement
      if ($stmt->execute() == false) {
         // Create error handler
         die('Error: ' . implode(', ', $stmt->errorInfo()));
      } else {
         // Return success message if the statement and query successful
         $_SESSION['success'] = 'User registration successful';
         header('Location: ../register.php');
         exit();
      }
   }

   // Create method for checking of empty fields
   private function checkEmptyFields()
   {
      // Get the input fields or properties
      $fields = [
         'UID' => $this->uid,
         'Name' => $this->name,
         'Password' => $this->password
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
         header('Location: ../register.php');
         die();
      } elseif (!empty($emptyFields)) {
         // Display the fields that are empty
         $_SESSION['emptyField'] = 'Empty fields are: <strong style="color:red;">' . implode(", ", $emptyFields) . '</strong>';
         header('Location: ../register.php');
         die();
      }

      return $emptyFields; // Return empty fields so the calling method can decide what to do
   }

   // Create method for registration
   public function processUserRegistrationData()
   {
      // Check for empty fields first
      $emptyFields = $this->checkEmptyFields();

      // If no fields are empty, proceed with the insert query
      if (empty($emptyFields)) {
         $this->createUser();
      }
   }

   // Create fetch user method
   public function fetchUserById()
   {
      // Create select query
      $query = "SELECT * FROM {$this->table} WHERE id = :id";

      // Prepare the statement
      $stmt = $this->connect()->prepare($query);

      // Bind the parameter
      $stmt->bindParam(':id', $this->id);

      // Execute the statement
      $stmt->execute();

      // Fetch the result
      return $stmt->fetch(PDO::FETCH_ASSOC);
   }

   // Create update user method
   public function updateUser()
   {
      try {
         // Create update query
         $query = "UPDATE {$this->table} SET name = :name, password = :password, updated_at = :currentDate WHERE id = :id";

         // Prepare the statement
         $stmt = $this->connect()->prepare($query);

         // Clean the data
         $this->name = htmlspecialchars(strip_tags($this->name));
         $this->password = htmlspecialchars(strip_tags($this->password));

         // Bind the parameters
         $stmt->bindParam(':name', $this->name);
         $stmt->bindParam(':password', $this->password);
         $stmt->bindParam(':currentDate', $this->currentDate);
         $stmt->bindParam(':id', $this->id);

         // Create condition and execute the statement
         if ($stmt->execute() == false) {
            // Create error handler
            die('Error: ' . implode(', ', $stmt->errorInfo()));
         } else {
            // Update session with new user data and store to array $_SESSION['user']
            $updatedUser = $this->fetchUserById();
            $_SESSION['user'] = [
               'ID' => $updatedUser['id'],
               'UID' => $updatedUser['uid'],
               'Name' => $updatedUser['name'],
               'Password' => $updatedUser['password'],
            ];

            // Return success message if the statement and query successful
            $_SESSION['success'] = 'User profile updated successful';
            header('Location: ../update-profile.php?id=' . $this->id);
            exit();
         }
      } catch (Exception $e) {
         // Set error message
         $this->error = $e->getMessage();
         return false;
      }
   }
}
