<?php
    include_once(__DIR__."/conf.php");
    //I said I wouldn't do this, but I can't think of how else to best organize stuff
    include_once(__DIR__."/db/types.php");

    //change this condition
    /*if (!isset($_POST['aircraft']) || (!isset($_POST['cost']) && !isset($_POST['delete']))) {
        $_SESSION['record_err'] = "Something is horribly wrong, or you've forgotten to set a field.";
        // Can safely do this, as the admin page will redirect to login if not admin
        header('Location: '.SITE_ROOT.'/admin.php');
    }*/
    if (isset($_POST['delete'])) {
        $tid = $_POST['tid'];
        if (delete_type($tid)) {
            $_SESSION['type_record_msg'] = "Deletion successful";
        } else {
            $_SESSION['type_record_err'] = "Deletion unsuccessful";
        }
    }
    if (isset($_POST['change'])) {
        $tid = $_POST['tid'];
        $error = false;
        if (isset($_POST['manf'])) {
            if (!set_manf($tid, $_POST['manf'])) {
                $error = true;
            }
        }
        if (isset($_POST['number'])) {
            if (!set_number($tid, $_POST['number'])) {
                $error = true;
            }
        }
        if (isset($_POST['common_name'])) {
            if ($_POST['common_name'] == "NULL") {
                $_POST['common_name'] = NULL;
            }
            if (!set_common_name($tid, $_POST['common_name'])) {
                $error = true;
            }
        }
        if (isset($_POST['short_name'])) {
            if (!set_short_name($tid, $_POST['short_name'])) {
                $error = true;
            }
        }
        if ($error) {
            $_SESSION['type_record_err'] = "Update unsuccessful";
        } else {
            $_SESSION['type_record_msg'] = "Update successful";
        }
    }
    if (isset($_POST['add'])) {
        $manf = $_POST['manf'];
        $number = $_POST['number'];
        $common_name = $_POST['common_name'];
        $short_name = $_POST['short_name'];
        if (add_type($manf, $number, $common_name, $short_name)) {
            $_SESSION['type_add_msg'] = "Addition successful";
        } else {
            $_SESSION['type_add_err'] = "Addition unsuccessful";
        }
    }
    header('Location: '.SITE_ROOT.'/admin.php');
?>


















