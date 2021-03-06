<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class columns extends \NTRNX_MYSQLI\ntrnx_mysqli {

    // get all columns in a database table
    static function show(

        $mysqli_handle,
        $table

    ) {

        $statement = NMYSQCC_COLUMNS . NMYSQCC_IQ . self::$dbname . NMYSQCC_IQ . NMYSQCC_DOT . NMYSQCC_IQ . $table . NMYSQCC_IQ;

        $statement .= ";";

        self::$last_query = $statement;

        /* check for mysqli handle */
        if ($mysqli_handle) {

            /* check for connected state */
            if (self::$connected === TRUE) {

                if (!$result = mysqli_query ($mysqli_handle, $statement)) {

                    \NTRNX_MYSQLI\ntrnx_mysqli_internal_raise::error(mysqli_errno($mysqli_handle), get_called_class(), __LINE__, mysqli_error ($mysqli_handle));

                }

            } else {

                \NTRNX_MYSQLI\ntrnx_mysqli_internal_raise::error(NMYSQCC_ERROR_NOT_CONNECTED, get_called_class(), __LINE__);

            }

        } else {

            \NTRNX_MYSQLI\ntrnx_mysqli_internal_raise::error(NMYSQCC_ERROR_DB_HANDLE_NOT_INITIALIZED, get_called_class(), __LINE__);

        }

        return $result;

    }

}

?>