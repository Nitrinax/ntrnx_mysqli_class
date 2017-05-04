<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_internal_author extends \NTRNX_MYSQLI\ntrnx_mysqli {

    static function get(){

		return self::_CLASS_AUTHOR_NAME
			. NMYSQCC_BLANK
			. NMYSQCC_LEFT_PARENTHESIS
			. self::_CLASS_AUTHOR_NICK
			. NMYSQCC_RIGHT_PARENTHESIS
			. NMYSQCC_BLANK
			. NMYSQCC_OPEN_BRACKET
			. self::_CLASS_AUTHOR_MAIL
			. NMYSQCC_CLOSE_BRACKET
			. NMYSQCC_BLANK
			. NMYSQCC_SQUARE_BRACKET_OPEN
			. self::_CLASS_AUTHOR_URL
			. NMYSQCC_SQUARE_BRACKET_CLOSE;

    }

}

?>