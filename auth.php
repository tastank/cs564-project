<?php
    include_once(__DIR__."/conf.php");
    //I said I wouldn't do this, but I can't think of how else to best organize stuff
    include_once(__DIR__."/db/auth.php");

    if (!isset($_POST['pilot']) || !isset($_POST['aircraft']) || !isset($_POST['auth_type'])) {
        $_POST['auth_err'] = "Something is horribly wrong, or you've forgotten to set a field.";
        // Can safely do this, as the admin page will redirect to login if not admin
        header('Location: '.SITE_ROOT.'/admin.php');
    }
    $pilot = $_POST['pilot'];
    $aircraft = $_POST['aircraft'];
    $auth_type = $_POST['auth_type'];
    if ($auth_type == 'add') {
        if (authorize_pilot($pilot, $aircraft)) {
            $_POST['auth_msg'] = "Authorization successful";
        } else {
            $_POST['auth_err'] = "Authorization unsuccessful";
        }
    } else {
        //this shouldn't just be a parameter, because we may want to do other things when a pilot is de-auth'd.
        if (deauthorize_pilot($pilot, $aircraft)) {
            $_POST['auth_msg'] = "Deauthorization successful";
        } else {
            $_POST['auth_err'] = "Deauthorization unsuccessful";
        }
    }

?>
