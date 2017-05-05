<?php

/* begin of class ntrnx_mysqli_internal_functions */
class ntrnx_mysqli_internal_functions {

	/* begin of class constructor */
	function __construct (){	
	} /* end of class constructor */

	/* class destructor */
	function __destruct() {
	} /* end of class destructor */

	/* test for available/restricted php functions */
	public function check_function_exists($function_array=NULL) {	
		
		foreach ($function_array as $key => $value) {
			
			//echo $function_array [$key] . "<br/>";
			
			if (!function_exists($function_array [$key])) { print "php function \"" . $function_array [$key] . "\" not found<br/>"; }			
		
		}
	
	}

} /* end of class ntrnx_mysqli_internal_functions */

?>