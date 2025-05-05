<?php
session_start();

// Unset all session variables
$_SESSION = [];

// Destroy the session
session_destroy();
session_start();
$_SESSION['success'] = "Registration successful!";
// Optional: redirect to login or home page
header("Location: login.php");
exit();

?>