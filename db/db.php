<?php
    $dbhost = "localhost";
    $dbname = "fbo";
    $dbuser = "fboadmin";
    $dbpass = "nimdaobf";
    $db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    if ($db->connect_errno) {
        printf("Connection failed: %s\n", $db->connect_error);
        exit();
    }

//  mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
//  mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());


?>
