<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_affected_fields extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli_affected_fields() {}
    //http://php.net/manual/de/mysqli.field-count.php
    static function link(

        $mysqli_handle

    ) {

        return mysqli_field_count ($mysqli_handle);

    }

} /* end of class */

?>