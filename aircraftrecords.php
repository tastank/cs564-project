<?php
    include_once(__DIR__."/conf.php");
    //I said I wouldn't do this, but I can't think of how else to best organize stuff
    include_once(__DIR__."/db/aircraft.php");

    //change this condition
    /*if (!isset($_POST['aircraft']) || (!isset($_POST['cost']) && !isset($_POST['delete']))) {
        $_SESSION['record_err'] = "Something is horribly wrong, or you've forgotten to set a field.";
        // Can safely do this, as the admin page will redirect to login if not admin
        header('Location: '.SITE_ROOT.'/admin.php');
    }*/
    if (isset($_POST['delete'])) {
        $aircraft = $_POST['aircraft'];
        if (delete_record($aircraft)) {
            $_SESSION['record_msg'] = "Deletion successful";
        } else {
            $_SESSION['record_err'] = "Deletion unsuccessful";
        }
    }
    if (isset($_POST['changerecord'])) {
        $aircraft = $_POST['aircraft'];
        if (delete_record($aircraft)) {
            $cost = $_POST['cost'];
            if (update_cost($aircraft, $cost)) {
                $_SESSION['record_msg'] = "Update successful";
            } else {
                $_SESSION['record_err'] = "Update unsuccessful";
            }
        }
    }
    if (isset($_POST['addrecord'])) {
        $reg_number = $_POST['reg_number'];
        $tid = $_POST['type'];
        $cost = $_POST['cost'];
        if (add_aircraft($reg_number, $cost, $tid)) {
            $_SESSION['add_msg'] = "Addition successful";
        } else {
            $_SESSION['add_err'] = "Addition unsuccessful";
        }
    }
    header('Location: '.SITE_ROOT.'/admin.php');
?>
