<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_ssl_set extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli::ssl_set -- mysqli_ssl_set — Used for establishing secure connections using SSL
    static function link(

        $mysqli_handle,
        $key,
        $cert,
        $ca,
        $capath = NULL,
        $cipher = NULL

    ) {

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

        /* Specifies a list of allowable ciphers to use for SSL encryption */
        /*
            ECDHE-ECDSA-AES128-GCM-SHA256
            ECDHE-RSA-AES128-GCM-SHA256
            ECDHE-ECDSA-AES128-SHA
            ECDHE-RSA-AES128-SHA
            ECDHE-ECDSA-AES256-SHA
            ECDHE-RSA-AES256-SHA
            AES128-GCM-SHA256
            AES128-SHA
            DES-CBC3-SHA
            AES256-SHA
            DHE-RSA-AES128-SHA
            EDH-RSA-DES-CBC3-SHA
            DHE-RSA-AES256-SHA
        */
        if (isset($cipher)) { $cipher = htmlspecialchars($cipher); }

        mysqli_ssl_set($mysqli_handle, $key, $cert, $ca, $capath, $cipher);

    }

}

?>