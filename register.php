<?php
    include_once(__DIR__."/conf.php");
    include(__DIR__."/layout/main.php");
    include_once(__DIR__."/layout/page.php");

    //Allows a user to register

    page_header("Register");

    //placeholder
    function user_exists($username) {
        return false;
    }

    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        if (user_exists($username)) {
            //cannot add duplicate users - display a message to that effect 
        } else {
            //if password doesn't match
            //if password does match
                //if other fields are good
                //  insert user
        }
        //a user is trying to log in
    }

    print_menu();

    printf($login_msg);

?>

<br /><br />
<div class="pass_warning">Do not use a password you would use anywhere else; it will be sent as plaintext.</div>

<form method="POST" action="./register.php">
<!--TODO: use a table or some css to make the form look nicer-->
Name: <input type="text" name="name" /><br />
Phone: <input type="text" name="phone" /><br />
Address: <input type="text" name="address" /><br />
Username: <input type="text" name="username" /><br />
Password: <input type="password" name="password" /><br />
Verify password: <input type="password" name="verify_password" /><br />
<input type="submit" name="submit" value="Submit" />
</form>

<?php
    page_footer();
?>
