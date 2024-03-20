<?php
session_start();

// Invalidate session and set flag for logout
$_SESSION = array();
$_SESSION['logged_out'] = true;
session_destroy();

header("Location: login.php");
exit();
?>
