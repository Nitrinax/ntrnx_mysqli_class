<?php

/* DIRECTORY SEPARATOR - Windows = \ Linux = / */
if (!defined("PRJ_CONST_DS")) { define("PRJ_CONST_DS", DIRECTORY_SEPARATOR); }

/* HTML BREAK ROW */
if (!defined("PRJ_CONST_BR")) { define("PRJ_CONST_BR", "<br />"); }

/* set error messages */
if (!defined("ERROR_DIRECTORY_DOES_NOT_EXISTS")) { define("ERROR_DIRECTORY_DOES_NOT_EXISTS", "directory \"%d\" does not exist<br/>"); }
if (!defined("ERROR_FILE_DOES_NOT_EXISTS")) { define("ERROR_FILE_DOES_NOT_EXISTS", "file \"%s\" does not exist<br/>"); }

/* set project DIR to absolute path of files */
if (!defined("PRJ_DIR")) { define("PRJ_DIR", dirname(__FILE__) . PRJ_CONST_DS); }

/* ntrx_mysqli_class */
if (!defined("CLASS_NTRNX_MYSQLI_CONFIG_DIR")) { define("CLASS_NTRNX_MYSQLI_CONFIG_DIR", PRJ_DIR . "configs" . PRJ_CONST_DS ); }
if (!is_dir(CLASS_NTRNX_MYSQLI_CONFIG_DIR)) { die(str_replace("%d", CLASS_NTRNX_MYSQLI_CONFIG_DIR, ERROR_DIRECTORY_DOES_NOT_EXISTS)); }
if (!defined("CLASS_NTRNX_MYSQLI_FILE")) { define("CLASS_NTRNX_MYSQLI_FILE", PRJ_DIR . "ntrnx_mysqli.class.php"); }
if (!file_exists(CLASS_NTRNX_MYSQLI_FILE)) { die(str_replace("%s", CLASS_NTRNX_MYSQLI_FILE, ERROR_FILE_DOES_NOT_EXISTS)); } else { require_once CLASS_NTRNX_MYSQLI_FILE; }

/* init db_handle */
static $db_account_handle;

/* init connection */
$db_account_handle = \NTRNX_MYSQLI\ntrnx_mysqli::init();

/* setup ssl */
\NTRNX_MYSQLI\ntrnx_mysqli::ssl_set(
    $db_account_handle,
    \NTRNX_MYSQLI\ntrnx_mysqli_config::DB_KEY,
    \NTRNX_MYSQLI\ntrnx_mysqli_config::DB_CERT,
    \NTRNX_MYSQLI\ntrnx_mysqli_config::DB_CA
);
/* setup options */
\NTRNX_MYSQLI\ntrnx_mysqli::options($db_account_handle, "MYSQLI_OPT_CONNECT_TIMEOUT", 10);

/* setup db name */
$db_name = \NTRNX_MYSQLI\ntrnx_mysqli_config::DB_NAME;

/* setup table name */
$table_name = "example";

/* connect */
\NTRNX_MYSQLI\ntrnx_mysqli::real_connect(
    $db_account_handle,
    \NTRNX_MYSQLI\ntrnx_mysqli_config::DB_HOST,
    \NTRNX_MYSQLI\ntrnx_mysqli_config::DB_USER,
    \NTRNX_MYSQLI\ntrnx_mysqli_config::DB_PASS,
    \NTRNX_MYSQLI\ntrnx_mysqli_config::DB_NAME,
    \NTRNX_MYSQLI\ntrnx_mysqli_config::DB_PORT,
    \NTRNX_MYSQLI\ntrnx_mysqli_config::DB_SOCKET,
    \NTRNX_MYSQLI\ntrnx_mysqli_config::DB_FLAGS
);

\NTRNX_MYSQLI\ntrnx_mysqli::suggest_table_field_size($db_account_handle, $db_name, $table_name);

/* free result */
if (isset($result)) {
    \NTRNX_MYSQLI\ntrnx_mysqli::free_result($result);
}

/* close the connection */
if ($db_account_handle) {
    \NTRNX_MYSQLI\ntrnx_mysqli::close($db_account_handle);
}
            
?>