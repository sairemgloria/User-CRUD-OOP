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
   <title>Dashboard</title>
</head>

<body>

   <h2>Welcome, <?= $user['Name']; ?></h2>

   <strong>User information</strong>
   <?php
   echo '<pre>';
   print_r($user);
   echo '</pre>';
   ?>

   <a href="view-profile.php?id=<?= $user['ID']; ?>">View Profile</a>
   &nbsp;|&nbsp;
   <a href="update-profile.php?id=<?= $user['ID']; ?>">Edit profile</a>
   &nbsp;|&nbsp;
   <a href="logout.php">Logout</a>

</body>

</html>