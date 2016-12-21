<?php

namespace NTRNX_MYSQLI\ntrnx_mysqli;

/* begin of class version */
class update extends \NTRNX_MYSQLI\ntrnx_mysqli{

    //mysqli_query() 	Performs a query against the database
    static function update(

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

        $options = NULL

    ) {

        /* debug output */
        if (\NTRNX_MYSQLI\NMYSQCC_DEBUG == TRUE) {
            print "<pre>" . $statement . "</pre>";
        }

        self::$last_query = $statement;

        if ($mysqli_handle && self::$connected === TRUE) {

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