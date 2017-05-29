<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_internal_needed_functions extends \NTRNX_MYSQLI\ntrnx_mysqli {

	/* begin of class constructor */
	function __construct (){
	} /* end of class constructor */

	/* class destructor */
	function __destruct() {
	} /* end of class destructor */

	static function state() {

		if (\NTRNX_MYSQLI\ntrnx_mysqli_config::$allow_functions_check === TRUE) {

			return TRUE;

		} else if (self::_CLASS_NEEDED_FUNCTIONS === TRUE) {

			return TRUE;

		} else {

			return FALSE;

		}

	}

	static function get() {

		return self::$_class_needed_functions;

	}

    static function check() {

		$function_array = self::$_class_needed_functions;

        $passed = " - <i>passed</i>";
        $failed = " - <i><font color=\"red\">failed</font></i>";
        $result = "";

		foreach ($function_array as $key => $value) {

            $result .= "<br/> - " . $function_array [$key];

			if (!function_exists($function_array [$key])) {
				$result .= $failed;
			} else {
                $result .= $passed;
            }

		}

		return $result;

	}

} /* end of class */

?>