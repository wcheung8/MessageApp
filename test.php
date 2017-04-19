<?php
    header('Content-Type: text/event-stream');
    header('Cache-Control: no-cache');

    echo "event: update\n";
    echo 'data: {"msg": "asdf", "user": "lol"}';
    echo "\n\n";
    flush();
?> 