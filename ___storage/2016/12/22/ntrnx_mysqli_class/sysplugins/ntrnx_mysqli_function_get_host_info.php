<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_get_host_info extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli::$host_info -- mysqli_get_host_info — Returns a string representing the type of connection used
    static function link(

        $mysqli_handle

    ) {

        return mysqli_get_host_info ($mysqli_handle);

    }

}

?>