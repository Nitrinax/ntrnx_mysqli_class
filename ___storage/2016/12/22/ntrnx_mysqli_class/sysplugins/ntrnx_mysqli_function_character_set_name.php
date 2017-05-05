<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_character_set_name extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli::character_set_name -- mysqli_character_set_name — Returns the default character set for the database connection
    static function link(

        $mysqli_handle

    ) {

        return mysqli_character_set_name ($mysqli_handle);

    }

}

?>