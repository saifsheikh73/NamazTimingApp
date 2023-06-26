<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Clear all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Clear the "Remember Me" cookie
$cookieName = "remembercookie";
setcookie($cookieName, '', time() - 3600, '/');

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");


// Redirect to the login page
header("Location: login.php");
exit();
?>
