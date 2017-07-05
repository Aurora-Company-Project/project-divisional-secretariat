<?php
	session_start();
	if (empty($_SESSION['user_id'])){
		$_SESSION['error'] = 'Please login first';
		header("Location: Login.php");
		
	}else {
		$fname = $_SESSION['first_name'];
		$lname = $_SESSION['last_name'];	
		$user_id = $_SESSION['user_id'];
	}	
?>