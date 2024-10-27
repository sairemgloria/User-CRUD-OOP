<?php

require('../Models/Database.php');
require('../Controllers/User.Controller.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   $user = new User();

   // Get the input fields or properties
   $user->id = $_POST['id'] ?? null;
   $user->name = $_POST['name'] ?? null;
   $user->password = $_POST['password'] ?? null;

   $user->updateUser();
   
}
