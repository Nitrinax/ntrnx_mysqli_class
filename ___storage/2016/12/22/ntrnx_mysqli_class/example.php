<?php

/* DIRECTORY SEPARATOR - Windows = \ Linux = / */
if (!defined('PRJ_CONST_DS')) { define('PRJ_CONST_DS', DIRECTORY_SEPARATOR); }

/* HTML BREAK ROW */
if (!defined('PRJ_CONST_BR')) { define('PRJ_CONST_BR', '<br />'); }

/* set error messages */
if (!defined('ERROR_DIRECTORY_DOES_NOT_EXISTS')) { define('ERROR_DIRECTORY_DOES_NOT_EXISTS', 'directory "%d" does not exist<br/>'); }
if (!defined('ERROR_FILE_DOES_NOT_EXISTS')) { define('ERROR_FILE_DOES_NOT_EXISTS', 'file "%s" does not exist<br/>'); }

/* set project DIR to absolute path of files */
if (!defined('PRJ_DIR')) { define('PRJ_DIR', dirname(__FILE__) . PRJ_CONST_DS); }

/* ntrx_mysqli_class */
if (!defined('CLASS_NTRNX_MYSQLI_CONFIG_DIR')) { define('CLASS_NTRNX_MYSQLI_CONFIG_DIR', PRJ_DIR . 'configs' . PRJ_CONST_DS ); }
if (!is_dir(CLASS_NTRNX_MYSQLI_CONFIG_DIR)) { die(str_replace('%d', CLASS_NTRNX_MYSQLI_CONFIG_DIR, ERROR_DIRECTORY_DOES_NOT_EXISTS)); }
if (!defined('CLASS_NTRNX_MYSQLI_FILE')) { define('CLASS_NTRNX_MYSQLI_FILE', PRJ_DIR . 'ntrnx_mysqli.class.php'); }
if (!file_exists(CLASS_NTRNX_MYSQLI_FILE)) { die(str_replace('%s', CLASS_NTRNX_MYSQLI_FILE, ERROR_FILE_DOES_NOT_EXISTS)); } else { require_once CLASS_NTRNX_MYSQLI_FILE; }

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
$table_name = 'example';

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

\NTRNX_MYSQLI\ntrnx_mysqli::set_charset($db_account_handle, "utf8");

/* show ssl status */
$ssl_status = \NTRNX_MYSQLI\ntrnx_mysqli::ssl_get($db_account_handle);
print '<pre>';
print 'SSL is <b><font color=';
if ($ssl_status == FALSE) { print '"red">disabled'; } else { print '"green">enabled'; }
print '</font></b> for user ' . \NTRNX_MYSQLI\ntrnx_mysqli_config::DB_USER;
print '</pre>'; 

/* show charset for connection */
print '<pre>'; 
print 'used charset for connection<br />- ' . \NTRNX_MYSQLI\ntrnx_mysqli::get_charset($db_account_handle, 'charset');
print '</pre>';

/* show charset for collation */
print '<pre>'; 
print 'used charset for collation<br />- ' . \NTRNX_MYSQLI\ntrnx_mysqli::get_charset($db_account_handle, 'collation');
print '</pre>';

/* list tables in database */
$tables = \NTRNX_MYSQLI\ntrnx_mysqli::get_tables($db_account_handle, $db_name);
print '<pre>'; 
print "tables found in database " . $db_name . "<br />";
while ($row = mysqli_fetch_row($tables)) {
    print "- " . $row[0] . "\n";
    if (!isset($first_table)) { $first_table = $row[0]; }
}
print '</pre>';

/* list fields in table */
$fields = \NTRNX_MYSQLI\ntrnx_mysqli::get_fields($db_account_handle, $db_name, $first_table);
print '<pre>'; 
print "fields found in table " . $db_name . "." . $first_table . "<br />";
while ($row = mysqli_fetch_array($fields)) {
    print "- " . $row[0] . " [" . $row[1] . "]" . "\n";
}
print '</pre>';

/* perform a predefined query */
$result = \NTRNX_MYSQLI\ntrnx_mysqli::select(

    /* db handle */
    $db_account_handle,

    /* select expression format: {table,field}, {table,field}, ... */
    array($table_name, 'account_id', $table_name, 'name'),

    /* table_refercene format: {db_name,table} */
    array($db_name, $table_name),

    /* join expression */
    NULL,

    /* where condition format: {table,field}, operator, {STRING,$string} or {table,field} */
    array($table_name, 'name','EQUAL', 'STRING', $table_name)
			
);
print '<pre>'; 
print 'last (SELECT|INSERT|UPDATE|DELETE) query is<br />- ' . \NTRNX_MYSQLI\ntrnx_mysqli::last_query() . '<br />';

/* list affected fields of last query */
$fields = \NTRNX_MYSQLI\ntrnx_mysqli::affected_fields($db_account_handle);
print '- affected fields of last query : ' . $fields . '<br />';

/* affected rows of last query */
$rows = \NTRNX_MYSQLI\ntrnx_mysqli::affected_rows($db_account_handle);
print '- affected rows of last query : ' . $rows;
print '</pre>';

/* perform a raw query */
$result = \NTRNX_MYSQLI\ntrnx_mysqli::query(

    /* db handle */
    $db_account_handle,

    /* self defined query */
    "SELECT `example`.`account_id`, `example`.`name` FROM `ntrnx_mysqli`.`example` WHERE `example`.`name` = 'blub'"
			
);
print '<pre>'; 
print 'last (SELECT|INSERT|UPDATE|DELETE) query is<br />- ' . \NTRNX_MYSQLI\ntrnx_mysqli::last_query() . '<br />';

/* list affected fields of last query */
$fields = \NTRNX_MYSQLI\ntrnx_mysqli::affected_fields($db_account_handle);
print '- affected fields of last query : ' . $fields . '<br />';

/* affected rows of last query */
$rows = \NTRNX_MYSQLI\ntrnx_mysqli::affected_rows($db_account_handle);
print '- affected rows of last query : ' . $rows;
print '</pre>';

/* free result */
if ($result) {
    \NTRNX_MYSQLI\ntrnx_mysqli::free_result($result);
}

/* close the connection */
if ($db_account_handle) {
    \NTRNX_MYSQLI\ntrnx_mysqli::close($db_account_handle);
}
            
?>