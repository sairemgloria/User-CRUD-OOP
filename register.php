<?php
require('Models/Database.php'); // Display the database connection purpose only. Comment this line after checking
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User Registration</title>
</head>

<body>

   <!-- Your Code -->
   <div>
      <fieldset>
         <legend>User Registration Form:</legend>
         <form action="Includes/Register.php" method="post">
            <?php require('Includes/Toast-Notifications.php'); ?>
            <br>
            <label for="uid">UID : </label>
            <input type="text" name="uid">
            <br><br>
            <label for="name">Name : </label>
            <input type="text" name="name">
            <br><br>
            <label for="password">Password : </label>
            <input type="password" name="password">
            <br><br>
            <input type="submit" name="register" value="Register">
            &nbsp;|&nbsp;
            <a href="login.php">Log in</a>
         </form>
      </fieldset>
   </div>

</body>

</html>