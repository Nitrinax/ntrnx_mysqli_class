<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_set_charset extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5 >= 5.0.5, PHP 7)
    //mysqli::set_charset -- mysqli_set_charset — Sets the default client character set
    static function link(

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

}

?>