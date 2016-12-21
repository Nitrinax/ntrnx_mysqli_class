<?php

namespace NTRNX_MYSQLI\ntrnx_mysqli;

/* begin of class version */
class affected extends \NTRNX_MYSQLI\ntrnx_mysqli{

    //mysqli_affected_fields() {}
    static function affected_fields(

        $mysqli_handle

    ) {

        return mysqli_field_count ($mysqli_handle);

    }

    //mysqli_affected_rows() 	Returns the number of affected rows in the previous MySQL operation
    static function affected_rows(
        
        $mysqli_handle
        
    ) {

        return mysqli_affected_rows ($mysqli_handle);

    }

    //mysqli_affected_tables() {}
    static function affected_tables() {}

}

?>