<?php
    include(__DIR__."/conf.php");
    include(__DIR__."/layout/main.php");
    include_once(__DIR__."/layout/page.php");

    //Don't display if not logged in or not admin!
    if (!is_logged_in() || !is_admin()) {
        header('Location: '.SITE_ROOT.'/index.php');
    }

    page_header("Project root");
    print_menu();

//TODO: This is where administrator can modify accounts, authorize rentals,
//  add or change aircraft records, and add or change type records

    page_footer();
?>
