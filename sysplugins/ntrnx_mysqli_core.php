<?php

namespace NTRNX_MYSQLI;

/* begin of class ntrnx_mysqli_core */
class ntrnx_mysqli_core extends \NTRNX_MYSQLI\ntrnx_mysqli_core_base {

	/* begin of class constructor */
	function __construct () {

		/* check for dependeces */
		if ($this::_CLASS_DEPENDENCES != FALSE) {	
			switch(_NTRNX_MYSQLI_CHECK_DEPENDENCES) {
				case _NTRNX_MYSQLI_CHECK_DEPENDENCES_TRUE:
					$cls_ntrnx_mysqli_internal_check_dependences = new ntrnx_mysqli_internal_check_dependences(); 
					foreach ($this->_class_dependences as $key => $value) {
						$cls_ntrnx_mysqli_internal_check_dependences->check_dependences($this, $key, $value);
					}
				break;
				default: break;
			}
		}

		/* check for updates */
		if ($this::_CLASS_UPDATE != FALSE) {
			switch(_NTRNX_MYSQLI_CHECK_UPDATE) {
				case _NTRNX_MYSQLI_CHECK_UPDATE_TRUE:
					$cls_ntrnx_mysqli_internal_check_update = new ntrnx_mysqli_internal_check_update();
					$cls_ntrnx_mysqli_internal_check_update->check_update($this);
				break;
				default: break;
			}
		}
		
		/* check for needed php functions */
		$this->check_function_exists($this->_class_needed_functions);

	} /* end of class constructor */

	/* class destructor */
	function __destruct () {
	} /* end of class destructor */

	public function check_function_exists($function_array=NULL) {
		foreach ($function_array as $key => $value) {
			//print $function_array [$key] . '<br/>';
			if (!function_exists($function_array [$key])) { print 'php function "' . $function_array [$key] . '" not found<br/>'; }
		}
	}

} /* end of class ntrnx_mysqli_core */

?>