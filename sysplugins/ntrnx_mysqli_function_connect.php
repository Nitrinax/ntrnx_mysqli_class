<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class connect extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli::__construct -- mysqli_connect — Open a new connection to the MySQL server
    
    static function db() {

        $host = \NTRNX_MYSQLI\ntrnx_mysqli::$host;
        $username = \NTRNX_MYSQLI\ntrnx_mysqli::$username;
        $passwd = \NTRNX_MYSQLI\ntrnx_mysqli::$passwd;
		$dbname = \NTRNX_MYSQLI\ntrnx_mysqli::$dbname;
        $port = \NTRNX_MYSQLI\ntrnx_mysqli::$port;
        $socket = \NTRNX_MYSQLI\ntrnx_mysqli::$socket;

        /* check porrt value */
        if ($port != NULL && filter_var($port, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE) === NULL) { 

            \NTRNX_MYSQLI\ntrnx_mysqli_internal_raise::error(NMYSQCC_ERROR_ON_SETTINGS_VALUE_FOR_OPTION, get_called_class(), __LINE__ , $port, "DB_PORT");
            \NTRNX_MYSQLI\ntrnx_mysqli_internal_raise::error(NMYSQCC_ERROR_VALUE_MUST_BE_INTEGER, get_called_class(), __LINE__);

        } else {

            /* create connection */
            $mysqli_handle = @mysqli_connect ($host, $username, $passwd, $dbname, $port, $socket);
            if (!$mysqli_handle) {
                
                \NTRNX_MYSQLI\ntrnx_mysqli_internal_raise::error(mysqli_connect_errno(), get_called_class(), __LINE__, mysqli_connect_error());
                
            } else {

                self::$persistent_connection = FALSE;

                self::$connected = TRUE;

                return $mysqli_handle;

            }

        }

    }

}

?>