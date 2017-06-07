<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class fetch_object extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli_result::fetch_object -- mysqli_fetch_object — Returns the current row of a result set as an object
    //http://php.net/manual/de/mysqli-result.fetch-object.php
    static function result(

        $mysqli_result,
        $class_name = NULL,
        $params = NULL

    ) {

        return mysqli_fetch_object ($mysqli_result, $class_name, $params);

    }

}

?>