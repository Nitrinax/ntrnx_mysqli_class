<?php

namespace NTRNX_MYSQLI\ntrnx_mysqli;

/* begin of class version */
class fetch extends \NTRNX_MYSQLI\ntrnx_mysqli{

    //mysqli_fetch_all() 	Fetches all result rows as an associative array, a numeric array, or both
    static function fetch_all(

        $mysqli_result,
        $resulttype = NULL

    ) {

        return mysqli_fetch_all ($mysqli_result, $resulttype);

    }

    //mysqli_fetch_array() 	Fetches a result row as an associative, a numeric array, or both
    static function fetch_array(

        $mysqli_result,
        $resulttype = NULL

    ) {

        return mysqli_fetch_array ($mysqli_result, $resulttype);

    }

    //mysqli_fetch_assoc() 	Fetches a result row as an associative array
    static function fetch_assoc(

        $mysqli_result
        
    ) {

        return mysqli_fetch_assoc ($mysqli_result);

    }

    //mysqli_fetch_field_direct() 	Returns meta-data for a single field in the result set, as an object
    static function fetch_field_direct(

        $mysqli_result,
        $fieldnr

    ) {

        return mysqli_fetch_field_direct ($mysqli_result , $fieldnr);

    }

    //mysqli_fetch_field() 	Returns the next field in the result set, as an object
    static function fetch_field(

        $mysqli_result

    ) {

        return mysqli_fetch_field ($mysqli_result);

    }

    //mysqli_fetch_fields() 	Returns an array of objects that represent the fields in a result set
    static function fetch_fields(
        
        $mysqli_result

    ) {

        return mysqli_fetch_fields ($mysqli_result);

    }

    //mysqli_fetch_lengths() 	Returns the lengths of the columns of the current row in the result set
    static function fetch_lengths(

        $mysqli_result

    ) {

        return mysqli_fetch_lengths ($mysqli_result);

    }

    //mysqli_fetch_object() 	Returns the current row of a result set, as an object
    static function fetch_object(

        $mysqli_result,
        $class_name,
        $params = NULL

    ) {

        return mysqli_fetch_object ($mysqli_result, $class_name, $params);

    }

    //mysqli_fetch_row() 	Fetches one row from a result-set and returns it as an enumerated array
    static function fetch_row(

        $mysqli_result

    ) {

        return mysqli_fetch_row ($mysqli_result);

    }

}

?>