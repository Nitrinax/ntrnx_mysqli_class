<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_internal_dependences extends \NTRNX_MYSQLI\ntrnx_mysqli {

	/* begin of class constructor */
	function __construct (){	
	} /* end of class constructor */

	/* class destructor */
	function __destruct() {
	} /* end of class destructor */

	static function state() {

		if (\NTRNX_MYSQLI\ntrnx_mysqli_config::$allow_dependences_check === TRUE) {

			return TRUE;

		} else if (self::_CLASS_DEPENDENCES === TRUE) {

			return TRUE;

		} else {

			return FALSE;

		}

	}

	static function get() {

		return self::$_class_dependences;

	}

	static function check() {

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

} /* end of class */

?>