<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_ssl_set extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli::ssl_set -- mysqli_ssl_set — Used for establishing secure connections using SSL
    static function link(

        $mysqli_handle

    ) {

        $key = \NTRNX_MYSQLI\ntrnx_mysqli::$key;
        $cert = \NTRNX_MYSQLI\ntrnx_mysqli::$cert;
        $ca = \NTRNX_MYSQLI\ntrnx_mysqli::$ca;
        $capath = \NTRNX_MYSQLI\ntrnx_mysqli::$capath;
        $cipher = \NTRNX_MYSQLI\ntrnx_mysqli::$cipher;

        /* Specifies the path name to the key file */
        $key = htmlspecialchars($key);
        if(!file_exists($key)) { die(str_replace("{FILE}", "key file " . $key, NMYSQCC_ERROR_ON_SETTINGS_PATH_TO_FILE)); }

        /* Specifies the path name to the certificate file */
        $cert = htmlspecialchars($cert);
        if(!file_exists($key)) { die(str_replace("{FILE}", "certificate file " . $cert, NMYSQCC_ERROR_ON_SETTINGS_PATH_TO_FILE)); }

        /* Specifies the path name to the certificate authority file */    
        if (isset($ca)) {        
            $ca = htmlspecialchars($ca);
            if(!file_exists($ca)) { die(str_replace("{FILE}", "certificate authority file " . $ca, NMYSQCC_ERROR_ON_SETTINGS_PATH_TO_FILE)); }
        }

        /* Specifies the pathname to a directory that contains trusted SSL CA certificates in PEM format */
        if (isset($capath)) {
            $capath = htmlspecialchars($capath);
            if (!is_dir($capath)) {                
                $placeholder_array = array ("{DIR}", "{FILE}");
                $string_array = array ($capath, "trusted SSL CA certificates");
                die(str_replace($placeholder_array, $string_array, NMYSQCC_ERROR_ON_SETTINGS_PATH_TO_DIR));                
            }
        }

        if (isset($cipher)) { $cipher = htmlspecialchars($cipher); }

        mysqli_ssl_set($mysqli_handle, $key, $cert, $ca, $capath, $cipher);

    }

}

?>