<?php
	
	session_start();
	require('app/core.inc.php');
    if(!isset($_SESSION['username'])){
        die();
    } 

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
			<h2>Welcome 
				<?php
					echo $_SESSION['username'];
				?>
			</h2>
            
            <form id="form" action="view.php" method="get;">
                    <label for="user">Select conversation</label>
                    <select id="user" name="user" onchange="document.getElementById('form').submit()";>
                        <option value="">--</option>
                        <?php
                            // query database and push new messages
                            $query = "SELECT username
                                      FROM User
                                      WHERE username <> '".$_SESSION['username']."';";
                            $result = $db->query($query);
                            while($res = $result->fetchArray(SQLITE3_ASSOC)){
                                echo '<option value="' . $res['username']. '">' . $res['username'] . '</option>';
                            }
                        ?>
                    </select>
            </form>
            <form action="homepage.php" method="post" >
            <input name="logout" type="submit" id="logout_btn" value="Logout"/><br>
            </form>
        </center>
		<?php
			if (isset($_POST['logout'])) {
				session_destroy();
				header('location:index.php');
			}
		?>

	</div>

</body>
</html>