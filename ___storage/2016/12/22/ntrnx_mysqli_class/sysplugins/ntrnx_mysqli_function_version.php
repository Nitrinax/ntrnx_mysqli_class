<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_version extends \NTRNX_MYSQLI\ntrnx_mysqli {

    static function get(){

		return self::_CLASS_NAME . " version "
				. self::_CLASS_VERSION_MAJOR . "."
				. self::_CLASS_VERSION_MINOR . "."
				. self::_CLASS_VERSION_BUILD . "."
				. self::_CLASS_VERSION_REVISION
				. " (" . self::_CLASS_DATE . ")"
				. " [" . self::_CLASS_TIME . "]"
				. " loaded" . NMYSQCC_BR;

    }

}

?>