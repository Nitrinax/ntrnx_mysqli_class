<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_insert extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //mysqli_query() 	Performs a query against the database
    static function query(

        $mysqli_handle,

        /* http://dev.mysql.com/doc/refman/5.7/en/insert.html */

        /* [INTO] db_name, tbl_name */
        $tbl_name,

        /* [(col_name,...)] */
        $col_name,

        /* {VALUES | VALUE} ({expr | DEFAULT},...),(...),... */
        $values,

        $options = NULL

    ) {

        $count_columns = count($col_name);
        $count_values = count($values);

        if ($count_columns == $count_values) {

            /* set db and table name */
            $db_name = $tbl_name[0];
            $table_name = $tbl_name[1];

            $table_statement = NMYSQCC_INSERT
            . NMYSQCC_IQ
            . $db_name
            . NMYSQCC_IQ
            . NMYSQCC_DOT
            . NMYSQCC_IQ
            . $table_name
            . NMYSQCC_IQ;

            $column_statement = NMYSQCC_BLANK . NMYSQCC_LEFT_PARENTHESIS;
            for ($i = 0; $i < $count_columns; $i++) {

                $column_statement .= NMYSQCC_IQ . $col_name[$i] . NMYSQCC_IQ;

                if ($i < $count_columns - 1) { $column_statement .= NMYSQCC_COMMA . NMYSQCC_BLANK; }

            }
            $column_statement .= NMYSQCC_RIGHT_PARENTHESIS;

            $value_statement = NMYSQCC_BLANK . NMYSQCC_VALUES . NMYSQCC_BLANK . NMYSQCC_LEFT_PARENTHESIS;
            for ($i = 0; $i < $count_values; $i++) {

                $value_statement .= NMYSQCC_VQ
                . \NTRNX_MYSQLI\ntrnx_mysqli::real_escape_string($mysqli_handle, $values[$i])
                . NMYSQCC_VQ;

                if ($i < $count_values - 1) { $value_statement .= NMYSQCC_COMMA . NMYSQCC_BLANK; }

            }
            $value_statement .= NMYSQCC_RIGHT_PARENTHESIS;

            $statement = $table_statement . $column_statement . $value_statement;
            
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

        } else {
            
            /* debug output */
            if (\NTRNX_MYSQLI\NMYSQCC_DEBUG == TRUE) {
                //print "table_target length and column_target length dont match" . NMYSQCC_BR;
                print NMYSQCC_ERROR_FIELD_NUMBER_AND_NUMBER_OF_VALUES_​​DO_NOT_MATCH . NMYSQCC_BR;
            }

            $result = FALSE;

        }

        return $result;

    }

}

?>