<?php

namespace NTRNX_MYSQLI\ntrnx_mysqli;

/* begin of class version */
class num_rows extends \NTRNX_MYSQLI\ntrnx_mysqli{

    //mysqli_num_rows() 	Returns the number of rows in a result set
    static function get(
        
        $mysqli_result
        
    ) {

        return mysqli_num_rows ($mysqli_result);

    }

}

?>