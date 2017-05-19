<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_update extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //mysqli_query() 	Performs a query against the database
    static function query(

        $mysqli_handle,

        /* http://dev.mysql.com/doc/refman/5.7/en/update.html */

        /* table_reference */
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

        // UPDATE `ntrnx_mysqli_class_test`.`test` SET `name`='aaa', `salary`='bbb', `test`='ccc', `example`='ddd' WHERE  `name`='a' AND `salary`='yyy' AND `test`='zzz' AND `example` IS NULL LIMIT 1;

        /* created table part */
        $update_statement = NMYSQCC_UPDATE
            . NMYSQCC_IQ
            . self::$dbname
            . NMYSQCC_IQ
            . NMYSQCC_DOT
            . NMYSQCC_IQ
            . $table_reference
            . NMYSQCC_IQ;
        //print "<pre>" . $update_statement . "</pre>";

        /* create set expression */
        $count_set = count($set_expression);

        $set_statement = NMYSQCC_SET;

        for ($i = 0; $i < $count_set; $i++) {

            $set_statement .= NMYSQCC_IQ
            . $set_expression[$i]
            . NMYSQCC_IQ
            . NMYSQCC_EQUAL
            . NMYSQCC_VQ
            . $set_expression[$i+1]
            . NMYSQCC_VQ;

            $i++;

            if ($i < $count_set - 1) {

                $set_statement .= NMYSQCC_COMMA
                . NMYSQCC_BLANK;

            }

        }
        //print "<pre>" . $set_statement . "</pre>";

        /* create where_condition */
        $count_where = count($where_condition);

        $where_statement = NMYSQCC_WHERE;

        for ($i = 0; $i < $count_where; $i++) {

            $where_statement .= NMYSQCC_IQ
            . $where_condition[$i]
            . NMYSQCC_IQ;

            if ($where_condition[$i+1] === NULL) {

                $where_statement .= " IS NULL";

            } else {

                $where_statement .= NMYSQCC_EQUAL
                . NMYSQCC_VQ
                . $where_condition[$i+1]
                . NMYSQCC_VQ;

            }

            $i++;

            if ($i < $count_where - 1) {

                $where_statement .= NMYSQCC_BLANK
                . NMYSQCC_AND
                . NMYSQCC_BLANK;

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
        $statement = $update_statement
        . $set_statement
        . $where_statement;

        if ($order_condition) { $statement .= $order_statement; }

        if ($limit) { $statement .= $limit_statement; }

        self::$last_query = $statement;

        /* check for mysqli handle */
        if ($mysqli_handle) {

            /* check for connected state */
            if (self::$connected === TRUE) {

                if (!$result = mysqli_query ($mysqli_handle, $statement, $resultmode)) {

                    \NTRNX_MYSQLI\ntrnx_mysqli::raise_error(mysqli_errno($mysqli_handle), get_called_class(), __LINE__, mysqli_error ($mysqli_handle));
                    $result = FALSE;

                }

            } else {

                \NTRNX_MYSQLI\ntrnx_mysqli::raise_error(3, get_called_class(), __LINE__);
                $result = FALSE;

            }

        } else {

            \NTRNX_MYSQLI\ntrnx_mysqli::raise_error(2, get_called_class(), __LINE__);
            $result = FALSE;

        }

        return $result;

    }

}

?>