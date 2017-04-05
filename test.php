<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

$file = file_get_contents("testfile.txt");
echo "data: The server time is:".$file."\n\n";
flush();
?> 