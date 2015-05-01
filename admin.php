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

    //placeholder
    function get_all_usernames() {
        $users = array();
        array_push($users, "tstank");
        array_push($users, "tyler");
        array_push($users, "asdf");
        return $users;
    }

    //also placeholder
    function get_all_reg_numbers() {
        $numbers = array();
        array_push($numbers, "N91HL");
        array_push($numbers, "N6146Q");
        array_push($numbers, "N95787");
        array_push($numbers, "N49439");
        return $numbers;
    }

    //Authorize a rental
    $users = get_all_usernames();
    $reg_numbers = get_all_reg_numbers();

    $user_dropdown = "";
    $aircraft_dropdown = "";
    foreach ($users as $user) {
		$user_dropdown .= '<option value="' . $user . '">' . $user . '</option>';
    }

    foreach ($reg_numbers as $reg_num) {
		$aircraft_dropdown .= '<option value="' . $reg_num . '">' . $reg_num . '</option>';
    }

    ?>

    <h2> Authorize or deauthorize renters </h2>
    <form method="POST" action="auth.php">
	<span> User: </span><select id="pilot"><?php echo $user_dropdown?></select>
	<span> Aircraft: </span><select id="pilot"><?php echo $aircraft_dropdown?></select><br />
    <input type="radio" name="auth_type" value="add" />Authorize<br />
    <input type="radio" name="auth_type" value="remove" />Deauthorize<br />
    <input type="submit" name="submit" value="Submit" />
    </form>

<?php
    page_footer();
?>
