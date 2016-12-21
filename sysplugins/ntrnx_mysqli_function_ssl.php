<?php

namespace NTRNX_MYSQLI\ntrnx_mysqli;

/* begin of class version */
class ssl extends \NTRNX_MYSQLI\ntrnx_mysqli{

    //return ssl status for given connection
    static function get(

        $mysqli_handle

    ) { 

        $have_openssl = FALSE;
        $have_ssl = FALSE;
        $have_cipher = FALSE;
        $have_tls = FALSE;
        $have_key = FALSE;
        $have_cert = FALSE;
        $have_ca = FALSE;

        /* check have_openssl */
        $result_openssl = mysqli_query ($mysqli_handle, "SHOW SESSION VARIABLES LIKE 'have_openssl';");
        while ( $row = mysqli_fetch_array ($result_openssl) ) {
            if ($row["Value"] == "YES") { $have_openssl = TRUE; }
        }
        mysqli_free_result($result_openssl);

        /* check have_ssl */
        $result_ssl = mysqli_query ($mysqli_handle, "SHOW SESSION VARIABLES LIKE 'have_ssl';");
        while ( $row = mysqli_fetch_array ($result_ssl) ) {
            if ($row["Value"] == "YES") { $have_ssl = TRUE; }
        }
        mysqli_free_result($result_ssl);

        /* check Ssl_cipher */
        $result_ssl_cipher = mysqli_query ($mysqli_handle, "SHOW SESSION STATUS LIKE 'Ssl_cipher';");
        while ( $row = mysqli_fetch_array ($result_ssl_cipher) ) {
            if ($row["Value"] != "") { $have_cipher = TRUE; }
        }
        mysqli_free_result($result_ssl_cipher);

        /* check Ssl_version */
        $result_ssl_version = mysqli_query ($mysqli_handle, "SHOW SESSION STATUS LIKE 'Ssl_version';");
        while ( $row = mysqli_fetch_array ($result_ssl_version) ) {
            if ($row["Value"] != "") { $have_tls = TRUE; }
        }
        mysqli_free_result($result_ssl_version);

        /* check ssl_key */
        $result_ssl_key = mysqli_query ($mysqli_handle, "SHOW SESSION VARIABLES LIKE 'ssl_key';");
        while ( $row = mysqli_fetch_array ($result_ssl_key) ) {
            if ($row["Value"] != "") { $have_key = TRUE; }
        }
        mysqli_free_result($result_ssl_key);
        
        /* check ssl_cert */
        $result_ssl_cert = mysqli_query ($mysqli_handle, "SHOW SESSION VARIABLES LIKE 'ssl_cert';");
        while ( $row = mysqli_fetch_array ($result_ssl_cert) ) {
            if ($row["Value"] != "") { $have_cert = TRUE; }
        }
        mysqli_free_result($result_ssl_cert);
        
        /* check ssl_ca */
        $result_ssl_ca = mysqli_query ($mysqli_handle, "SHOW SESSION VARIABLES LIKE 'ssl_ca';");
        while ( $row = mysqli_fetch_array ($result_ssl_ca) ) {
            if ($row["Value"] != "") { $have_ca = TRUE; }
        }
        mysqli_free_result($result_ssl_ca);

        if ($have_openssl == TRUE &&
            $have_ssl == TRUE &&
            $have_cipher == TRUE &&
            $have_tls == TRUE &&
            $have_key == TRUE &&
            $have_cert == TRUE &&
            $have_ca == TRUE) {

            return TRUE;

        } else {

            return FALSE;

        }

    }

    static function getA(

        $mysqli_handle

    ) { 

        $have_openssl = FALSE;
        $have_ssl = FALSE;
        $have_cipher = FALSE;
        $have_tls = FALSE;
        $have_key = FALSE;
        $have_cert = FALSE;
        $have_ca = FALSE;

        $ssl_status = FALSE;

        $ssl_array = array (    array("VARIABLES", "have_openssl", "==", "YES"),
                                array("VARIABLES", "have_ssl", "==", "YES"),
                                array("VARIABLES", "ssl_key", "!=", ""),
                                array("VARIABLES", "ssl_cert", "!=", ""),
                                array("VARIABLES", "ssl_ca", "!=", ""),
                                array("STATUS", "Ssl_cipher", "!=", ""),
                                array("STATUS", "Ssl_version", "!=", "")
			                );

        if ($mysqli_handle) {

            for ($i = 0; $i < count($ssl_array); $i++) {

                print "SHOW SESSION " . $ssl_array[$i][0] . " LIKE '" . $ssl_array[$i][1] . "'; <br />";
                
                $result = mysqli_query ($mysqli_handle, "SHOW SESSION " . $ssl_array[$i][0] . " LIKE '" . $ssl_array[$i][1] . "';");
                
                //for ($row = 0; $row < count($result); $row++) {

                while ( $row = mysqli_fetch_array ($result) ) {

                    if ( ($row["Variable_name"] === $ssl_array[$i][1]) AND ($row["Value"] . $ssl_array[$i][2] . $ssl_array[$i][3]) ) {

                        $ssl_status = TRUE;
                        
                    } else {

                        $ssl_status = FALSE;

                    }

                }

                mysqli_free_result($result);

            }

        } else {

        }

        return $ssl_status;

    }

    //mysqli_ssl_set() 	Used to establish secure connections using SSL
    static function set(

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