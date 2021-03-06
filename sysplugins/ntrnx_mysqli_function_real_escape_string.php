<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class real_escape_string extends \NTRNX_MYSQLI\ntrnx_mysqli {


    //(PHP 5, PHP 7)
    //mysqli::real_escape_string -- mysqli_real_escape_string — Escapes special characters in a string for use in an SQL statement, taking into account the current charset of the connection
    //http://php.net/manual/de/mysqli.real-escape-string.php
    static function link(

        $mysqli_handle,
        $escapestr

    ) {

        return mysqli_real_escape_string($mysqli_handle, trim($escapestr));

    }

}

?>