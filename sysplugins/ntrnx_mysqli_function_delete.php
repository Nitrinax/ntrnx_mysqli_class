<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class delete extends \NTRNX_MYSQLI\ntrnx_mysqli {

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

        $resultmode = NULL

    ) {

        /* created table part */
        $delete_statement = NMYSQCC_DELETE
            . NMYSQCC_IQ
            . self::$dbname
            . NMYSQCC_IQ
            . NMYSQCC_DOT
            . NMYSQCC_IQ
            . $table_reference
            . NMYSQCC_IQ;
        //print "<pre>" . $delete_statement . "</pre>";

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
                        $operator_like = TRUE;

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
                            . NMYSQCC_IQ;

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

        /* prepare complete statement */
        $statement = $delete_statement
        . $from_statement;

        if ($join_expression) {

            $statement .= $join_statement;

        }

        if ($where_condition) { $statement .= $where_statement; }

        if ($order_condition) { $statement .= $order_statement; }

        if ($limit) { $statement .= $limit_statement; }

        self::$last_query = $statement;

        /* check for mysqli handle */
        if ($mysqli_handle) {

            /* check for connected state */
            if (self::$connected === TRUE) {

                if (!$result = mysqli_query ($mysqli_handle, $statement, $resultmode)) {

                    \NTRNX_MYSQLI\ntrnx_mysqli_internal_error::raise(mysqli_errno($mysqli_handle), get_called_class(), __LINE__, mysqli_error ($mysqli_handle));
                    $result = FALSE;

                }

            } else {

                \NTRNX_MYSQLI\ntrnx_mysqli_internal_error::raise(3, get_called_class(), __LINE__);
                $result = FALSE;

            }

        } else {

            \NTRNX_MYSQLI\ntrnx_mysqli_internal_error::raise(2, get_called_class(), __LINE__);
            $result = FALSE;

        }

        return $result;

    }

}

?>