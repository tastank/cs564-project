<!DOCTYPE html>
<?php
//Author: Phonaputer
//Date: May 1st 2015
include_once(__DIR__."/conf.php");
include_once(__DIR__."/layout/main.php");
include_once(__DIR__."/layout/page.php");
include_once(__DIR__."/db/scheduler.php");
include_once(__DIR__."/db/aircraft.php");

if (!is_logged_in()) {
    header('Location: '.SITE_ROOT.'/login.php');
}

page_header("Scheduler");
print_menu();

$username = get_username();
?>

<?php //If there was a post
	//IF THERE WAS A POST TO THE PAGE WE MUST CREATE A RESERVATION
	if(isset($_POST['startYear'])){
		$startTime = $_POST['startYear'].'-'.$_POST['startMonth'].'-'.$_POST['startDay'].' ';
		$startTime .= $_POST['startHour'].':00:00';
		$startTime = date('Y-m-d H:i:s', strtotime($startTime));
	
		$endTime = $_POST['endYear'].'-'.$_POST['endMonth'].'-'.$_POST['endDay'].' ';
		$endTime .= $_POST['endHour'].':00:00';
		$endTime = date('Y-m-d H:i:s', strtotime($endTime));
		
		$success = make_reservation($_POST['airplane'], $username, $startTime, $endTime);
	}
?>

<h1>Reserve a time:</h1>
<?php //dropdowns for reservations
	/////////////////////////////VARIABLE DECLARATIONS/////////////////////////
	$dropdownPlane = "";
	$dropdownDay = "";
	$dropdownMonth = "";
	$dropdownYear = "";
	$dropdownHour = "";
	
	////////////////////////////DATE TIME DROPDOWNS////////////////////////////
	//Day Dropdown:
	$date = 1;
	while($date <= 31){
		$dropdownDay .= '<option value="' . $date . '">' . $date . '</option>';
		$date = $date + 1;
	}
	//Month Dropdown
	$date = 1;
	while($date <= 12){
		$dropdownMonth .= '<option value="' . $date . '">' . $date . '</option>';
		$date = $date + 1;
	}
	//Year Dropdown
	$date = 2015;
	while($date <= 2025){
		$dropdownYear .= '<option value="' . $date . '">' . $date . '</option>';
		$date = $date + 1;
	}
	//Hour Dropdown
	$date = 0;
	while($date <= 23){
		$dropdownHour .= '<option value="' . $date . '">' . $date . '</option>';
		$date = $date + 1;
	}
	
	////////////////////////////////AIRPLANE DROPDOWN//////////////////////////
	$aircraftInfo = get_aircraft_information($username);
	
	foreach($aircraftInfo as $apln){
		$dropdownPlane .= '<option value="' .$apln->reg_number. '">';
		$dropdownPlane .= $apln->reg_number. ' (Cost: $' .  $apln->cost . '/hr)</option>';
	}
	
	///////////////////////////////ECHO DROPDOWNS//////////////////////////////
	echo('<form action="./scheduler.php" method="POST">');
	echo('<span><b>Aircraft:</b></span><br><select name="airplane">'.$dropdownPlane.'</select>');
	echo('<br><span><b>Start Time:</b></span><br>');
	echo('<span> Day: </span><select name="startDay">'.$dropdownDay.'</select>');
	echo('<span> Month: </span><select name="startMonth">'.$dropdownMonth.'</select>');
	echo('<span> Year: </span><select name="startYear">'.$dropdownYear.'</select>');
	echo('<span> Hour: </span><select name="startHour">'.$dropdownHour.'<select>');
	echo('<br><span><b>End Time:</b></span><br>');
	echo('<span> Day: </span><select name="endDay">'.$dropdownDay.'</select>');
	echo('<span> Month: </span><select name="endMonth">'.$dropdownMonth.'</select>');
	echo('<span> Year: </span><select name="endYear">'.$dropdownYear.'</select>');
	echo('<span> Hour: </span><select name="endHour">'.$dropdownHour.'</select>');
	echo('<br><br><input type="submit" value="Submit">');
	echo('</form>');
?>

<h1>Currently reserved times:</h1>
<?php //table of current reservations
	$currentReservations = get_reservation_information();
	$table = '<table class="theTable">';
	$table .= '<tr><th>Registration Number</th><th>Username</th><th>Start Time</th><th>End Time</th></tr>';
	foreach($currentReservations as $res){
			$table .= '<tr>';
			$table .= '<td>'.$res->reg_number.'</td>';
			$table .= '<td>'.$res->username.'</td>';
			$table .= '<td>'.$res->start.'</td>';
			$table .= '<td>'.$res->end.'</td>';
			$table .= '</tr>';
	}
	$table .= "</table>";
		
	echo($table);
	
	//aggregated total of user's current reservations
	echo("<p>You currently have ");
	echo(number_of_user_reservations($username)[0]);
	echo(" reservations.</p>");
	
	if(isset($success)){
		if($success){
			echo('<br><div class="pass-warning">RESERVATION SUCCESSFUL</div>');
		}else{
			echo('<br><div class="pass-warning">RESERVATION FAILURE</div>');
		}		
	}
?>

<?php
page_footer();
?>
