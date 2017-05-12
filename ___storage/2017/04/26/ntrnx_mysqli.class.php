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
if (!defined("NMYSQCC_ERROR_DIRECTORY_DOES_NOT_EXISTS")) { define("NMYSQCC_ERROR_DIRECTORY_DOES_NOT_EXISTS", "Directory \"%d\" does not exist."); }
if (!defined("NMYSQCC_ERROR_FILE_DOES_NOT_EXISTS")) { define("NMYSQCC_ERROR_FILE_DOES_NOT_EXISTS", "File \"%s\" does not exist."); }

/* mysqli class errors */
if (!defined("NMYSQCC_ERROR_MYSQLI_INIT_FAILED")) { define("NMYSQCC_ERROR_MYSQLI_INIT_FAILED", "Mysqli_init failed."); }
if (!defined("NMYSQCC_ERROR_DB_HANDLE_NOT_INITIALIZED")) { define("NMYSQCC_ERROR_DB_HANDLE_NOT_INITIALIZED", "DB handle not initialized."); }
if (!defined("NMYSQCC_ERROR_FIELD_NUMBER_AND_NUMBER_OF_VALUES_​​DO_NOT_MATCH")) { define("NMYSQCC_ERROR_FIELD_NUMBER_AND_NUMBER_OF_VALUES_​​DO_NOT_MATCH", "Field number and number of values ​​do not match."); }
if (!defined("NMYSQCC_ERROR_ON_LOADING_CHARACTER_SET")) { define("NMYSQCC_ERROR_ON_LOADING_CHARACTER_SET", "Error loading character set : \"%s\"."); }

if (!defined("NMYSQCC_ERROR_ON_SETTINGS_VALUE_FOR_OPTION")) { define("NMYSQCC_ERROR_ON_SETTINGS_VALUE_FOR_OPTION", "Error on setting value \"{VALUE}\" for option \"{OPTION}\"."); }
if (!defined("NMYSQCC_ERROR_VALUE_MUST_BE_INTEGER")) { define("NMYSQCC_ERROR_VALUE_MUST_BE_INTEGER", "Value must be integer."); }
if (!defined("NMYSQCC_ERROR_VALUE_MUST_BE_BOOLEAN")) { define("NMYSQCC_ERROR_VALUE_MUST_BE_BOOLEAN", "Value must be boolean."); }
if (!defined("NMYSQCC_ERROR_VALUE_MUST_BE_STRING")) { define("NMYSQCC_ERROR_VALUE_MUST_BE_STRING", "Value must be string."); }

if (!defined("NMYSQCC_ERROR_ON_SETTINGS_PATH_TO_FILE")) { define("NMYSQCC_ERROR_ON_SETTINGS_PATH_TO_FILE", "Error on setting path to \"{FILE}\"."); }
if (!defined("NMYSQCC_ERROR_ON_SETTINGS_PATH_TO_DIR")) { define("NMYSQCC_ERROR_ON_SETTINGS_PATH_TO_DIR", "Error on setting path to dir \"{DIR}\" that contain \"{FILE}\"."); }

/* mysqli class messages */
if (!defined("NMYSQCC_MSG_CURRENT_CHARACTER_SET")) { define("NMYSQCC_MSG_CURRENT_CHARACTER_SET", "Client character set is changed to : \"%s\"."); }

/* set DIR to absolute path to library files */
if (!defined("NMYSQCC_DIR")) { define("NMYSQCC_DIR", dirname(__FILE__) . NMYSQCC_DS); }

/* define dir for sysplugins */
if (!defined("NMYSQCC_SYSPLUGINS_DIR")) { define("NMYSQCC_SYSPLUGINS_DIR", NMYSQCC_DIR . "sysplugins" . NMYSQCC_DS); }

/* define dir for class config */
if (!defined("NMYSQCC_CONFIG_DIR")) { define("NMYSQCC_CONFIG_DIR", NMYSQCC_DIR . "configs" . NMYSQCC_DS); }

/* check and load config and subclasses */
if (!defined("NMYSQCC_CONFIG_FILE")) { define("NMYSQCC_CONFIG_FILE", NMYSQCC_CONFIG_DIR . "ntrnx_mysqli_config.php"); }
if (!defined("NMYSQCC_DB_CONFIG_FILE")) { define("NMYSQCC_DB_CONFIG_FILE", NMYSQCC_CONFIG_DIR . "ntrnx_mysqli_db_config.php"); }
if (!defined("NMYSQCC_DATA")) { define("NMYSQCC_DATA", NMYSQCC_SYSPLUGINS_DIR . "ntrnx_mysqli_data.php"); }
if (!defined("NMYSQCC_CORE")) { define("NMYSQCC_CORE", NMYSQCC_SYSPLUGINS_DIR . "ntrnx_mysqli_core.php"); }

/* put needed directories in array */
$ntrnx_mysqli_array_dir = array(
	NMYSQCC_SYSPLUGINS_DIR,
	NMYSQCC_CONFIG_DIR
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
if ($ntrnx_mysqli_update_check == FALSE) { define("NMYSQCC_UPDATE_CHECK", FALSE); } else { define("NMYSQCC_UPDATE_CHECK", TRUE); }
if ($ntrnx_mysqli_debug == FALSE) { define("NMYSQCC_DEBUG", FALSE); } else { define("NMYSQCC_DEBUG", TRUE); }
if ($ntrnx_quote_as_string == FALSE) { define("NMYSQCC_QUOTE_AS_STRING", FALSE); } else { define("NMYSQCC_QUOTE_AS_STRING", TRUE); }

/* begin of class ntrnx_mysqli */
class ntrnx_mysqli extends \NTRNX_MYSQLI\ntrnx_mysqli_core {

    /* var for last query statemanet */
    static $last_query = NULL;

    /* var for persistent_connection status */
    static $persistent_connection = FALSE;

    /* var for state of connection */
    static $connected = FALSE;

	/* begin of class constructor */
	function __construct (){
	} /* end of class constructor */

	/* class destructor */
	function __destruct() {
	} /* end of class destructor */

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
    "ntrnx_mysqli_internal_function_exists",
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