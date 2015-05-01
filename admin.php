<?php
    include(__DIR__."/conf.php");
    include(__DIR__."/layout/main.php");
    include_once(__DIR__."/layout/page.php");

    page_header("Project root");
    print_menu();

     
//TODO: This is where administrator can modify accounts, authorize rentals,
//  add or change aircraft records, and add or change type records

    page_footer();
?>
