<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_fetch_assoc extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli_result::fetch_assoc -- mysqli_fetch_assoc — Fetch a result row as an associative array
    static function result(

        $mysqli_result
        
    ) {

        return mysqli_fetch_assoc ($mysqli_result);

    }

}

?>