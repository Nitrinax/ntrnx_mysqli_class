<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_num_rows extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli_result::$num_rows -- mysqli_num_rows — Gets the number of rows in a result
    //http://php.net/manual/de/mysqli-result.num-rows.php
    static function result(
        
        $result
        
    ) {

        return mysqli_num_rows ($result);

    }

}

?>