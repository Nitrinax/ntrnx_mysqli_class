<?php

/* begin of class ntrnx_messages_internal_check_datatype_datetime */
class ntrnx_messages_internal_check_datatype_datetime {

	/* begin of class constructor */
	function __construct () {
	} /* end of class constructor */
	
	/* class destructor */
	function __destruct () {
	} /* end of class destructor */
	 
	/* valid numbers '00' - '59', 'quarterpast', 'past', 'quarterto', 'oclock' */
	/* valid times '00:00:00' - '23:59:59', 'midnight', 'morning', 'noon', 'afternoon' */
	/* valid weekdays '01' - '07', 'Mon' - 'Sun', 'firstdayofweek', 'lastdayofweek' */
	/* valid days '01' - '31', 'firstdayofmonth', 'lastdayofmonth' */
	/* valid month '01' - '12', 'Jan' - 'Dec', 'firstdayofyear', 'lastdayofyear' */
	
	/* begin of function check_datatype_datetime */
	public function check_datatype_datetime ($use_array, $const_name, $default_value, $var_name, $current_value) {
	
		/* init, clear array */
		$my_array = array();
		
		/* arrays of valid values */
		
		/* valid time 15, 30, 45, 00 */
		$time_values = array(		'quarterpast','past','quarterto','oclock');									/* 1 */
		
		/* valid daytime 00:00, 06:00, 12:00, 18:00 */									
		$day_values = array(		'midnight', 'morning', 'noon', 'afternoon');								/* 2 */

		/* valid weekdaynumbers and weekdaynames */
		$week_values = array(		'01','02','03','04','05','06','07',
									'Mon','Tue','Wed','Thu','Fri','Sat','Sun',
									'firstdayofweek', 'lastdayofweek');											/* 3 */

		/* valid daynumbers */	
		$month_values = array(		'01','02','03','04','05','06','07','08','09','10',
									'11','12','13','14','15','16','17','18','19','20',
									'21','22','23','24','25','26','27','28','29','30','31',
									'firstdayofmonth', 'lastdayofmonth');										/* 4 */ 															

		/* valid monthnumbers and monthnames */
		$year_values = array(		'01','02','03','04','05','06','07','08','09','10','11','12',
									'Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec',
									'firstdayofyear', 'lastdayofyear');											/* 5 */

		/* set the needed array */
		switch ($use_array) {
			case 1: $my_array = $time_values; $this->check_time_short($my_array, $const_name, $default_value, $var_name, $current_value); break;
			case 2: $my_array = $day_values; $this->check_time_long($my_array, $const_name, $default_value, $var_name, $current_value); break;
			case 3: $my_array = $week_values; $this->check_datetime($my_array, $const_name, $default_value, $var_name, $current_value); break;
			case 4: $my_array = $month_values; $this->check_datetime($my_array, $const_name, $default_value, $var_name, $current_value); break;
			case 5: $my_array = $year_values; $this->check_datetime($my_array, $const_name, $default_value, $var_name, $current_value); break;
			default; break;
		}
		
	
	} /* end of function check_datatype_datetime */
			
	/* valid numbers '00' - '59', 'quarterpast', 'past', 'quarterto', 'oclock' */	
	/* begin of function check_time_short */
	private function check_time_short ($array_of_interest, $const_name, $default_value, $var_name, $current_value) {
	
		/* test output */
		//print $const_name . '<br/>';
		//print $default_value . '<br/>';
		//print $var_name . '<br/>';
		//print $current_value . '<br/>';
		
		/* init, clear array */
		$time_short_array = array();
		
		if (!$this->checktime('00', $current_value, '00')) {
		
			switch ($current_value) {
			
				/* time 15, 30, 45, 00 */		
				case 'quarterpast': define($const_name, '15'); break;
				case 'past': 		define($const_name, '30'); break;
				case 'quarterto': 	define($const_name, '45'); break;
				case 'oclock': 		define($const_name, '00'); break;
			
				default:
				
					$time_short_array = array( '00', '59' );
				
					$this->get_error_message ($array_of_interest, $const_name, $default_value, $var_name, $current_value, ', ', $time_short_array);
												
					/* and use default value */
					define($const_name, $default_value);
				
				break;
				
			}
		
		}
		
		/* if var valid and in valid range, set const to var */
		else {
			
			/* use var from config */
			define($const_name, $current_value);
				
		}
		
		//print $const_name . ': ' . constant($const_name) . '<br/>';
	
	} /* end of function check_time_short */	
		
	/* valid times '00:00:00' - '23:59:59', 'midnight', 'morning', 'noon', 'afternoon' */	
	/* begin of function check_time_long */
	private function check_time_long ($array_of_interest, $const_name, $default_value, $var_name, $current_value) {
	
		/* test output */
		//print $const_name . '<br/>';
		//print $default_value . '<br/>';
		//print $var_name . '<br/>';
		//print $current_value . '<br/>';		
		
		/* init, clear array */
		$time_long_array = array();
		
		$my_time_parts = explode(':', $current_value);
			
		if (!$this->checktime($my_time_parts[0], $my_time_parts[1], $my_time_parts[2])) {
		
			switch ($current_value) {
				
				/* daytime 00:00, 06:00, 12:00, 18:00 */
				case 'midnight': 	define($const_name, '00:00:00'); break;
				case 'morning': 	define($const_name, '06:00:00'); break;
				case 'noon': 		define($const_name, '12:00:00'); break;
				case 'afternoon': 	define($const_name, '18:00:00'); break;
			
				default:
				
					$time_long_array = array( '00:00:00', '23:59:59' );
					
					$this->get_error_message ($array_of_interest, $const_name, $default_value, $var_name, $current_value, ', ', $time_long_array);
												
					/* and use default value */
					define($const_name, $default_value);
				
				break;
				
			}
		
		}
		
		/* if var valid and in valid range, set const to var */
		else {
			
			/* use var from config */
			define($const_name, $current_value);
				
		}
		
		//print $const_name . ': ' . constant($const_name) . '<br/>';
	
	} /* end of function check_time_long */

	/* valid days '01' - '07', 'Mon' - 'Sun', 'firstdayofweek', 'lastdayofweek' */
	/* valid days '01' - '31', 'firstdayofmonth', 'lastdayofmonth' */
	/* valid month '01' - '12', 'Jan' - 'Dec', 'firstdayofyear', 'lastdayofyear' */
	/* begin of function check_datetime */
	private function check_datetime ($array_of_interest, $const_name, $default_value, $var_name, $current_value) {
	
		/* test output */
		//print $const_name . '<br/>';
		//print $default_value . '<br/>';
		//print $var_name . '<br/>';
		//print $current_value . '<br/>';
		
		if (!in_array($current_value, $array_of_interest, TRUE)) {
		
			$this->get_error_message ($array_of_interest, $const_name, $default_value, $var_name, $current_value, ', ', NULL);
							
			/* and use default value */
			define($const_name, $default_value);	
			
		}
		
		/* if var valid and in valid range, set const to var */
		else {
		
			/* get length of month in days */ 
			$lastdayofmonth = date('t', $timestamp); // 28, 29, 30, 31

			switch ($current_value) {
			
				/* week */	
				case 'Mon': define($const_name, '01'); break;
				case 'Tue': define($const_name, '02'); break;
				case 'Wed': define($const_name, '03'); break;
				case 'Thu': define($const_name, '04'); break;
				case 'Fri': define($const_name, '05'); break;
				case 'Sat': define($const_name, '06'); break;
				case 'Sun': define($const_name, '07'); break;				
				case 'firstdayofweek': 	define($const_name, '01'); break;
				case 'lastdayofweek': 	define($const_name, '07'); break;
				
				/* month*/
				/* if ntrnx_messages_log_deadline_month > length of month in days set it to length of month in days */
				case '29': if ($lastdayofmonth < '29') { define($const_name, $lastdayofmonth); } else { define($const_name, $current_value); } break;
				case '30': if ($lastdayofmonth < '30') { define($const_name, $lastdayofmonth); } else { define($const_name, $current_value); } break;
				case '31': if ($lastdayofmonth < '31') { define($const_name, $lastdayofmonth); } else { define($const_name, $current_value); } break;
				case 'firstdayofmonth':	define($const_name, '01'); break;
				case 'lastdayofmonth': define($const_name, $lastdayofmonth); break;
				
				/* year*/
				case 'Jan': define($const_name, '01'); break;
				case 'Feb': define($const_name, '02'); break;
				case 'Mar': define($const_name, '03'); break;
				case 'Apr': define($const_name, '04'); break;
				case 'May': define($const_name, '05'); break;
				case 'Jun': define($const_name, '06'); break;
				case 'Jul': define($const_name, '07'); break;
				case 'Aug': define($const_name, '08'); break;
				case 'Sep': define($const_name, '09'); break;
				case 'Oct': define($const_name, '10'); break;
				case 'Nov': define($const_name, '11'); break;
				case 'Dec': define($const_name, '12'); break;
				case 'firstdayofyear':	define($const_name, '01.01.'); break;
				case 'lastdayofyear':	define($const_name, '31.12.'); break;
				
				default: define($const_name, $current_value); break;
				
			}

		}
			
		//print $const_name . ': ' . constant($const_name) . '<br/>';
	
	} /* end of function check_datetime */
		
	/* begin of function get_error_message */
	private function get_error_message ($array_of_interest, $const_name, $default_value, $var_name, $current_value, $separator, $range) {
		
		if ($range) {
			$range_start = $range[0];
			$range_end = $range[1];
		
			/* write first part of error message*/
			print 'value for ' . $var_name . ' must be between ' . $range_start . ' and ' . $range_end . ' or ';
		
		}
		else {
		
			/* write first part of error message*/
			print 'value for ' . $var_name . ' must be ';
		
		}
				
		/* write array values separated with , */
		for ($i = 0; $i < count($array_of_interest); $i++) {
			/* use needed separator */
			print $array_of_interest[key($array_of_interest)] . $separator;
			next($array_of_interest);
		}
				
		/* write last part of error message */
		print 'currently set to ' . $current_value . ', ';
		print 'use default value ' . $default_value . '<br/>';
	
	} /* end of function get_error_message */

	/*
		function written by toshimaru
		https://gist.github.com/toshimaru/3017096		
	*/
	private function checktime($hour, $min, $sec) {
     if ($hour < 0 || $hour > 23 || !is_numeric($hour)) {
         return FALSE;
     }
     if ($min < 0 || $min > 59 || !is_numeric($min)) {
         return FALSE;
     }
     if ($sec < 0 || $sec > 59 || !is_numeric($sec)) {
         return FALSE;
     }
     return TRUE;
}

} /* end of class ntrnx_messages_internal_check_datatype_datetime */

?>