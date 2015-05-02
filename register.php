<?php
    include_once(__DIR__."/conf.php");
    include(__DIR__."/layout/main.php");
    include_once(__DIR__."/layout/page.php");

    //Allows a user to register

    page_header("Register");

    $register_msg = "";
    $form_name = "";
    $form_phone = "";
    $form_address = "";
    $form_username = "";

    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        if (user_exists($username)) {
            //cannot add duplicate users - display a message to that effect 
            $register_msg = "User already exists - choose a different username.";
            // use this to 
            $form_name = $_POST['name'];
            $form_phone = $_POST['phone'];
            $form_address = $_POST['address'];
        } else {
            //Put all of $_POST in local variables to make it easier to work with
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $verify_pw = $_POST['verify_pw'];
            //if password doesn't match
            if ($password != $verify_pw) {
                $register_msg = "Password does not match verification; try again.";
                $form_name = $name;
                $form_phone = $phone;
                $form_address = $address;
                $form_username = $username;
                //if password does match
            } else {
                // verify no field is empty
                if (!isset($name) || !isset($phone) || !isset($address) || !isset($username) || !isset($password)) {
                    $register_msg = "All fields are required.";
                } else if (create_user($username, $password, $name, $phone, $address)) {
                    $register_msg = "Account successfully created.";
                } else {
                    $register_msg = "Couldn't create account for some reason.  Could you be trying a SQL injection attack?  If not, contact sysadmin.";
                }
            }
        }
    }

    print_menu();

    printf($register_msg);

?>

<br /><br />
<div class="pass_warning">Do not use a password you would use anywhere else; it will be sent as plaintext.</div>

<form method="POST" action="./register.php">
<!--TODO: use a table or some css to make the form look nicer-->
Name: <input type="text" name="name" value="<?php echo $form_name ?>"/><br />
Phone: <input type="text" name="phone" value="<?php echo $form_phone ?>"/><br />
Address: <input type="text" name="address" value="<?php echo $form_address ?>"/><br />
Username: <input type="text" name="username" value="<?php echo $form_username ?>"/><br />
Password: <input type="password" name="password" /><br />
Verify password: <input type="password" name="verify_pw" /><br />
<input type="submit" name="submit" value="Submit" />
</form>

<?php
    page_footer();
?>
