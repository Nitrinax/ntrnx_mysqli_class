<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_init extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli::init -- mysqli_init — Initializes MySQLi and returns a resource for use with mysqli_real_connect()
    static function resource(

    ) {

        /* init handle */
        $mysqli_handle = mysqli_init();

        /* check if error */
        if (!$mysqli_handle) {

            die(NMYSQCC_ERROR_MYSQLI_INIT_FAILED);

        } else {

            return $mysqli_handle;

        }       

    }

}

?>