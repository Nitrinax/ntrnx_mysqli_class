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

		return self::_CLASS_DEPENDENCES;

	}

	static function get() {

		return self::$_class_dependences;

	}

	static function check() {

		$dependences_array = self::$_class_dependences;

		$passed = "passed";
		$result = "";

		foreach ($dependences_array as $key => $value) {

			/* check of dependences source */
			switch($key) {

				/* if php */
				case "PHP":
					/* check for needed version */
					if (version_compare(phpversion(), $value, "<")) {

						$result .= "<br/> - need \"" .  $key . " " .  $value . "\"";

					}

				break;

				default:
				break;
			}

		}

		if ($result) { return $result; } else { return $passed; }

	}


} /* end of class */

?>