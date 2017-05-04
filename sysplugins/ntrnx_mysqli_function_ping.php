<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_ping extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli::ping -- mysqli_ping — Pings a server connection, or tries to reconnect if the connection has gone down
    static function link(

        $mysqli_handle

    ) {

        return mysqli_ping ($mysqli_handle);

    }

}

?>