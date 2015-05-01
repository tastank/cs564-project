<?php

    function is_logged_in() {
        return isset($_SESSION['username']);
    }

    function get_username() {
        return $_SESSION['username']);
    }

    function is_admin() {
        global $db;
        $username = $db->real_escape_string($username);
        $password_query = "SELECT is_admin FROM Pilot WHERE username='" . $username . "';";
        $result = $db->query($password_query);
        if (!$result || $result->num_rows != 1) {
            return false;
        }
        $is_admin = $result->fetch_assoc()['is_admin'];
        $result->close();
        return $is_admin;
    }

    function get_password_from_db($username) {
        global $db;
        $username = $db->real_escape_string($username);
        $password_query = "SELECT password FROM Pilot WHERE username='" . $username . "';";
        $result = $db->query($password_query);
        if (!$result || $result->num_rows != 1) {
            return false;
        }
        $password = $result->fetch_assoc()['password'];
        $result->close();
        return $password;
    }

    function user_exists($username) {
        global $db;
        $username = $db->real_escape_string($username);
        $username_query = "SELECT name FROM Pilot WHERE username='" . $username . "';";
        $result = $db->query($username_query);
        if ($result === false) {
            return false;
        } else if ($result->num_rows != 0) {
            $result->close();
            return true;
        } else {
            $result->close();
            return false;
        }
    }

    function create_user($username, $password, $name, $phone, $address) {
        global $db;
        $password = password_hash($password, PASSWORD_BCRYPT);
        $username = $db->real_escape_string($username);
        $name = $db->real_escape_string($name);
        $phone = $db->real_escape_string($phone);
        $address = $db->real_escape_string($address);
        $password = $db->real_escape_string($password);
        $create_user_query = "INSERT INTO Pilot (username, name, phone, address, password) VALUES (" .
            "'" . $username . "', " .
            "'" . $name . "', " .
            "'" . $phone . "', " .
            "'" . $address . "', " .
            "'" . $password . "'" .
            ");";

        if ($db->query($create_user_query) === true) {
            return true;
        } else {
            return false;
        }
    }

?>
