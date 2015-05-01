<?php
    include(__DIR__."/conf.php");
    include(__DIR__."/layout/main.php");
    include_once(__DIR__."/layout/page.php");

    page_header("Project root");
    print_menu();

//TODO: This is where the user can update their personal information (name,
//  phone, address, password, username

    page_footer();
?>
