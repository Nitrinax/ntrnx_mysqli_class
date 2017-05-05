<?php

/* begin of class ntrnx_mysqli_internal_check_dependences */
class ntrnx_mysqli_internal_check_dependences {

	/* begin of class constructor */
	function __construct () {
	} /* end of class constructor */
	
	/* class destructor */
	function __destruct () {
	} /* end of class destructor */
	
	/* begin of function check_dependences */
	public function check_dependences ($class_base, $class_dependences, $dependences_version) {
		
		/* check of dependences source */
		switch($class_dependences) {
		
			/* if php */
			case 'PHP':
				/* check for needed version */
				if (version_compare(phpversion(), $dependences_version, "<")) {
					die($class_base::_CLASS_NAME . " need " . $class_dependences . " Version " . $dependences_version . " or higher"
						. ", your running " . $class_dependences . " Version is " . phpversion());
				}
			break;
			
			default: break;
		}
	} /* end of function check_dependences */

} /* end of class ntrnx_mysqli_internal_check_dependences */

?>