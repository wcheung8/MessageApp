<?php
	require('app/core.inc.php');
   $db->exec("CREATE VIRTUAL TABLE IF NOT EXISTS posts 
            USING FTS5(title, body);");

    $db->exec("INSERT INTO posts(title,body)
            VALUES('Learn SQlite FTS5','This tutorial teaches you how to perform full-text search in SQLite using FTS5'),
            ('Advanced SQlite Full-text Search','Show you some advanced techniques in SQLite full-text searching'),
            ('SQLite Tutorial','Help you learn SQLite quickly and effectively');");
$query = "SELECT * 
FROM posts 
WHERE posts MATCH 'fts5';";
                              echo $query;
                    $result = $db->query($query);
                    var_dump($result->fetchArray(SQLITE3_ASSOC));
?>