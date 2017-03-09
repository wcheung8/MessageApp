<?php
	
	$db_host = 'localhost';
	$db_user = 'root';
	$db_pass = '';
	$db_name = 'message';


	if ($connection = mysqli_connect($db_host, $db_user, $db_pass)) {
		echo "Connected to database server...<br/>";
		if ($database = mysqli_select_db($connection, $db_name)) {
			echo "Connected to database name <br/>";
		} else {
			echo "Database was not found<br/>";
		}
	} else {
		echo "Unnable to connect SQL sever";
	}
	

?>