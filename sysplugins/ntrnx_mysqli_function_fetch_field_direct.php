<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class fetch_field_direct extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli_result::fetch_field_direct -- mysqli_fetch_field_direct — Fetch meta-data for a single field
    //http://php.net/manual/de/mysqli-result.fetch-field-direct.php
    static function result(

        $mysqli_result,
        $fieldnr

    ) {

        return mysqli_fetch_field_direct ($mysqli_result, $fieldnr);

    }

}

?>