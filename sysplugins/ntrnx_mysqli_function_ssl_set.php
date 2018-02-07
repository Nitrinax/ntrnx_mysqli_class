<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ssl_set extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli::ssl_set -- mysqli_ssl_set — Used for establishing secure connections using SSL
    //http://php.net/manual/de/mysqli.ssl-set.php
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
        if(!file_exists($key)) {

            \NTRNX_MYSQLI\ntrnx_mysqli_internal_raise::error(NMYSQCC_ERROR_ON_SETTINGS_PATH_TO_FILE, get_called_class(), __LINE__, $key);
            return FALSE;
        }

        /* Specifies the path name to the certificate file */
        $cert = htmlspecialchars($cert);
        if(!file_exists($cert)) { 
            \NTRNX_MYSQLI\ntrnx_mysqli_internal_raise::error(NMYSQCC_ERROR_ON_SETTINGS_PATH_TO_FILE, get_called_class(), __LINE__, $cert);
            return FALSE;
        }

        /* Specifies the path name to the certificate authority file */    
        if (isset($ca)) {        
            $ca = htmlspecialchars($ca);
            if(!file_exists($ca)) { 
                \NTRNX_MYSQLI\ntrnx_mysqli_internal_raise::error(NMYSQCC_ERROR_ON_SETTINGS_PATH_TO_FILE, get_called_class(), __LINE__, $ca);
                return FALSE;
            }
        }

        /* Specifies the pathname to a directory that contains trusted SSL CA certificates in PEM format */
        if (isset($capath)) {
            $capath = htmlspecialchars($capath);
            if (!is_dir($capath)) {   
                \NTRNX_MYSQLI\ntrnx_mysqli_internal_raise::error(NMYSQCC_ERROR_ON_SETTINGS_PATH_TO_DIR, get_called_class(), __LINE__, $capath, "trusted SSL CA certificates");
                return FALSE;
            }
        }

        if (isset($cipher)) { $cipher = htmlspecialchars($cipher); }

        mysqli_ssl_set($mysqli_handle, $key, $cert, $ca, $capath, $cipher);

        return TRUE;

    }

}

?>