<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_field_tell extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli_result::$current_field -- mysqli_field_tell — Get current field offset of a result pointer
    //http://php.net/manual/de/mysqli-result.current-field.php
    static function result(

        $mysqli_result

    ) {

        return  mysqli_field_tell ($mysqli_result);

    }

}

?>