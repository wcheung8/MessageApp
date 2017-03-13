<?php
	require('app/core.inc.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up Page</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: #7f8c8d">
	<div id="main-wrapper">
		<center>
			<h2>Sign Up</h2>
		</center>
	

		<form class="myform" action="register.php" method="post">
			<label><b>Your Username:</b></label><br>
			<input name="username" type="text" class="inputvalues" placeholder="Input your username"/><br>
			<br>
			<label><b>Your Password:</b></label><br>
			<input name="password" type="password" class="inputvalues" placeholder="Input your password"/><br>
			<br>
			<label><b>Confirm Password:</b></label><br>
			<input name="cpassword" type="password" class="inputvalues" placeholder="Input your password again"/><br>
			<br>
			<input name="submit_btn" type="submit" id="signup_btn" value="Sign Up"/><br>
			<input type="button" id="back_btn" value="<<   Back"/>
		</form>
		<?php
			if(isset($_POST['submit_btn'])) {
				echo '<script type="text/javascript"> alert("Sign Up button clicked") </script>';
			}
		?>

	</div>

</body>
</html>