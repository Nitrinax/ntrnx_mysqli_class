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

        /* check for mysqli handle */
        if ($mysqli_handle) {

            /* check for connected state */
            if (self::$connected === TRUE) {

                /* check have_openssl */
                if (!$result_openssl = mysqli_query ($mysqli_handle, "SHOW SESSION VARIABLES LIKE 'have_openssl';")) {

                    \NTRNX_MYSQLI\ntrnx_mysqli::raise_error(mysqli_errno($mysqli_handle), get_called_class(), __LINE__, mysqli_error ($mysqli_handle));

                } else {

                    while ( $row = mysqli_fetch_array ($result_openssl) ) {

                        if ($row["Value"] === "YES") { $have_openssl = TRUE; }

                    }

                    if ($result_openssl) { mysqli_free_result($result_openssl); }

                }

                /* check have_ssl */
                if (!$result_ssl = mysqli_query ($mysqli_handle, "SHOW SESSION VARIABLES LIKE 'have_ssl';")) {

                    \NTRNX_MYSQLI\ntrnx_mysqli::raise_error(mysqli_errno($mysqli_handle), get_called_class(), __LINE__, mysqli_error ($mysqli_handle));

                } else {

                    while ( $row = mysqli_fetch_array ($result_ssl) ) {

                        if ($row["Value"] === "YES") { $have_ssl = TRUE; }

                    }

                    if ($result_ssl) { mysqli_free_result($result_ssl); }

                }

                /* check Ssl_cipher */
                if (!$result_ssl_cipher = mysqli_query ($mysqli_handle, "SHOW SESSION STATUS LIKE 'Ssl_cipher';")) {

                    \NTRNX_MYSQLI\ntrnx_mysqli::raise_error(mysqli_errno($mysqli_handle), get_called_class(), __LINE__, mysqli_error ($mysqli_handle));

                } else {

                    while ( $row = mysqli_fetch_array ($result_ssl_cipher) ) {

                        if ($row["Value"] != "") { $have_cipher = TRUE; }

                    }

                    if ($result_ssl_cipher) { mysqli_free_result($result_ssl_cipher); }

                }

                /* check Ssl_version */
                if (!$result_ssl_version = mysqli_query ($mysqli_handle, "SHOW SESSION STATUS LIKE 'Ssl_version';")) {

                    \NTRNX_MYSQLI\ntrnx_mysqli::raise_error(mysqli_errno($mysqli_handle), get_called_class(), __LINE__, mysqli_error ($mysqli_handle));

                } else {

                    while ( $row = mysqli_fetch_array ($result_ssl_version) ) {

                        if ($row["Value"] != "") { $have_tls = TRUE; }

                    }

                    if ($result_ssl_version) { mysqli_free_result($result_ssl_version); }

                }

                /* check ssl_key */
                if (!$result_ssl_key = mysqli_query ($mysqli_handle, "SHOW SESSION VARIABLES LIKE 'ssl_key';")) {

                    \NTRNX_MYSQLI\ntrnx_mysqli::raise_error(mysqli_errno($mysqli_handle), get_called_class(), __LINE__, mysqli_error ($mysqli_handle));

                } else {

                    while ( $row = mysqli_fetch_array ($result_ssl_key) ) {

                        if ($row["Value"] != "") { $have_key = TRUE; }

                    }

                    if ($result_ssl_key) { mysqli_free_result($result_ssl_key); }

                }

                /* check ssl_cert */
                if (!$result_ssl_cert = mysqli_query ($mysqli_handle, "SHOW SESSION VARIABLES LIKE 'ssl_cert';")) {

                    \NTRNX_MYSQLI\ntrnx_mysqli::raise_error(mysqli_errno($mysqli_handle), get_called_class(), __LINE__, mysqli_error ($mysqli_handle));

                } else {

                    while ( $row = mysqli_fetch_array ($result_ssl_cert) ) {

                        if ($row["Value"] != "") { $have_cert = TRUE; }

                    }

                    if ($result_ssl_cert) { mysqli_free_result($result_ssl_cert); }

                }

                /* check ssl_ca */
                if (!$result_ssl_ca = mysqli_query ($mysqli_handle, "SHOW SESSION VARIABLES LIKE 'ssl_ca';")) {

                    \NTRNX_MYSQLI\ntrnx_mysqli::raise_error(mysqli_errno($mysqli_handle), get_called_class(), __LINE__, mysqli_error ($mysqli_handle));

                } else {

                    while ( $row = mysqli_fetch_array ($result_ssl_ca) ) {

                        if ($row["Value"] != "") { $have_ca = TRUE; }

                    }

                    if ($result_ssl_ca) { mysqli_free_result($result_ssl_ca); }

                }


            } else {

                \NTRNX_MYSQLI\ntrnx_mysqli::raise_error(3, get_called_class(), __LINE__);

            }

        } else {

            \NTRNX_MYSQLI\ntrnx_mysqli::raise_error(2, get_called_class(), __LINE__);

        }

        if ($have_openssl == TRUE &&
            $have_ssl == TRUE &&
            $have_cipher == TRUE &&
            $have_tls == TRUE &&
            $have_key == TRUE &&
            $have_cert == TRUE &&
            $have_ca == TRUE) {

            \NTRNX_MYSQLI\ntrnx_mysqli::raise_error(60, get_called_class(), __LINE__);
            
            return TRUE;

        } else {

            \NTRNX_MYSQLI\ntrnx_mysqli::raise_error(61, get_called_class(), __LINE__);

            return FALSE;

        }

    }

}

?>