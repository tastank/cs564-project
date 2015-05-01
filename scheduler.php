<?php
    include(__DIR__."/conf.php");
    include(__DIR__."/layout/main.php");
    include_once(__DIR__."/layout/page.php");

    page_header("Project root");
    print_menu();

//TODO: There should be a dropdown menu for resources (aircraft) and a list of
//  current reservations for the currently selected resource, as well as a form
//  allowing users to reserve the resource

    page_footer();
?>
