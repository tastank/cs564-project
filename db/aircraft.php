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
            array_push($reg_numbers, $row['username']);
        }
        return $reg_numbers;
    }

?>
