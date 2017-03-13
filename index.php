<?php
	
	// require('app/core.inc.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: #7f8c8d">
	<div id="main-wrapper">
		<center>
			<h2>Login</h2>
			<img src="image/login.png" class="avatar" />
		</center>
	

		<form class="myform" action="index.php" method="post">
			<label><b>Username:</b></label><br>
			<input type="text" class="inputvalues" placeholder="Input your username"/><br><br>
			<label><b>Password:</b></label><br>
			<input type="password" class="inputvalues" placeholder="Input your password"/><br><br>
			<input type="submit" id="login_btn" value="Login"/><br>
			<input type="button" id="register_btn" value="Register"/>
		</form>
	</div>

</body>
</html>