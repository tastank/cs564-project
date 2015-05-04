<?php
    include_once(__DIR__."/db.php");

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

    function delete_type($tid) {
        // Should probably also delete all aircraft of that type.  But...
        global $db;
        $tid = $db->real_escape_string($tid);
        $delete_query = "DELETE FROM Type WHERE tid=" . $tid . ";";

        return $db->query($delete_query);
    }

    function add_type($manf, $number, $common_name, $short_name) {
        global $db;
        $manf = $db->real_escape_string($manf);
        $number = $db->real_escape_string($number);
        $common_name = $db->real_escape_string($common_name);
        $short_name = $db->real_escape_string($short_name);

        $add_query = "INSERT INTO Type (manf, number, common_name, short_name) VALUES (" .
            "'" . $manf . "', " .
            "'" . $number . "', " .
            "'" . $common_name . "', " . 
            "'" . $short_name . "');";

        //this should be either true or false
        return $db->query($add_query);
    }

    function set_manf($tid, $manf) {
        global $db;
        $manf = $db->real_escape_string($manf);
        $set_query = "UPDATE Type SET manf='" . $manf . "' WHERE tid='" . $tid . "';";

        return $db->query($set_query);
    }

    function set_number($tid, $number) {
        global $db;
        $manf = $db->real_escape_string($number);
        $set_query = "UPDATE Type SET number='" . $number . "' WHERE tid='" . $tid . "';";

        return $db->query($set_query);
    }

    function set_common_name($tid, $common_name) {
        global $db;
        $manf = $db->real_escape_string($common_name);
        $set_query = "UPDATE Type SET common_name='" . $common_name . "' WHERE tid='" . $tid . "';";

        return $db->query($set_query);
    }

    function set_short_name($tid, $short_name) {
        global $db;
        $manf = $db->real_escape_string($short_name);
        $set_query = "UPDATE Type SET short_name='" . $short_name . "' WHERE tid='" . $tid . "';";

        return $db->query($set_query);
    }

?>
