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

    function get_password_from_db($username) {
        global $db;
        $password_query = "SELECT password FROM Pilot WHERE username='" . $username . "';";
        $result = $db->query($password_query);
        if (!$result || $result->num_rows != 1) {
            return false;
        }
        return $result->fetch_assoc()['password'];
    }

?>
