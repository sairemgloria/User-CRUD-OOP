<?php

$pageInfo = [
   'login' => '/Users CRUD OOP/login.php'
];

session_start();
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session

// // Ensure all session cookies are deleted
// if (ini_get("session.use_cookies")) {
//    $params = session_get_cookie_params();
//    setcookie(
//       session_name(),
//       '',
//       time() - 42000,
//       $params['path'],
//       $params["domain"],
//       $params['secure'],
//       $params["httponly"]
//    );
// }

header('Location: ' . $pageInfo['login']); // Redirect to login page
exit();
