<?php

namespace NTRNX_MYSQLI\ntrnx_mysqli;

/* begin of class version */
class select_db extends \NTRNX_MYSQLI\ntrnx_mysqli{

    //mysqli_select_db() 	Changes the default database for the connection
    static function select_db(

        $mysqli_handle,
        $db_name

    ) {

        return mysqli_select_db ($mysqli_handle , $db_name);

    }

}

?>