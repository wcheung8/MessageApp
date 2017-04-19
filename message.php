<?php
	require('app/core.inc.php');
     
    session_start();
    
    $message = $_POST['msg'];
    $from = $_SESSION['username'];
    $to = $_POST['to'];

    $query = "INSERT into Message(from_user, to_user, message) values ('".$from."', '".$to."', '".$message."')";
    $db->exec($query);
    
    // update user status
    $file = file_get_contents("./users.json");
    $users = json_decode($file, true);
    $users[$_POST['to']] = true;
    file_put_contents("./users.json", json_encode($users));
?>