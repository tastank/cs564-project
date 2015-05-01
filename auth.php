<?php
    include(__DIR__."/conf.php");

    if (!isset($_POST['pilot']) || !isset($_POST['aircraft']) || !isset($_POST['auth_type'])) {
        $_POST['auth_err'] = "Something is horribly wrong, or you've forgotten to set a field.";
        header('Location: '.SITE_ROOT.'/index.php');
    }
    $pilot = $_POST['pilot'];
    $aircraft = $_POST['aircraft'];
    $auth_type = $_POST['auth_type'];
    if ($auth_type == 'add') {
        authorize_pilot($pilot, $aircraft);
    } else {
        //this shouldn't just be a parameter, because we may want to do other things when a pilot is de-auth'd.
        deauthorize_pilot($pilot, $aircraft);
    }

?>
