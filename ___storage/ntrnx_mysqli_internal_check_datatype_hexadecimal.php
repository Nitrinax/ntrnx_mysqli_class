<?php

/* begin of class ntrnx_messages_internal_check_datatype_hexadecimal */
class ntrnx_messages_internal_check_datatype_hexadecimal {

	/* begin of class constructor */
	function __construct () {
	} /* end of class constructor */
	
	/* class destructor */
	function __destruct () {
	} /* end of class destructor */
	
	/* begin of function check_datatype_hexadecimal */
	public function check_datatype_hexadecimal($const_name, $default_value, $var_name, $current_value) {		
		
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

			/* if var set, check if var a 4 or 6 digit html hexadecimal code */
			else if ((strlen(substr($current_value,1))<4) || (!ctype_xdigit(substr($current_value,1)))) {

				/* if var not valid, print error */
				print 'value for ' . $var_name . ' must be a 4 or 6 digit hexadecimal code, currently set to ' . $current_value . ', use default value ' . $default_value . '<br/>';

				/* and use default */	
				define($const_name, $default_value); 

			}
			/* if var valid */
			else {

				/* use var from config */
				define($const_name, filter_var($current_value, FILTER_SANITIZE_STRING));

			}

		}
		
	} /* end of function check_datatype_hexadecimal */

} /* end of class ntrnx_messages_internal_check_datatype_hexadecimal */

?>