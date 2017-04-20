
<?php
	require('app/core.inc.php');

    $db->exec('CREATE TABLE IF NOT EXISTS User (
        username       VARCHAR(50)        NOT NULL UNIQUE,
        password       VARCHAR(50)        NOT NULL,
        PRIMARY KEY (username)
        );');
        
    $db->exec("CREATE TABLE IF NOT EXISTS Message (
                to_user        VARCHAR(50)        NOT NULL,
                from_user      VARCHAR(50)        NOT NULL,
                message        VARCHAR(1024)      NOT NULL,
                timestamp      DATETIME           DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY (to_user, from_user, timestamp),
                FOREIGN KEY (to_user) REFERENCES USER(username),
                FOREIGN KEY (from_user) REFERENCES USER(username)
                );");
	
    $db->exec("CREATE VIRTUAL TABLE IF NOT EXISTS MessageSearch USING fts5(timestamp, from_user, message);");

?>
