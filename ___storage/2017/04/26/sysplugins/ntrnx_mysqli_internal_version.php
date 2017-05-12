<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_internal_version extends \NTRNX_MYSQLI\ntrnx_mysqli {

    static function get(){

		return self::_CLASS_NAME
			. NMYSQCC_BLANK
    		. self::_CLASS_VERSION_MAJOR
			. NMYSQCC_DOT
			. self::_CLASS_VERSION_MINOR
			. NMYSQCC_DOT
			. self::_CLASS_VERSION_BUILD
			. NMYSQCC_DOT
			. self::_CLASS_VERSION_REVISION
			. NMYSQCC_BLANK
			. NMYSQCC_LEFT_PARENTHESIS
			. self::_CLASS_DATE
			. NMYSQCC_RIGHT_PARENTHESIS
			. NMYSQCC_BLANK
			. NMYSQCC_SQUARE_BRACKET_OPEN
			. self::_CLASS_TIME
			. NMYSQCC_SQUARE_BRACKET_CLOSE;

    }

}

?>