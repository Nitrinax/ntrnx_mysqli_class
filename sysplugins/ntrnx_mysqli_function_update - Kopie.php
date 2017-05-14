<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_update extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //mysqli_query() 	Performs a query against the database
    static function query(

        $mysqli_handle,

        /* http://dev.mysql.com/doc/refman/5.7/en/update.html */

        /* UPDATE [LOW_PRIORITY] [IGNORE] table_reference */
        $table_reference,

        /* SET col_name1={expr1|DEFAULT} [, col_name2={expr2|DEFAULT}] ... */
        $set_expression,

        /* [WHERE where_condition] */
        $where_condition,

        /* [ORDER BY {col_name | expr | position} [ASC | DESC], ...] */
        $order_condition = NULL,

        /* [LIMIT {[offset,] row_count | row_count OFFSET offset}] */
        $limit = NULL,

        $resultmode = NULL

    ) {

        /* debug output */
        if (NMYSQCC_DEBUG === TRUE) {
            print "<pre>" . $statement . "</pre>";
        }

        self::$last_query = $statement;

/*
        if ($mysqli_handle && self::$connected === TRUE) {

            if (!$result = mysqli_query ($mysqli_handle, $statement, $options)) {    

                if (\NTRNX_MYSQLI\NMYSQCC_DEBUG == TRUE) {
                    print mysqli_error ($mysqli_handle) . NMYSQCC_BR;
                    print $statement . NMYSQCC_BR;
                }

                $result = FALSE;

            }

        } else {

            if (\NTRNX_MYSQLI\NMYSQCC_DEBUG == TRUE) {
                print NMYSQCC_ERROR_DB_HANDLE_NOT_INITIALIZED . NMYSQCC_BR;
                print $statement . NMYSQCC_BR;
            }            

            $result = FALSE;

        }
*/

        /* check for mysqli handle */
        if ($mysqli_handle) {

            /* check for connected state */
            if (self::$connected === TRUE) {

                if (!$result = mysqli_query ($mysqli_handle, $statement, $resultmode)) {

                    $error = TRUE;
                    $error_msg = mysqli_error ($mysqli_handle) . " (" . mysqli_errno($mysqli_handle) . ")";

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

                /* debug output */
                if (NMYSQCC_LOG_ERRORS === TRUE) {
                    \NTRNX_MYSQLI\ntrnx_mysqli::log_error($error_msg . " | " . get_called_class() . " | " . __LINE__ );
                } else if (NMYSQCC_DEBUG === TRUE) {
                    print $error_msg . NMYSQCC_BR;
                }

            $result = FALSE;

        }

        return $result;

    }

}

?>