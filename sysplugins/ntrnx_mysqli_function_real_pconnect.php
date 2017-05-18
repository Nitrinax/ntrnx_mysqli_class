<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_real_pconnect extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //mysqli::real_connect -- mysqli_real_connect — Opens a connection to a mysql server
    //http://php.net/manual/de/mysqli.real-connect.php
    static function db(

        $mysqli_handle
        
    ) {

        $host = \NTRNX_MYSQLI\ntrnx_mysqli::$host;
        $username = \NTRNX_MYSQLI\ntrnx_mysqli::$username;
        $passwd = \NTRNX_MYSQLI\ntrnx_mysqli::$passwd;
		$dbname = \NTRNX_MYSQLI\ntrnx_mysqli::$dbname;
        $port = \NTRNX_MYSQLI\ntrnx_mysqli::$port;
        $socket = \NTRNX_MYSQLI\ntrnx_mysqli::$socket;
        $flags = \NTRNX_MYSQLI\ntrnx_mysqli::$flags;

        /* check porrt value */
        if ($port != NULL && filter_var($port, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE) === NULL) { 
            //$placeholder_array = array ("{VALUE}", "{OPTION}");
            //$string_array = array ($port, "port");

            \NTRNX_MYSQLI\ntrnx_mysqli::raise_error(30, get_called_class(), __LINE__ , $port, "port");
            \NTRNX_MYSQLI\ntrnx_mysqli::raise_error(31, get_called_class(), __LINE__);
            return FALSE;

        }

        /* create connection */
        if (!@mysqli_real_connect($mysqli_handle, "p:" . $host, $username, $passwd, $dbname, $port, $socket, $flags)) {

            \NTRNX_MYSQLI\ntrnx_mysqli::raise_error(mysqli_connect_errno(), get_called_class(), __LINE__, mysqli_connect_error());
            return FALSE;

        } else {

            self::$persistent_connection = FALSE;

            self::$connected = TRUE;

        }

        return TRUE;

    }

}

?>