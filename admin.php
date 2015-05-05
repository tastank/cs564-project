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
<?php
    if (isset($_SESSION['auth_msg'])) {
        print_notification($_SESSION['auth_msg']);
        unset($_SESSION['auth_msg']);
    }
    if (isset($_SESSION['auth_err'])) {
        print_error( $_SESSION['auth_err']);
        unset($_SESSION['auth_err']);
    }
?>
<form method="POST" action="auth.php">
User: <select name="pilot"><?php echo $user_dropdown?></select>
<span> Aircraft: </span><select name="aircraft"><?php echo $aircraft_dropdown?></select><br />
<input type="radio" name="auth_type" value="add" />Authorize<br />
<input type="radio" name="auth_type" value="remove" />Deauthorize<br />
<input type="submit" name="submit" value="Submit" />
</form>

<br />
<!--Change aircraft records -->
<h2> Change aircraft records </h2>

<?php
    if (isset($_SESSION['aircraft_record_msg'])) {
        print_notification( $_SESSION['aircraft_record_msg']);
        unset($_SESSION['aircraft_record_msg']);
    }
    if (isset($_SESSION['aircraft_record_err'])) {
        print_error( $_SESSION['aircraft_record_err']);
        unset($_SESSION['aircraft_record_err']);
    }
?>

<form method="POST" action="aircraftrecords.php">
Aircraft: <select name="aircraft"><?php echo $aircraft_dropdown?></select><br />
Hourly rental cost: <input type="text" name="cost" /><br />
<input type="submit" name="changerecord" value="Submit" />
<input type="submit" name="delete" value="DELETE THIS AIRPLANE" />
</form>


<br />
<!--Add aircraft records -->
<?php
    $types = get_all_full_type_names();
    $tids = get_all_tids();
    $type_dropdown = "";
    for ($i=0; $i<count($tids); $i++) {
        $type_dropdown .= '<option value="' . $tids[$i] . '">' . $types[$i] . '</option>';
    }
?>

<h2> Add aircraft records </h2>
<?php
    if (isset($_SESSION['aircraft_add_msg'])) {
        print_notification( $_SESSION['aircraft_add_msg']);
        unset($_SESSION['aircraft_add_msg']);
    }
    if (isset($_SESSION['aircraft_add_err'])) {
        print_error( $_SESSION['aircraft_add_err']);
        unset($_SESSION['aircraft_add_err']);
    }
?>

<form method="POST" action="aircraftrecords.php">
Registration number: <input type="text" name="reg_number" /><br />
Type: <select name="type"><?php echo $type_dropdown ?></select><br />
Hourly rental cost: <input type="text" name="cost" /><br />
<input type="submit" name="addrecord" value="Add" />
</form>

<br />
<!--Change type records -->
<?php
    $types = get_all_full_types();
    $tids = get_all_tids();
    $type_dropdown = "";
    for ($i=0; $i<count($tids); $i++) {
        $type_dropdown .= '<option value="' . $tids[$i] . '">' . $types[$i] . '</option>';
    }
?>

<h2> Change type records </h2>
<?php
    if (isset($_SESSION['type_change_msg'])) {
        print_notification( $_SESSION['type_change_msg']);
        unset($_SESSION['type_change_msg']);
    }
    if (isset($_SESSION['type_change_err'])) {
        print_error( $_SESSION['type_change_err']);
        unset($_SESSION['type_change_err']);
    }
?>


<form method="POST" action="typerecords.php">
Type: <select name="type"><?php echo $type_dropdown ?></select><br />
Manufacturer: <input type="text" name="manf" /><br />
Number: <input type="text" name="number" /><br />
Common name: <input type="text" name="common_name" /><br />
Short name: <input type="text" name="short_name" /><br />
<input type="submit" name="change" value="Submit" />
<input type="submit" name="delete" value="DELETE THIS TYPE" />
</form>
<br />

<h2> Add type records </h2>

<?php
    if (isset($_SESSION['type_add_msg'])) {
        print_notification( $_SESSION['type_add_msg']);
        unset($_SESSION['type_add_msg']);
    }
    if (isset($_SESSION['type_add_err'])) {
        print_error( $_SESSION['type_add_err']);
        unset($_SESSION['type_add_err']);
    }
?>

<form method="POST" action="typerecords.php">
Manufacturer: <input type="text" name="manf" /><br />
Number: <input type="text" name="number" /><br />
Common name: <input type="text" name="common_name" /><br />
Short name: <input type="text" name="short_name" /><br />
<input type="submit" name="add" value="Submit" />
</form>

<h2> Change admins </h2>

<?php
    if (isset($_SESSION['admin_chg_msg'])) {
        print_notification( $_SESSION['admin_chg_msg']);
        unset($_SESSION['admin_chg_msg']);
    }
    if (isset($_SESSION['admin_chg_err'])) {
        print_error( $_SESSION['admin_chg_err']);
        unset($_SESSION['admin_chg_err']);
    }
    printf("Current administrators:<br />");
    foreach (get_admins() as $admin) {
        printf(" $admin<br />");
    }
    printf("<br />");
?>

<form method="POST" action="makeadmin.php">
User: <select name="user"><?php echo $user_dropdown?></select><br />
<input type="radio" name="admin_val" value="promote" />Make admin<br />
<input type="radio" name="admin_val" value="demote" />Remove admin<br />
<input type="submit" name="add" value="Submit" />
</form>

<?php
    page_footer();
?>

































