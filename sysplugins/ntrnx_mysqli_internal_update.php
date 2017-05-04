<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_internal_update extends \NTRNX_MYSQLI\ntrnx_mysqli {

	/* begin of class constructor */
	function __construct (){	
	} /* end of class constructor */

	/* class destructor */
	function __destruct() {
	} /* end of class destructor */

	static function get_class_version() {}

	static function get_module_version() {}

	static function get_plugin_version() {}

	static function get_sysplugin_version() {

		print "class ntrnx_mysqli_" . "affected_fields" . " - " . \NTRNX_MYSQLI\affected_fields_get_version();

	}

	/* begin of function check */
	static function check () {	
	} /* end of function check */

} /* end of class */

?>