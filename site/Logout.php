<?php
	session_start();
	if (isset($_SESSION['name'])) {
		session_destroy();
		unset($_SESSION['name']);
		unset($_SESSION['email']);
	}
	header("Location:?Page=Login");
?>