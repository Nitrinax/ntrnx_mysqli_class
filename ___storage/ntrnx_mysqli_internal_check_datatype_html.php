<?php

/* begin of class ntrnx_messages_internal_check_datatype_html */
class ntrnx_messages_internal_check_datatype_html {

	/* begin of class constructor */
	function __construct () {
	} /* end of class constructor */
	
	/* class destructor */
	function __destruct () {
	} /* end of class destructor */
	
	/* begin of function check_datatype_html */
	public function check_datatype_html($const_name, $default_value, $var_name, $current_value) {		

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

			/* if var set, tripple test if var a valid html tag */
			else if ((!$this->is_htmlA($current_value)) || (!$this->is_htmlB($current_value)) || (!$this->is_htmlC($current_value))) {

				/* if var not valid, print error */
				print 'value for ' . $var_name . ' must be a valid html tag, currently set to ' . $current_value . ', use default value \'' . htmlentities($default_value) . '\'<br/>';

				/* and use default value if not */	
				define($const_name, $default_value); 

			}
			/* if var valid */
			else {

				/* use var from config */
				define($const_name, $current_value);

			}

		}
		
	} /* end of function check_datatype_html */
	
	function is_htmlA($string) { $processed = htmlentities($string); if($processed == $string) return false; return true; }
	function is_htmlB($string) { return preg_match("/<[^<]+>/",$string,$m) != 0; }	
	function is_htmlC($string) { return $string != strip_tags($string) ? true:false; }

} /* end of class ntrnx_messages_internal_check_datatype_html */

?>