<?php

namespace NTRNX_MYSQLI;

/* begin of class ntrnx_mysqli_config */
class ntrnx_mysqli_config {

	/* allow class update check */
	static $allow_update_check = FALSE;

	/* allow class dependences check */
	static $allow_dependences_check = FALSE;

	/* allow class needef functions check */
	static $allow_functions_check = FALSE;

	/* display debug statements */
    static $debug = TRUE;

	/* quote SELECT expression AS 'string' */
	static $quote_as_string = TRUE;

	/* */
	static $datetime_format = "m/d/Y:H:m:s T P";

	/* */
	static $log_errors = TRUE;

	/* */
	static $log_warnings = TRUE;

} /* end of class ntrnx_mysqli_config */

?>