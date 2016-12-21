<?php

namespace NTRNX_MYSQLI\ntrnx_mysqli;

/* begin of class version */
class fields extends \NTRNX_MYSQLI\ntrnx_mysqli{

    // get all fields in a given database table
    static function get(

        $mysqli_handle,
        $database,
        $table

    ) {

        $statement = "SHOW COLUMNS FROM " . NMYSQCC_IQ . $database . NMYSQCC_IQ . NMYSQCC_DOT . NMYSQCC_IQ . $table . NMYSQCC_IQ . ";";

        if ($mysqli_handle) {
 
            if (!$query = mysqli_query ($mysqli_handle, $statement)) {

                /* debug output */
                if (NMYSQCC_DEBUG == TRUE) {
                    print mysqli_error ($mysqli_handle) . NMYSQCC_BR;
                    print $statement . NMYSQCC_BR;
                }

                $result = FALSE;

            } else {

                $result = $query;

            }

            self::free_result($query);

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