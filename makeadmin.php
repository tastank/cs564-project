<?php
    include_once(__DIR__."/conf.php");
    //I said I wouldn't do this, but I can't think of how else to best organize stuff
    include_once(__DIR__."/db/aircraft.php");

    if (!isset($_POST['admin_val'])) {
        header('Location: '.SITE_ROOT.'/admin.php');
    }

    if ($_POST['admin_val'] == 'promote') {
        if (make_admin($_POST['user'])) {
            $_SESSION['admin_chg_msg'] = "Promotion successful";
        } else {
            $_SESSION['admin_chg_err'] = "Promotion unsuccessful";
        }
    } else {
        if (remove_admin($_POST['user'])) {
            $_SESSION['admin_chg_msg'] = "Demotion successful";
        } else {
            $_SESSION['admin_chg_err'] = "Demotion unsuccessful";
        }
    }

    header('Location: '.SITE_ROOT.'/admin.php');
/*
<form method="POST" action="makeadmin.php">
User: <select name="user"><?php echo $user_dropdown?></select>
<input type="radio" name="auth_type" value="promote" />Make admin<br />
<input type="radio" name="auth_type" value="demote" />Remove admin<br />
<input type="submit" name="add" value="Submit" />
</form>
*/
?>
