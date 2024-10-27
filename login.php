<?php
require('Models/Database.php'); // Display the database connection purpose only. Comment this line after checking
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User Login</title>
</head>

<body>

   <!-- Your Code -->
   <div>
      <fieldset>
         <legend>User Login Form:</legend>
         <form action="Includes/Login.php" method="post">
            <?php require('Includes/Toast-Notifications.php'); ?>
            <br>
            <label for="name">Name : </label>
            <input type="text" name="name">
            <br><br>
            <label for="password">Password : </label>
            <input type="password" name="password">
            <br><br>
            <input type="submit" name="login" value="Login">
            &nbsp;|&nbsp;
            <a href="register.php">Create account</a>
         </form>
      </fieldset>
   </div>

</body>

</html>