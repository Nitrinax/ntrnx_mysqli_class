<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_last_query extends \NTRNX_MYSQLI\ntrnx_mysqli {

    /* return last query */
    static function get() {

        return self::$last_query;

    }

}

?>