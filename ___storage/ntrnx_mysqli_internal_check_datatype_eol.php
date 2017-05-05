<?php

/* begin of class ntrnx_messages_internal_check_datatype_eol */
class ntrnx_messages_internal_check_datatype_eol {

	/* begin of class constructor */
	function __construct () {
	} /* end of class constructor */
	
	/* class destructor */
	function __destruct () {
	} /* end of class destructor */
	
	/* begin of function check_datatype_eol */
	public function check_datatype_eol($const_name, $default_value, $var_name, $current_value) {		

		/* test output */
		//print $const_name . '<br/>';
		//print $default_value . '<br/>';
		//print $var_name . '<br/>';
		//print $current_value . '<br/>';
		
		$eol_values = array('\n', '\r', '\r\n', PHP_EOL);

		/* check if CONST not defined */
		if (!defined($const_name)) {

			/* check if VAR not set */
			if (!isset($var_name)) {

				/* and use default value if not */
				define($const_name, $default_value);

			}

			/* if var set, look if var valid (in_array) */
			else if (!in_array($current_value, $eol_values, TRUE)) {

				/* if var not valid, print error */
				print 'value for ' . $var_name . ' must be a valid eol code, currently set to ' . $current_value . ', use default value PHP_EOL<br/>';

				/* and use default value if not */	
				define($const_name, $default_value); 

			}
			/* if var valid */
			else {

				/* use var from config */
				define($const_name, $current_value);

			}

		}	
		
	} /* end of function check_datatype_eol */

} /* end of class ntrnx_messages_internal_check_datatype_eol */

?>