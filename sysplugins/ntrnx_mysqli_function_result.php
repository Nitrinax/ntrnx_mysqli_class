<?php

namespace NTRNX_MYSQLI\ntrnx_mysqli;

/* begin of class version */
class result extends \NTRNX_MYSQLI\ntrnx_mysqli{

    //mysqli_free_result() 	Frees the memory associated with a result
    static function free_result(
        
        $mysqli_result
        
    ) {

        mysqli_free_result($mysqli_result);

    }

    //mysqli_next_result() 	Prepares the next result set from mysqli_multi_query()
    static function next_result() {}

    //mysqli_more_results() 	Checks if there are more results from a multi query
    static function more_results() {}

    //mysqli_store_result() 	Transfers a result set from the last query
    static function store_result() {}

    //mysqli_use_result() 	Initiates the retrieval of a result set from the last query executed using the mysqli_real_query()
    static function use_result() {}

}

?>