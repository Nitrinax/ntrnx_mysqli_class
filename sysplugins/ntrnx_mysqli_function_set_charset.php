<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class set_charset extends \NTRNX_MYSQLI\ntrnx_mysqli {

    private static $result = FALSE;

    //(PHP 5 >= 5.0.5, PHP 7)
    //mysqli::set_charset -- mysqli_set_charset — Sets the default client character set
    static function link(

        $mysqli_handle,
        $charset

    ) {

        /* check for mysqli handle */
        if ($mysqli_handle) {

            /* check for connected state */
            if (self::$connected === TRUE) {

                /* change character set to $charset */
                if (!mysqli_set_charset ($mysqli_handle, $charset)) {

                    \NTRNX_MYSQLI\ntrnx_mysqli_internal_raise::error(NMYSQCC_ERROR_ON_LOADING_CHARACTER_SET, get_called_class(), __LINE__);

                } else {

                    $result = TRUE;

                }

            } else {

                \NTRNX_MYSQLI\ntrnx_mysqli_internal_raise::error(NMYSQCC_ERROR_NOT_CONNECTED, get_called_class(), __LINE__);

            }

        } else {

            \NTRNX_MYSQLI\ntrnx_mysqli_internal_raise::error(NMYSQCC_ERROR_DB_HANDLE_NOT_INITIALIZED, get_called_class(), __LINE__);

        }

        return $result;

    }

}

?>