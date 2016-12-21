<?php

namespace NTRNX_MYSQLI\ntrnx_mysqli;

/* begin of class version */
class insert_id extends \NTRNX_MYSQLI\ntrnx_mysqli{

    //mysqli_insert_id() 	Returns the auto-generated id used in the last query
    static function insert_id(

        $mysqli_handle

    ) {

        return mysqli_insert_id (mysqli_handle);

    }

}

?>