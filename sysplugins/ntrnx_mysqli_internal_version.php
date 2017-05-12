<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_internal_version extends \NTRNX_MYSQLI\ntrnx_mysqli {

	static function get_major(){

		return self::_CLASS_VERSION_MAJOR;

	}

	static function get_minor(){

		return self::_CLASS_VERSION_MINOR;

	}

	static function get_build(){

		return self::_CLASS_VERSION_BUILD;

	}

	static function get_revision(){

		return self::_CLASS_VERSION_REVISION;

	}

	static function get_date(){

		return self::_CLASS_DATE;

	}

	static function get_time(){

		return self::_CLASS_TIME;

	}

}

?>