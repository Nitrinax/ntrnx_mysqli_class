<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class affected_rows extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli::$affected_rows -- mysqli_affected_rows — Gets the number of affected rows in a previous MySQL operation
	//http://php.net/manual/de/mysqli.affected-rows.php
    static function link(
        
        $mysqli_handle
        
    ) {

        return mysqli_affected_rows ($mysqli_handle);

    }

}

?>