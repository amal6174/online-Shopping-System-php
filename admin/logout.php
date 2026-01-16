<?php
session_start(); // Start the session

// Destroy all session variables
$_SESSION = array();

// Destroy the session completely
session_destroy();

// Redirect to login page
header("Location: login.php");
exit();
?>
