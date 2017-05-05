<?php

/* begin of class ntrnx_mysqli_internal_dependences */
class ntrnx_mysqli_internal_dependences {

	/* begin of class constructor */
	function __construct (){	
	} /* end of class constructor */

	/* class destructor */
	function __destruct() {
	} /* end of class destructor */

	/* begin of function check_dependences */
	public function check_dependences ($class_base, $dependences_array=NULL) {	

		foreach ($dependences_array as $key => $value) {
			
			/* check of dependences source */
			switch($key) {
		
				/* if php */
				case "PHP":
					/* check for needed version */
					if (version_compare(phpversion(), $value, "<")) {
						die($class_base::_CLASS_NAME . " need PHP version " . $value . " or higher"
							. ", your installed PHP version is " . phpversion());
					}
				break;
			
				default:
				break;
			}		
		
		}

	} /* end of function check_dependences */

} /* end of class ntrnx_mysqli_internal_dependences */

?>