<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_affected_fields extends \NTRNX_MYSQLI\ntrnx_mysqli {

	/* class name */
	const _CLASS_NAME = "ntrnx_mysqli_affected_fields.php";
	/* class version */
	const _CLASS_VERSION = "0.4.0.0";
	/* YYYY-MM-DD */
	const _CLASS_DATE = "2017-04-16";
	/* hh:mm:ss */
	const _CLASS_TIME = "12:56:00";

    //mysqli_affected_fields() {}
    static function link(

        $mysqli_handle

    ) {

        return mysqli_field_count ($mysqli_handle);

    }

} /* end of class */

?>