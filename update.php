<?php

	require('app/core.inc.php');
    session_start();

    header('Content-Type: text/event-stream');
    header('Cache-Control: no-cache');
    if(!isset($_SESSION['username'])){
        die();
    }
    
    // check for any modification to users
    if(filemtime('./users.json')  > $_SESSION['last_update']) {
        // lock and read user status
        $file = file_get_contents("./users.json");
        $users = json_decode($file, true);

        // check for user notification
        if ($users[$_SESSION['username']] == true){
            
            $username = $_SESSION['username'];
            $last_update = $_SESSION["SQLtime"];
            $selected = $_SESSION['current'];

            // query database and push new messages
            $query = "SELECT *
                      FROM Message
                      WHERE to_user = '".$username."'
                      AND from_user = '".$selected."'
                      AND timestamp > '".$last_update."';";
            $result = $db->query($query);

            while($res = $result->fetchArray(SQLITE3_ASSOC)){

                echo "id: 1\n";
                echo "event: update\n";
                echo 'data: {"timestamp":"'.$res['timestamp'].'","user":"'.$res['from_user'].'","msg": "'.$res['message'].'"}';
                echo "\n\n";

            }
            
            
            $query = "SELECT CURRENT_TIMESTAMP";
            $result = $db->query($query);
            $_SESSION["SQLtime"] = $result->fetchArray()[0];
            $_SESSION['last_update'] = time();
            
            // update user status
            $users[$_SESSION['username']] = false;
            file_put_contents("./users.json", json_encode($users));
            
            // push new data to client
            ob_flush();
            flush();
            sleep(1);
        }


    }
    

?>