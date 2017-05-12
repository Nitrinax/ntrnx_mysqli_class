<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_fetch_all extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5 >= 5.3.0, PHP 7)
    //mysqli_result::fetch_all -- mysqli_fetch_all — Fetches all result rows as an associative array, a numeric array, or both
    static function result(

        $mysqli_result,
        $resulttype = NULL

    ) {

        return mysqli_fetch_all ($mysqli_result, $resulttype);

    }

}

?>