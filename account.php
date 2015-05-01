<?php
    include(__DIR__."/conf.php");
    include(__DIR__."/layout/main.php");
    include_once(__DIR__."/layout/page.php");

    page_header("Account");
    
    $form_name = get_name();
    $form_phone = get_phone();
    $form_address = get_address();
    //$form_password = "";
    
    print_menu();

//TODO: This is where the user can update their personal information (name,
//  phone, address, password,

    //update phone number    
?>


    
    
    Enter new account details
    <form method="POST" action="./account.php">
     <!--TODO: use a table or some css to make the form look nicer-->
     Name: <input type="text" name="name" value="<?php echo $form_name ?>"/><br />
     Phone: <input type="text" name="phone" value="<?php echo $form_phone ?>"/><br />
     Address: <input type="text" name="address" value="<?php echo $form_address ?>"/><br />
     <input type="submit" name="submit" value="Submit" />
     </form>
     
<!-- 
     Separate these into different forms.
     TODO: Add password modification
 -->
    
<?php
    page_footer();
?>
