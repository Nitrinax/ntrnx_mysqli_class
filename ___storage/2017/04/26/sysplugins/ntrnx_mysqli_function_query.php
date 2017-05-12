<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_query extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli::query -- mysqli_query — Performs a query on the database
    static function link(

        $mysqli_handle,
        $statement,
        $options = NULL

    ) {

        /* debug output */
        if (\NTRNX_MYSQLI\NMYSQCC_DEBUG == TRUE) {
            print "<pre>" . $statement . "</pre>";
        }

        self::$last_query = $statement;

        if ($mysqli_handle) {

            if (!$result = mysqli_query ($mysqli_handle, $statement, $options)) {

                /* debug output */
                if (\NTRNX_MYSQLI\NMYSQCC_DEBUG == TRUE) {
                    print mysqli_error ($mysqli_handle) . NMYSQCC_BR;
                    print $statement . NMYSQCC_BR;
                }

                $result = FALSE;

            }

        } else {

            /* debug output */
            if (\NTRNX_MYSQLI\NMYSQCC_DEBUG == TRUE) {
                print NMYSQCC_ERROR_DB_HANDLE_NOT_INITIALIZED . NMYSQCC_BR;
                print $statement . NMYSQCC_BR;
            }            

            $result = FALSE;

        }

        return $result;        

    }

}

?>