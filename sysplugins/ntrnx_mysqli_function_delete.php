<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_delete extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //mysqli_query() 	Performs a query against the database
    static function query(

        $mysqli_handle,

        /* http://dev.mysql.com/doc/refman/5.7/en/delete.html */

        /* DELETE [LOW_PRIORITY] [QUICK] [IGNORE] FROM tbl_name */
        $table_reference,

        /* [WHERE where_condition] */
        $where_condition,

        /* [ORDER BY {col_name | expr | position} [ASC | DESC], ...] */
        $order_condition = NULL,

        /* [LIMIT {[offset,] row_count | row_count OFFSET offset}] */
        $limit = NULL,

        $options = NULL

    ) {

        /* set db and table name */
        $db_name = $table_reference[0];
        $table_name = $table_reference[1];

        $delete_statement = NMYSQCC_DELETE
            . NMYSQCC_IQ
            . $db_name
            . NMYSQCC_IQ
            . NMYSQCC_DOT
            . NMYSQCC_IQ
            . $table_name
            . NMYSQCC_IQ;

        /* prepare where_statement */
        if ($where_condition) {

            $where_statement = NMYSQCC_WHERE;

            $dot_mode = TRUE;
            $value_mode = FALSE;

            $count_where = count($where_condition);

            for ($i = 0; $i < $count_where; $i++) {

                switch ($where_condition[$i]) {

                    case "OR":
                        $where_statement .= NMYSQCC_BLANK
                        . NMYSQCC_OR
                        . NMYSQCC_BLANK;
                    break;                    
                    case "AND":
                        $where_statement .= NMYSQCC_BLANK
                        . NMYSQCC_AND
                        . NMYSQCC_BLANK;
                    break;
                    case "EQUAL":
                        $where_statement .= NMYSQCC_BLANK
                        . NMYSQCC_EQUAL
                        . NMYSQCC_BLANK;
                    break;
                    case "UNEQUAL":
                        $where_statement .= NMYSQCC_BLANK
                        . NMYSQCC_UNEQUAL
                        . NMYSQCC_BLANK;
                    break;

                    case "NOTEQUAL":
                        $where_statement .= NMYSQCC_BLANK
                        . NMYSQCC_NOTEQUAL
                        . NMYSQCC_BLANK;
                    break;

                    case "NSEQUAL":
                        $where_statement .= NMYSQCC_BLANK
                        . NMYSQCC_NSEQUAL
                        . NMYSQCC_BLANK;
                    break;
                    case "GT":
                        $where_statement .= NMYSQCC_BLANK
                        . NMYSQCC_GT
                        . NMYSQCC_BLANK;
                    break;
                    case "GTOE":
                        $where_statement .= NMYSQCC_BLANK
                        . NMYSQCC_GTOE
                        . NMYSQCC_BLANK;
                    break;
                    case "LT":
                        $where_statement .= NMYSQCC_BLANK
                        . NMYSQCC_LT
                        . NMYSQCC_BLANK;
                    break;
                    case "LTOE":
                        $where_statement .= NMYSQCC_BLANK
                        . NMYSQCC_LTOE
                        . NMYSQCC_BLANK;
                    break;

                    //case "XOR": break;
                    //case "NOT": break;
                    //case "IS": break;
                    //case "ISNOT": break;
                    //case "IN": break;
                    //case "NOTIN": break;
                    //case "BETWEEN": break;
                    //case "NOTBETWEEN": break;
                    //case "SOUNDSLIKE": break;
                    //case "LIKE": break;
                    //case "NOTLIKE": break;
                    //case "REGEXP": break;
                    //case "NOTREGEXP": break;

                    case "STRING":
                        $value_mode = TRUE;
                    break;

                    default:

                        if ($value_mode == TRUE) {

                            $where_statement .= NMYSQCC_VQ . $where_condition[$i] . NMYSQCC_VQ;

                            $value_mode = FALSE;
                            $dot_mode = FALSE;

                        } else {

                            $where_statement .= NMYSQCC_IQ . $where_condition[$i] . NMYSQCC_IQ;

                        }

                        if ($i < $count_where - 1) {

                            if ($dot_mode == TRUE) {

                                $where_statement .= NMYSQCC_DOT;

                                $dot_mode = FALSE;

                            } else {

                                $dot_mode = TRUE;

                            }

                        }

                     break;

                }

            }
            //print $where_statement . NMYSQCC_BR;

        }

        /* prepare order_statement */
        if ($order_condition) {

            $order_statement .= NMYSQCC_ORDER;

            $count = count($order_condition);

            for ($i = 0; $i < $count; $i++) {

                $order_statement .= NMYSQCC_IQ . $order_condition[$i] . NMYSQCC_IQ;

                if ($order_condition[$i+1] != NULL) { $order_statement .= NMYSQCC_BLANK . $order_condition[$i]; } else { $order_statement .= " ASC"; }

                $i=$i+1;

                if ($i < $count - 1) { $order_statement .= NMYSQCC_COMMA . NMYSQCC_BLANK; }

            }
            //print $order_statement . NMYSQCC_BR;

        }

        /* prepare limit_statement */
        if ($limit) {

            $limit_statement .= NMYSQCC_BLANK
            . NMYSQCC_LIMIT
            . NMYSQCC_BLANK
            . $limit;

            //print $limit_statement . NMYSQCC_BR;

        }

        /* prepare complete statement */
        $statement = $delete_statement
        . $from_statement;

        if ($join_expression) {

            $statement .= $join_statement;

        }

        if ($where_condition) { $statement .= $where_statement; }

        if ($group_condition) { 

            $statement .= $group_statement;

            /*
            if ($having_condition) { 

                $statement .= $having_statement;

            }
            */

        }

        if ($order_condition) { $statement .= $order_statement; }

        if ($limit) { $statement .= $limit_statement; }

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