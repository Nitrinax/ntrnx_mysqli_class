<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_select_db extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli::select_db -- mysqli_select_db — Selects the default database for database queries
    static function link(

        $mysqli_handle,
        $db_name

    ) {

        return mysqli_select_db ($mysqli_handle , $db_name);

    }

}

?>