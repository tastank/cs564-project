<?php

    function is_logged_in() {
        return isset($_SESSION['username']);
    }

    function get_username() {
        if (!is_logged_in()) {
            return null;
        }
        return $_SESSION['username'];
    }
    
    function get_name() {
        global $db;
        if (!is_logged_in()) {
            return null;
        }
        $username = get_username();
        $name_query = "SELECT name FROM Pilot WHERE username='" . $username . "';";
        $result = $db->query($name_query);
        $name = $result->fetch_assoc()['name'];
        $result->close();
        return $name;
        
    }
    
    function get_phone() {
        global $db;
        if (!is_logged_in()) {
            return null;
        }
        $username = get_username();
        $phone_query = "SELECT phone FROM Pilot WHERE username='" . $username . "';";
        $result = $db->query($phone_query);
        $phone = $result->fetch_assoc()['phone'];
        $result->close();
        return $phone;
    }
    
    function get_address() {
        global $db;
        if (!is_logged_in()) {
            return null;
        }
        $username = get_username();
        $address_query = "SELECT address FROM Pilot WHERE username='" . $username . "';";
        $result = $db->query($address_query);
        $address = $result->fetch_assoc()['address'];
        $result->close();
        return $address;
    }

    function is_admin() {
        global $db;
        $username = get_username();
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
