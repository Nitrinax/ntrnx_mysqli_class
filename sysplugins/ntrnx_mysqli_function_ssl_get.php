<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_ssl_get extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //return ssl status for given connection
    static function link(

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

}

?>