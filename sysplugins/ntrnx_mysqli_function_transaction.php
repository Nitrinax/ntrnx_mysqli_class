<?php

namespace NTRNX_MYSQLI\ntrnx_mysqli;

/* begin of class version */
class transaction extends \NTRNX_MYSQLI\ntrnx_mysqli{

    //mysqli_autocommit() 	Turns on or off auto-committing database modifications
    static function autocommit() {}

    //mysqli_begin_transaction — Starts a transaction
    static function begin() {}

    //mysqli_commit() 	Commits the current transaction
    static function commit() {}

    //mysqli_rollback() 	Rolls back the current transaction for the database
    static function rollback() {}

}

?>