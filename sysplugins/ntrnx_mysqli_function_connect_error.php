<?php

namespace NTRNX_MYSQLI\ntrnx_mysqli;

/* begin of class version */
class connect_error extends \NTRNX_MYSQLI\ntrnx_mysqli{

    //mysqli_connect_error() 	Returns the error description from the last connection error
    static function get(
        
    ) {

        return mysqli_connect_error ();

    }

}

?>