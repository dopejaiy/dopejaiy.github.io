<?php
session_start();
error_reporting(0);
// Create connection
$conn = mysqli_connect("127.0.0.1", "root","","thesis");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$db = $conn;
?>
