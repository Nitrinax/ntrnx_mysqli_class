<?php

/* begin of class ntrnx_messages_internal_check_sys_dir */
class ntrnx_messages_internal_check_sys_dir {

	/* begin of class constructor */
	function __construct () {
	} /* end of class constructor */
	
	/* class destructor */
	function __destruct () {
	} /* end of class destructor */
	
	/* begin of function check_sys_dir */
	public function check_sys_dir($current_value) {		

		/* test output */
		//print $const_name . '<br/>';
		//print $default_value . '<br/>';
		//print $var_name . '<br/>';
		//print $current_value . '<br/>';
		
		$cls_ntrnx_messages_internal_check_sys_rights = new ntrnx_messages_internal_check_sys_rights();
		
		/* check if dir exists and create it if not */
		if (!is_dir($current_value)) {		
			if (mkdir ($current_value,'0777')) { clearstatcache(); return TRUE; }
			else { return FALSE; }			
		}
		else if ($cls_ntrnx_messages_internal_check_sys_rights->check_sys_rights($current_value, 'w')==TRUE) { return TRUE; }
		else { return FALSE; }		
		
	} /* end of function check_sys_dir */

} /* end of class ntrnx_messages_internal_check_sys_dir */

?>