<?php
// Initialize the session
session_start();
 
setcookie(session_name(), '', 100);

session_unset();

// Destroy the session.
session_destroy();

// Unset all of the session variables
$_SESSION = array();
 
// Redirect to login page
header("location: Login");
exit;
?>
<!-- © 2020 | Francis Joachim P. Santy-->