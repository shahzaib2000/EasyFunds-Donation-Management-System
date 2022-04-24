<?php
	session_start();
	session_destroy();
	// unset($_SESSION['username']);
	unset($_SESSION['fname']);
	unset($_SESSION['email']);
	unset($_SESSION['phone']);
	unset($_SESSION['address']);
	// unset($_SESSION['r_points']);
	// unset($_SESSION['bottles']);
	// unset($_SESSION['vouchers']);
	unset($_SESSION['datejoined']);
	unset($_SESSION['success']);
	header("Location:index.php");
?>