<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_connect extends \NTRNX_MYSQLI\ntrnx_mysqli {

    private static $error = FALSE;
    private static $error_msg = NULL;

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
            $placeholder_array = array ("{VALUE}", "{OPTION}");
            $string_array = array ($port, "port");

            $error = TRUE;
            $error_msg = str_replace($placeholder_array, $string_array, NMYSQCC_ERROR_ON_SETTINGS_VALUE_FOR_OPTION) . NMYSQCC_ERROR_VALUE_MUST_BE_INTEGER;

        }

        /* create connection */
        $mysqli_handle = mysqli_connect ($host, $username, $passwd, $dbname, $port, $socket);
        if (!$mysqli_handle) {
            
            $error = TRUE;
            $error_msg = "Connect Error (" . mysqli_connect_errno() . ") " . mysqli_connect_error() . " " . "{" . $host . ", " . $username . ", " . "********, " . $dbname . ", " . $port . ", " . $socket . ", " . $flags . "}";
            
        }

        /* check for error */
        if ($error === TRUE) {

            /* error output */
            if (NMYSQCC_LOG_LEVEL >= 4) {
                \NTRNX_MYSQLI\ntrnx_mysqli::log_error($error_msg, get_called_class(), __LINE__ );
            }
            if (NMYSQCC_DISPLAY_LEVEL >= 4) {
                print $error_msg . NMYSQCC_BR;
            }

            return FALSE;

        } else {

            self::$persistent_connection = FALSE;

            self::$connected = TRUE;

            return $mysqli_handle;

        }

    }

}

?>