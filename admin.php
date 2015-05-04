<?php
    include(__DIR__."/conf.php");
    include(__DIR__."/layout/main.php");
    include_once(__DIR__."/layout/page.php");
    include_once(__DIR__."/db/aircraft.php");

    //Don't display if not logged in or not admin!
    if (!is_logged_in() || !is_admin()) {
        header('Location: '.SITE_ROOT.'/index.php');
    }

    page_header("Project root");
    print_menu();

     
//TODO: This is where administrator can modify accounts, authorize rentals,
//  add or change aircraft records, and add or change type records

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
User: <select name="pilot"><?php echo $user_dropdown?></select>
<span> Aircraft: </span><select name="aircraft"><?php echo $aircraft_dropdown?></select><br />
<input type="radio" name="auth_type" value="add" />Authorize<br />
<input type="radio" name="auth_type" value="remove" />Deauthorize<br />
<input type="submit" name="submit" value="Submit" />
</form>

<?php
    //change aircraft records

?>

<h2> Change aircraft records </h2>
<form method="POST" action="aircraftrecords.php">
Aircraft: <select name="aircraft"><?php echo $aircraft_dropdown?></select><br />
Hourly rental cost: <input type="text" name="cost" /><br />
<input type="submit" name="delete" value="DELETE THIS AIRPLANE" />
<input type="submit" name="submit" value="Submit" />
</form>


<?php
    page_footer();
?>
