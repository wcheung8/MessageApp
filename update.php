<?php

    session_start();
    
    header('Content-Type: text/event-stream');
    header('Cache-Control: no-cache');
    if(!isset($_SESSION['username']))
        die()

    for($i = 0; $i < 60; $i+){ 

        // check for any modification to users
        if(filemtime('./users.json')  > $_SESSION['last_update']) {
            
            // lock and read user status
            $file = file_get_contents("./users.json");
            $users = json_decode($file, true);
            
            // check for user notification
            if ($users[$_SESSION['username'] == true){
               
                // query database and push new messages
                
                
                // update user status
                $users[$_SESSION['username'] = false;
                file_put_contents("./users.json", json_encode($users));

            }

            ob_flush();
            flush();
            sleep(1);
        }
    }

?>