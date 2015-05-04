<?php
//Author: Phonaputer
//Date: May 1st 2015
	function get_aircraft_information($username){
		global $db;
		$aircraftRegNums = array();
		
		$query = "SELECT Aircraft.reg_number";
		$query .= " FROM Aircraft, can_rent";
		$query .= " WHERE (Aircraft.reg_number = can_rent.reg_number)";
		$query .= " AND (can_rent.username ='".$username."');";
		
		if($result = $db->query($query)){
			$tempArray = array();
			
			while($row = $result->fetch_object()) {
					$tempArray = $row;
					array_push($aircraftRegNums, $tempArray);
			}
		}
		return $aircraftRegNums;
	}
	
	function get_reservation_information(){
		global $db;
		$reservationInfo = array();
		$query = "SELECT reg_number, username, start, end";
		$query .= " FROM Rental ORDER BY start;";
		
		if($result = $db->query($query)){
			$tempArray = array();
			while($row = $result->fetch_object()) {
					$tempArray = $row;
					array_push($reservationInfo, $tempArray);
			}
		}
		return $reservationInfo;
	}
	
	function make_reservation($regNum, $username, $start, $end){
		if(strlen($regNum) < 1){
			return false;
		}
		$startDT = new DateTime($start);
		$endDT =  new DateTime($end);
		if($endDT <= $startDT){
			return false;
		}
		
		global $db;
		$query = "INSERT INTO Rental (start, end, username, reg_number) VALUES";
		$query .= " ('".$start."', '".$end."', '".$username."', '".$regNum."');";
		
		if($db->query($query)){
			//query successful
			return true;
		}
		
		//query unsuccessful
		return false;
	}
	
	function number_of_user_reservations($username){
		global $db;
		$query = "SELECT COUNT(*)";
		$query .= " FROM Rental WHERE username='".$username."';";
		
		if($result = $db->query($query)){
			return $result->fetch_array(MYSQLI_NUM);
		}
	}
?>
