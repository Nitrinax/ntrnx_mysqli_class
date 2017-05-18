<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_sqlstate extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli::$sqlstate -- mysqli_sqlstate — Returns the SQLSTATE error from previous MySQL operation
    //http://php.net/manual/de/mysqli.sqlstate.php
    static function get(

        $link

    ) {

        return mysqli_sqlstate ($link);

    }

}

?>