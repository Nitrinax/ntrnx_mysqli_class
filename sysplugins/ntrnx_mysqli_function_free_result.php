<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class free_result extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli_result::free -- mysqli_free_result — Frees the memory associated with a result
    //http://php.net/manual/de/mysqli-result.free.php
    static function result(
        
        $result
        
    ) {

        mysqli_free_result($result);

    }

}

?>