<?php
// Display the database connection purpose only. Comment this line after checking
require('Models/Database.php');

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
   header('Location: login.php');
   exit();
}

$user = $_SESSION['user']; // Retrieve user data from the session
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body>

   <h2>View Profile</h2>

   <?php
   var_dump($user);
   ?>

   <br><br>

   <form action="">
      <label for="ID">Acc ID</label>
      <input type="text" value="<?= $user['ID']; ?>">
      <br><br>
      <label for="name">Name</label>
      <input type="text" name="name" id="name" value="<?= $user['Name']; ?>">
   </form>

</body>

</html>