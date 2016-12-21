<?php

namespace NTRNX_MYSQLI\ntrnx_mysqli;

/* begin of class version */
class query extends \NTRNX_MYSQLI\ntrnx_mysqli{

    /* return last query */
    static function last_query() {

        return self::$last_query;

    }

    /* execute raw query */
    static function raw(

        $mysqli_handle,
        $statement,
        $options = NULL

    ) {

        /* debug output */
        if (\NTRNX_MYSQLI\NMYSQCC_DEBUG == TRUE) {
            print "<pre>" . $statement . "</pre>";
        }

        self::$last_query = $statement;

        if ($mysqli_handle) {

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

    //mysqli_multi_query — Performs a query on the database
    static function multi_query() {}

    //mysqli_real_query() 	Executes an SQL query
    static function real_query() {}

    //mysqli_reap_async_query() 	Returns the result from async query
    static function reap_async_query() {}

}

?>