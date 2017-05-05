<?php

/* begin of class ntrnx_messages_internal_check_sys_rights */
class ntrnx_messages_internal_check_sys_rights {

	/* begin of class constructor */
	function __construct () {
	} /* end of class constructor */
	
	/* class destructor */
	function __destruct () {
	} /* end of class destructor */
	
	/* begin of function check_sys_rights */
	public function check_sys_rights($current_value, $mode=FALSE) {		

		/* test output */
		//print $current_value . '<br/>';
		//print $mode . '<br/>';
		
		switch ($mode) {
		
			/* exist */
			case "e":
				if (!file_exists ($current_value)) { return FALSE; } else { return TRUE; }
			break;
		
			/* readable */
			case "r":
				if (!is_readable ($current_value)) { return FALSE; } else { return TRUE; }
			break;
			
			/* writable */
			case "w":
				if (!is_writable($current_value)) { return FALSE; } else { return TRUE; }
			break;
			
			default: break;
			
		}
		
	} /* end of function check_sys_rights */

} /* end of class ntrnx_messages_internal_check_sys_rights */

?>