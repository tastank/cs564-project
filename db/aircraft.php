<?php
    include_once(__DIR__."/db.php");

    function get_all_reg_numbers() {
        global $db;
        $reg_number_query = "SELECT reg_number FROM Aircraft";
        $result = $db->query($reg_number_query);
        if ($result === false) {
            return null;
        }
        $reg_numbers = array();
        while ($row = $result->fetch_assoc()) {
            array_push($reg_numbers, $row['reg_number']);
        }
        $result->close();
        return $reg_numbers;
    }

    function delete_record($reg_number) {
        // Should not only delete from aircraft
        // Should also delete authorizations (can_rent) and scheduled rentals
        global $db;
        $reg_number = $db->real_escape_string($reg_number);
        $delete_aircraft_query = "DELETE FROM Aircraft WHERE reg_number='" . $reg_number . "';";
        $delete_rentals_query = "DELETE FROM Rental WHERE reg_number='" . $reg_number . "';";
        $delete_auth_query = "DELETE FROM can_rent WHERE reg_number='" . $reg_number . "';";

        if ($db->query($delete_aircraft_query) === false) {
            return false;
        }

        if ($db->query($delete_rentals_query) === false) {
            return false;
        }

        if ($db->query($delete_auth_query) === false) {
            return false;
        }

        return true;
    }

    function update_cost($reg_number, $cost) {
        global $db;
        $reg_number = $db->real_escape_string($reg_number);
        $cost = $db->real_escape_string($cost);

        $cost_query = "UPDATE Aircraft SET cost=" . $cost . " WHERE reg_number ='" . $reg_number . "';";

        //this should be either true or false
        return $db->query($cost_query);
    }


?>
