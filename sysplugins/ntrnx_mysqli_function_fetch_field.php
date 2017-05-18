<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_fetch_field extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli_result::fetch_field -- mysqli_fetch_field — Returns the next field in the result set
    //http://php.net/manual/de/mysqli-result.fetch-field.php
    static function result(

        $mysqli_result

    ) {

        return mysqli_fetch_field ($mysqli_result);

    }

}

?>