<?php

namespace NTRNX_MYSQLI;

/* begin of class ntrnx_mysqli_core_base */
class ntrnx_mysqli_core_base extends \NTRNX_MYSQLI\ntrnx_mysqli_core_data {

	/* begin of class constructor */
	function __construct () {

		/* define autoloader filepath & autoloader file */
		if (!defined('MYAUTOLOADER_FILE_PATH')) { define('MYAUTOLOADER_FILE_PATH', CLASS_NTRNX_MYSQLI_SYSPLUGINS_DIR); }
		if (!defined('MYAUTOLOADER')) { define('MYAUTOLOADER', CLASS_NTRNX_MYSQLI_DIR . 'autoloader.php'); }

		/* check if exists and load the autoloader */
		if (!file_exists(MYAUTOLOADER)) { die(str_replace('%s', MYAUTOLOADER, ERROR_FILE_DOES_NOT_EXISTS)); }
		else { require_once MYAUTOLOADER; }

		/* init autoloader */
		$autoloader = new MyAutoloader(get_class($this));
		$autoloader->register();

	} /* end of class constructor */

	/* class destructor */
	function __destruct () {
	} /* end of class destructor */

} /* end of class ntrnx_mysqli_core_base */

?>