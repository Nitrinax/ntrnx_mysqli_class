<?php

namespace NTRNX_MYSQLI\ntrnx_mysqli;

/* begin of class version */
class field extends \NTRNX_MYSQLI\ntrnx_mysqli{

    //mysqli_field_count() 	Returns the number of columns for the most recent query
    static function field_count(

        $mysqli_handle

    ) {

        return  mysqli_field_count ($mysqli_handle);

    }

    //mysqli_field_seek() 	Sets the field cursor to the given field offset
    static function field_seek(

        $mysqli_result,
        $fieldnr

    ) {

        return mysqli_field_seek ($mysqli_result , $fieldnr);

    }

    //mysqli_field_tell() 	Returns the position of the field cursor
    static function field_tell(

        $mysqli_result

    ) {

        return  mysqli_field_tell ($mysqli_result);

    }

}

?>