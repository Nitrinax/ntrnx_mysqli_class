<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_connect_error extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli::$connect_error -- mysqli_connect_error — Returns a string description of the last connect error
    static function get(
        
    ) {

        return mysqli_connect_error ();

    }

}

?>