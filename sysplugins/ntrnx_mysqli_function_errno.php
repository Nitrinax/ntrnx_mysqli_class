<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class errno extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli::$errno -- mysqli_errno — Returns the error code for the most recent function call
    //http://php.net/manual/de/mysqli.errno.php
    static function link(

        $mysqli_handle

    ) {

        return mysqli_errno ($mysqli_handle);

    }

}

?>