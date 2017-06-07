<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class dump_debug_info extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli::dump_debug_info -- mysqli_dump_debug_info — Dump debugging information into the log
    static function link(

        $mysqli_handle

    ) {

        return mysqli_dump_debug_info ($mysqli_handle);

    }
}

?>