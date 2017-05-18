<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_tables extends \NTRNX_MYSQLI\ntrnx_mysqli {

    // get all tables in a database
    static function show(

        $mysqli_handle

    ) {

        $statement = NMYSQCC_TABLES . NMYSQCC_IQ . self::$dbname . NMYSQCC_IQ . ";";

        self::$last_query = $statement;

        /* check for mysqli handle */
        if ($mysqli_handle) {

            /* check for connected state */
            if (self::$connected === TRUE) {

                if (!$result = mysqli_query ($mysqli_handle, $statement)) {

                    \NTRNX_MYSQLI\ntrnx_mysqli::raise_error(mysqli_errno($mysqli_handle), get_called_class(), __LINE__, mysqli_error ($mysqli_handle));

                }

            } else {

                \NTRNX_MYSQLI\ntrnx_mysqli::raise_error(3, get_called_class(), __LINE__);

            }

        } else {

            \NTRNX_MYSQLI\ntrnx_mysqli::raise_error(2, get_called_class(), __LINE__);

        }

        return $result;

    }

}

?>