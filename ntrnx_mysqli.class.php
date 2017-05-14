<?php

/*
* class ntrnx_mysqli_core
*
* short:
*
* - core funtions for class ntrnx_mysqli
*
* generated by : PHP Class Generator (2.0.9.2) [2016/12/09]
*
*/

namespace NTRNX_MYSQLI;

/* define shorthand directory separator constant */
if (!defined("NMYSQCC_DS")) {			define("NMYSQCC_DS",       DIRECTORY_SEPARATOR); }
if (!defined("NMYSQCC_PS")) {			define("NMYSQCC_PS",       PATH_SEPARATOR); }
if (!defined("NMYSQCC_BR")) {			define("NMYSQCC_BR",       "<br />"); }    /* HTML break row */
if (!defined("NMYSQCC_LF")) {			define("NMYSQCC_LF",       "\n"); }        /* PHP break row */

/* NMCC = nitrinax mysqli class const */
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

/* set error messages */
if (!defined("NMYSQCC_ERROR_DIRECTORY_DOES_NOT_EXISTS")) { define("NMYSQCC_ERROR_DIRECTORY_DOES_NOT_EXISTS", "Directory \"%s\" does not exist."); }
if (!defined("NMYSQCC_ERROR_FILE_DOES_NOT_EXISTS")) { define("NMYSQCC_ERROR_FILE_DOES_NOT_EXISTS", "File \"%s\" does not exist."); }

/* mysqli class errors */
if (!defined("NMYSQCC_ERROR_MYSQLI_INIT_FAILED")) { define("NMYSQCC_ERROR_MYSQLI_INIT_FAILED", "Mysqli_init failed."); }
if (!defined("NMYSQCC_ERROR_DB_HANDLE_NOT_INITIALIZED")) { define("NMYSQCC_ERROR_DB_HANDLE_NOT_INITIALIZED", "DB handle not initialized."); }
if (!defined("NMYSQCC_ERROR_NOT_CONNECTED")) { define("NMYSQCC_ERROR_NOT_CONNECTED", "Connection Error: Not connected."); }
if (!defined("NMYSQCC_ERROR_NUMBER_OF_COLUMNS_AND_NUMBER_OF_VALUES_DO_NOT_MATCH")) { define("NMYSQCC_ERROR_NUMBER_OF_COLUMNS_AND_NUMBER_OF_VALUES_DO_NOT_MATCH", "Number of columns and number of values ​​do not match."); }
if (!defined("NMYSQCC_ERROR_ON_LOADING_CHARACTER_SET")) { define("NMYSQCC_ERROR_ON_LOADING_CHARACTER_SET", "Error loading character set : \"%s\"."); }

if (!defined("NMYSQCC_ERROR_ON_SETTINGS_VALUE_FOR_OPTION")) { define("NMYSQCC_ERROR_ON_SETTINGS_VALUE_FOR_OPTION", "Error on setting value \"{VALUE}\" for option \"{OPTION}\"."); }
if (!defined("NMYSQCC_ERROR_VALUE_MUST_BE_INTEGER")) { define("NMYSQCC_ERROR_VALUE_MUST_BE_INTEGER", "Value must be integer."); }
if (!defined("NMYSQCC_ERROR_VALUE_MUST_BE_BOOLEAN")) { define("NMYSQCC_ERROR_VALUE_MUST_BE_BOOLEAN", "Value must be boolean."); }
if (!defined("NMYSQCC_ERROR_VALUE_MUST_BE_STRING")) { define("NMYSQCC_ERROR_VALUE_MUST_BE_STRING", "Value must be string."); }

if (!defined("NMYSQCC_ERROR_ON_SETTINGS_PATH_TO_FILE")) { define("NMYSQCC_ERROR_ON_SETTINGS_PATH_TO_FILE", "Error on setting path to file \"{FILE}\"."); }
if (!defined("NMYSQCC_ERROR_ON_SETTINGS_PATH_TO_DIR")) { define("NMYSQCC_ERROR_ON_SETTINGS_PATH_TO_DIR", "Error on setting path to dir \"{DIR}\" that contains \"{FILE}\"."); }

/* mysqli class messages */
if (!defined("NMYSQCC_MSG_CURRENT_CHARACTER_SET")) { define("NMYSQCC_MSG_CURRENT_CHARACTER_SET", "Client character set was changed to : \"%s\"."); }

/* set DIR to absolute path to library files */
if (!defined("NMYSQCC_DIR")) { define("NMYSQCC_DIR", dirname(__FILE__) . NMYSQCC_DS); }

/* define dir for sysplugins */
if (!defined("NMYSQCC_SYSPLUGINS_DIR")) { define("NMYSQCC_SYSPLUGINS_DIR", NMYSQCC_DIR . "sysplugins" . NMYSQCC_DS); }

/* define dir for class config */
if (!defined("NMYSQCC_CONFIG_DIR")) { define("NMYSQCC_CONFIG_DIR", NMYSQCC_DIR . "configs" . NMYSQCC_DS); }

/* define dir for class config */
if (!defined("NMYSQCC_LOG_DIR")) { define("NMYSQCC_LOG_DIR", NMYSQCC_DIR . "logs" . NMYSQCC_DS); }

/* check and load config and subclasses */
if (!defined("NMYSQCC_CONFIG_FILE")) { define("NMYSQCC_CONFIG_FILE", NMYSQCC_CONFIG_DIR . "ntrnx_mysqli_config.php"); }
if (!defined("NMYSQCC_DB_CONFIG_FILE")) { define("NMYSQCC_DB_CONFIG_FILE", NMYSQCC_CONFIG_DIR . "ntrnx_mysqli_db_config.php"); }
if (!defined("NMYSQCC_DATA")) { define("NMYSQCC_DATA", NMYSQCC_SYSPLUGINS_DIR . "ntrnx_mysqli_data.php"); }
if (!defined("NMYSQCC_CORE")) { define("NMYSQCC_CORE", NMYSQCC_SYSPLUGINS_DIR . "ntrnx_mysqli_core.php"); }

/* put needed directories in array */
$ntrnx_mysqli_array_dir = array(
	NMYSQCC_SYSPLUGINS_DIR,
	NMYSQCC_CONFIG_DIR,
    NMYSQCC_LOG_DIR
);

/* check if directories exist */
foreach ($ntrnx_mysqli_array_dir as &$ntrnx_mysqli_var_dir) {
	//print "dirname : " . $ntrnx_mysqli_var_dir . "<br />";
	if (!is_dir($ntrnx_mysqli_var_dir)) { die(str_replace("%s", $ntrnx_mysqli_var_dir, NMYSQCC_ERROR_DIRECTORY_DOES_NOT_EXISTS)); }
}

/* put needed files in array */
$ntrnx_mysqli_array_files = array(
	NMYSQCC_CONFIG_FILE,
    NMYSQCC_DB_CONFIG_FILE,
	NMYSQCC_DATA,
	NMYSQCC_CORE
);

/* check if files exist and load them */
foreach ($ntrnx_mysqli_array_files as &$ntrnx_mysqli_var_file) {
	//print "filename : " . $ntrnx_mysqli_var_file . "<br />";
	if (!file_exists($ntrnx_mysqli_var_file)) { die(str_replace("%s", $ntrnx_mysqli_var_file, NMYSQCC_ERROR_FILE_DOES_NOT_EXISTS)); } else { require_once( $ntrnx_mysqli_var_file ); }
}

/* setup config const from config vars */
if (!defined("NMYSQCC_UPDATE_CHECK")) { define("NMYSQCC_UPDATE_CHECK", \NTRNX_MYSQLI\ntrnx_mysqli_config::$allow_update_check); }
if (!defined("NMYSQCC_DEPENDENCES_CHECK")) { define("NMYSQCC_DEPENDENCES_CHECK", \NTRNX_MYSQLI\ntrnx_mysqli_config::$allow_dependences_check); }
if (!defined("NMYSQCC_FUNCTIONS_CHECK")) { define("NMYSQCC_FUNCTIONS_CHECK", \NTRNX_MYSQLI\ntrnx_mysqli_config::$allow_functions_check); }
if (!defined("NMYSQCC_QUOTE_AS_STRING")) { define("NMYSQCC_QUOTE_AS_STRING", \NTRNX_MYSQLI\ntrnx_mysqli_config::$quote_as_string); }
if (!defined("NMYSQCC_DEBUG")) { define("NMYSQCC_DEBUG", \NTRNX_MYSQLI\ntrnx_mysqli_config::$debug); }
if (!defined("NMYSQCC_DATETIME_FORMAT")) { define("NMYSQCC_DATETIME_FORMAT", \NTRNX_MYSQLI\ntrnx_mysqli_config::$datetime_format); }
if (!defined("NMYSQCC_LOG_ERRORS")) { define("NMYSQCC_LOG_ERRORS", \NTRNX_MYSQLI\ntrnx_mysqli_config::$log_errors); }
if (!defined("NMYSQCC_LOG_WARNINGS")) { define("NMYSQCC_LOG_WARNINGS", \NTRNX_MYSQLI\ntrnx_mysqli_config::$log_warnings); }
if (!defined("NMYSQCC_DISPLAY_ERRORS")) { define("NMYSQCC_DISPLAY_ERRORS", \NTRNX_MYSQLI\ntrnx_mysqli_config::$display_errors); }
if (!defined("NMYSQCC_DISPLAY_WARNINGS")) { define("NMYSQCC_DISPLAY_WARNINGS", \NTRNX_MYSQLI\ntrnx_mysqli_config::$display_warnings); }

/* begin of class ntrnx_mysqli */
class ntrnx_mysqli extends \NTRNX_MYSQLI\ntrnx_mysqli_core {

    /* var for last query statemanet */
    static $last_query = NULL;

    /* var for persistent_connection status */
    static $persistent_connection = FALSE;

    /* var for state of connection */
    static $connected = FALSE;

    static $host = \NTRNX_MYSQLI\ntrnx_mysqli_db_config::DB_HOST;
    static $username = \NTRNX_MYSQLI\ntrnx_mysqli_db_config::DB_USER;
    static $passwd = \NTRNX_MYSQLI\ntrnx_mysqli_db_config::DB_PASS;
	static $dbname = \NTRNX_MYSQLI\ntrnx_mysqli_db_config::DB_NAME;
    static $port = \NTRNX_MYSQLI\ntrnx_mysqli_db_config::DB_PORT;
    static $socket = \NTRNX_MYSQLI\ntrnx_mysqli_db_config::DB_SOCKET;
    static $flags = \NTRNX_MYSQLI\ntrnx_mysqli_db_config::DB_FLAGS;

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

    /* class functions */
    public static function get_name() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_name::get(); }

    public static function get_api() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_api::get(); }
    public static function get_author_name() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_author::get_name(); }
    public static function get_author_nick() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_author::get_nick(); }
    public static function get_author_email() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_author::get_email(); }
    public static function get_author_url() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_author::get_url(); }
    public static function get_branch() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_build::get_branch(); }
    public static function get_buildchannel() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_build::get_build_channel(); }

    public static function get_dependences_state() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_dependences::state(); }
    public static function get_dependences() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_dependences::get(); }
    public static function check_dependences() { return \NTRNX_MYSQLI\ntrnx_mysqli::check_dependences(); }

    public static function get_needed_functions_state() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_needed_functions::state(); }
    public static function get_needed_functions() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_needed_functions::get(); }
    public static function check_needed_functions() { return \NTRNX_MYSQLI\ntrnx_mysqli::check_needed_functions(); }

    public static function get_project_url(){ return \NTRNX_MYSQLI\ntrnx_mysqli_internal_url::get_project_url(); }
    public static function get_source_url(){ return \NTRNX_MYSQLI\ntrnx_mysqli_internal_url::get_source_url(); }
    public static function get_version_url(){ return \NTRNX_MYSQLI\ntrnx_mysqli_internal_url::get_version_url(); }
    public static function get_update_url(){ return \NTRNX_MYSQLI\ntrnx_mysqli_internal_url::get_update_url(); }
    public static function get_manual_url(){ return \NTRNX_MYSQLI\ntrnx_mysqli_internal_url::get_manual_url(); }

    public static function get_version() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_version::get(); }
    public static function get_version_major() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_version::get_major(); }
    public static function get_version_minor() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_version::get_minor(); }
    public static function get_version_build() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_version::get_build(); }
    public static function get_version_revision() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_version::get_revision(); }
    public static function get_version_date() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_version::get_date(); }
    public static function get_version_time() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_version::get_time(); }

    public static function log_error($error) { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_log::error($error); }
    public static function log_warning($warning) { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_log::warning($warning); }

    /* mysqli functions */
    //public static function affected_fields() {}
    //public static function affected_rows() {}
    //public static function autocommit() {}
    //public static function begin_transaction() {}
    //public static function change_user() {}
    //public static function character_set_name() {}
    public static function close($mysqli_handle) { return \NTRNX_MYSQLI\ntrnx_mysqli_close::link($mysqli_handle); }
    //public static function commit() {}
    public static function connect() { return \NTRNX_MYSQLI\ntrnx_mysqli_connect::db(); }
    //public static function connect_errno() {}
    //public static function connect_error() {}
    //public static function data_seek() {}
    //public static function debug() {}
    public static function delete(
        
        $mysqli_handle,
        $table_reference,
        $where_condition,
        $order_condition = NULL,
        $limit = NULL,
        $resultmode = NULL

    ) { 
        return \NTRNX_MYSQLI\ntrnx_mysqli_delete::query(
            
            $mysqli_handle,
            $table_reference,
            $where_condition,
            $order_condition,
            $limit,
            $resultmode
        );
    }

    //public static function dump_debug_info() {}
    //public static function errno() {}
    //public static function error() {}
    //public static function error_list() {}
    //public static function fetch_all() {}
    //public static function fetch_array() {}
    //public static function fetch_assoc() {}
    //public static function fetch_field() {}
    //public static function fetch_fields() {}
    //public static function fetch_field_direct() {}
    //public static function fetch_lengths() {}
    //public static function fetch_object() {}
    //public static function fetch_row() {}
    //public static function fields() {}
    //public static function field_count() {}
    //public static function field_seek() {}
    //public static function field_tell() {}
    public static function free_result() {}
    //public static function get_charset() {}
    //public static function get_client_info() {}
    //public static function get_client_stats() {}
    //public static function get_client_version() {}
    //public static function get_connection_stats() {}
    //public static function get_host_info() {}
    //public static function get_proto_info() {}
    //public static function get_server_info() {}
    //public static function get_server_version() {}
    //public static function get_warnings() {}
    //public static function info() {}
    public static function init($mysqli_handle) { return \NTRNX_MYSQLI\ntrnx_mysqli_init::resource($mysqli_handle); }
    public static function insert(

        $mysqli_handle,
        $table_reference,
        $col_name,
        $values,
        $flags = NULL,
        $resultmode = NULL

    ) {

        return \NTRNX_MYSQLI\ntrnx_mysqli_insert::query(

            $mysqli_handle,
            $table_reference,
            $col_name,
            $values,
            $flags,
            $resultmode

        );

    }
    //public static function insert_id() {}
    //public static function kill() {}
    //public static function last_query() {}
    //public static function more_results() {}
    //public static function multi_query() {}
    //public static function next_result() {}
    //public static function num_fields() {}
    //public static function num_rows() {}
    //public static function options() {}
    public static function pconnect() { return \NTRNX_MYSQLI\ntrnx_mysqli_pconnect::db(); }
    //public static function ping() {}
    //public static function poll() {}
    //public static function prepare() {}
    //public static function query() {}
    public static function real_connect($mysqli_handle) { return \NTRNX_MYSQLI\ntrnx_mysqli_real_connect::db($mysqli_handle); }
    
    public static function real_escape_string($mysqli_handle, $string) { return \NTRNX_MYSQLI\ntrnx_mysqli_real_escape_string::link($mysqli_handle, $string); }

    public static function real_pconnect($mysqli_handle) { return \NTRNX_MYSQLI\ntrnx_mysqli_real_pconnect::db($mysqli_handle); }
    //public static function real_query() {}
    //public static function reap_async_query() {}
    //public static function refresh() {}
    //public static function release_savepoint() {}
    //public static function rollback() {}
    //public static function savepoint() {}
    public static function select(

        $mysqli_handle,
        $select_expression,
        $table_reference,
        $join_expression = NULL,
        $where_condition = NULL,
        $group_condition = NULL,
        $having_condition = NULL,
        $order_condition = NULL,
        $limit = NULL,
        $procedure = NULL,
        $into_target = NULL,
        $for_options = NULL,
        $resultmode = NULL
        
    ) {
        return \NTRNX_MYSQLI\ntrnx_mysqli_select::query(

            $mysqli_handle,
            $select_expression,
            $table_reference,
            $join_expression,
            $where_condition,
            $group_condition,
            $having_condition,
            $order_condition,
            $limit,
            $procedure,
            $into_target,
            $for_options,
            $resultmode
        );

    }

    //public static function select_db() {}
    //public static function set_charset() {}
    //public static function set_local_infile_default() {}
    //public static function set_local_infile_handler() {}
    //public static function sqlstate() {}
    public static function ssl_get($mysqli_handle) { return \NTRNX_MYSQLI\ntrnx_mysqli_ssl_get::link($mysqli_handle); }
    public static function ssl_set($mysqli_handle) { return \NTRNX_MYSQLI\ntrnx_mysqli_ssl_set::link($mysqli_handle); }
    //public static function stat() {}
    //public static function store_result() {}
    //public static function tables() {}
    //public static function thread_id() {}
    //public static function thread_safe() {}
    public static function update(

        $mysqli_handle,
        $table_reference,
        $set_expression,
        $where_condition,
        $order_condition = NULL,
        $limit = NULL,
        $resultmode = NULL

    ) {
        return \NTRNX_MYSQLI\ntrnx_mysqli_update::query(

            $mysqli_handle,
            $table_reference,
            $set_expression,
            $where_condition,
            $order_condition,
            $limit,
            $resultmode

        );
    }
    //public static function use_result() {}
    //public static function warning_count() {}

} /* end of class ntrnx_mysqli */

/* #### sub libs #### */

/* put needed files in array */
$ntrnx_mysqli_sublib_array_files = array(

    // mysqli functions
    "ntrnx_mysqli_function_affected_fields",
    "ntrnx_mysqli_function_affected_rows",
    "ntrnx_mysqli_function_autocommit",
    "ntrnx_mysqli_function_begin_transaction",
    "ntrnx_mysqli_function_change_user",
    "ntrnx_mysqli_function_character_set_name",
    "ntrnx_mysqli_function_close",
    "ntrnx_mysqli_function_commit",
    "ntrnx_mysqli_function_connect",
    "ntrnx_mysqli_function_connect_errno",
    "ntrnx_mysqli_function_connect_error",
    "ntrnx_mysqli_function_data_seek",
    "ntrnx_mysqli_function_debug",
    "ntrnx_mysqli_function_delete",
    "ntrnx_mysqli_function_dump_debug_info",
    "ntrnx_mysqli_function_errno",
    "ntrnx_mysqli_function_error",
    "ntrnx_mysqli_function_error_list",
    "ntrnx_mysqli_function_fetch_all",
    "ntrnx_mysqli_function_fetch_array",
    "ntrnx_mysqli_function_fetch_assoc",
    "ntrnx_mysqli_function_fetch_field",
    "ntrnx_mysqli_function_fetch_fields",
    "ntrnx_mysqli_function_fetch_field_direct",
    "ntrnx_mysqli_function_fetch_lengths",
    "ntrnx_mysqli_function_fetch_object",
    "ntrnx_mysqli_function_fetch_row",
    "ntrnx_mysqli_function_fields",
    "ntrnx_mysqli_function_field_count",
    "ntrnx_mysqli_function_field_seek",
    "ntrnx_mysqli_function_field_tell",
    "ntrnx_mysqli_function_free_result",
    "ntrnx_mysqli_function_get_charset",
    "ntrnx_mysqli_function_get_client_info",
    "ntrnx_mysqli_function_get_client_stats",
    "ntrnx_mysqli_function_get_client_version",
    "ntrnx_mysqli_function_get_connection_stats",
    "ntrnx_mysqli_function_get_host_info",
    "ntrnx_mysqli_function_get_proto_info",
    "ntrnx_mysqli_function_get_server_info",
    "ntrnx_mysqli_function_get_server_version",
    "ntrnx_mysqli_function_get_warnings",
    "ntrnx_mysqli_function_info",
    "ntrnx_mysqli_function_init",
    "ntrnx_mysqli_function_insert",
    "ntrnx_mysqli_function_insert_id",
    "ntrnx_mysqli_function_kill",
    "ntrnx_mysqli_function_last_query",
    "ntrnx_mysqli_function_more_results",
    "ntrnx_mysqli_function_multi_query",
    "ntrnx_mysqli_function_next_result",
    "ntrnx_mysqli_function_num_fields",
    "ntrnx_mysqli_function_num_rows",
    "ntrnx_mysqli_function_options",
    "ntrnx_mysqli_function_pconnect",
    "ntrnx_mysqli_function_ping",
    "ntrnx_mysqli_function_poll",
    "ntrnx_mysqli_function_prepare",
    "ntrnx_mysqli_function_query",
    "ntrnx_mysqli_function_real_connect",
    "ntrnx_mysqli_function_real_escape_string",
    "ntrnx_mysqli_function_real_pconnect",
    "ntrnx_mysqli_function_real_query",
    "ntrnx_mysqli_function_reap_async_query",
    "ntrnx_mysqli_function_refresh",
    "ntrnx_mysqli_function_release_savepoint",
    "ntrnx_mysqli_function_rollback",
    "ntrnx_mysqli_function_savepoint",
    "ntrnx_mysqli_function_select",
    "ntrnx_mysqli_function_select_db",
    "ntrnx_mysqli_function_set_charset",
    "ntrnx_mysqli_function_set_local_infile_default",
    "ntrnx_mysqli_function_set_local_infile_handler",
    "ntrnx_mysqli_function_sqlstate",
    "ntrnx_mysqli_function_ssl_get",
    "ntrnx_mysqli_function_ssl_set",
    "ntrnx_mysqli_function_stat",
    "ntrnx_mysqli_function_store_result",
    "ntrnx_mysqli_function_tables",
    "ntrnx_mysqli_function_thread_id",
    "ntrnx_mysqli_function_thread_safe",
    "ntrnx_mysqli_function_update",
    "ntrnx_mysqli_function_use_result",
    "ntrnx_mysqli_function_warning_count",

    // internal functions
    "ntrnx_mysqli_internal_api",
    "ntrnx_mysqli_internal_author",
    "ntrnx_mysqli_internal_build",
    "ntrnx_mysqli_internal_dependences",
    "ntrnx_mysqli_internal_log",
    "ntrnx_mysqli_internal_name",
    "ntrnx_mysqli_internal_needed_functions",
    "ntrnx_mysqli_internal_update",
    "ntrnx_mysqli_internal_url",
    "ntrnx_mysqli_internal_version"

);

/* check if files exist and load them */
foreach ($ntrnx_mysqli_sublib_array_files as &$ntrnx_mysqli_sublib_var_file) {

    $sublib = NMYSQCC_SYSPLUGINS_DIR .  $ntrnx_mysqli_sublib_var_file . ".php";

    if (!file_exists($sublib)) { die(str_replace("%s", $sublib, NMYSQCC_ERROR_FILE_DOES_NOT_EXISTS)); } else { require_once( $sublib ); }

}


?>