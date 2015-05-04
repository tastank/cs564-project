<?php
    include_once(__DIR__."/db.php");
    function authorize_pilot($pilot, $aircraft) {
        global $db;
        $pilot    = $db->real_escape_string($pilot);
        $aircraft = $db->real_escape_string($aircraft);

        //prevent duplicates
        $find_query = "SELECT * FROM can_rent WHERE username='" . $pilot . "' AND reg_number='" . $aircraft . "';";
        $result = $db->query($find_query);
        if ($result === false || $result->num_rows != 0) {
            return;
        }
        $result->close();
        $add_query = "INSERT INTO can_rent (username, reg_number) VALUES ('" . $pilot . "', '" . $aircraft . "');";
        $result = $db->query($add_query);
        if ($result === false) {
            return false;
        }
        return true;
    }

    function deauthorize_pilot($pilot, $aircraft) {
        global $db;
        $pilot    = $db->real_escape_string($pilot);
        $aircraft = $db->real_escape_string($aircraft);

        //prevent duplicates
        $find_query = "SELECT * FROM can_rent WHERE username='" . $pilot . "' AND reg_number='" . $aircraft . "';";
        $result = $db->query($find_query);
        if ($result === false || $result->num_rows != 0) {
            return "Pilot was not authorized in the first place";
        }
        $result->close();
        $remove_query = "DELETE FROM can_rent WHERE username='" . $pilot . "' AND reg_number='" . $aircraft . "';";
        $result = $db->query($remove_query);
        if ($result === false) {
            return false;
        }
        return true;
    }

?>
