<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_internal_url extends \NTRNX_MYSQLI\ntrnx_mysqli {

    static function get_project_url(){

        return self::_CLASS_PROJECT_URL;

    }

    static function get_source_url(){

        return self::_CLASS_SOURCE_URL;

    }

    static function get_version_url(){

        return self::_CLASS_VERSION_URL;

    }

    static function get_update_url(){

        return self::_CLASS_UPDATE_URL;

    }

    static function get_manual_url(){

        return self::_CLASS_MANUAL_URL;

    }

}

?>