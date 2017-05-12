<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_data_seek extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli_result::data_seek -- mysqli_data_seek — Adjusts the result pointer to an arbitrary row in the result
    static function result(

        $mysqli_result,
        $offset

    ) {

        return mysqli_data_seek ($mysqli_result , $offset);

    }

}

?>