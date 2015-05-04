<!DOCTYPE html>
<?php
    include_once(__DIR__."/conf.php");
    include_once(__DIR__."/layout/main.php");
    include_once(__DIR__."/layout/page.php");
    page_header("Account");
    print_menu();
    
?>

Change your basic account settings here: <br>

<?php
    
    $username = get_username();
    $form_name = get_name();
    $form_phone = get_phone();
    $form_address = get_address();
    $password = get_password_from_DB($username);
    
    $status_msg = "";

    //if user enters new info
    //change the database.
    if (!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['address']) ) {
          $name = $_POST['name'];
          $phone = $_POST['phone'];
          $address = $_POST['address'];
          if (update_account($password, $name, $phone, $address)) {
               $status_msg = "Account updated!";
               $form_name = get_name();
               $form_phone = get_phone();
               $form_address = get_address();
          } else {
               $status_msg = "Something's wrong. It's not me. It's you as a person.\n";
          }
    } else {
          //if they don't enter all the info, then fuck them. No excuses.
          $status_msg = "All fields are required.";
    }
    
    printf($status_msg);
?>

    <form method="POST" action="./account.php">
     <!--TODO: use a table or some css to make the form look nicer-->
     Name: <input type="text" name="name" value="<?php echo $form_name ?>"/><br />
     <br>
     Phone: <input type="text" name="phone" value="<?php echo $form_phone ?>"/><br />
     <br>
     Address: <input type="text" name="address" value="<?php echo $form_address ?>"/><br />
     <br>
     <input type="submit" name="submit" value="Save Changes" />
     </form>
    
<?php
    page_footer();
?>
