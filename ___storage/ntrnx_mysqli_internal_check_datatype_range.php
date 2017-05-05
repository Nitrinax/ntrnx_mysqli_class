<?php

/* begin of class ntrnx_messages_internal_check_datatype_range */
class ntrnx_messages_internal_check_datatype_range {

	/* begin of class constructor */
	function __construct () {
	} /* end of class constructor */
	
	/* class destructor */
	function __destruct () {
	} /* end of class destructor */
	
	/* begin of function check_datatype_range */
	//public function check_datatype_range ($use_array, $filter_type, $const_name, $default_value, $var_name, $current_value) {
	public function check_datatype_range ($use_array, $const_name, $default_value, $var_name, $current_value) {

		$filter_type = 0;
	
		/* init, clear array */
		$my_array = array();
		
		/* arrays of valid values */
		/* single values */
		$one_values = array(0);										/* 1 */
		$two_values = array(0, 1);									/* 2 */
		$three_values = array(0, 1, 2);								/* 3 */
		$four_values = array(0, 1, 2, 4);							/* 4 */
		$five_values = array(0, 1, 2, 4, 8);						/* 5 */
		$six_values = array(0, 1, 2, 4, 8, 16);						/* 6 */
		$seven_values = array(0, 1, 2, 4, 8, 16, 32);				/* 7 */
		$eight_values = array(0, 1, 2, 4, 8, 16, 32, 64);			/* 8 */
		$nine_values = array(0, 1, 2, 4, 8, 16, 32, 64, 128);		/* 9 */
		$all_values = array(0, 1, 2, 4, 8, 16, 32, 64, 128, 255);	/* 10 */
		/* value ranges [min/max] )*/
		$zero_upto_3_values = array(0, 3);							/* 11 */
		$zero_upto_7_values = array(0, 7);							/* 12 */
		$zero_upto_15_values = array(0, 15);						/* 13 */
		$zero_upto_31_values = array(0, 31);						/* 14 */
		$zero_upto_63_values = array(0, 63);						/* 15 */
		$zero_upto_127_values = array(0, 127);						/* 16 */
		$zero_upto_255_values = array(0, 255);						/* 17 */
		/* values for other ranges */
		$file_size_values = array('B', 'K', 'M', 'T');				/* 21 */
				
		/* set the needed array */
		switch ($use_array) {
		
			/* single values */
			case 1: $my_array = $one_values; $mode='single'; break;
			case 2: $my_array = $two_values; $mode='single'; break;
			case 3: $my_array = $three_values; $mode='single'; break;
			case 4: $my_array = $four_values; $mode='single'; break;
			case 5: $my_array = $five_values; $mode='single'; break;
			case 6: $my_array = $six_values; $mode='single'; break;
			case 7: $my_array = $seven_values; $mode='single'; break;
			case 8: $my_array = $eight_values; $mode='single'; break;
			case 9: $my_array = $nine_values; $mode='single'; break;
			case 10: $my_array = $all_values; $mode='single'; break;
			/* value ranges */
			case 11: $my_array = $zero_upto_3_values; $mode='full'; break;
			case 12: $my_array = $zero_upto_7_values; $mode='full'; break;
			case 13: $my_array = $zero_upto_15_values; $mode='full'; break;
			case 14: $my_array = $zero_upto_31_values; $mode='full'; break;
			case 15: $my_array = $zero_upto_63_values; $mode='full'; break;
			case 16: $my_array = $zero_upto_127_values; $mode='full'; break;
			case 17: $my_array = $zero_upto_255_values; $mode='full'; break;
			/* values for other ranges */
			case 21: $my_array = $file_size_values; $filter_type = 1; $mode='single'; break;
			
			default: die('unknown array in ntrnx_messages_internal_check_datatype_range'); break;
			
		}
		
		/* check if var from config in valid range */
		$this->check_range ($my_array, $filter_type, $const_name, $default_value, $var_name, $current_value, $mode);
		
	} /* end of function check_datatype_range */
	
	/* begin of function check_range */
	private function check_range ($array_of_interest, $filter_type, $const_name, $default_value, $var_name, $current_value, $mode) {
	
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
			
			/* if mode single and if var set, look if var valid (in_array) */
			else if (	($mode=='single') &&
						(!in_array($current_value, $array_of_interest, TRUE))) {
			
				/* if var not valid, generate error */
				$this->get_error_message ($array_of_interest, $const_name, $default_value, $var_name, $current_value, ', ');				
			
			}
			
			/* check for int values */
			else if (	($mode=='full') &&
						($filter_type==0) &&
						(filter_var($current_value, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$array_of_interest[0], "max_range"=>$array_of_interest[1]))) === false)) {

						/* if var not valid, generate error */		
						$this->get_error_message ($array_of_interest, $const_name, $default_value, $var_name, $current_value, ' - ');

						/* and use default value if not */	
						define($const_name, $default_value);
						
			}
			
			/* check for string values */
			else if (	($mode=='full') &&
						($filter_type==1) &&
						(
							($current_value<$array_of_interest[0]) ||
							($current_value>$array_of_interest[1]) ||
							(!filter_var($current_value, FILTER_VALIDATE_STRING))
						)) {
						
						/* if var not valid, generate error */		
						$this->get_error_message ($array_of_interest, $const_name, $default_value, $var_name, $current_value, ' - ');

						/* and use default value if not */	
						define($const_name, $default_value);
						
			}
			
			/* if var valid and in valid range, set const to var */
			else {
			
				/* use var from config */
				define($const_name, $current_value);
				
			}	
			
		}
		
	} /* end of function check_range */
	
	/* begin of function get_error_message */
	private function get_error_message ($array_of_interest, $const_name, $default_value, $var_name, $current_value, $separator) {
				
		/* write first part of error message*/
		print 'value for ' . $var_name . ' must be ';
				
		/* write array values separated with , */
		for ($i = 0; $i < count($array_of_interest); $i++) {
			/* use needed separator */
			print $array_of_interest[key($array_of_interest)] . $separator;
			next($array_of_interest);
		}
				
		/* write last part of error message */
		print 'currently set to ' . $current_value . ', ';
		print 'use default value ' . $default_value . '<br/>';
				
		/* and use default value */
		define($const_name, $default_value);	
	
	} /* end of function get_error_message */

} /* end of class ntrnx_messages_internal_check_datatype_range */

?>