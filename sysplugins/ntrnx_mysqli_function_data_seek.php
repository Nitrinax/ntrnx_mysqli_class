<?php

namespace NTRNX_MYSQLI\ntrnx_mysqli;

/* begin of class version */
class data_seek extends \NTRNX_MYSQLI\ntrnx_mysqli{

    //mysqli_data_seek() 	Adjusts the result pointer to an arbitrary row in the result-set
    static function data_seek(

        $mysqli_result,
        $offset

    ) {

        return mysqli_data_seek ($mysqli_result , $offset);

    }

}

?>