<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class select extends \NTRNX_MYSQLI\ntrnx_mysqli {

    static $result = NULL;

    //mysqli_query() 	Performs a query against the database
    static function query(

        $mysqli_handle,

        /* http://dev.mysql.com/doc/refman/5.7/en/select.html */

        /* SELECT 
                [ALL | DISTINCT | DISTINCTROW ]
                [HIGH_PRIORITY]
                [MAX_STATEMENT_TIME = N]
                [STRAIGHT_JOIN]
                [SQL_SMALL_RESULT] [SQL_BIG_RESULT] [SQL_BUFFER_RESULT]
                [SQL_CACHE | SQL_NO_CACHE] [SQL_CALC_FOUND_ROWS]
                select_expr [, select_expr ...]
        */
        $select_expression,

        /*  [FROM table_references
                [PARTITION partition_list]
        */
        $table_reference,

        /*  join_table:
                  table_reference [INNER | CROSS] JOIN table_factor [join_condition]
                | table_reference STRAIGHT_JOIN table_factor
                | table_reference STRAIGHT_JOIN table_factor ON conditional_expr
                | table_reference {LEFT|RIGHT} [OUTER] JOIN table_reference join_condition
                | table_reference NATURAL [{LEFT|RIGHT} [OUTER]] JOIN table_factor

            join_condition:
                  ON conditional_expr
                | USING (column_list)

        */
        $join_expression = NULL,

        /* [WHERE where_condition] */
        $where_condition = NULL,

        /* [GROUP BY {col_name | expr | position} [ASC | DESC], ... [WITH ROLLUP]] */
        $group_condition = NULL,

        /* [HAVING where_condition] */
        $having_condition = NULL,

        /* [ORDER BY {col_name | expr | position} [ASC | DESC], ...] */
        $order_condition = NULL,

        /* [LIMIT {[offset,] row_count | row_count OFFSET offset}] */
        $limit = NULL,

        /* [PROCEDURE procedure_name(argument_list)] */
        $procedure = NULL,

        /* [INTO OUTFILE 'file_name' [CHARACTER SET charset_name] export_options | INTO DUMPFILE 'file_name' | INTO var_name [, var_name]] */
        $into_target = NULL,

        /* [FOR UPDATE | LOCK IN SHARE MODE]] */
        $for_options = NULL,

        /* Either the constant MYSQLI_USE_RESULT or MYSQLI_STORE_RESULT depending on the desired behavior. By default, MYSQLI_STORE_RESULT is used.  */
        $resultmode = NULL

    ) {

        /* prepare select_statement */
        $select_statement = NMYSQCC_SELECT;

        /* count array entries */
        $count_select = count($select_expression);

        /* array loop */
        for ($i = 0; $i < $count_select; $i++) {

            switch ($select_expression[$i]) {

                case "AS":

                    if (NMYSQCC_QUOTE_AS_STRING === TRUE) {

                        $select_statement .= NMYSQCC_BLANK
                        . $select_expression[$i]
                        . NMYSQCC_BLANK
                        . NMYSQCC_VQ
                        . $select_expression[$i+1]
                        . NMYSQCC_VQ;

                    } else {

                        $select_statement .= NMYSQCC_BLANK
                        . $select_expression[$i]
                        . NMYSQCC_BLANK
                        . $select_expression[$i+1];

                    }

                    if ($i < $count_select - 2) {

                        $select_statement .= NMYSQCC_COMMA
                        . NMYSQCC_BLANK;

                    }

                break;

                default:

                    $select_statement .= NMYSQCC_IQ
                    . $select_expression[$i]
                    . NMYSQCC_IQ
                    . NMYSQCC_DOT
                    . NMYSQCC_IQ
                    . $select_expression[$i+1]
                    . NMYSQCC_IQ;

                    if (($select_expression[$i+2] != "AS") && ($i < $count_select - 2)) {

                        $select_statement .= NMYSQCC_COMMA . NMYSQCC_BLANK;

                    }

                break;

            }

            $i++;

        }
        //print "<pre>" . $select_statement . "</pre>";

        /* prepare from_statement */
        $from_statement = NMYSQCC_FROM;

        /* count array entries */
        $count_from = count($table_reference);

        for ($i = 0; $i < $count_from; $i++) {

            switch ($table_reference[$i]) {

                case "AS":

                    if (NMYSQCC_QUOTE_AS_STRING === TRUE) {

                        $from_statement .= NMYSQCC_BLANK
                        . $table_reference[$i]
                        . NMYSQCC_BLANK
                        . NMYSQCC_VQ
                        . $table_reference[$i+1]
                        . NMYSQCC_VQ;

                    } else {

                        $from_statement .= NMYSQCC_BLANK
                        . $table_reference[$i]
                        . NMYSQCC_BLANK
                        . $table_reference[$i+1];

                    }

                    $i++;

                    if ($i < $count_from - 1) {

                        $from_statement .= NMYSQCC_COMMA
                        . NMYSQCC_BLANK;

                    }

                    //$i++;

                break;

                default:

                    $from_statement .= NMYSQCC_IQ
                    . self::$dbname
                    . NMYSQCC_IQ
                    . NMYSQCC_DOT
                    . NMYSQCC_IQ
                    . $table_reference[$i]
                    . NMYSQCC_IQ;

                    if (($table_reference[$i+1] != "AS") && ($i < $count_from - 1)) {

                        $from_statement .= NMYSQCC_COMMA . NMYSQCC_BLANK;

                    }

                break;

            }

        }
        //print "<pre>" . $from_statement . "</pre>";

        /* prepare join_statement */
        if ($join_expression) {

            $join_statement = NULL;

            $count_join = count($join_expression);

            for ($i = 0; $i < $count_join; $i++) {

                switch ($join_expression[$i]) {

                    case "INNER":

                        $join_statement .= NMYSQCC_I_JOIN;

                        $join_statement .= NMYSQCC_IQ
                        . $join_expression[$i+1]
                        . NMYSQCC_IQ;

                        if ($join_expression[$i+2] === NMYSQCC_ON) {

                            $join_statement .= NMYSQCC_BLANK
                            . NMYSQCC_ON
                            . NMYSQCC_BLANK;

                        } else {

                            \NTRNX_MYSQLI\ntrnx_mysqli::raise_error(80, get_called_class(), __LINE__);

                        }
                        
                        $join_statement .= NMYSQCC_IQ
                        . $join_expression[$i+3]
                        . NMYSQCC_IQ
                        . NMYSQCC_DOT
                        . NMYSQCC_IQ
                        . $join_expression[$i+4]
                        . NMYSQCC_IQ;

                        switch ($join_expression[$i+5]) {

                            case "EQUAL": $join_statement .= NMYSQCC_BLANK . NMYSQCC_EQUAL . NMYSQCC_BLANK; break;
                            case "UNEQUAL": $join_statement .= NMYSQCC_BLANK . NMYSQCC_UNEQUAL . NMYSQCC_BLANK; break;
                            case "NOTEQUAL": $join_statement .= NMYSQCC_BLANK . NMYSQCC_NOTEQUAL . NMYSQCC_BLANK; break;
                            case "NSEQUAL": $join_statement .= NMYSQCC_BLANK . NMYSQCC_NSEQUAL . NMYSQCC_BLANK; break;
                            case "GT": $join_statement .= NMYSQCC_BLANK . NMYSQCC_GT . NMYSQCC_BLANK; break;
                            case "GTOE": $join_statement .= NMYSQCC_BLANK . NMYSQCC_GTOE . NMYSQCC_BLANK; break;
                            case "LT": $join_statement .= NMYSQCC_BLANK . NMYSQCC_LT . NMYSQCC_BLANK; break;
                            case "LTOE": $join_statement .= NMYSQCC_BLANK . NMYSQCC_LTOE . NMYSQCC_BLANK; break;

                            default:

                                \NTRNX_MYSQLI\ntrnx_mysqli::raise_error(81, get_called_class(), __LINE__);
                                \NTRNX_MYSQLI\ntrnx_mysqli::raise_error(82, get_called_class(), __LINE__, $join_expression[$i+5]);

                            break;

                        }

                        $join_statement .= NMYSQCC_IQ
                        . $join_expression[$i+6]
                        . NMYSQCC_IQ
                        . NMYSQCC_DOT
                        . NMYSQCC_IQ
                        . $join_expression[$i+7]
                        . NMYSQCC_IQ;

                        $i=$i+7;

                    break;

                    case "OUTER":

                        $join_statement .= NMYSQCC_BLANK
                            . NMYSQCC_FO_JOIN
                            . NMYSQCC_BLANK;

                    break;

                    case "CROSS":

                        $join_statement .= NMYSQCC_BLANK
                            . NMYSQCC_C_JOIN
                            . NMYSQCC_BLANK;

                    break;

                    case "STRAIGHT":

                        $join_statement .= NMYSQCC_BLANK
                            . NMYSQCC_S_JOIN
                            . NMYSQCC_BLANK;

                    break;

                    case "LEFT":

                        $join_statement .= NMYSQCC_BLANK
                            . NMYSQCC_L_JOIN
                            . NMYSQCC_BLANK;

                    break;

                    case "LEFTO":

                        $join_statement .= NMYSQCC_BLANK
                            . NMYSQCC_LO_JOIN
                            . NMYSQCC_BLANK;

                    break;

                    case "NLEFT":

                        $join_statement .= NMYSQCC_BLANK
                            . NMYSQCC_NL_JOIN
                            . NMYSQCC_BLANK;

                    break;

                    case "NLEFTO":

                        $join_statement .= NMYSQCC_BLANK
                            . NMYSQCC_NLO_JOIN
                            . NMYSQCC_BLANK;

                    break;                  

                    case "RIGHT":

                        $join_statement .= NMYSQCC_BLANK
                            . NMYSQCC_R_JOIN
                            . NMYSQCC_BLANK;

                    break;

                    case "RIGHTO":

                        $join_statement .= NMYSQCC_BLANK
                            . NMYSQCC_RO_JOIN
                            . NMYSQCC_BLANK;

                    break;

                    case "NRIGHT":

                        $join_statement .= NMYSQCC_BLANK
                            . NMYSQCC_NR_JOIN
                            . NMYSQCC_BLANK;

                    break;

                    case "NRIGHTO":

                        $join_statement .= NMYSQCC_BLANK
                            . NMYSQCC_NRO_JOIN
                            . NMYSQCC_BLANK;

                    break;

                    case "NATURAL":

                        $join_statement .= NMYSQCC_BLANK
                            . NMYSQCC_N_JOIN
                            . NMYSQCC_BLANK;

                    break;

                    case "AS":

                        $join_statement .= NMYSQCC_BLANK
                            . NMYSQCC_AS
                            . NMYSQCC_BLANK;

                    break;

                    case "ON":

                        $join_statement .= NMYSQCC_BLANK
                            . NMYSQCC_ON
                            . NMYSQCC_BLANK;

                    break;

                    case "USING":

                        $join_statement .= NMYSQCC_BLANK
                            . NMYSQCC_USING
                            . NMYSQCC_BLANK;

                    break;

                    default:
                    break;

                }

            }

        }
        //print "<pre>" . $join_statement . "</pre>";

        /* prepare where_statement */
        if ($where_condition) {

            $where_statement = NMYSQCC_WHERE;

            $operator_mode = TRUE;

            $operator_like = FALSE;

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

                        $operator_mode = FALSE;

                    break;

                    case "UNEQUAL":

                        $where_statement .= NMYSQCC_BLANK
                        . NMYSQCC_UNEQUAL
                        . NMYSQCC_BLANK;

                        $operator_mode = FALSE;

                    break;

                    case "NOTEQUAL":

                        $where_statement .= NMYSQCC_BLANK
                        . NMYSQCC_NOTEQUAL
                        . NMYSQCC_BLANK;

                        $operator_mode = FALSE;

                    break;

                    case "NSEQUAL":

                        $where_statement .= NMYSQCC_BLANK
                        . NMYSQCC_NSEQUAL
                        . NMYSQCC_BLANK;

                        $operator_mode = FALSE;

                    break;

                    case "GT":

                        $where_statement .= NMYSQCC_BLANK
                        . NMYSQCC_GT
                        . NMYSQCC_BLANK;

                        $operator_mode = FALSE;

                    break;

                    case "GTOE":

                        $where_statement .= NMYSQCC_BLANK
                        . NMYSQCC_GTOE
                        . NMYSQCC_BLANK;

                        $operator_mode = FALSE;

                    break;

                    case "LT":

                        $where_statement .= NMYSQCC_BLANK
                        . NMYSQCC_LT
                        . NMYSQCC_BLANK;

                        $operator_mode = FALSE;

                    break;

                    case "LTOE":

                        $where_statement .= NMYSQCC_BLANK
                        . NMYSQCC_LTOE
                        . NMYSQCC_BLANK;

                        $operator_mode = FALSE;

                    break;

                    //case "XOR": break;
                    //case "NOT": break;
                    //case "IS": break;
                    //case "ISNOT": break;
                    //case "IN": break;
                    //case "NOTIN": break;
                    //case "BETWEEN": break;
                    //case "NOTBETWEEN": break;

                    case "SLIKE":

                        $where_statement .= NMYSQCC_BLANK
                        . NMYSQCC_SLIKE
                        . NMYSQCC_BLANK;

                        $operator_mode = FALSE;

                    break;

                    case "LIKE":

                        $where_statement .= NMYSQCC_BLANK
                        . NMYSQCC_LIKE
                        . NMYSQCC_BLANK;

                        $operator_mode = FALSE;
                        $operator_like = TRUE;

                    break;

                    case "NLIKE":

                        $where_statement .= NMYSQCC_BLANK
                        . NMYSQCC_NLIKE
                        . NMYSQCC_BLANK;

                        $operator_mode = FALSE;
                        $operator_like = TRUE;

                    break;

                    //case "REGEXP": break;
                    //case "NOTREGEXP": break;

                    default:

                        if ($operator_mode === TRUE) {

                            $where_statement .= NMYSQCC_IQ
                            . $where_condition[$i]
                            . NMYSQCC_IQ
                            . NMYSQCC_DOT
                            . NMYSQCC_IQ
                            . $where_condition[$i+1]
                            . NMYSQCC_IQ;

                            $i++;

                        } else {

                            if ($operator_like === TRUE) {

                                $where_statement .= NMYSQCC_VQ
                                . NMYSQCC_PERCENT
                                . $where_condition[$i]
                                . NMYSQCC_PERCENT
                                . NMYSQCC_VQ;

                                $operator_like = FALSE;

                            } else {

                                $where_statement .= NMYSQCC_VQ
                                . $where_condition[$i]
                                . NMYSQCC_VQ;

                            }

                            $operator_mode = TRUE;

                        }

                     break;

                }

            }

        }
        //print "<pre>" . $where_statement . "</pre>";

        /* prepare group_statement  */
        if ($group_condition) {

            $group_statement = NMYSQCC_GROUP;

            $standard_group_order = TRUE;

            $count = count($group_condition);

            for ($i = 0; $i < $count; $i++) {

                if ($group_condition[$i] != "ASC" AND $group_condition[$i] != "DESC") {

                    $group_statement .= NMYSQCC_IQ
                        . $group_condition[$i]
                        . NMYSQCC_IQ;

                } else {

                    $group_statement .= NMYSQCC_BLANK . $group_condition[$i];

                    $standard_group_order = FALSE;
 
                    if ($i < $count - 2) {

                        $group_statement .= NMYSQCC_COMMA . NMYSQCC_BLANK;

                    }

                }

            }

            if ($standard_group_order === TRUE) {

                $group_statement .= NMYSQCC_BLANK . "ASC";

            }

            /* prepare group_statement  */
            if ($having_condition) {

                \NTRNX_MYSQLI\ntrnx_mysqli::raise_error(83, get_called_class(), __LINE__);

            }

        }
        //print "<pre>" . $group_statement . "</pre>";

        /* prepare order_statement */
        if ($order_condition) {

            $order_statement = NMYSQCC_ORDER;

            $standard_sort_order = TRUE;

            $count = count($order_condition);

            for ($i = 0; $i < $count; $i++) {

                if ($order_condition[$i] != "ASC" AND $order_condition[$i] != "DESC") {

                    $order_statement .= NMYSQCC_IQ
                        . $order_condition[$i]
                        . NMYSQCC_IQ;

                    if ($i < $count - 1 AND $order_condition[$i+1] != "ASC" AND $order_condition[$i+1] != "DESC") {

                        $order_statement .= NMYSQCC_COMMA . NMYSQCC_BLANK;

                    }


                } else {

                    $order_statement .= NMYSQCC_BLANK . $order_condition[$i];

                    $standard_sort_order = FALSE;
 
                    if ($i < $count - 1) {

                        $order_statement .= NMYSQCC_COMMA . NMYSQCC_BLANK;

                    }

                }

            }

            if ($standard_sort_order === TRUE) {

                $order_statement .= NMYSQCC_BLANK . "ASC";

            }

        }
        //print "<pre>" . $order_statement . "</pre>";

        /* prepare limit_statement */
        if ($limit) {

            $limit_statement .= NMYSQCC_BLANK
            . NMYSQCC_LIMIT
            . NMYSQCC_BLANK
            . $limit;

        }
        //print "<pre>" . $limit_statement . "</pre>";

        /* prepare procedure_name */
        /* [PROCEDURE procedure_name(argument_list)] */
        if ($procedure) {

            \NTRNX_MYSQLI\ntrnx_mysqli::raise_error(84, get_called_class(), __LINE__);

        }

        /* prepare into_target */
        /* [INTO OUTFILE 'file_name' [CHARACTER SET charset_name] export_options | INTO DUMPFILE 'file_name' | INTO var_name [, var_name]] */
        if ($into_target) {

            \NTRNX_MYSQLI\ntrnx_mysqli::raise_error(85, get_called_class(), __LINE__);

        }

        /* prepare for_options */
        /* [FOR UPDATE | LOCK IN SHARE MODE]] */
        if ($for_options) {

            \NTRNX_MYSQLI\ntrnx_mysqli::raise_error(86, get_called_class(), __LINE__);
    
        }

        /* prepare complete statement */
        $statement = $select_statement
        . $from_statement;

        if ($join_expression) {

            $statement .= $join_statement;

        }

        if ($where_condition) { $statement .= $where_statement; }

        if ($group_condition) { $statement .= $group_statement; }

        if ($order_condition) { $statement .= $order_statement; }

        if ($limit) { $statement .= $limit_statement; }

        //if ($procedure) { $statement .= $procedure; }

        //if ($into_target) { $statement .= $into_target; }

        //if ($for_options) { $statement .= $for_options; }

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

        return $result;

    }

}

?>