<?php
	
	session_start();
	require('app/core.inc.php');
    if(!isset($_SESSION['username'])){
        die();
    } 
    
    $_SESSION['last_update'] = time();
    if(!isset($_GET['user'])){
        $_SESSION['current'] = $_GET['user'];
    }
?>

<script src="./update.js"></script>


<!DOCTYPE html>
<html>
<head>
	<title>Chat</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: #7f8c8d">
	<div id="main-wrapper">
		<center>
			<h2>Conversation with  
				<?php
					echo $_SESSION['current'];
				?>
			</h2>
            
        </center>
            <div id="chatbox">
            
            <?php
            
                $username = $_SESSION['username'];
                $selected = $_GET['user'];

                // query database and push new messages
				$query = "SELECT *
                          FROM Message
                          WHERE (to_user = '".$username."'
                          AND from_user = '".$selected."') 
                          OR
                          (to_user = '".$selected."'
                          AND from_user = '".$username."')
                          ORDER BY timestamp;";
				$result = $db->query($query);

                while($res = $result->fetchArray(SQLITE3_ASSOC)){

                    if(!isset($res['message'])) continue;
                    echo "<". $res['timestamp']."> ".$res['from_user'].": ".$res['message']."<br>";

                }
                $query = "SELECT CURRENT_TIMESTAMP";
				$result = $db->query($query);
                $_SESSION["SQLtime"] = $result->fetchArray()[0];
                $_SESSION['last_update'] = time()
            
            ?>
            
            </div>
            
		<center>
            <form id="msgForm" action="message.php" method="post" onsubmit="return sendMsg(this, '<?php echo $_GET['user']."','".$_SESSION['username']."','".date("Y-m-d H:i:s", time()) ?>');">
                    <input type="text" name="msg" id="msg" placeholder="Enter message here"/>
            </form>
            <form action="homepage.php" method="post" >
            <input name="logout" type="submit" id="logout_btn" value="Logout"/><br>
            </form>
            <a href="./search.php">Search</a>
            
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