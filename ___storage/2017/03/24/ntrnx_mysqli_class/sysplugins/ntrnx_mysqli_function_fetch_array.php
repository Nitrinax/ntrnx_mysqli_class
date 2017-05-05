<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_fetch_array extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli_result::fetch_array -- mysqli_fetch_array — Fetch a result row as an associative, a numeric array, or both
    static function result(

        $mysqli_result,
        $resulttype = NULL

    ) {

        return mysqli_fetch_array ($mysqli_result, $resulttype);

    }

}

?>