<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_fetch_lengths extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli_result::$lengths -- mysqli_fetch_lengths — Returns the lengths of the columns of the current row in the result set
    static function result(

        $result

    ) {

        return mysqli_fetch_lengths ($result);

    }

}

?>