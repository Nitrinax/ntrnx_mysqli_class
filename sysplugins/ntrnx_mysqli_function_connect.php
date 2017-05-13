<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_connect extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli::__construct -- mysqli_connect — Open a new connection to the MySQL server
    
    static function db() {

        $host = \NTRNX_MYSQLI\ntrnx_mysqli::$host;
        $username = \NTRNX_MYSQLI\ntrnx_mysqli::$username;
        $passwd = \NTRNX_MYSQLI\ntrnx_mysqli::$passwd;
		$dbname = \NTRNX_MYSQLI\ntrnx_mysqli::$dbname;
        $port = \NTRNX_MYSQLI\ntrnx_mysqli::$port;
        $socket = \NTRNX_MYSQLI\ntrnx_mysqli::$socket;

        /* debug output */
        if (NMYSQCC_DEBUG == TRUE) {
            //print "host: " . $host . NMYSQCC_COMMA;
            //print " username: " . $username . NMYSQCC_COMMA;
            //print " passwd: ********" . NMYSQCC_COMMA;
            //print " dbname: " . $dbname . NMYSQCC_COMMA;
            //print " port: " . $port . NMYSQCC_COMMA;
            //print " socket: " . $socket . NMYSQCC_COMMA;
        }

        /* check porrt value */
        if ($port != NULL && filter_var($port, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE) === NULL) { 
            $placeholder_array = array ("{VALUE}", "{OPTION}");
            $string_array = array ($port, "port");
            die(str_replace($placeholder_array, $string_array, NMYSQCC_ERROR_ON_SETTINGS_VALUE_FOR_OPTION_MUST_BE_INTEGER));
        }

        /* create connection */
        $mysqli_handle = mysqli_connect ($host, $username, $passwd, $dbname, $port, $socket);
        if (!$mysqli_handle) { die("Connect Error (" . mysqli_connect_errno() . ") " . mysqli_connect_error()); }

        /* debug output */
        if (NMYSQCC_DEBUG == TRUE) {
            //print "Success... " . mysqli_get_host_info ($mysqli_handle) . NMYSQCC_BR;
        }

        self::$persistent_connection = FALSE;

        self::$connected = TRUE;

        return $mysqli_handle;

    }

}

?>