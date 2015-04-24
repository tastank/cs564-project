<?php

    function is_logged_in() {
        return isset($_SESSION['username']);
    }

    function get_password_from_db($username) {
        global $db;
        $password_query = "SELECT password FROM Pilot WHERE username='" . $username . "';";
        $result = $db->query($password_query);
        if (!$result || $result->num_rows != 1) {
            return false;
        }
        return $result->fetch_assoc()['password'];
    }

?>
