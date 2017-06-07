<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class fetch_assoc extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli_result::fetch_assoc -- mysqli_fetch_assoc — Fetch a result row as an associative array
    //http://php.net/manual/de/mysqli-result.fetch-assoc.php
    static function result(

        $mysqli_result
        
    ) {

        return mysqli_fetch_assoc ($mysqli_result);

    }

}

?>