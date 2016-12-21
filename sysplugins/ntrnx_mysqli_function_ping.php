<?php

namespace NTRNX_MYSQLI\ntrnx_mysqli;

/* begin of class version */
class ping extends \NTRNX_MYSQLI\ntrnx_mysqli{

    //mysqli_ping() 	Pings a server connection, or tries to reconnect if the connection has gone down
    static function ping(

        $mysqli_handle

    ) {

        return mysqli_ping ($mysqli_handle);

    }

}

?>