<?php


     $myfile = fopen("testfile.txt", "w");
     
     fwrite($myfile, $_POST['msg']);
     
     fclose($myfile);


?>