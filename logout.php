<?php
    include_once(__DIR__."/conf.php");
    session_destroy();
    header('Location: '.SITE_ROOT.'/index.php');
?>
