<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_affected_rows extends \NTRNX_MYSQLI\ntrnx_mysqli {

	/* class name */
	const _CLASS_NAME = "ntrnx_mysqli_affected_rows.php";
	/* class version */
	const _CLASS_VERSION = "0.4.0.0";
	/* YYYY-MM-DD */
	const _CLASS_DATE = "2017-04-16";
	/* hh:mm:ss */
	const _CLASS_TIME = "12:56:00";

    //(PHP 5, PHP 7)
    //mysqli::$affected_rows -- mysqli_affected_rows — Gets the number of affected rows in a previous MySQL operation
    static function link(
        
        $mysqli_handle
        
    ) {

        return mysqli_affected_rows ($mysqli_handle);

    }

}

?>