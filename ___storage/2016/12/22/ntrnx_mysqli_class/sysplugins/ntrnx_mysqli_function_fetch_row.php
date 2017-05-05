<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_fetch_row extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli_result::fetch_row -- mysqli_fetch_row — Get a result row as an enumerated array
    static function result(

        $mysqli_result

    ) {

        return mysqli_fetch_row ($mysqli_result);

    }

}

?>