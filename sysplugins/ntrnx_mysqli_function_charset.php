<?php

namespace NTRNX_MYSQLI\ntrnx_mysqli;

/* begin of class version */
class charset extends \NTRNX_MYSQLI\ntrnx_mysqli{

    //mysqli_get_charset() 	Returns a character set object
    static function get(

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

    //mysqli_set_charset() 	Sets the default client character set
    static function set(

        $mysqli_handle,
        $charset

    ) {

        /* change character set to $charset */
        if (!mysqli_set_charset ($mysqli_handle, $charset)) {
            print str_replace("%s", $charset, NMYSQCC_ERROR_ON_LOADING_CHARACTER_SET) . NMYSQCC_BR;
            die(\NTRNX_MYSQLI\ntrnx_mysqli::error($mysqli_handle));
        }

        /* debug output */
        if (NMYSQCC_DEBUG == TRUE) {
            print str_replace("%s", $charset, NMYSQCC_MSG_CURRENT_CHARACTER_SET) . NMYSQCC_BR;
        } else {
            return $charset;
        }
    
    }


    //mysqli_character_set_name() 	Returns the default character set for the database connection
    static function name(

        $mysqli_handle

    ) {

        return mysqli_character_set_name ($mysqli_handle);

    }

}

?>