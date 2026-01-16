<?php
session_start(); // Start or resume the session

session_unset();   // Unset all session variables
session_destroy(); // Destroy the session

// Redirect to index.php
header("Location: index.php");
exit;
?>


<?php
/*
session_unset(); // Remove all session variables
session_destroy(); // Destroy session

// Redirect to index.php

exit;
*/
?>

