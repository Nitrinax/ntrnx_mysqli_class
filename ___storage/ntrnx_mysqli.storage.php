<?php

    static function complete_query(

        $mysqli_handle,

        /* SELECT, INSERT, UPDATE, DELETE */
        $query_type,

        /* SELECT 
                [ALL | DISTINCT | DISTINCTROW ]
                    [HIGH_PRIORITY]
                    [MAX_STATEMENT_TIME = N]
                    [STRAIGHT_JOIN]
                    [SQL_SMALL_RESULT] [SQL_BIG_RESULT] [SQL_BUFFER_RESULT]
                    [SQL_CACHE | SQL_NO_CACHE] [SQL_CALC_FOUND_ROWS]
                select_expr [, select_expr ...]
                [FROM table_references
                    [PARTITION partition_list]
                [WHERE where_condition]
                [GROUP BY {col_name | expr | position}
                    [ASC | DESC], ... [WITH ROLLUP]]
                [HAVING where_condition]
                [ORDER BY {col_name | expr | position}
                    [ASC | DESC], ...]
                [LIMIT {[offset,] row_count | row_count OFFSET offset}]
                [PROCEDURE procedure_name(argument_list)]
                [INTO OUTFILE 'file_name'
                        [CHARACTER SET charset_name]
                        export_options
                    | INTO DUMPFILE 'file_name'
                    | INTO var_name [, var_name]]
                [FOR UPDATE | LOCK IN SHARE MODE]]
        */
        /* INSERT [LOW_PRIORITY | DELAYED | HIGH_PRIORITY] [IGNORE]
                [INTO] tbl_name
                [PARTITION (partition_name,...)]
                [(col_name,...)]
                {VALUES | VALUE} ({expr | DEFAULT},...),(...),...
                [ ON DUPLICATE KEY UPDATE
                    col_name=expr
                        [, col_name=expr] ... ]
        */
        /* UPDATE [LOW_PRIORITY] [IGNORE] table_reference
                SET col_name1={expr1|DEFAULT} [, col_name2={expr2|DEFAULT}] ...
                [WHERE where_condition]
                [ORDER BY ...]
                [LIMIT row_count]
        */
        /* DELETE [LOW_PRIORITY] [QUICK] [IGNORE] FROM tbl_name
                [PARTITION (partition_name,...)]
                [WHERE where_condition]
                [ORDER BY ...]
                [LIMIT row_count]
        */

        /* SELECT = select_expression */
        /* INSERT = tbl_name (col_name) */
        /* UPDATE = table_reference */
        /* DELETE = tbl_name */       
        $expression = NULL,

        /* SELECT = table_references */
        /* INSERT = values */
        /* UPDATE = col_name = values */
        /* DELETE */  
        $reference = NULL,

        /* SELECT = where_condition */
        /* INSERT = */
        /* UPDATE = where_condition */
        /* DELETE = where_condition */  
        $where_condition = NULL,

        /* SELECT = [GROUP BY {col_name | expr | position} [ASC | DESC], ... [WITH ROLLUP]] */
        $group_condition = NULL,

        /* SELECT = [HAVING where_condition] */
        $having_condition = NULL,

        /* SELECT = [ORDER BY {col_name | expr | position} [ASC | DESC], ...] */
        $order_condition = NULL,

        /* SELECT = [LIMIT {[offset,] row_count | row_count OFFSET offset}] */
        $limit = NULL     

    ) {

        $query_type_result = NULL;

        /* detect query type */
        $query_pattern = "/SEL|INS|UPD|DEL/";

        if (preg_match( $query_pattern , $query_type, $query_type_result, NULL, 0)) {        
            $type_of_query = $query_type_result[0];
        } else {
            die( 'unknown QUERY type ' . $query_type );
        }
        //print_r($query_type_result) . NMCC_BR;        
        //print $type_of_query . NMCC_BR;

        switch ($type_of_query) {

            case "SEL":

                $statement .= NMCC_SELECT . NMCC_BLANK;

                $expression = $select_expression;
                $reference = $table_references;
                $where_condition;
                $group_condition;
                $having_condition;
                $order_condition;
                $limit;

            break;

            case "INS":

                $statement .= NMCC_INSERT . NMCC_BLANK;

                $expression = $tbl_name;
                $reference = $col_name;

            break;

            case "UPD":

                $statement .= NMCC_UPDATE . NMCC_BLANK;

                $expression = $table_reference;
                $reference = $col_name;
                $where_condition;
                $order_condition;
                $limit;

            break;

            case "DEL":

                $statement .= NMCC_DELETE . NMCC_BLANK;

                $expression = $tbl_name;
                $where_condition;
                $order_condition;
                $limit;

            break;

            default: break;

        }

        print $statement . NMCC_BR;

    }

/**/static function complete_query_old(

        $mysqli_handle,

        /* SELECT, INSERT, UPDATE, DELETE */
        $query_type,

        /* SELECT 
                [ALL | DISTINCT | DISTINCTROW ]
                [HIGH_PRIORITY]
                [MAX_STATEMENT_TIME = N]
                [STRAIGHT_JOIN]
                [SQL_SMALL_RESULT] [SQL_BIG_RESULT] [SQL_BUFFER_RESULT]
                [SQL_CACHE | SQL_NO_CACHE] [SQL_CALC_FOUND_ROWS]
                select_expr [, select_expr ...]
        */
        /* Each select_expr indicates a column that you want to retrieve. There must be at least one select_expr.  */
        $select_expression,

        /*  [FROM table_references
                [PARTITION partition_list] */
        /* table_references indicates the table or tables from which to retrieve rows. Its syntax is described in Section 14.2.9.2, “JOIN Syntax”. */
        $table_references,

        /* */
        $join_reference = NULL,

        /* */
        $join_condition = NULL,

        /* [WHERE where_condition] */
        /* The WHERE clause, if given, indicates the condition or conditions that rows must satisfy to be selected. where_condition is an */
        /* expression that evaluates to true for each row to be selected. The statement selects all rows if there is no WHERE clause.  */
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
        $output_condition = NULL,

        /* [FOR UPDATE | LOCK IN SHARE MODE]] */
        $for_options = NULL

    ) {

        $statement = NULL;

        switch ($query_type) {

            case "SEL":
                $statement .= NMCC_SELECT . NMCC_BLANK;
            break;

            case "INS":
                $statement .= NMCC_INSERT . NMCC_BLANK;
            break;

            case "UPD":
                $statement .= NMCC_UPDATE . NMCC_BLANK;
            break;

            case "DEL":
                $statement .= NMCC_DELETE . NMCC_BLANK;
            break;

            default: break;

        }

    }

    static function cross_select(

        $mysqli_handle,

        /* http://dev.mysql.com/doc/refman/5.7/en/select.html */

        /* select_expr [, select_expr ...] */
        $select_expression,
        
        /* [FROM table_references */
        $table_reference,
        
        /* [WHERE where_condition] */
        $where_condition = NULL,
        
        /* [GROUP BY {col_name | expr | position} [ASC | DESC], ... [WITH ROLLUP]] */
        $order_condition = NULL,
        
        /* [LIMIT {[offset,] row_count | row_count OFFSET offset}] */  
        $group_condition = NULL,
        
        /* [ORDER BY {col_name | expr | position} [ASC | DESC], ...] */
        $limit = NULL

    ) {

        /* prepare select_statement */
        $select_statement = NMCC_SELECT
        . NMCC_BLANK;        

        $count_select = count($select_expression);

        for ($i = 0; $i < $count_select; $i++) {

            $select_statement .= $select_expression[$i]
            . NMCC_DOT
            . NMCC_IQ
            . $select_expression[$i+1]
            . NMCC_IQ;

            $i=$i+1;

            if ($i < $count_select - 1) { $select_statement .= NMCC_COMMA . NMCC_BLANK; }

        }
        //print $select_statement . NMCC_BR;

        /* prepare from_statement */
        $from_statement =  NMCC_BLANK
        . NMCC_FROM
        . NMCC_BLANK;        

        $count_from = count($table_reference);

        for ($i = 0; $i < $count_from; $i++) {

            $from_statement .= NMCC_IQ
            . $table_reference[$i]
            . NMCC_IQ
            . NMCC_DOT
            . NMCC_IQ
            . $table_reference[$i+1]
            . NMCC_IQ
            . NMCC_BLANK
            . NMCC_AS
            . NMCC_BLANK
            . $table_reference[$i+2];

            $i=$i+2;

            if ($i < $count_from - 1) { $from_statement .= NMCC_COMMA . NMCC_BLANK; }

        }
        //print $from_statement . NMCC_BR;

        /* prepare where_statement */
        $where_statement = NMCC_BLANK
        . NMCC_WHERE
        . NMCC_BLANK;    

        $count_where = count($where_condition);

        $where_statement .= $where_condition[0]
        . NMCC_DOT
        . NMCC_IQ
        . $where_condition[1]
        . NMCC_IQ
        . NMCC_BLANK
        . NMCC_EQUAL
        . NMCC_BLANK
        . NMCC_VQ
        . $where_condition[2]
        . NMCC_VQ;

        for ($i = 3; $i < $count_where; $i++) {

            $where_statement .= NMCC_BLANK
            . NMCC_AND
            . NMCC_BLANK
            . $where_condition[$i]
            . NMCC_DOT
            . NMCC_IQ
            . $where_condition[$i+1]
            . NMCC_IQ
            . NMCC_BLANK
            . NMCC_EQUAL
            . NMCC_BLANK
            . $where_condition[$i+2]
            . NMCC_DOT
            . NMCC_IQ
            . $where_condition[$i+3]
            . NMCC_IQ;

            $i=$i+3;

        }
        //print $where_statement . NMCC_BR;

}

/**/static function cross_join(

        $mysqli_handle,

        /* http://dev.mysql.com/doc/refman/5.7/en/select.html */

        /* select_expr [, select_expr ...] */
        $select_expression,
        
        /* [FROM table_references */
        $table_reference,
        /* [WHERE where_condition] */

        $join_reference,

        $join_condition,

        /* [WHERE where_condition] */
        $where_condition

    ) {

        /* prepare select_statement */
        $select_statement = NMCC_SELECT
        . NMCC_BLANK;      

        $count_select = count($select_expression);

        for ($i = 0; $i < $count_select; $i++) {

            $select_statement .= NMCC_IQ
            . $select_expression[$i]
            . NMCC_IQ;

            if ($i < $count_select - 1) { $select_statement .= NMCC_COMMA . NMCC_BLANK; }

        }
        print $select_statement . NMCC_BR;

        /* prepare from_statement */
        $from_statement = NMCC_BLANK
        . NMCC_FROM
        . NMCC_BLANK;        

        $count_from = count($table_reference);

        for ($i = 0; $i < $count_from; $i++) {

            $from_statement .= NMCC_IQ
                . $table_reference[$i]
                . NMCC_IQ
                . NMCC_DOT
                . NMCC_IQ
                . $table_reference[$i+1]
                . NMCC_IQ
                . NMCC_BLANK
                . NMCC_AS
                . NMCC_BLANK
                . $table_reference[$i+2];

            $i=$i+2;

            if ($i < $count_from - 1) { $from_statement .= NMCC_COMMA . NMCC_BLANK; }

        }
        print $from_statement . NMCC_BR;

        /* prepare join_statement */
        $count_join = count($join_reference);

        for ($i = 0; $i < $count_join; $i++) {

            //join_table:
            //[INNER | CROSS] JOIN table_factor [join_condition]
            //STRAIGHT_JOIN table_factor
            //STRAIGHT_JOIN table_factor ON conditional_expr
            //{LEFT|RIGHT} [OUTER] JOIN table_reference join_condition
            //NATURAL [{LEFT|RIGHT} [OUTER]] JOIN table_factor

            /*
            switch ($join_type) {

                case "INNER": break;
                case "CROSS": break;
                case "STRAIGHT": break;
                case "LEFT": break;
                case "RIGHT": break;
                case "LEFT OUTER": break;
                case "RIGHT OUTER": break;
                case "FULL OUTER": break;
                case "NATURAL": break;
                case "NATURAL LEFT": break;
                case "NATURAL RIGHT": break;
                case "NATURAL LEFT OUTER": break;
                case "NATURAL RIGHT OUTER": break;    
                case "": break;
                default: break;

            }
            */

            
            $join_statement .= NMCC_BLANK
            . MYSQLI_I_JOIN                     /* currently fixed to INNER JOIN */
            . NMCC_BLANK
            . NMCC_IQ
            . $join_reference[$i]
            . NMCC_IQ
            . NMCC_DOT
            . NMCC_IQ
            . $join_reference[$i+1]
            . NMCC_IQ
            . NMCC_BLANK
            . NMCC_AS
            . NMCC_BLANK
            . $join_reference[$i+2];
            
            $i=$i+2;

        }
        //print $join_statement . NMCC_BR;

        /* prepare join_statement */
        $count_join_ref = count($join_condition);

        $join_statement .= NMCC_BLANK
        . NMCC_ON
        . NMCC_BLANK;

        for ($i = 0; $i < $count_join_ref; $i++) {             
            
            $join_statement .= $join_condition[$i]
            . NMCC_DOT
            . NMCC_IQ
            . $join_condition[$i+1]
            . NMCC_IQ
            . NMCC_BLANK            
            . NMCC_EQUAL
            . NMCC_BLANK
            . $join_condition[$i+2]
            . NMCC_DOT
            . NMCC_IQ
            . $join_condition[$i+3]
            . NMCC_IQ;
           
            $i=$i+3;

            if ($i < $count_join_ref - 1) { $join_statement .= NMCC_BLANK . NMCC_AND . NMCC_BLANK; }

        }
        print $join_statement . NMCC_BR;

        /* prepare where_statement */
        if ($where_condition) {

            $where_statement .= NMCC_BLANK
            . NMCC_WHERE
            . NMCC_BLANK;

            $count_where = count($where_condition);

            for ($i = 0; $i < $count_where; $i++) {

                if ($where_condition[$i]==NMCC_NOT) {

                    $where_statement .= NMCC_BLANK
                    . NMCC_NOT
                    . NMCC_BLANK
                    . NMCC_IQ
                    . \NTRNX_MYSQLI\ntrnx_mysqli::real_escape_string($mysqli_handle, $where_condition[$i+1])
                    . NMCC_IQ;

                    /* NULL, =, LIKE, <, > */
                    if ($where_condition[$i+2]==NULL) { $where_statement .= NMCC_BLANK . NMCC_EQUAL . NMCC_BLANK; } else { $where_statement .= NMCC_BLANK . $where_condition[$i+2] . NMCC_BLANK; }
                    
                    $where_statement .= NMCC_VQ
                    . \NTRNX_MYSQLI\ntrnx_mysqli::real_escape_string($mysqli_handle, $where_condition[$i+3])
                    . NMCC_VQ;

                    $where_statement .= NMCC_BLANK
                    . \NTRNX_MYSQLI\ntrnx_mysqli::real_escape_string($mysqli_handle, $where_condition[$i+4])
                    . NMCC_BLANK;

                    $i=$i+4;

                } else {

                    $where_statement .= $where_condition[$i]
                    . NMCC_DOT
                    . NMCC_IQ
                    . $where_condition[$i+1]
                    . NMCC_IQ;

                    /* NULL, =, LIKE, */
                    if ($where_condition[$i+2] != NMCC_LIKE) {

                        $where_statement .= NMCC_BLANK
                        . \NTRNX_MYSQLI\ntrnx_mysqli::real_escape_string($mysqli_handle, $where_condition[$i+2])
                        . NMCC_BLANK
                        . NMCC_VQ
                        . \NTRNX_MYSQLI\ntrnx_mysqli::real_escape_string($mysqli_handle, $where_condition[$i+3])
                        . NMCC_VQ;

                    } else {

                        $where_statement .= NMCC_BLANK
                        . \NTRNX_MYSQLI\ntrnx_mysqli::real_escape_string($mysqli_handle, $where_condition[$i+2])
                        . NMCC_BLANK
                        . NMCC_VQ
                        . NMCC_PERCENT
                        . \NTRNX_MYSQLI\ntrnx_mysqli::real_escape_string($mysqli_handle, $where_condition[$i+3])
                        . NMCC_PERCENT
                        . NMCC_VQ;
                    
                    }

                    /* AND, OR, NOT */
                    if ($where_condition[$i+4]==NMCC_AND || $where_condition[$i+4]==NMCC_OR) {

                        $where_statement .= NMCC_BLANK
                        . \NTRNX_MYSQLI\ntrnx_mysqli::real_escape_string($mysqli_handle, $where_condition[$i+4])
                        . NMCC_BLANK;

                        $i=$i+4;

                    } else {

                        $i=$i+3;

                    }

                }

            }

        }
        print $where_statement . NMCC_BR;

}

/**/static function select(

        $mysqli_handle,

        /* http://dev.mysql.com/doc/refman/5.7/en/select.html */

        /* select_expr [, select_expr ...] */
        $select_expression,
        
        /* [FROM table_references */
        $table_reference,
        
        /* [WHERE where_condition] */
        $where_condition = NULL,
        
        /* [GROUP BY {col_name | expr | position} [ASC | DESC], ... [WITH ROLLUP]] */
        $order_condition = NULL,
        
        /* [LIMIT {[offset,] row_count | row_count OFFSET offset}] */  
        $group_condition = NULL,
        
        /* [ORDER BY {col_name | expr | position} [ASC | DESC], ...] */
        $limit = NULL

    ) {

        /* prepare select_statement */
        $select_statement = NMCC_SELECT
        . NMCC_BLANK;        

        $count = count($select_expression);

        for ($i = 0; $i < $count; $i++) {

            $select_statement .= NMCC_IQ . $select_expression[$i] . NMCC_IQ;

            if ($i < $count - 1) { $select_statement .= NMCC_COMMA . NMCC_BLANK; }

        }
        //print $select_statement . NMCC_BR;

        /* set db and table name */
        //$db_name = $table_reference[0];
        $table_name = $table_reference[0];  

        $from_statement .= NMCC_BLANK
        . NMCC_FROM
        . NMCC_BLANK
        . NMCC_IQ
        . \NTRNX_MYSQLI\ntrnx_mysqli::DB_LOGIN_NAME
        . NMCC_IQ
        . NMCC_DOT
        . NMCC_IQ
        . $table_name
        . NMCC_IQ;
        //print $from_statement . NMCC_BR;

        print $join_statement . NMCC_BR;

        /* prepare where_statement */
        if ($where_condition) {

            $where_statement .= NMCC_BLANK
            . NMCC_WHERE
            . NMCC_BLANK;

            $count_where = count($where_condition);

            for ($i = 0; $i < $count_where; $i++) {

                if ($where_condition[$i]==NMCC_NOT) {

                    $where_statement .= NMCC_BLANK
                    . NMCC_NOT
                    . NMCC_BLANK
                    . NMCC_IQ
                    . \NTRNX_MYSQLI\ntrnx_mysqli::real_escape_string($mysqli_handle, $where_condition[$i+1])
                    . NMCC_IQ;

                    /* NULL, =, LIKE, <, > */
                    if ($where_condition[$i+2]==NULL) { $where_statement .= NMCC_BLANK . NMCC_EQUAL . NMCC_BLANK; } else { $where_statement .= NMCC_BLANK . $where_condition[$i+2] . NMCC_BLANK; }
                    
                    $where_statement .= NMCC_VQ
                    . \NTRNX_MYSQLI\ntrnx_mysqli::real_escape_string($mysqli_handle, $where_condition[$i+3])
                    . NMCC_VQ;

                    $where_statement .= NMCC_BLANK
                    . \NTRNX_MYSQLI\ntrnx_mysqli::real_escape_string($mysqli_handle, $where_condition[$i+4])
                    . NMCC_BLANK;

                    $i=$i+4;

                } else {

                    $where_statement .= $where_condition[$i]
                    . NMCC_DOT
                    . NMCC_IQ
                    . $where_condition[$i+1]
                    . NMCC_IQ;

                    /* NULL, =, LIKE, */
                    if ($where_condition[$i+2] != NMCC_LIKE) {

                        $where_statement .= NMCC_BLANK
                        . \NTRNX_MYSQLI\ntrnx_mysqli::real_escape_string($mysqli_handle, $where_condition[$i+2])
                        . NMCC_BLANK
                        . NMCC_VQ
                        . \NTRNX_MYSQLI\ntrnx_mysqli::real_escape_string($mysqli_handle, $where_condition[$i+3])
                        . NMCC_VQ;

                    } else {

                        $where_statement .= NMCC_BLANK
                        . \NTRNX_MYSQLI\ntrnx_mysqli::real_escape_string($mysqli_handle, $where_condition[$i+2])
                        . NMCC_BLANK
                        . NMCC_VQ
                        . NMCC_PERCENT
                        . \NTRNX_MYSQLI\ntrnx_mysqli::real_escape_string($mysqli_handle, $where_condition[$i+3])
                        . NMCC_PERCENT
                        . NMCC_VQ;
                    
                    }

                    /* AND, OR, NOT */
                    if ($where_condition[$i+4]==NMCC_AND || $where_condition[$i+4]==NMCC_OR) {

                        $where_statement .= NMCC_BLANK
                        . \NTRNX_MYSQLI\ntrnx_mysqli::real_escape_string($mysqli_handle, $where_condition[$i+4])
                        . NMCC_BLANK;

                        $i=$i+4;

                    } else {

                        $i=$i+3;

                    }

                }

            }

        }
        print $where_statement . NMCC_BR;

        /* prepare order_statement */
        if ($order_condition) {

            $order_statement .= NMCC_BLANK
            . NMCC_ORDER
            . NMCC_BLANK;

            $count = count($order_condition);

            for ($i = 0; $i < $count; $i++) {

                $order_statement .= NMCC_IQ . $order_condition[$i] . NMCC_IQ;

                if ($order_condition[$i+1] != NULL) { $order_statement .= NMCC_BLANK . $order_condition[$i]; } else { $order_statement .= " ASC"; }

                $i=$i+1;

                if ($i < $count - 1) { $order_statement .= NMCC_COMMA . NMCC_BLANK; }

            }

        }
        //print $order_statement . NMCC_BR;

        /* prepare group_statement  */
        if ($group_condition) {

            $group_statement .= NMCC_BLANK
            . NMCC_GROUP
            . NMCC_BLANK;

            $count = count($group_condition);
        
            for ($i = 0; $i < $count; $i++) {

                $group_statement .= NMCC_IQ
                . $group_condition[$i]
                . NMCC_IQ;

                if ($group_condition[$i+1] != NULL) { $group_statement .= NMCC_BLANK . $group_condition[$i]; } else { $group_statement .= " ASC"; }

                $i=$i+1;

                if ($i < $count - 1) { $group_statement .= NMCC_COMMA . NMCC_BLANK; }
            }

        }
        //print $group_statement . NMCC_BR;

        /* prepare limit_statement */
        if ($limit) { $limit_statement .= NMCC_BLANK . NMCC_LIMIT . NMCC_BLANK . $limit; }
        //print $limit_statement . NMCC_BR;

        /* prepare complete statement */
        $statement = $select_statement
        . $from_statement
        . $where_statement;
        
        if ($group_condition) { $statement .= $group_statement; }        
        if ($order_condition) { $statement .= $order_statement; }        
        if ($limit) { $statement .= $limit_statement; }
        //print 'select = ' . $statement . NMCC_BR;   

        if ($mysqli_handle) {

            /* Select queries return a result set */
            if ($result = $mysqli_handle->query($statement)) {

                //printf("Select returned %d rows" . NMCC_BR, $result->num_rows);
                if (\NTRNX_MYSQLI\ntrnx_mysqli::num_rows($result) > 0) { $data = $result; } else { $data = FALSE; } 

            } else {

                print $mysqli_handle->error . NMCC_BR;
                print $statement . NMCC_BR;

                $data = FALSE;

            }

            return $data;

        } else {

            print 'no db_handle' . NMCC_BR;
            print $statement . NMCC_BR;

        }

    }

?>


$2y$10$qd1AsJLOHAtJRbAdQ4AX1ee3xZPj3.bQGDYRMUtbmoRS0tMRFgLFW