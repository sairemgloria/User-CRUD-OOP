<?php

require('../Models/Database.php');
require('../Controllers/User.Controller.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   $user = new User(); // Create instance of User class

   // Get the input fields or properties
   $user->uid = $_POST['uid'] ?? null;
   $user->name = $_POST['name'] ?? null;
   $user->password = $_POST['password'] ?? null;

   $user->processUserRegistrationData(); // Call the methods or function

}
