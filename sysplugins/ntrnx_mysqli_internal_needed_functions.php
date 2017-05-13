<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_internal_needed_functions extends \NTRNX_MYSQLI\ntrnx_mysqli {

	/* begin of class constructor */
	function __construct (){
	} /* end of class constructor */

	/* class destructor */
	function __destruct() {
	} /* end of class destructor */

	static function state() {

		return self::_CLASS_NEEDED_FUNCTIONS;

	}

	static function get() {

		return self::$_class_needed_functions;

	}

} /* end of class */

?>