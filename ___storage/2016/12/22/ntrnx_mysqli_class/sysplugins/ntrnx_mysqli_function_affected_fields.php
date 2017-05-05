<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_affected_fields extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //mysqli_affected_fields() {}
    static function link(

        $mysqli_handle

    ) {

        return mysqli_field_count ($mysqli_handle);

    }

} /* end of class */

?>