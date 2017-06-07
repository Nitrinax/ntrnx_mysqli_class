<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class init extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli::init -- mysqli_init — Initializes MySQLi and returns a resource for use with mysqli_real_connect()
    //http://php.net/manual/de/mysqli.init.php
    static function resource(

    ) {

        /* init handle */
        $mysqli_handle = mysqli_init();

        /* check if error */
        if (!$mysqli_handle) {

            \NTRNX_MYSQLI\ntrnx_mysqli::raise_error(1, get_called_class(), __LINE__);

            return FALSE;

        } else {

            return $mysqli_handle;

        }

    }

}

?>