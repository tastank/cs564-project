<?php include(__DIR__."/conf.php"); ?>
<link rel="stylesheet" href="<?php echo SITE_ROOT ?>/layout/style_main.css" type="text/css" media="all" />


<?php

    function print_menu() {
        ?>
            <div id="horiz_navbar">
                <ul>
                    <li><a href="">View flights</a></li>
                    <li><a href="">Scheduler</a></li>
                    <?php if (!isset($_SESSION['username'])) {
                        ?>
                    <li><a href="<?php echo SITE_ROOT ?>/login.php">Log in</a></li>
                    <?php } else {
                        ?>
                    <li><a href="">Account</a></li>
                    <li><a href="<?php echo SITE_ROOT ?>/logout.php">Log out</a></li>
                    <?php } ?>
                </ul>
            </div>
        <?php
    }

?>
