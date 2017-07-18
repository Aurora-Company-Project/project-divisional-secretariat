<?php
	require_once("access_admin.php");
	include("connect_database.php");
	if (isset($_GET['user_id'])){
		$user_id = (int)$_GET['user_id'];
		echo $user_id;
		$confirm_query = "UPDATE user_accounts SET account_state=1 WHERE user_id = $user_id"; 	
		database_query($confirm_query);
		echo 'x';
	}
	

?>