<?php
	
	session_start();
	require('app/core.inc.php');

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
			<input name="username" type="text" class="inputvalues" placeholder="Input your username" required="" /><br><br>
			<label><b>Password:</b></label><br>
			<input name="password" type="password" class="inputvalues" placeholder="Input your password" required="" /><br><br>
			<input name="login" type="submit" id="login_btn" value="Login"/><br>
			<a href="register.php"><input type="button" id="register_btn" value="Register"/></a>
		</form>

		<?php
			if (isset($_POST['login'])) {
				$username = $_POST['username'];
				$password = $_POST['password'];

				$query = "SELECT * FROM user WHERE username = '".$username."' AND password = '".$password."';";
				$result = $db->query($query);
                
                if($result->fetchArray(SQLITE3_ASSOC)) {
                    $_SESSION['username'] = $username;
					header("location:homepage.php");
                }  else {
					echo '<script type="text/javascript"> alert("Invalid account!") </script>';
				}

			}
		?>

	</div>

</body>
</html>