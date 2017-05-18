<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_raw_query extends \NTRNX_MYSQLI\ntrnx_mysqli {

    private static $error = FALSE;
    private static $error_msg = NULL;

    //(PHP 5, PHP 7)
    //mysqli::query -- mysqli_query — Performs a query on the database
    static function link(

        $mysqli_handle,
        $statement,
        $options = NULL

    ) {

        /* debug output */
        if (NMYSQCC_DEBUG === TRUE) {
            print "<pre>" . $statement . "</pre>";
        }

        self::$last_query = $statement;

        if ($mysqli_handle) {

            /* check for connected state */
            if (self::$connected === TRUE) {

                if (!$result = mysqli_query ($mysqli_handle, $statement, $options)) {

                    $error = TRUE;
                    $error_msg = mysqli_error ($mysqli_handle);

                }

            } else {

                $error = TRUE;
                $error_msg = NMYSQCC_ERROR_NOT_CONNECTED . " (" . mysqli_connect_errno() . ")";

            }

        } else {

            $error = TRUE;
            $error_msg = NMYSQCC_ERROR_DB_HANDLE_NOT_INITIALIZED;

        }

        /* check for error */
        if ($error === TRUE) {

            /* error output */
            if (NMYSQCC_LOG_ERRORS === TRUE) {
                \NTRNX_MYSQLI\ntrnx_mysqli::log_error($error_msg, get_called_class(), __LINE__ );
            }
            if (NMYSQCC_DISPLAY_ERRORS === TRUE) {
                print $error_msg . NMYSQCC_BR;
            }

            $result = FALSE;

        }

        return $result;     

    }

}

?>