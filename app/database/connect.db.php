<?php
	
	$db_host = 'localhost';
	$db_user = 'root';
	$db_pass = '';
	$db_name = 'message';


	$connection = mysqli_connect($db_host, $db_user, $db_pass) or die("Unnable to connect SQL sever");
	$database = mysqli_select_db($connection, $db_name);
	

?>