<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class fetch_lengths extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli_result::$lengths -- mysqli_fetch_lengths — Returns the lengths of the columns of the current row in the result set
    //http://php.net/manual/de/mysqli-result.lengths.php
    static function result(

        $mysqli_result

    ) {

        return mysqli_fetch_lengths ($mysqli_result);

    }

}

?>