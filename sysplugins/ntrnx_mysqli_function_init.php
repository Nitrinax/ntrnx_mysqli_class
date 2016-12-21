<?php

namespace NTRNX_MYSQLI\ntrnx_mysqli;

/* begin of class version */
class init extends \NTRNX_MYSQLI\ntrnx_mysqli{

    //mysqli_init() 	Initializes MySQLi and returns a resource for use with mysqli_real_connect()
    static function db(

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