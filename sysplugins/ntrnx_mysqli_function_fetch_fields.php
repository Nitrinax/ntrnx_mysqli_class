<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class fetch_fields extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli_result::fetch_fields -- mysqli_fetch_fields — Returns an array of objects representing the fields in a result set
    //http://php.net/manual/de/mysqli-result.fetch-fields.php
    static function result(
        
        $mysqli_result

    ) {

        return mysqli_fetch_fields ($mysqli_result);

    }

}

?>