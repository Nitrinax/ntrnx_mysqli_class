<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_num_fields extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli_result::$field_count -- mysqli_num_fields — Get the number of fields in a result
    //http://php.net/manual/de/mysqli-result.field-count.php
    static function result(

        $mysqli_result

    ) {

        return mysqli_num_fields ($mysqli_result);

    }

}

?>