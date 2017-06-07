<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class error extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli::$error -- mysqli_error — Returns a string description of the last error
    //http://php.net/manual/de/mysqli.error.php
    static function link(

        $mysqli_handle

    ) {

        return mysqli_errno ($mysqli_handle);

    }

}

?>