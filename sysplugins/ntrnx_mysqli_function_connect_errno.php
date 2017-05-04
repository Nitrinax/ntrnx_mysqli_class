<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_connect_errno extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli::$connect_errno -- mysqli_connect_errno — Returns the error code from last connect call
    static function get(

    ) {

        return mysqli_connect_errno ();

    }

}

?>