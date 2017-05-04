<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_field_seek extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli_result::field_seek -- mysqli_field_seek — Set result pointer to a specified field offset
    static function result(

        $result,
        $fieldnr

    ) {

        return mysqli_field_seek ($result , $fieldnr);

    }

}

?>