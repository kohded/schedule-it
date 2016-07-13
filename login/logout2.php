<?php
session_start(); // Access the existing session.
// Need the functions:
require('loginfunction.php');

// If no session variable exists, redirect the user:
if(!isset($_SESSION['username'])) {

  redirect_user();

}
else { // Cancel the session:

  $_SESSION = array(); // Clear the variables.
  session_destroy(); // Destroy the session itself.
  setcookie('PHPSESSID', '', time() - 3600, '/', '', 0, 0); // Destroy the cookie.
}

redirect_user();
?>