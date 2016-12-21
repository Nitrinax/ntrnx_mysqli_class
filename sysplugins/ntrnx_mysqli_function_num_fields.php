<?php

namespace NTRNX_MYSQLI\ntrnx_mysqli;

/* begin of class version */
class num_fields extends \NTRNX_MYSQLI\ntrnx_mysqli{

    //mysqli_num_fields() 	Returns the number of fields in a result set
    static function get(

        $mysqli_result

    ) {

        return mysqli_num_fields ($mysqli_result);

    }

}

?>