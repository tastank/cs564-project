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

    function get_all_full_types() {
        global $db;
        $type_query = "SELECT manf, number, common_name, short_name FROM Type";
        $result = $db->query($type_query);
        if ($result === false) {
            return null;
        }
        $types = array();
        while ($row = $result->fetch_assoc()) {
            array_push($types, $row['manf'] . " " . $row['number'] . " " . $row['common_name'] . " (" . $row['short_name'] . ")");
        }
        $result->close();
        return $types;
    }

    function get_all_full_type_names() {
        global $db;
        $type_query = "SELECT manf, number, common_name FROM Type";
        $result = $db->query($type_query);
        if ($result === false) {
            return null;
        }
        $types = array();
        while ($row = $result->fetch_assoc()) {
            array_push($types, $row['manf'] . " " . $row['number'] . " " . $row['common_name']);
        }
        $result->close();
        return $types;
    }

    function get_all_tids() {
        global $db;
        $tid_query = "SELECT tid FROM Type";
        $result = $db->query($tid_query);
        if ($result === false) {
            return null;
        }
        $tids = array();
        while ($row = $result->fetch_assoc()) {
            array_push($tids, $row['tid']);
        }
        $result->close();
        return $tids;
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

    function add_aircraft($reg_number, $cost, $tid) {
        global $db;
        $reg_number = $db->real_escape_string($reg_number);
        $cost = $db->real_escape_string($cost);
        $tid = $db->real_escape_string($tid);

        $add_query = "INSERT INTO Aircraft (reg_number, cost, tid) VALUES (" .
            "'" . $reg_number . "', " .
            $cost . ", " .
            $tid . ");";

        //this should be either true or false
        return $db->query($add_query);
    }


?>
