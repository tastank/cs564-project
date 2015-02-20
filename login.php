<?php
    include_once(__DIR__."/conf.php");
    $_SESSION['username'] = "tstank";
    header('Location: '.SITE_ROOT.'/index.php');
?>
