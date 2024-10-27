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
   <title>Profile Update</title>
</head>

<body>

   <!-- Your code -->
   <div>
      <fieldset>
         <legend><?= $user['Name']; ?>'s profile:</legend>
         <form action="Includes/Update-Profile.php" method="post">
            <?php require('Includes/Toast-Notifications.php'); ?>
            <input type="hidden" name="id" value="<?= $user['ID']; ?>" readonly>
            <br>
            <label for="uid">UID : </label>
            <input type="text" name="uid" value="<?= $user['UID']; ?>" disabled>
            <br><br>
            <label for="name">Name : </label>
            <input type="text" name="name" value="<?= $user['Name']; ?>">
            <br><br>
            <label for="password">Password : </label>
            <input type="password" name="password" value="<?= $user['Password']; ?>">
            <br><br>
            <input type="submit" name="update" value="Update">
            &nbsp;|&nbsp;
            <a href="dashboard.php">Go back</a>
         </form>
      </fieldset>
   </div>

</body>

</html>