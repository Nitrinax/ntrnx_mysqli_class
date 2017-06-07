<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class get_charset extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5 >= 5.1.0, PHP 7)
    //mysqli::get_charset -- mysqli_get_charset — Returns a character set object
    static function link(

        $mysqli_handle,
        $options = NULL

    ) {

        /* get object */
        $charset_obj = mysqli_get_charset($mysqli_handle);

        /* convert to array */
        $charset_array = (array) $charset_obj;

        switch ($options) {

            case "charset": return $charset_array["charset"]; break;
            case "collation": return $charset_array["collation"]; break;
            case "dir": return $charset_array["dir"]; break;
            case "min_length": return $charset_array["min_length"]; break;
            case "max_length": return $charset_array["max_length"]; break;
            case "number": return $charset_array["number"]; break;
            case "state": return $charset_array["state"]; break;
            case "comment": return $charset_array["comment"]; break;
            case "client": return mysqli_character_set_name($mysqli_handle); break;

            default: return $charset_obj; break;

        }    

    }

}

?>