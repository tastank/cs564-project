<?php
    include_once(__DIR__."/conf.php");
    //I said I wouldn't do this, but I can't think of how else to best organize stuff
    include_once(__DIR__."/db/type.php");

    if (isset($_POST['delete'])) {
        $tid = $_POST['type'];
        if (delete_type($tid)) {
            $_SESSION['type_change_msg'] = "Deletion successful";
        } else {
            $_SESSION['type_change_err'] = "Deletion unsuccessful";
        }
    }

    if (isset($_POST['change'])) {
        $tid = $_POST['type'];
        $error = false;
        if ($_POST['manf'] != "") {
            if (!set_manf($tid, $_POST['manf'])) {
                $error = true;
            }
        }
        if ($_POST['number'] != "") {
            if (!set_number($tid, $_POST['number'])) {
                $error = true;
            }
        }
        if ($_POST['common_name'] != "") {
            if ($_POST['common_name'] == "NULL") {
                $_POST['common_name'] = NULL;
            }
            if (!set_common_name($tid, $_POST['common_name'])) {
                $error = true;
            }
        }
        if ($_POST['short_name'] != "") {
            if (!set_short_name($tid, $_POST['short_name'])) {
                $error = true;
            }
        }
        if ($error) {
            $_SESSION['type_change_err'] .= "Update unsuccessful";
        } else {
            $_SESSION['type_change_msg'] .= "Update successful";
        }
    }
    if (isset($_POST['add'])) {
        $manf = $_POST['manf'];
        $number = $_POST['number'];
        $common_name = $_POST['common_name'];
        $short_name = $_POST['short_name'];
        if ($manf == "" || $short_name == "" || ($number == "" && $common_name == "")) {
            $_SESSION['type_add_err'] = "Types require a manufacturer, short name, and number or common name.";
        } else if (add_type($manf, $number, $common_name, $short_name)) {
            $_SESSION['type_add_msg'] = "Addition successful";
        } else {
            $_SESSION['type_add_err'] = "Addition unsuccessful";
        }
    }
    header('Location: '.SITE_ROOT.'/admin.php');
?>


















