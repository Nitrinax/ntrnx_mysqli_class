<?php

/*
* class ntrnx_mysqli_core
*
* short:
*
* - core funtions for class ntrnx_mysqli
*
*/

namespace NTRNX_MYSQLI;

/* begin of class ntrnx_mysqli_core */
class ntrnx_mysqli_core extends \NTRNX_MYSQLI\ntrnx_mysqli_data {

	static function check_dependences() {

		$dependences_array = self::$_class_dependences;

        $passed = " - <i>passed</i>";
        $failed = " - <i><font color=\"red\">failed</font></i>";
        $result = "";

		foreach ($dependences_array as $key => $value) {

			/* check of dependences source */
			switch($key) {

				/* if php */
				case "PHP":
					/* check for needed version */

                    $result .= "<br/> - " .  $key . " " .  $value;

					if (version_compare(phpversion(), $value, "<")) {
						$result .= $failed;
					} else {
                        $result .= $passed;
                    }

				break;

				default:
                     $result .= "<br/> - " .  $key . " " .  $value . " " . $failed;
				break;
			}

		}

		return $result;

	}

    static function check_needed_functions() {

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

} /* end of class ntrnx_mysqli_core */

?>