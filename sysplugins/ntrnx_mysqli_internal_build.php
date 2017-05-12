<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_internal_build extends \NTRNX_MYSQLI\ntrnx_mysqli {

    static function get_branch(){

        return self::_CLASS_BRANCH;

    }
    static function get_build_channel(){

        return self::_CLASS_BUILD_CHANNEL;

    }

}

?>