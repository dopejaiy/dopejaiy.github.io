<?php
 ### destroy the session and redirects back to customer login page ###
 
session_start();
 
unset($_SESSION['admin_member_id']);
$_SESSION = array();
$_SESSION["session_msg_success"] = "You have successfully logged out..";
header("Location: login.php");
exit;

### destroy the session and redirects back to login page ###

?>