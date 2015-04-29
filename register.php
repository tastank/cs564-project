<?php
    include_once(__DIR__."/conf.php");
    include(__DIR__."/layout/main.php");
    include_once(__DIR__."/layout/page.php");

    //Allows a user to register

    page_header("Register");

    $register_msg = "";

    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $username = mysqli_real_escape_string($username);
        if (user_exists($username)) {
            //cannot add duplicate users - display a message to that effect 
            register_msg = "User already exists - choose a different username.";
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
                register_msg = "Password does not match verification; try again.";
            //if password does match
            } else {
                //should verify other fields, but I'm lazy
                $name = mysqli_real_escape_string($name);
                $phone = mysqli_real_escape_string($phone);
                $address = mysqli_real_escape_string($address);
                //  insert user
                create_user($username, $password, $name, $phone, $address);
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
Name: <input type="text" name="name" /><br />
Phone: <input type="text" name="phone" /><br />
Address: <input type="text" name="address" /><br />
Username: <input type="text" name="username" /><br />
Password: <input type="password" name="password" /><br />
Verify password: <input type="password" name="verify_pw" /><br />
<input type="submit" name="submit" value="Submit" />
</form>

<?php
    page_footer();
?>
