<?php
	
	class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('project.db');
    }
}

                
    $db = new MyDB();
    
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
	

?>