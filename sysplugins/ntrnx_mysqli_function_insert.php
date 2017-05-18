<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_insert extends \NTRNX_MYSQLI\ntrnx_mysqli {

    static $result = NULL;

    //mysqli_query() 	Performs a query against the database
    static function query(

        $mysqli_handle,

        /* http://dev.mysql.com/doc/refman/5.7/en/insert.html */

        /* [INTO] db_name, tbl_name */
        $table_reference,

        /* [(col_name,...)] */
        $col_name,

        /* {VALUES | VALUE} ({expr | DEFAULT},...),(...),... */
        $values,

        /* ON DUPLICATE KEY UPDATE */
        $flags = NULL,

        $resultmode = NULL

    ) {

        /* count given columns */
        $count_columns = count($col_name);

        /* count given values */
        $count_values = count($values);

        if ($count_columns === $count_values) {

            /* created table part */
            $table_statement = NMYSQCC_INSERT
            . NMYSQCC_IQ
            . self::$dbname
            . NMYSQCC_IQ
            . NMYSQCC_DOT
            . NMYSQCC_IQ
            . $table_reference
            . NMYSQCC_IQ;
            //print "<pre>" . $table_statement . "</pre>";

            /* created column part */
            $column_statement = NMYSQCC_BLANK . NMYSQCC_LEFT_PARENTHESIS;
            for ($i = 0; $i < $count_columns; $i++) {

                $column_statement .= NMYSQCC_IQ . $col_name[$i] . NMYSQCC_IQ;

                if ($i < $count_columns - 1) { $column_statement .= NMYSQCC_COMMA . NMYSQCC_BLANK; }

            }
            $column_statement .= NMYSQCC_RIGHT_PARENTHESIS;
            //print "<pre>" . $column_statement . "</pre>";

            /* created value part */
            $value_statement = NMYSQCC_BLANK . NMYSQCC_VALUES . NMYSQCC_BLANK . NMYSQCC_LEFT_PARENTHESIS;
            for ($i = 0; $i < $count_values; $i++) {

                $value_statement .= NMYSQCC_VQ
                . \NTRNX_MYSQLI\ntrnx_mysqli::real_escape_string($mysqli_handle, $values[$i])
                . NMYSQCC_VQ;

                if ($i < $count_values - 1) { $value_statement .= NMYSQCC_COMMA . NMYSQCC_BLANK; }

            }
            $value_statement .= NMYSQCC_RIGHT_PARENTHESIS;
            //print "<pre>" . $value_statement . "</pre>";

            if ($flags) {

                /* temporary message */
                $error = TRUE;
                $error_msg = $flags . "flags not supported";

            }

            if ($resultmode) {

                /* temporary message */
                $error = TRUE;
                $error_msg = $resultmode . "resultmode not supported";

            }

            /* combine parts */
            $statement = $table_statement . $column_statement . $value_statement;

            self::$last_query = $statement;

            /* check for mysqli handle */
            if ($mysqli_handle) {

                /* check for connected state */
                if (self::$connected === TRUE) {

                    if (!$result = mysqli_query ($mysqli_handle, $statement, $resultmode)) {

                        \NTRNX_MYSQLI\ntrnx_mysqli::raise_error(mysqli_errno($mysqli_handle), get_called_class(), __LINE__, mysqli_error ($mysqli_handle));
 
                    }

                } else {

                    \NTRNX_MYSQLI\ntrnx_mysqli::raise_error(3, get_called_class(), __LINE__);

                }

            } else {

                \NTRNX_MYSQLI\ntrnx_mysqli::raise_error(2, get_called_class(), __LINE__);

            }

        /* if amount of columns and values do not match */
        } else {

            \NTRNX_MYSQLI\ntrnx_mysqli::raise_error(70, get_called_class(), __LINE__);

        }

        return $result;

    }

}

?>