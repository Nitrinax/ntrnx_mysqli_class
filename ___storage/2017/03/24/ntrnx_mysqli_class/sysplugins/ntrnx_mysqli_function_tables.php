<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_tables extends \NTRNX_MYSQLI\ntrnx_mysqli {

    // get all tables in a given database
    static function show(

        $mysqli_handle,
        $database

    ) {

        $statement = "SHOW TABLES FROM " . NMYSQCC_IQ . $database . NMYSQCC_IQ . ";";

        if ($mysqli_handle) {
 
            if (!$result = mysqli_query ($mysqli_handle, $statement)) {

                /* debug output */
                if (NMYSQCC_DEBUG == TRUE) {
                    print mysqli_error ($mysqli_handle) . NMYSQCC_BR;
                    print $statement . NMYSQCC_BR;
                }

                $result = FALSE;

            }

        } else {

            /* debug output */
            if (NMYSQCC_DEBUG == TRUE) {
                print NMYSQCC_ERROR_DB_HANDLE_NOT_INITIALIZED . NMYSQCC_BR;
                print $statement . NMYSQCC_BR;
            }            

            $result = FALSE;

        }

        return $result;

    }

}

?>