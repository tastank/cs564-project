

<?php

    $DEBUG = true;

    if ($DEBUG) {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
    }

    define('SITE_ROOT', '/cs564');

    session_start();

    include (__DIR__."/user.php");
    include (__DIR__."/db.php");


?>
