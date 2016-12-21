<?php

namespace NTRNX_MYSQLI\ntrnx_mysqli;

/* begin of class version */
class server extends \NTRNX_MYSQLI\ntrnx_mysqli{

    //mysqli_get_host_info() 	Returns the MySQL server hostname and the connection type
    static function host_info(

        $mysqli_handle

    ) {

        return mysqli_get_host_info ($mysqli_handle);

    }

    //mysqli_get_server_info() 	Returns the MySQL server version
    static function server_info() {}

    //mysqli_stat() 	Returns the current system status
    static function stat() {}

    //mysqli_get_server_version() 	Returns the MySQL server version as an integer
    static function server_version() {}

}

?>