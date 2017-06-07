<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class kill extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli::kill -- mysqli_kill — Asks the server to kill a MySQL thread
    static function link($mysqli_handle, $thread_id) {

        mysqli_kill($mysqli_handle, $thread_id);

    }

}

?>