<?php
	
	session_start();
	require('app/core.inc.php');
    if(!isset($_SESSION['username'])){
        die();
    }
?>

<script src="./update.js"></script>


<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: #7f8c8d">
	<div id="main-wrapper">
		<center>
			
            <?php
                if(isset($_GET['search'])) {
                    echo '<h2>Search on for "';
					echo $_GET['search'];
                    echo '" in conversation with  ';
				
					echo $_SESSION['current'];
                }
            ?>
			</h2>
            
        </center>
            <div id="chatbox">
            
            <?php
            
                if(isset($_GET['search'])) {
                    $username = $_SESSION['username'];
                    $selected = $_SESSION['current'];
                    $search = $_GET['search'];

                    // query database and push new messages
                    $query = "INSERT INTO MessageSearch SELECT timestamp,from_user,message
                              FROM Message
                              WHERE (to_user = '".$username."'
                              AND from_user = '".$selected."') 
                              OR
                              (to_user = '".$selected."'
                              AND from_user = '".$username."')
                              ORDER BY timestamp;";
                    $db->exec($query);

                    $query = "SELECT * FROM MessageSearch WHERE MessageSearch MATCH 'message: \"".$search."\"*' ORDER BY rank;";
                    $result = $db->query($query);
                    
                    while($res = $result->fetchArray(SQLITE3_ASSOC)){

                        if(!isset($res['message'])) continue;
                        echo "<". $res['timestamp']."> ".$res['from_user'].": ".$res['message']."<br>";

                    }
                    
                    $query = "DELETE FROM MessageSearch;";
                    $db->exec($query);
                }
                
            
            ?>
            
            </div>
            
		<center>
            <form id="msgForm" action="search.php" method="get")>
                    <input type="text" name="search" id="search" placeholder="Enter search here"/>
            </form>
            <form action="homepage.php" method="post" >
            <input name="logout" type="submit" id="logout_btn" value="Logout"/><br>
            </form>
            <a href="./view.php?user=<?php echo $_SESSION['current'];?>">Back</a>
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