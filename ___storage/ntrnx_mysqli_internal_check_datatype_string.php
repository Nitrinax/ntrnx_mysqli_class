<?php

/* begin of class ntrnx_messages_internal_check_datatype_string */
class ntrnx_messages_internal_check_datatype_string {

	/* begin of class constructor */
	function __construct () {
	} /* end of class constructor */
	
	/* class destructor */
	function __destruct () {
	} /* end of class destructor */
	
	/* begin of function check_datatype_string */
	public function check_datatype_string($const_name, $default_value, $var_name, $current_value) {		

		/* test output */
		//print $const_name . '<br/>';
		//print $default_value . '<br/>';
		//print $var_name . '<br/>';
		//print $current_value . '<br/>';

		/* check if CONST not defined */
		if (!defined($const_name)) {

			/* check if VAR not set */
			if (!isset($var_name)) {

				/* and use default value if not */
				define($const_name, $default_value);

			}

			/* if var set, look if var valid (is_string) */
			else if (!is_string($current_value)) {

				/* if var not valid, print error */
				print 'value for ' . $var_name . ' must be a string, currently set to ' . $current_value . ', use default value \'' . $default_value . '\'<br/>';

				/* and use default value if not */	
				define($const_name, $default_value); 

			}
			/* if var valid */
			else {

				/* use var from config */
				define($const_name, filter_var($current_value, FILTER_SANITIZE_STRING));

			}

		}

	} /* end of function check_datatype_string */

} /* end of class ntrnx_messages_internal_check_datatype_string */

?>