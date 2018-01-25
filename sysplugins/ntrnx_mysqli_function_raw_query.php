<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class raw_query extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli::query -- mysqli_query — Performs a query on the database
    static function link(

        $mysqli_handle,
        $statement,
        $options = NULL

    ) {

        self::$last_query = $statement;

        /* check for mysqli handle */
        if ($mysqli_handle) {

            /* check for connected state */
            if (self::$connected === TRUE) {

                if (!$result = mysqli_query ($mysqli_handle, $statement, $resultmode)) {

                    \NTRNX_MYSQLI\ntrnx_mysqli_internal_error::raise(mysqli_errno($mysqli_handle), get_called_class(), __LINE__, mysqli_error ($mysqli_handle));

                }

            } else {

                \NTRNX_MYSQLI\ntrnx_mysqli_internal_error::raise(3, get_called_class(), __LINE__);

            }

        } else {

            \NTRNX_MYSQLI\ntrnx_mysqli_internal_error::raise(2, get_called_class(), __LINE__);

        }

        return $result;

    }

}

?>