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

/*
$db_account_handle = \NTRNX_MYSQLI\ntrnx_mysqli::connect(
    \NTRNX_MYSQLI\ntrnx_mysqli_config::DB_HOST,
    \NTRNX_MYSQLI\ntrnx_mysqli_config::DB_USER,
    \NTRNX_MYSQLI\ntrnx_mysqli_config::DB_PASS,
    \NTRNX_MYSQLI\ntrnx_mysqli_config::DB_NAME,
    \NTRNX_MYSQLI\ntrnx_mysqli_config::DB_PORT,
    \NTRNX_MYSQLI\ntrnx_mysqli_config::DB_SOCKET
);
*/

/* show ssl status */
$ssl_status = \NTRNX_MYSQLI\ntrnx_mysqli::ssl_get($db_account_handle);
print "<pre>";
print "SSL is <b><font color=";
if ($ssl_status == FALSE) { print ""red">disabled"; } else { print ""green">enabled"; }
print "</font></b> for user " . \NTRNX_MYSQLI\ntrnx_mysqli_config::DB_USER;
print "</pre>"; 

/* show charset for connection */
print "<pre>"; 
print "current character set  for connection<br />- " . \NTRNX_MYSQLI\ntrnx_mysqli::get_charset($db_account_handle, "charset");
print "</pre>";

/* show charset for collation */
print "<pre>"; 
print "current character set  for collation<br />- " . \NTRNX_MYSQLI\ntrnx_mysqli::get_charset($db_account_handle, "collation");
print "</pre>";

/* get charset */
print "<pre>";
print "current character set for client is  : <br />- " . \NTRNX_MYSQLI\ntrnx_mysqli::get_charset($db_account_handle, "client");
print "</pre>"; 

/* set charset */
print "<pre>";
print "client character set is changed to : <br />- " . \NTRNX_MYSQLI\ntrnx_mysqli::set_charset($db_account_handle, "utf8");
print "</pre>"; 

/* list tables in database */
$tables = \NTRNX_MYSQLI\ntrnx_mysqli::get_tables($db_account_handle, $db_name);
print "<pre>"; 
print "tables found in database " . $db_name . "<br />";
while ($row = mysqli_fetch_row($tables)) {
    print "- " . $row[0] . "\n";
    if (!isset($first_table)) { $first_table = $row[0]; }
}
print "</pre>";

/* list fields in table */
$fields = \NTRNX_MYSQLI\ntrnx_mysqli::get_fields($db_account_handle, $db_name, $first_table);
print "<pre>"; 
print "fields found in table " . $db_name . "." . $first_table . "<br />";
while ($row = mysqli_fetch_array($fields)) {
    print "- " . $row[0] . " [" . $row[1] . "]" . "\n";
}
print "</pre>";

/* free result */
if (isset($result)) {
    \NTRNX_MYSQLI\ntrnx_mysqli::free_result($result);
}

/* close the connection */
if ($db_account_handle) {
    \NTRNX_MYSQLI\ntrnx_mysqli::close($db_account_handle);
}
            
?>