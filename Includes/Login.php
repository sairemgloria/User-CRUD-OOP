<?php

require('../Models/Database.php');
require('../Controllers/Login.Controller.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   $login = new Login(); // Create instance of Login class

   // Get the input fields or properties
   $login->name = $_POST['name'] ?? null;
   $login->password = $_POST['password'] ?? null;

   $login->processUserLoginData(); // Call the methods or function

}
