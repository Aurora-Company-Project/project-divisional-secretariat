<?php 
	define('DB_SERVER', 'localhost');
	define('DB_USER', 'root');
	define('DB_PW', '');
	define('DB_NAME', 'project_ds');
	function database_query($query){
		$userdbc = mysqli_connect(DB_SERVER, DB_USER, DB_PW, DB_NAME)
					or die('Error connecting to the database!');
		$result = mysqli_query($userdbc, $query) or die("Unable to update the database!");
		mysqli_close($userdbc);
		return $result;
	}
?>