<?php include(__DIR__."/conf.php"); ?>
<link rel="stylesheet" href="<?php echo SITE_ROOT ?>/conf/style_main.css" type="text/css" media="all" />


<?php

    function print_menu() {
        ?>
            <div id="horiz_navbar">
                <ul>
                    <li><a href="">View flights</a></li>
                    <li><a href="">Scheduler</a></li>
                    <li><a href="">Log in</a></li>
                </ul>
            </div>
        <?php
    }

?>
