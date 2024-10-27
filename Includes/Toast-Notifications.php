<?php

if (isset($_SESSION['allFieldsEmpty'])) {
   echo '<strong style="color: red;">' . $_SESSION['allFieldsEmpty'] . '</strong><br>';
   unset($_SESSION['allFieldsEmpty']);
}

if (isset($_SESSION['emptyField'])) {
   echo '<span>' . $_SESSION['emptyField'] . '</span><br>';
   unset($_SESSION['emptyField']);
}

if (isset($_SESSION['success'])) {
   echo '<span style="color: green;">' . $_SESSION['success'] . '</span><br>';
   unset($_SESSION['success']);
}