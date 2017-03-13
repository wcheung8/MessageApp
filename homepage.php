<?php
	
	// require('app/core.inc.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: #7f8c8d">
	<div id="main-wrapper">
		<center>
			<h2>Welcome to my page</h2>
			<img src="image/home.png" class="avatar" />
		</center>
	

		<form class="myform" action="homepage.php" method="post">
			<center>
				<input type="submit" id="logout_btn" value="Logout"/><br>
			</center>
		</form>
	</div>

</body>
</html>