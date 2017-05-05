<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_insert_id extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli::$insert_id -- mysqli_insert_id — Returns the auto generated id used in the latest query
    static function link(

        $mysqli_handle

    ) {

        return mysqli_insert_id (mysqli_handle);

    }

}

?>