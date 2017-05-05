<?php

/* error reporting for classname */
ini_set ("error_reporting", E_ALL & ~E_NOTICE);
ini_set ("display_errors", 1);

require "ntrnx_mysqli.class.php";

\NTRNX_MYSQLI\ntrnx_mysqli::self_version();

?>