<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_field_count extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli::$field_count -- mysqli_field_count — Returns the number of columns for the most recent query
    //http://php.net/manual/de/mysqli.field-count.php
    static function link(

        $mysqli_handle

    ) {

        return  mysqli_field_count ($mysqli_handle);

    }

}

?>