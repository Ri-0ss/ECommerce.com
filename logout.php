<?php
session_start(); // Start the session

// Destroy all session data
$_SESSION = []; // Clear the session array
session_destroy(); // Destroy the session

// Redirect to the login page
header('Location: index.php');
exit; // Ensure no further code is executed
?>
