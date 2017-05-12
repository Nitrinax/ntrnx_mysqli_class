<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_internal_author extends \NTRNX_MYSQLI\ntrnx_mysqli {

    static function get_name(){

		  return self::_CLASS_AUTHOR_NAME;

    }

    static function get_nick(){

		  return self::_CLASS_AUTHOR_NICK;

    }

    static function get_email(){

		  return self::_CLASS_AUTHOR_MAIL;

    }

    static function get_url(){

		  return self::_CLASS_AUTHOR_URL;

    }

}

?>