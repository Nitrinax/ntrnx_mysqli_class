<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_internal_function_exists extends \NTRNX_MYSQLI\ntrnx_mysqli {

	/* begin of class constructor */
	function __construct (){	
	} /* end of class constructor */

	/* class destructor */
	function __destruct() {
	} /* end of class destructor */

	/* test for available/restricted php functions */
	static function check($function_array=NULL) {	
		
		foreach ($function_array as $key => $value) {
			
			//echo $function_array [$key] . "<br/>";
			
			if (!function_exists($function_array [$key])) { print "php function \"" . $function_array [$key] . "\" not found<br/>"; }			
		
		}
	
	}

} /* end of class */

?>