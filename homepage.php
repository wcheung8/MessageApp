<?php
	
	session_start();
	// require('app/core.inc.php');

?>

<script src="./update.js"></script>


<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: #7f8c8d">
	<div id="main-wrapper">
		<center>
			<h2>Welcome 
				<?php
					echo $_SESSION['username'];
				?>
			</h2>
            
            <div id="chatBox"></div>
            
            <form id="msgForm" action="message.php" method="post" onsubmit="return sendMsg(this);">
                <input type="text" name="msg" id="msg" placeholder="Enter message here"/>
            </form>
				<input name="logout" type="submit" id="logout_btn" value="Logout"/><br>
			</center>
		</form>

		<?php
			if (isset($_POST['logout'])) {
				session_destroy();
				header('location:index.php');
			}
		?>

	</div>

</body>
</html>