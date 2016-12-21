<?php

namespace NTRNX_MYSQLI\ntrnx_mysqli;

/* begin of class version */
class dump_debug_info extends \NTRNX_MYSQLI\ntrnx_mysqli{

    //mysqli_error_list() 	Returns a list of errors for the most recent function call
    static function dump_debug_info(

        $mysqli_handle

    ) {

        return mysqli_dump_debug_info ($mysqli_handle);

    }
}

?>