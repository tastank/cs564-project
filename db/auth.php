<?php
    function authorize_pilot($pilot, $aircraft) {
        //prevent duplicates
        $query = "SELECT * FROM can_rent WHERE username='" . $pilot . "' AND reg_number='" . $aircraft . "';";


    }

?>
