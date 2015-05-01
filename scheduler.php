<!DOCTYPE html>
<?php
include(__DIR__."/conf.php");
include(__DIR__."/layout/main.php");
include_once(__DIR__."/layout/page.php");
page_header("Project root");
print_menu();
?>


<?php
	function get_aircraft_information(){
		global $db;
		$aircraftRegNums = array();
		
		$query = "SELECT reg_number FROM Aircraft;";
		if($result = $db->query($query)){
			$tempArray = array();
			
			while($row = $result->fetch_object()) {
					$tempArray = $row;
					array_push($aircraftRegNums, $tempArray);
			}
			echo("<p>fuck</p>");/////////////////////////////////////////////////////
		}
		return $aircraftRegNums;
	}
	
	function get_reservation_information(){
		global $db;
		$reservationInfo = array();
		$query = "SELECT reg_number, start, end";
		$query .= " FROM Rental;";
		
		if($result = $db->query($query)){
			$tempArray = array();
			while($row = $result->fetch_object()) {
					$tempArray = $row;
					array_push($reservationInfo, $tempArray);
			}
		}
		return $reservationInfo;
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
	while($date < 31){
		$dropdownDay = '<option value="' . $date . '">' . $date . '</option>';
		$date = $date + 1;
	}
	//Month Dropdown
	$date = 1;
	while($date < 12){
		$dropdownMonth = '<option value="' . $date . '">' . $date . '</option>';
		$date = $date + 1;
	}
	//Year Dropdown
	$date = 2015;
	while($date < 2025){
		$dropdownYear = '<option value="' . $date . '">' . $date . '</option>';
		$date = $date + 1;
	}
	//Hour Dropdown
	$date = 1;
	while($date < 24){
		$dropdownHour = '<option value="' . $date . '">' . $date . '</option>';
		$date = $date + 1;
	}
	
	////////////////////////////////AIRPLANE DROPDOWN//////////////////////////
	$aircraftInfo = get_aircraft_information();
	
	echo($aircraftInfo[1]);
	
	//var_dump($aircraftInfo);
	
	
	///////////////////////////////ECHO DROPDOWNS//////////////////////////////
	echo('<select id="airplane">'.$dropdownPlane.'</select>');
	echo('<select id="startDay">'.$dropdownDay.'</select>');
	echo('<select id="startMonth">'.$dropdownMonth.'</select>');
	echo('<select id="startYear">'.$dropdownYear.'</select>');
	echo('<select id="startHour">'.$dropdownHour.'<select>');
	echo('<select id="endDay">'.$dropdownDay.'</select>');
	echo('<select id="endMonth">'.$dropdownMonth.'</select>');
	echo('<select id="endYear">'.$dropdownYear.'</select>');
	echo('<select id="endHour">'.$dropdownHour.'<select>');
?>

<h1>Currently reserved times:</h1>
<?php//table of current reservations
	$currentReservations = get_reservation_information();
?>


<?php
page_footer();
?>