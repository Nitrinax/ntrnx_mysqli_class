<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_real_pconnect extends \NTRNX_MYSQLI\ntrnx_mysqli {

   //mysqli_real_pconnect()   Opens a new persistent connection to the MySQL server
    static function db( 

        $mysqli_handle,
        $host,
        $username,
        $passwd,
        $dbname,
        $port = NULL,
        $socket = NULL,
        $flags = NULL
        
    ) {

        /* debug output */
        if (NMYSQCC_DEBUG == TRUE) {
            //print "host: " . $host . NMYSQCC_COMMA;
            //print " username: " . $username . NMYSQCC_COMMA;
            //print " passwd: ********" . NMYSQCC_COMMA;
            //print " dbname: " . $dbname . NMYSQCC_COMMA;
            //print " port: " . $port . NMYSQCC_COMMA;
            //print " socket: " . $socket . NMYSQCC_COMMA;
            //print " flags: " . $flags . NMYSQCC_BR;
        }

        /* check porrt value */
        if ($port != NULL && filter_var($port, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE) === NULL) { 
            $placeholder_array = array ("{VALUE}", "{OPTION}");
            $string_array = array ($port, "port");
            die(str_replace($placeholder_array, $string_array, NMYSQCC_ERROR_ON_SETTINGS_VALUE_FOR_OPTION_MUST_BE_INTEGER));
        }
        
        /* create connection */
        if (!@mysqli_real_connect($mysqli_handle, "p:" . $host, $username, $passwd, $dbname, $port, $socket, $flags)) {
            die("Connect Error (" . mysqli_connect_errno() . ") " . mysqli_connect_error());
        }

        /* debug output */
        if (NMYSQCC_DEBUG == TRUE) {
            //print "Success... " . mysqli_get_host_info ($mysqli_handle) . NMYSQCC_BR;
        }

        self::$persistent_connection = TRUE;

        self::$connected = TRUE;

    }

}

?>