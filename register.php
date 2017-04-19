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
			<input name="username" type="text" class="inputvalues" placeholder="Input your username" required="" /><br>
			<br>
			<label><b>Your Password:</b></label><br>
			<input name="password" type="password" class="inputvalues" placeholder="Input your password" required="" /><br>
			<br>
			<label><b>Confirm Password:</b></label><br>
			<input name="cpassword" type="password" class="inputvalues" placeholder="Input your password again" required="" /><br>
			<br>
			<input name="submit_btn" type="submit" id="signup_btn" value="Sign Up"/><br>
			<a href="index.php"><input type="button" id="back_btn" value="<< Back     "/></a>
		</form>
		<?php
			if(isset($_POST['submit_btn'])) {
				$username = $_POST['username'];
				$password = $_POST['password'];
				$cpassword = $_POST['cpassword'];

				if ($password == $cpassword) {
					$query = "SELECT * FROM user WHERE username = '".$username."';";
                    $result = $db->query($query);

                    if ($result->fetchArray(SQLITE3_ASSOC)){
						echo '<script type="text/javascript"> alert("This username is already exist!") </script>';
					} else {
						$query = "INSERT into User values('".$username."', '".$password."')";
						$db->exec($query);
                        echo '<script type="text/javascript"> alert("Congratulation...User Registered!") </script>';
					}
				} else {
					echo '<script type="text/javascript"> alert("Password does not match!!") </script>';
				}

				
			}
		?>

	</div>

</body>
</html>