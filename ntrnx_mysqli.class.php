<?php

/*
* class ntrnx_mysqli
*
* short:
*
* - main file of ntrnx_mysqli_class
*
*/

namespace NTRNX_MYSQLI;

/* define shorthand directory separator constant */
if (!defined("NMYSQCC_DS")) {			define("NMYSQCC_DS",       DIRECTORY_SEPARATOR); }
if (!defined("NMYSQCC_PS")) {			define("NMYSQCC_PS",       PATH_SEPARATOR); }
if (!defined("NMYSQCC_BR")) {			define("NMYSQCC_BR",       "<br />"); }    /* HTML break row */
if (!defined("NMYSQCC_LF")) {			define("NMYSQCC_LF",       "\n"); }        /* PHP break row */

/* NMYSQCC = nitrinax mysqli class const */
if (!defined("NMYSQCC_DOT")) {			define("NMYSQCC_DOT",      "."); }         /* SQL REFERENCE/CONDITION SEPARATOR */
if (!defined("NMYSQCC_COMMA")) {		define("NMYSQCC_COMMA",    ","); }         /* SQL MULTIPLY FIELD SEPARATOR */
if (!defined("NMYSQCC_IQ")) {			define("NMYSQCC_IQ",       "`"); }         /* SQL INSTRUCTION QUOTE */
if (!defined("NMYSQCC_VQ")) {			define("NMYSQCC_VQ",       "'"); }         /* SQL VALUE QUOTE */
if (!defined("NMYSQCC_OPEN_BRACKET")) {			define("NMYSQCC_OPEN_BRACKET",			"<"); }
if (!defined("NMYSQCC_CLOSE_BRACKET")) {		define("NMYSQCC_CLOSE_BRACKET",			">"); }
if (!defined("NMYSQCC_CURVED_OPEN_BRACKET")) {	define("NMYSQCC_CURVED_OPEN_BRACKET",	"{"); }
if (!defined("NMYSQCC_CURVED_CLOSE_BRACKET")) {	define("NMYSQCC_CURVED_CLOSE_BRACKET",	"}"); }
if (!defined("NMYSQCC_SQUARE_BRACKET_OPEN")) {	define("NMYSQCC_SQUARE_BRACKET_OPEN",	"["); }
if (!defined("NMYSQCC_SQUARE_BRACKET_CLOSE")) {	define("NMYSQCC_SQUARE_BRACKET_CLOSE",	"]"); }
if (!defined("NMYSQCC_LEFT_PARENTHESIS")) {		define("NMYSQCC_LEFT_PARENTHESIS",		"("); }
if (!defined("NMYSQCC_RIGHT_PARENTHESIS")) {	define("NMYSQCC_RIGHT_PARENTHESIS",		")"); }
if (!defined("NMYSQCC_PERCENT")) {     define("NMYSQCC_PERCENT",  "%"); }
if (!defined("NMYSQCC_BLANK")) {       define("NMYSQCC_BLANK",    " "); }

/* commands */
if (!defined("NMYSQCC_SELECT")) {      define("NMYSQCC_SELECT",   "SELECT "); }
if (!defined("NMYSQCC_INSERT")) {      define("NMYSQCC_INSERT",   "INSERT INTO "); }
if (!defined("NMYSQCC_UPDATE")) {      define("NMYSQCC_UPDATE",   "UPDATE "); }
if (!defined("NMYSQCC_DELETE")) {      define("NMYSQCC_DELETE",   "DELETE FROM "); }
if (!defined("NMYSQCC_TABLES")) {      define("NMYSQCC_TABLES",   "SHOW TABLES FROM "); }
if (!defined("NMYSQCC_COLUMNS")) {     define("NMYSQCC_COLUMNS",   "SHOW COLUMNS FROM "); }
/* conditions */
if (!defined("NMYSQCC_FROM")) {        define("NMYSQCC_FROM",     " FROM "); }
if (!defined("NMYSQCC_SET")) {         define("NMYSQCC_SET",      " SET "); }
if (!defined("NMYSQCC_WHERE")) {       define("NMYSQCC_WHERE",    " WHERE "); }
if (!defined("NMYSQCC_ORDER")) {       define("NMYSQCC_ORDER",    " ORDER BY "); }
if (!defined("NMYSQCC_GROUP")) {       define("NMYSQCC_GROUP",    " GROUP BY "); }
/* logical operators */
if (!defined("NMYSQCC_EQUAL")) {       define("NMYSQCC_EQUAL",    "="); }         /* Equal */
if (!defined("NMYSQCC_UNEQUAL")) {     define("NMYSQCC_UNEQUAL",  "!="); }        /* Not equal */
if (!defined("NMYSQCC_NOTEQUAL")) {    define("NMYSQCC_NOTEQUAL", "<>"); }        /* Not equal */
if (!defined("NMYSQCC_NSEQUAL")) {     define("NMYSQCC_NSEQUAL",  "<=>"); }       /* NULL-safe equal */
if (!defined("NMYSQCC_GT"))            define("NMYSQCC_GT",       ">");           /* Greater than */
if (!defined("NMYSQCC_GTOE")) {        define("NMYSQCC_GTOE",     ">="); }        /* Greater than or equal */
if (!defined("NMYSQCC_LT")) {          define("NMYSQCC_LT",       "<"); }         /* Less than */
if (!defined("NMYSQCC_LTOE")) {        define("NMYSQCC_LTOE",     "<="); }        /* Less than or equal */
if (!defined("NMYSQCC_AND")) {         define("NMYSQCC_AND",      "AND"); }
if (!defined("NMYSQCC_OR")) {          define("NMYSQCC_OR",       "OR"); }
if (!defined("NMYSQCC_XOR")) {         define("NMYSQCC_XOR",      "XOR"); }
if (!defined("NMYSQCC_SLIKE")) {       define("NMYSQCC_SLIKE",    "SOUNDS LIKE"); }
if (!defined("NMYSQCC_LIKE")) {        define("NMYSQCC_LIKE",     "LIKE"); }
if (!defined("NMYSQCC_NLIKE")) {       define("NMYSQCC_NLIKE",    "NOT LIKE"); }
if (!defined("NMYSQCC_NOT")) {         define("NMYSQCC_NOT",      "NOT"); }

/* value conditions */
if (!defined("NMYSQCC_AS")) {          define("NMYSQCC_AS",       "AS"); }
if (!defined("NMYSQCC_LIMIT")) {       define("NMYSQCC_LIMIT",    "LIMIT"); }
if (!defined("NMYSQCC_VALUES")) {      define("NMYSQCC_VALUES",   "VALUES"); }
if (!defined("NMYSQCC_ON")) {          define("NMYSQCC_ON",       "ON"); }
if (!defined("NMYSQCC_USING")) {       define("NMYSQCC_USING",    "USING"); }

/* join types */
if (!defined("NMYSQCC_I_JOIN")) {      define("NMYSQCC_I_JOIN",   " INNER JOIN "); }
if (!defined("NMYSQCC_C_JOIN")) {      define("NMYSQCC_C_JOIN",   " CROSS JOIN "); }
if (!defined("NMYSQCC_S_JOIN")) {      define("NMYSQCC_S_JOIN",   " STRAIGHT_JOIN "); }
if (!defined("NMYSQCC_L_JOIN")) {      define("NMYSQCC_L_JOIN",   " LEFT JOIN "); }
if (!defined("NMYSQCC_R_JOIN")) {      define("NMYSQCC_R_JOIN",   " RIGHT JOIN "); }
if (!defined("NMYSQCC_LO_JOIN")) {     define("NMYSQCC_LO_JOIN",  " LEFT OUTER JOIN "); }
if (!defined("NMYSQCC_RO_JOIN")) {     define("NMYSQCC_RO_JOIN",  " RIGHT OUTER JOIN "); }
if (!defined("NMYSQCC_FO_JOIN")) {     define("NMYSQCC_FO_JOIN",  " FULL OUTER JOIN "); }
if (!defined("NMYSQCC_N_JOIN")) {      define("NMYSQCC_N_JOIN",   " NATURAL JOIN "); }
if (!defined("NMYSQCC_NL_JOIN")) {     define("NMYSQCC_NL_JOIN",  " NATURAL LEFT JOIN "); }
if (!defined("NMYSQCC_NR_JOIN")) {     define("NMYSQCC_NR_JOIN",  " NATURAL RIGHT JOIN "); }
if (!defined("NMYSQCC_NLO_JOIN")) {    define("NMYSQCC_NLO_JOIN", " NATURAL LEFT OUTER JOIN "); }
if (!defined("NMYSQCC_NRO_JOIN")) {    define("NMYSQCC_NRO_JOIN", " NATURAL RIGHT OUTER JOIN "); }

/* set error const */
const NMYSQCC_ERROR_MYSQLI_INIT_FAILED = -1;
const NMYSQCC_ERROR_DB_HANDLE_NOT_INITIALIZED = -2;
const NMYSQCC_ERROR_NOT_CONNECTED = -3;

const NMYSQCC_ERROR_ON_LOADING_CHARACTER_SET = -10;
const NMYSQCC_ERROR_CLIENT_CHARACTER_SET_WAS_CHANGED = -11;

const NMYSQCC_ERROR_ON_SETTINGS_VALUE_FOR_OPTION = -20;
const NMYSQCC_ERROR_VALUE_MUST_BE_INTEGER = -21;
const NMYSQCC_ERROR_VALUE_MUST_BE_BOOLEAN = -22;
const NMYSQCC_ERROR_VALUE_MUST_BE_STRING = -23;

const NMYSQCC_ERROR_ON_SETTINGS_PATH_TO_FILE = -30;
const NMYSQCC_ERROR_ON_SETTINGS_PATH_TO_DIR = -31;

const NMYSQCC_ERROR_SSL_IS_ENABLED = -40;
const NMYSQCC_ERROR_SSL_IS_DISABLED = -41;

const NMYSQCC_ERROR_NUMBER_OF_COLUMNS_AND_NUMBER_OF_VALUES_DO_NOT_MATCH = -50;
const NMYSQCC_ERROR_FLAGS_NOT_SUPPORTED = -51;
const NMYSQCC_ERROR_RESULTMODE_NOT_SUPPORTED = -52;

const NMYSQCC_ERROR_JOIN_SYNTAX = -60;
const NMYSQCC_ERROR_JOIN_EXPRESSION = -61;
const NMYSQCC_ERROR_OPERATOR_NOT_SUPPORTED = -62;
const NMYSQCC_ERROR_HAVING_CONDITION_NOT_SUPPORTED = -63;
const NMYSQCC_ERROR_PROCEDURE_NOT_SUPPORTED = -64;
const NMYSQCC_ERROR_INTO_TARGET_NOT_SUPPORTED = -65;
const NMYSQCC_ERROR_FOR_OPTIONS_NOT_SUPPORTED = -66;

const NMYSQCC_ERROR_ACCESS_DENIED_FOR_USER_TO_DATABASE = 1044;
const NMYSQCC_ERROR_ACCESS_DENIED_FOR_USER_USING_PASSWORD = 1045;
const NMYSQCC_ERROR_UNKNOWN_COLUMN = 1054;
const NMYSQCC_ERROR_TABLE_DOESNT_EXIST = 1146;
const NMYSQCC_ERROR_CANT_CONNECT_TO_LOCAL_MYSQL_SERVER_THROUGH_SOCKET = 2002;
const NMYSQCC_ERROR_UNKNOWN_MYSQL_SERVER_HOST = 2005;

/* ### set error messages ### */

/* mysqli class errors */
if (!defined("NMYSQCC_ERROR_MSG_DIRECTORY_DOES_NOT_EXISTS")) { define("NMYSQCC_ERROR_MSG_DIRECTORY_DOES_NOT_EXISTS", "Directory \"%s\" does not exist."); }
if (!defined("NMYSQCC_ERROR_MSG_FILE_DOES_NOT_EXISTS")) { define("NMYSQCC_ERROR_MSG_FILE_DOES_NOT_EXISTS", "File \"%s\" does not exist."); }

/* ntrnx_mysqli_init */
if (!defined("NMYSQCC_ERROR_MSG_MYSQLI_INIT_FAILED")) { define("NMYSQCC_ERROR_MSG_MYSQLI_INIT_FAILED", "Mysqli_init failed."); }

/* ntrnx_mysqli_insert */
if (!defined("NMYSQCC_ERROR_MSG_FLAGS_NOT_SUPPORTED")) { define("NMYSQCC_ERROR_MSG_FLAGS_NOT_SUPPORTED", "flags not supported"); }
if (!defined("NMYSQCC_ERROR_MSG_RESULTMODE_NOT_SUPPORTED")) { define("NMYSQCC_ERROR_MSG_RESULTMODE_NOT_SUPPORTED", "resultmode not supported"); }

/* 
* - ntrnx_mysqli_columns
* - ntrnx_mysqli_delete
* - ntrnx_mysqli_insert
* - ntrnx_mysqli_raw_query
* - ntrnx_mysqli_tables
* - ntrnx_mysqli_update
*/
if (!defined("NMYSQCC_ERROR_MSG_DB_HANDLE_NOT_INITIALIZED")) { define("NMYSQCC_ERROR_MSG_DB_HANDLE_NOT_INITIALIZED", "DB handle not initialized."); }

/* 
* - ntrnx_mysqli_columns
* - ntrnx_mysqli_delete
* - ntrnx_mysqli_insert
* - ntrnx_mysqli_raw_query
* - ntrnx_mysqli_tables
* - ntrnx_mysqli_update
*/
if (!defined("NMYSQCC_ERROR_MSG_NOT_CONNECTED")) { define("NMYSQCC_ERROR_MSG_NOT_CONNECTED", "Connection Error: Not connected."); }

/* ntrnx_mysqli_insert */
if (!defined("NMYSQCC_ERROR_MSG_NUMBER_OF_COLUMNS_AND_NUMBER_OF_VALUES_DO_NOT_MATCH")) { define("NMYSQCC_ERROR_MSG_NUMBER_OF_COLUMNS_AND_NUMBER_OF_VALUES_DO_NOT_MATCH", "Number of columns and number of values ​​do not match."); }

/* ntrnx_mysqli_set_charset */
if (!defined("NMYSQCC_ERROR_MSG_ON_LOADING_CHARACTER_SET")) { define("NMYSQCC_ERROR_MSG_ON_LOADING_CHARACTER_SET", "Error loading character set : \"%s\"."); }

/*
* - ntrnx_mysqli_connect
* - ntrnx_mysqli_options
* - ntrnx_mysqli_pconnect
* - ntrnx_mysqli_real_connect
*/
if (!defined("NMYSQCC_ERROR_MSG_ON_SETTINGS_VALUE_FOR_OPTION")) { define("NMYSQCC_ERROR_MSG_ON_SETTINGS_VALUE_FOR_OPTION", "Error on setting value \"{VALUE}\" for option \"{OPTION}\"."); }

/*
* - ntrnx_mysqli_connect
* - ntrnx_mysqli_options
* - ntrnx_mysqli_pconnect
* - ntrnx_mysqli_real_connect
*/
if (!defined("NMYSQCC_ERROR_MSG_VALUE_MUST_BE_INTEGER")) { define("NMYSQCC_ERROR_MSG_VALUE_MUST_BE_INTEGER", "Value must be integer."); }

/* ntrnx_mysqli_options */
if (!defined("NMYSQCC_ERROR_MSG_VALUE_MUST_BE_BOOLEAN")) { define("NMYSQCC_ERROR_MSG_VALUE_MUST_BE_BOOLEAN", "Value must be boolean."); }
if (!defined("NMYSQCC_ERROR_MSG_VALUE_MUST_BE_STRING")) { define("NMYSQCC_ERROR_MSG_VALUE_MUST_BE_STRING", "Value must be string."); }

/* ntrnx_mysqli_ssl_get */
if (!defined("NMYSQCC_ERROR_MSG_SSL_IS_ENABLED")) { define("NMYSQCC_ERROR_MSG_SSL_IS_ENABLED", "SSL to database is enabled."); }
if (!defined("NMYSQCC_ERROR_MSG_SSL_IS_DISABLED")) { define("NMYSQCC_ERROR_MSG_SSL_IS_DISABLED", "SSL to database is disabled."); }

/* ntrnx_mysqli_ssl_set */
if (!defined("NMYSQCC_ERROR_MSG_ON_SETTINGS_PATH_TO_FILE")) { define("NMYSQCC_ERROR_MSG_ON_SETTINGS_PATH_TO_FILE", "Error on setting path to file \"{FILE}\"."); }
if (!defined("NMYSQCC_ERROR_MSG_ON_SETTINGS_PATH_TO_DIR")) { define("NMYSQCC_ERROR_MSG_ON_SETTINGS_PATH_TO_DIR", "Error on setting path to dir \"{DIR}\" that contains \"{FILE}\"."); }

/* ntrnx_mysqli_select */
if (!defined("NMYSQCC_ERROR_MSG_JOIN_SYNTAX")) { define("NMYSQCC_ERROR_MSG_JOIN_SYNTAX", "Error on JOIN syntax."); }
if (!defined("NMYSQCC_ERROR_MSG_JOIN_EXPRESSION")) { define("NMYSQCC_ERROR_MSG_JOIN_EXPRESSION", "Error on JOIN expression."); }
if (!defined("NMYSQCC_ERROR_MSG_OPERATOR_NOT_SUPPORTED")) { define("NMYSQCC_ERROR_MSG_OPERATOR_NOT_SUPPORTED", "Operator \"%s\" not supported."); }
if (!defined("NMYSQCC_ERROR_MSG_HAVING_CONDITION_NOT_SUPPORTED")) { define("NMYSQCC_ERROR_MSG_HAVING_CONDITION_NOT_SUPPORTED", "having_condition not supported."); }

if (!defined("NMYSQCC_ERROR_MSG_PROCEDURE_NOT_SUPPORTED")) { define("NMYSQCC_ERROR_MSG_PROCEDURE_NOT_SUPPORTED", "procedure not supported."); }
if (!defined("NMYSQCC_ERROR_MSG_INTO_TARGET_NOT_SUPPORTED")) { define("NMYSQCC_ERROR_MSG_INTO_TARGET_NOT_SUPPORTED", "into_target not supported."); }
if (!defined("NMYSQCC_ERROR_MSG_FOR_OPTIONS_NOT_SUPPORTED")) { define("NMYSQCC_ERROR_MSG_FOR_OPTIONS_NOT_SUPPORTED", "for_options not supported."); }

/* ntrnx_mysqli_set_charset */
if (!defined("NMYSQCC_ERROR_MSG_CLIENT_CHARACTER_SET_WAS_CHANGED")) { define("NMYSQCC_ERROR_MSG_CLIENT_CHARACTER_SET_WAS_CHANGED", "Client character set was changed to : \"%s\"."); }

/* set DIR to absolute path to library files */
if (!defined("NMYSQCC_DIR")) { define("NMYSQCC_DIR", dirname(__FILE__) . NMYSQCC_DS); }

/* define dir for sysplugins */
if (!defined("NMYSQCC_SYSPLUGINS_DIR")) { define("NMYSQCC_SYSPLUGINS_DIR", NMYSQCC_DIR . "sysplugins" . NMYSQCC_DS); }

/* define dir for class config */
if (!defined("NMYSQCC_CONFIG_DIR")) { define("NMYSQCC_CONFIG_DIR", NMYSQCC_DIR . "configs" . NMYSQCC_DS); }

/* define dir for class config */
if (!defined("NMYSQCC_LOG_DIR")) { define("NMYSQCC_LOG_DIR", NMYSQCC_DIR . "logs" . NMYSQCC_DS); }

/* put needed directories in array */
$ntrnx_mysqli_array_dir = array(

	NMYSQCC_SYSPLUGINS_DIR,
	NMYSQCC_CONFIG_DIR,
    NMYSQCC_LOG_DIR

);

/* check if directories exist */
foreach ($ntrnx_mysqli_array_dir as &$ntrnx_mysqli_var_dir) {

	if (!is_dir($ntrnx_mysqli_var_dir)) {

        die(str_replace("%s", $ntrnx_mysqli_var_dir, NMYSQCC_ERROR_DIRECTORY_DOES_NOT_EXISTS));

    }

}

/* setup autoloader */
if (!defined("NMYSQCC_AUTOLOADER_NAMESPACE")) { define("NMYSQCC_AUTOLOADER_NAMESPACE", __NAMESPACE__); }
if (!defined("NMYSQCC_AUTOLOADER_FILE_DIR")) { define("NMYSQCC_AUTOLOADER_FILE_DIR", NMYSQCC_SYSPLUGINS_DIR); }
if (!defined("NMYSQCC_AUTOLOADER_FILE_SUFFIX")) { define("NMYSQCC_AUTOLOADER_FILE_SUFFIX", ".php"); }
if (!defined("NMYSQCC_AUTOLOADER_INTERNAL_PART")) { define("NMYSQCC_AUTOLOADER_INTERNAL_PART", "internal"); }
if (!defined("NMYSQCC_AUTOLOADER_FUNCTION_PART")) { define("NMYSQCC_AUTOLOADER_FUNCTION_PART", "function"); }

/* include autoloader */
$ntrnx_mysqli_autoloader = NMYSQCC_DIR . "ntrnx_mysqli.autoloader.php";
if (file_exists($ntrnx_mysqli_autoloader)) {
	include_once($ntrnx_mysqli_autoloader);
	\ntrnx_mysqli_autoloader::register();
} else {
	die( "file " . $ntrnx_mysqli_autoloader . " not found" . NMYSQCC_BR);
}

/* check and load config and subclasses */
if (!defined("NMYSQCC_CONFIG_FILE")) { define("NMYSQCC_CONFIG_FILE", NMYSQCC_CONFIG_DIR . "ntrnx_mysqli_config.php"); }
if (!defined("NMYSQCC_DB_CONFIG_FILE")) { define("NMYSQCC_DB_CONFIG_FILE", NMYSQCC_CONFIG_DIR . "ntrnx_mysqli_db_config.php"); }
if (!defined("NMYSQCC_DATA")) { define("NMYSQCC_DATA", NMYSQCC_SYSPLUGINS_DIR . "ntrnx_mysqli_data.php"); }

/* put needed files in array */
$ntrnx_mysqli_array_files = array(

	NMYSQCC_CONFIG_FILE,
    NMYSQCC_DB_CONFIG_FILE,
	NMYSQCC_DATA

);

/* check if files exist and load them */
foreach ($ntrnx_mysqli_array_files as &$ntrnx_mysqli_var_file) {

    if (!file_exists($ntrnx_mysqli_var_file)) {

        die(str_replace("%s", $ntrnx_mysqli_var_file, NMYSQCC_ERROR_FILE_DOES_NOT_EXISTS)); } else { require_once( $ntrnx_mysqli_var_file );

    }

}

/* setup config const from config vars */
if (!defined("NMYSQCC_ALLOW_UPDATE_CHECK")) { define("NMYSQCC_ALLOW_UPDATE_CHECK", \NTRNX_MYSQLI\ntrnx_mysqli_config::$allow_update_check); }
if (!defined("NMYSQCC_ALLOW_DEPENDENCES_CHECK")) { define("NMYSQCC_ALLOW_DEPENDENCES_CHECK", \NTRNX_MYSQLI\ntrnx_mysqli_config::$allow_dependences_check); }
if (!defined("NMYSQCC_ALLOW_FUNCTIONS_CHECK")) { define("NMYSQCC_ALLOW_FUNCTIONS_CHECK", \NTRNX_MYSQLI\ntrnx_mysqli_config::$allow_functions_check); }

if (!defined("NMYSQCC_DATETIME_FORMAT")) { define("NMYSQCC_DATETIME_FORMAT", \NTRNX_MYSQLI\ntrnx_mysqli_config::$datetime_format); }
if (!defined("NMYSQCC_DATETIME_SUFFIX")) { define("NMYSQCC_DATETIME_SUFFIX", \NTRNX_MYSQLI\ntrnx_mysqli_config::$datetime_suffix); }
if (!defined("NMYSQCC_DATETIME_PRAEFIX")) { define("NMYSQCC_DATETIME_PRAEFIX", \NTRNX_MYSQLI\ntrnx_mysqli_config::$datetime_praefix); }
if (!defined("NMYSQCC_LOG_SEPARATOR")) { define("NMYSQCC_LOG_SEPARATOR", \NTRNX_MYSQLI\ntrnx_mysqli_config::$log_separator); }

if (!defined("NMYSQCC_LOG_LEVEL")) { define("NMYSQCC_LOG_LEVEL", \NTRNX_MYSQLI\ntrnx_mysqli_config::$log_level); }
if (!defined("NMYSQCC_DISPLAY_LEVEL")) { define("NMYSQCC_DISPLAY_LEVEL", \NTRNX_MYSQLI\ntrnx_mysqli_config::$display_level); }

/* begin of class ntrnx_mysqli */
class ntrnx_mysqli extends \NTRNX_MYSQLI\ntrnx_mysqli_data {

    /* var for last query statemanet */
    static $last_query = NULL;

    /* var for persistent_connection status */
    static $persistent_connection = FALSE;

    /* var for state of connection */
    static $connected = FALSE;

    /* setup connection vars */
    static $host = \NTRNX_MYSQLI\ntrnx_mysqli_db_config::DB_HOST;
    static $username = \NTRNX_MYSQLI\ntrnx_mysqli_db_config::DB_USER;
    static $passwd = \NTRNX_MYSQLI\ntrnx_mysqli_db_config::DB_PASS;
	static $dbname = \NTRNX_MYSQLI\ntrnx_mysqli_db_config::DB_NAME;
    static $port = \NTRNX_MYSQLI\ntrnx_mysqli_db_config::DB_PORT;
    static $socket = \NTRNX_MYSQLI\ntrnx_mysqli_db_config::DB_SOCKET;
    static $flags = \NTRNX_MYSQLI\ntrnx_mysqli_db_config::DB_FLAGS;

    /* setup security vars */
    static $key = \NTRNX_MYSQLI\ntrnx_mysqli_db_config::DB_KEY;
    static $cert = \NTRNX_MYSQLI\ntrnx_mysqli_db_config::DB_CERT;
    static $ca = \NTRNX_MYSQLI\ntrnx_mysqli_db_config::DB_CA;
    static $capath = \NTRNX_MYSQLI\ntrnx_mysqli_db_config::DB_CAPATH;
    static $cipher = \NTRNX_MYSQLI\ntrnx_mysqli_db_config::DB_CIPHER;

	/* begin of class constructor */
	function __construct (){       
	} /* end of class constructor */

	/* class destructor */
	function __destruct() {
	} /* end of class destructor */

} /* end of class ntrnx_mysqli */

?>