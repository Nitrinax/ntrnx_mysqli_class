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

	/* default date and time format */
	static $datetime_format = "m/d/Y:H:m:s T P";
	static $datetime_suffix = "[";
	static $datetime_praefix = "]";
	static $log_separator = " | ";

	/* log level of outputs
	*
    *	0 = no output
    *	1 = errors
    *	2 = warnings
    *	4 = informations
	*
	*/
    static $log_level = 1;

	/* display level of output
	*
	*	0 = no output
    *	1 = errors
    *	2 = warnings
    *	4 = informations
	*
	*/
    static $display_level = 1;

} /* end of class ntrnx_mysqli_config */

?>