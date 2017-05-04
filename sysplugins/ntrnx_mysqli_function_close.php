<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_close extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli::close -- mysqli_close — Closes a previously opened database connection
    static function link(

        $mysqli_handle

    ) {

        if ($mysqli_handle) {

            if (self::$persistent_connection === FALSE) {

                mysqli_close ($mysqli_handle);

            }

            /* workaround for persistent connections */
            else if (self::$persistent_connection === TRUE) {

                /* determine our thread id */
                $thread_id = mysqli_thread_id ($mysqli_handle);
            
                /* Kill connection */
                mysqli_kill($mysqli_handle, $thread_id);

            }

        }

        self::$connected = FALSE;

    }

}

?>