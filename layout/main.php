<?php include(__DIR__."/conf.php"); ?>
<link rel="stylesheet" href="<?php echo SITE_ROOT ?>/layout/style_main.css" type="text/css" media="all" />


<?php

    function print_menu() {
        ?>
            <div id="horiz_navbar">
                <ul>
                    <li><a href="<?php echo SITE_ROOT ?>/scheduler.php">Scheduler</a></li>
                    <?php if (!is_logged_in()) {
                        ?>
                    <li><a href="<?php echo SITE_ROOT ?>/login.php">Log in</a></li>
                    <li><a href="<?php echo SITE_ROOT ?>/register.php">Register</a></li>
                    <?php } else {
                        ?>
                    <li><a href="<?php echo SITE_ROOT ?>/account.php">Account</a></li>
                    <li><a href="<?php echo SITE_ROOT ?>/logout.php">Log out</a></li>
                    <?php } 
                    if (is_admin()) {
                        ?>
                    <li><a href="<?php echo SITE_ROOT ?>/admin.php">Admin</a></li>
                    <?php } ?>
                </ul>
            </div>
        <?php
    }

    function print_notification($string) {
        printf('<div class="notification">' . $string . '</div>');
    }

    function print_error($string) {
        printf('<div class="error">' . $string . '</div>');
    }

?>
