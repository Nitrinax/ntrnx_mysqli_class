<?php

/*
* class ntrnx_mysqli_core
*
* short:
*
* - core funtions for class ntrnx_mysqli
*
*/

namespace NTRNX_MYSQLI;

/* begin of class ntrnx_mysqli_core */
class ntrnx_mysqli_core extends \NTRNX_MYSQLI\ntrnx_mysqli_data {

	/* begin of class constructor */
	function __construct() {

		/* define autoloader filepath & autoloader file */
		if (!defined("NMYSQCC_NTRNX_MYSQLI_AUTOLOADER_FILE_PATH")) { define("NMYSQCC_NTRNX_MYSQLI_AUTOLOADER_FILE_PATH", NMYSQCC_CLASS_NTRNX_MYSQLI_SYSPLUGINS_DIR); }
		if (!defined("NMYSQCC_NTRNX_MYSQLI_AUTOLOADER_FILE_SUFFIX")) { define("NMYSQCC_NTRNX_MYSQLI_AUTOLOADER_FILE_SUFFIX", ".php"); }
		if (!defined("NMYSQCC_NTRNX_MYSQLI_AUTOLOADER")) { define("NMYSQCC_NTRNX_MYSQLI_AUTOLOADER", NMYSQCC_CLASS_NTRNX_MYSQLI_DIR . "autoloader.php"); }

		/* check if exists and load the autoloader */
		if (!file_exists(NMYSQCC_NTRNX_MYSQLI_AUTOLOADER)) { die(str_replace("%s", NMYSQCC_NTRNX_MYSQLI_AUTOLOADER, NMYSQCC_ERROR_FILE_DOES_NOT_EXISTS)); }
		else { require_once NMYSQCC_NTRNX_MYSQLI_AUTOLOADER; }
		
		/* init autoloader */
		$autoloader = new ntrnx_mysqli_autoloader(get_class($this));
		$autoloader->register();

		/* check for dependeces */
		if (self::_CLASS_DEPENDENCES != FALSE) {	

			$cls_ntrnx_mysqli_internal_dependences = new ntrnx_mysqli_internal_dependences();
			$cls_ntrnx_mysqli_internal_dependences->check_dependences($this, $this->_class_dependences);

		}

		/* check for needed functions */
		if (self::_CLASS_NEEDED_FUNCTIONS != FALSE) {	

			$cls_ntrnx_mysqli_internal_functions = new ntrnx_mysqli_internal_functions();
			$cls_ntrnx_mysqli_internal_functions->check_function_exists($this->_class_needed_functions);

		}

	} /* end of class constructor */

	/* class destructor */
	function __destruct() {
	} /* end of class destructor */

} /* end of class ntrnx_mysqli_core */

?>