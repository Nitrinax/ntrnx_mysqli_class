<?php

namespace NTRNX_MYSQLI\ntrnx_mysqli;

/* begin of class version */
class connect_errno extends \NTRNX_MYSQLI\ntrnx_mysqli{

    //mysqli_connect_errno() 	Returns the error code from the last connection error
    static function get(

    ) {

        return mysqli_connect_errno ();

    }

}

?>