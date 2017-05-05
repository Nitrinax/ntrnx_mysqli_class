<?php

namespace NTRNX_MYSQLI;

/* display statement debug */
const NMCC_DEBUG = FALSE;

/* define shorthand directory separator constant */
if (!defined("NMCC_DS")) {          define("NMCC_DS",       DIRECTORY_SEPARATOR); }
if (!defined("NMCC_PS")) {          define("NMCC_PS",       PATH_SEPARATOR); }

/* NMCC = nitrinax mysqli class const */
if (!defined("NMCC_DOT")) {         define("NMCC_DOT",      "."); }         /* SQL REFERENCE/CONDITION SEPARATOR */
if (!defined("NMCC_COMMA")) {       define("NMCC_COMMA",    ","); }         /* SQL MULTIPLY FIELD SEPARATOR */
if (!defined("NMCC_IQ")) {          define("NMCC_IQ",       "`"); }         /* SQL INSTRUCTION QUOTE */
if (!defined("NMCC_VQ")) {          define("NMCC_VQ",       "'"); }         /* SQL VALUE QUOTE */
if (!defined("NMCC_PARENTHESIS_OPEN")) {    define("NMCC_PARENTHESIS_OPEN",     "("); }
if (!defined("NMCC_PARENTHESIS_CLOSE")) {   define("NMCC_PARENTHESIS_CLOSE",    ")"); }
if (!defined("NMCC_PERCENT")) {     define("NMCC_PERCENT",  "%"); }
if (!defined("NMCC_BLANK")) {       define("NMCC_BLANK",    " "); }
if (!defined("NMCC_BR")) {          define("NMCC_BR",       "<br />"); }    /* HTML break row */

/* commands */
if (!defined("NMCC_SELECT")) {      define("NMCC_SELECT",   "SELECT "); }
if (!defined("NMCC_INSERT")) {      define("NMCC_INSERT",   "INSERT INTO "); }
if (!defined("NMCC_UPDATE")) {      define("NMCC_UPDATE",   "UPDATE "); }
if (!defined("NMCC_DELETE")) {      define("NMCC_DELETE",   "DELETE "); }

/* conditions */
if (!defined("NMCC_FROM")) {        define("NMCC_FROM",     " FROM "); }
if (!defined("NMCC_WHERE")) {       define("NMCC_WHERE",    " WHERE "); }
if (!defined("NMCC_ORDER")) {       define("NMCC_ORDER",    " ORDER BY "); }
if (!defined("NMCC_GROUP")) {       define("NMCC_GROUP",    " GROUP BY "); }

/* logical operators */
if (!defined("NMCC_EQUAL")) {       define("NMCC_EQUAL",    "="); }         /* Equal */
if (!defined("NMCC_UNEQUAL")) {     define("NMCC_UNEQUAL",  "!="); }        /* Not equal */
if (!defined("NMCC_NOTEQUAL")) {    define("NMCC_NOTEQUAL", "<>"); }        /* Not equal */
if (!defined("NMCC_NSEQUAL")) {     define("NMCC_NSEQUAL",  "<=>"); }       /* NULL-safe equal */
if (!defined("NMCC_GT"))            define("NMCC_GT",       ">");           /* Greater than */
if (!defined("NMCC_GTOE")) {        define("NMCC_GTOE",     ">="); }        /* Greater than or equal */
if (!defined("NMCC_LT")) {          define("NMCC_LT",       "<"); }         /* Less than */
if (!defined("NMCC_LTOE")) {        define("NMCC_LTOE",     "<="); }        /* Less than or equal */
if (!defined("NMCC_AND")) {         define("NMCC_AND",      "AND"); }
if (!defined("NMCC_OR")) {          define("NMCC_OR",       "OR"); }
if (!defined("NMCC_XOR")) {         define("NMCC_XOR",      "XOR"); }
if (!defined("NMCC_LIKE")) {        define("NMCC_LIKE",     "LIKE"); }
if (!defined("NMCC_NLIKE")) {       define("NMCC_NLIKE",    "NOT LIKE"); }
if (!defined("NMCC_NOT")) {         define("NMCC_NOT",      "NOT"); }

/* value conditions */
if (!defined("NMCC_AS")) {          define("NMCC_AS",       "AS"); }
if (!defined("NMCC_LIMIT")) {       define("NMCC_LIMIT",    "LIMIT"); }
if (!defined("NMCC_VALUES")) {      define("NMCC_VALUES",   "VALUES"); }
if (!defined("NMCC_ON")) {          define("NMCC_ON",       "ON"); }
if (!defined("NMCC_USING")) {       define("NMCC_USING",    "USING"); }

/* join types */
if (!defined("NMCC_I_JOIN")) {      define("NMCC_I_JOIN",   " INNER JOIN "); }
if (!defined("NMCC_C_JOIN")) {      define("NMCC_C_JOIN",   " CROSS JOIN "); }
if (!defined("NMCC_S_JOIN")) {      define("NMCC_S_JOIN",   " STRAIGHT_JOIN "); }
if (!defined("NMCC_L_JOIN")) {      define("NMCC_L_JOIN",   " LEFT JOIN "); }
if (!defined("NMCC_R_JOIN")) {      define("NMCC_R_JOIN",   " RIGHT JOIN "); }
if (!defined("NMCC_LO_JOIN")) {     define("NMCC_LO_JOIN",  " LEFT OUTER JOIN "); }
if (!defined("NMCC_RO_JOIN")) {     define("NMCC_RO_JOIN",  " RIGHT OUTER JOIN "); }
if (!defined("NMCC_FO_JOIN")) {     define("NMCC_FO_JOIN",  " FULL OUTER JOIN "); }
if (!defined("NMCC_N_JOIN")) {      define("NMCC_N_JOIN",   " NATURAL JOIN "); }
if (!defined("NMCC_NL_JOIN")) {     define("NMCC_NL_JOIN",  " NATURAL LEFT JOIN "); }
if (!defined("NMCC_NR_JOIN")) {     define("NMCC_NR_JOIN",  " NATURAL RIGHT JOIN "); }
if (!defined("NMCC_NLO_JOIN")) {    define("NMCC_NLO_JOIN", " NATURAL LEFT OUTER JOIN "); }
if (!defined("NMCC_NRO_JOIN")) {    define("NMCC_NRO_JOIN", " NATURAL RIGHT OUTER JOIN "); }

/* set error messages */
if (!defined("ERROR_DIRECTORY_DOES_NOT_EXISTS")) { define("ERROR_DIRECTORY_DOES_NOT_EXISTS", "directory \"%d\" does not exist"); }
if (!defined("ERROR_FILE_DOES_NOT_EXISTS")) { define("ERROR_FILE_DOES_NOT_EXISTS", "file \"%s\" does not exist"); }

/* mysqli class errors */
if (!defined("ERROR_PORT_VALUE_MUST_BE_INTEGER")) { define("ERROR_PORT_VALUE_MUST_BE_INTEGER", "port value must be integer, standard is 3306, current is \"%s\""); }
if (!defined("ERROR_DB_HANDLE_NOT_INITIALIZED")) { define("ERROR_DB_HANDLE_NOT_INITIALIZED", "db handle not initialized"); }
if (!defined("ERROR_FIELD_NUMBER_AND_NUMBER_OF_VALUES_​​DO_NOT_MATCH")) { define("ERROR_FIELD_NUMBER_AND_NUMBER_OF_VALUES_​​DO_NOT_MATCH", "field number and number of values ​​do not match"); }
if (!defined("ERROR_ON_LOADING_CHARACTER_SET")) { define("ERROR_ON_LOADING_CHARACTER_SET", "Error loading character set : \"%s\""); }

/* mysqli class messages */
if (!defined("NMCC_MSG_CURRENT_CHARACTER_SET")) { define("NMCC_MSG_CURRENT_CHARACTER_SET", "Default client character set is changed to : \"%s\""); }

/* set DIR to absolute path to library files */
if (!defined("CLASS_NTRNX_MYSQLI_DIR")) { define("CLASS_NTRNX_MYSQLI_DIR", dirname(__FILE__) . NMCC_DS); }

/* define dir for sysplugins */
if (!defined("CLASS_NTRNX_MYSQLI_SYSPLUGINS_DIR")) { define("CLASS_NTRNX_MYSQLI_SYSPLUGINS_DIR", CLASS_NTRNX_MYSQLI_DIR . "sysplugins" . NMCC_DS); }
if (!is_dir(CLASS_NTRNX_MYSQLI_SYSPLUGINS_DIR)) { die(str_replace("%d", CLASS_NTRNX_MYSQLI_SYSPLUGINS_DIR, ERROR_DIRECTORY_DOES_NOT_EXISTS)); }

/* define dir for class config */
if (!defined("CLASS_NTRNX_MYSQLI_CONFIG_DIR")) { define("CLASS_NTRNX_MYSQLI_CONFIG_DIR", CLASS_NTRNX_MYSQLI_DIR . "configs" . NMCC_DS); }
if (!is_dir(CLASS_NTRNX_MYSQLI_CONFIG_DIR)) { die(str_replace("%d", CLASS_NTRNX_MYSQLI_CONFIG_DIR, ERROR_DIRECTORY_DOES_NOT_EXISTS)); }

/* check and load config and subclasses */
if (!defined("CLASS_NTRNX_MYSQLI_CONFIG_FILE")) { define("CLASS_NTRNX_MYSQLI_CONFIG_FILE", CLASS_NTRNX_MYSQLI_CONFIG_DIR . "ntrnx_mysqli_config.php"); }
if (!file_exists(CLASS_NTRNX_MYSQLI_CONFIG_FILE)) { die(str_replace("%s", CLASS_NTRNX_MYSQLI_CONFIG_FILE, ERROR_FILE_DOES_NOT_EXISTS)); } else { require_once CLASS_NTRNX_MYSQLI_CONFIG_FILE; }

if (!defined("CLASS_NTRNX_MYSQLI_CORE_DATA")) { define("CLASS_NTRNX_MYSQLI_CORE_DATA", CLASS_NTRNX_MYSQLI_SYSPLUGINS_DIR . "ntrnx_mysqli_core_data.php"); }
if (!file_exists(CLASS_NTRNX_MYSQLI_CORE_DATA)) { die(str_replace("%s", CLASS_NTRNX_MYSQLI_CORE_DATA, ERROR_FILE_DOES_NOT_EXISTS)); } else { require_once CLASS_NTRNX_MYSQLI_CORE_DATA; }

if (!defined("CLASS_NTRNX_MYSQLI_CORE_BASE")) { define("CLASS_NTRNX_MYSQLI_CORE_BASE", CLASS_NTRNX_MYSQLI_SYSPLUGINS_DIR . "ntrnx_mysqli_core_base.php"); }
if (!file_exists(CLASS_NTRNX_MYSQLI_CORE_BASE)) { die(str_replace("%s", CLASS_NTRNX_MYSQLI_CORE_BASE, ERROR_FILE_DOES_NOT_EXISTS)); } else { require_once CLASS_NTRNX_MYSQLI_CORE_BASE; }

if (!defined("CLASS_NTRNX_MYSQLI_CORE")) { define("CLASS_NTRNX_MYSQLI_CORE", CLASS_NTRNX_MYSQLI_SYSPLUGINS_DIR . "ntrnx_mysqli_core.php"); }
if (!file_exists(CLASS_NTRNX_MYSQLI_CORE)) { die(str_replace("%s", CLASS_NTRNX_MYSQLI_CORE, ERROR_FILE_DOES_NOT_EXISTS)); } else { require_once CLASS_NTRNX_MYSQLI_CORE; }

/* begin of class ntrnx_mysqli */
class ntrnx_mysqli extends \NTRNX_MYSQLI\ntrnx_mysqli_core {
    
    /* var for last query statemanet */
    static $last_query = NULL;

    /* var for persistent_connection status */
    static $persistent_connection = FALSE;

	/* begin of class constructor */
	function __construct (){
	} /* end of class constructor */

	/* class destructor */
	function __destruct() {
	} /* end of class destructor */

    //mysqli_affected_rows() 	Returns the number of affected rows in the previous MySQL operation
    static function affected_rows(
        
        $mysqli_handle
        
    ) {

        return mysqli_affected_rows ($mysqli_handle);

    }

    //mysqli_affected_fields() {}
    static function affected_fields(

        $mysqli_handle

    ) {

        return mysqli_field_count ($mysqli_handle);

    }

    //mysqli_affected_tables() {}
    static function affected_tables() {}

    //mysqli_autocommit() 	Turns on or off auto-committing database modifications
    static function autocommit() {}


    static function begin_transaction() {}

    //mysqli_change_user() 	Changes the user of the specified database connection
    static function change_user() {}

    //mysqli_character_set_name() 	Returns the default character set for the database connection
    static function character_set_name(

        $mysqli_handle

    ) {

        return mysqli_character_set_name ($mysqli_handle);

    }

    static function client_info() {}

    static function client_version() {}

    //mysqli_close() 	Closes a previously opened database connection
/**/static function close(

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

    }

    //mysqli_commit() 	Commits the current transaction
    static function commit() {}

    //mysqli_connect_errno() 	Returns the error code from the last connection error
    static function connect_errno(

    ) {

        return mysqli_connect_errno ();

    }

    //mysqli_connect_error() 	Returns the error description from the last connection error
    static function connect_error(
        
    ) {

        return mysqli_connect_error ();

    }

    //mysqli_connect() 	Opens a new connection to the MySQL server
    static function connect(

        $host, 
        $username,
        $passwd,
        $dbname,
        $port = NULL,
        $socket = NULL

    ) {

        /* debug output */
        if (NMCC_DEBUG == TRUE) {
            print "host: " . $host . NMCC_COMMA;
            print " username: " . $username . NMCC_COMMA;
            print " passwd: " . $passwd . NMCC_COMMA;
            print " dbname: " . $dbname . NMCC_COMMA;
            print " port: " . $port . NMCC_COMMA;
            print " socket: " . $socket . NMCC_BR;
        }

        if ($port != NULL && filter_var($port, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE) === NULL) { 
            die(str_replace("%s", $port, ERROR_PORT_VALUE_MUST_BE_INTEGER));
        }

        $mysqli_handle = mysqli_connect ($host, $username, $passwd, $dbname, $port, $socket);
        if (!$mysqli_handle) { die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error()); }

        /* debug output */
        if (NMCC_DEBUG == TRUE) {
            print 'Success... ' . mysqli_get_host_info ($mysqli_handle) . NMCC_BR;
        }

        self::$persistent_connection = FALSE;

        return $mysqli_handle;

    }

    //mysqli_pconnect()   Opens a new persistent connection to the MySQL server
    static function pconnect(

        $host, 
        $username,
        $passwd,
        $dbname,
        $port = NULL,
        $socket = NULL

    ) {

        /* debug output */
        if (NMCC_DEBUG == TRUE) {
            print "host: " . $host . NMCC_COMMA;
            print " username: " . $username . NMCC_COMMA;
            print " passwd: " . $passwd . NMCC_COMMA;
            print " dbname: " . $dbname . NMCC_COMMA;
            print " port: " . $port . NMCC_COMMA;
            print " socket: " . $socket . NMCC_BR;
        }

        if ($port != NULL && filter_var($port, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE) === NULL) { 
            die(str_replace("%s", $port, ERROR_PORT_VALUE_MUST_BE_INTEGER));
        }

        $mysqli_handle = mysqli_connect ("p:" . $host, $username, $passwd, $dbname, $port, $socket);
        if (!$mysqli_handle) { die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error()); }

        /* debug output */
        if (NMCC_DEBUG == TRUE) {
            print 'Success... ' . mysqli_get_host_info ($mysqli_handle) . NMCC_BR;
        }

        self::$persistent_connection = TRUE;

        return $mysqli_handle;

    }

    //mysqli_data_seek() 	Adjusts the result pointer to an arbitrary row in the result-set
    static function data_seek(

        $mysqli_result,
        $offset

    ) {

        return mysqli_data_seek ($mysqli_result , $offset);

    }

    //mysqli_debug() 	Performs debugging operations
    static function debug() {}

    //mysqli_dump_debug_info() 	Dumps debugging info into the log
    static function dump_debug_info() {}

    //mysqli_errno() 	Returns the last error code for the most recent function call
    static function errno(

        $mysqli_handle

    ) {

        return mysqli_errno ($mysqli_handle);

    }

    //mysqli_error_list() 	Returns a list of errors for the most recent function call
    static function error_list(

        $mysqli_handle

    ) {

        return mysqli_error_list ($mysqli_handle);

    }

    //mysqli_error() 	Returns the last error description for the most recent function call
    static function error(

        $mysqli_handle

    ) {

        return mysqli_error ($mysqli_handle);

    }

    //mysqli_fetch_all() 	Fetches all result rows as an associative array, a numeric array, or both
    static function fetch_all(

        $mysqli_result,
        $resulttype = NULL

    ) {

        return mysqli_fetch_all ($mysqli_result, $resulttype);

    }

    //mysqli_fetch_array() 	Fetches a result row as an associative, a numeric array, or both
    static function fetch_array(

        $mysqli_result,
        $resulttype = NULL

    ) {

        return mysqli_fetch_array ($mysqli_result, $resulttype = NULL);

    }

    //mysqli_fetch_assoc() 	Fetches a result row as an associative array
    static function fetch_assoc(

        $mysqli_result
        
    ) {

        return mysqli_fetch_assoc ($mysqli_result);

    }

    //mysqli_fetch_field_direct() 	Returns meta-data for a single field in the result set, as an object
    static function fetch_field_direct(

        $mysqli_result,
        $fieldnr

    ) {

        return mysqli_fetch_field_direct ($mysqli_result , $fieldnr);

    }

    //mysqli_fetch_field() 	Returns the next field in the result set, as an object
    static function fetch_field(

        $mysqli_result

    ) {

        return mysqli_fetch_field ($mysqli_result);

    }

    //mysqli_fetch_fields() 	Returns an array of objects that represent the fields in a result set
    static function fetch_fields(
        
        $mysqli_result

    ) {

        return mysqli_fetch_fields ($mysqli_result);

    }

    //mysqli_fetch_lengths() 	Returns the lengths of the columns of the current row in the result set
    static function fetch_lengths(

        $mysqli_result

    ) {

        return mysqli_fetch_lengths ($mysqli_result);

    }

    //mysqli_fetch_object() 	Returns the current row of a result set, as an object
    static function fetch_object(

        $mysqli_result,
        $class_name,
        $params = NULL

    ) {

        return mysqli_fetch_object ($mysqli_result, $class_name, $params);

    }

    //mysqli_fetch_row() 	Fetches one row from a result-set and returns it as an enumerated array
    static function fetch_row(

        $mysqli_result

    ) {

        return mysqli_fetch_row ($mysqli_result);

    }

    //mysqli_field_count() 	Returns the number of columns for the most recent query
    static function field_count(

        $mysqli_handle

    ) {

        return  mysqli_field_count ($mysqli_handle);

    }

    //mysqli_field_seek() 	Sets the field cursor to the given field offset
    static function field_seek(

        $mysqli_result,
        $fieldnr

    ) {

        return mysqli_field_seek ($mysqli_result , $fieldnr);

    }

    //mysqli_field_tell() 	Returns the position of the field cursor
    static function field_tell(

        $mysqli_result

    ) {

        return  mysqli_field_tell ($mysqli_result);

    }

    //mysqli_free_result() 	Frees the memory associated with a result
    static function free_result(
        
        $mysqli_result
        
    ) {

        mysqli_free_result($mysqli_result);

    }

    //mysqli_get_charset() 	Returns a character set object
    static function get_charset(

        $mysqli_handle,
        $options = NULL

    ) {

        /* get object */
        $charset_obj = mysqli_get_charset($mysqli_handle);

        /* convert to array */
        $charset_array = (array) $charset_obj;

        switch ($options) {

            case 'charset': return $charset_array['charset']; break;
            case 'collation': return $charset_array['collation']; break;
            case 'dir': return $charset_array['dir']; break;
            case 'min_length': return $charset_array['min_length']; break;
            case 'max_length': return $charset_array['max_length']; break;
            case 'number': return $charset_array['number']; break;
            case 'state': return $charset_array['state']; break;
            case 'comment': return $charset_array['comment']; break;

            default: return $charset_obj; break;

        }    

    }

    //mysqli_get_client_info() 	Returns the MySQL client library version
    static function get_client_info() {}

    //mysqli_get_client_stats() 	Returns statistics about client per-process
    static function get_client_stats() {}

    //mysqli_get_client_version() 	Returns the MySQL client library version as an integer
    static function get_client_version() {}

    //mysqli_get_connection_stats() 	Returns statistics about the client connection
    static function get_connection_stats() {}

    //mysqli_get_host_info() 	Returns the MySQL server hostname and the connection type
    static function get_host_info(

        $mysqli_handle

    ) {

        return mysqli_get_host_info ($mysqli_handle);

    }

    // get all tables in a given database
    static function get_tables(

        $mysqli_handle,
        $database

    ) {

        $statement = "SHOW TABLES FROM " . NMCC_IQ . $database . NMCC_IQ . ";";

        if ($mysqli_handle) {
 
            if (!$result = mysqli_query ($mysqli_handle, $statement)) {

                /* debug output */
                if (NMCC_DEBUG == TRUE) {
                    print mysqli_error ($mysqli_handle) . NMCC_BR;
                    print $statement . NMCC_BR;
                }

                $result = FALSE;

            }

        } else {

            /* debug output */
            if (NMCC_DEBUG == TRUE) {
                print ERROR_DB_HANDLE_NOT_INITIALIZED . NMCC_BR;
                print $statement . NMCC_BR;
            }            

            $result = FALSE;

        }

        return $result;

    }

    // get all fields in a given database table
    static function get_fields(

        $mysqli_handle,
        $database,
        $table

    ) {

        $statement = "SHOW COLUMNS FROM " . NMCC_IQ . $database . NMCC_IQ . NMCC_DOT . NMCC_IQ . $table . NMCC_IQ . ";";

        if ($mysqli_handle) {
 
            if (!$result = mysqli_query ($mysqli_handle, $statement)) {

                /* debug output */
                if (NMCC_DEBUG == TRUE) {
                    print mysqli_error ($mysqli_handle) . NMCC_BR;
                    print $statement . NMCC_BR;
                }

                $result = FALSE;

            }

        } else {

            /* debug output */
            if (NMCC_DEBUG == TRUE) {
                print ERROR_DB_HANDLE_NOT_INITIALIZED . NMCC_BR;
                print $statement . NMCC_BR;
            }            

            $result = FALSE;

        }

        return $result;

    }

    //mysqli_get_proto_info() 	Returns the MySQL protocol version
    static function get_proto_info() {}

    //mysqli_get_server_info() 	Returns the MySQL server version
    static function get_server_info() {}

    //mysqli_get_server_version() 	Returns the MySQL server version as an integer
    static function get_server_version() {}

    //mysqli_info() 	Returns information about the most recently executed query
    static function info() {}

    //mysqli_init() 	Initializes MySQLi and returns a resource for use with mysqli_real_connect()
/**/static function init(

    ) {

        /* init handle */
        $mysqli_handle = mysqli_init();

        /* check if error */
        if (!$mysqli_handle) {

            die('mysqli_init failed');

        } else {

            return $mysqli_handle;

        }       

    }

    //mysqli_insert_id() 	Returns the auto-generated id used in the last query
    static function insert_id(

        $mysqli_handle

    ) {

        return mysqli_insert_id (mysqli_handle);

    }

    //mysqli_kill() 	Asks the server to kill a MySQL thread
    static function kill() {}

    //mysqli_more_results() 	Checks if there are more results from a multi query
    static function more_results() {}

    //mysqli_multi_query() 	Performs one or more queries on the database
    static function multi_query() {}

    //mysqli_next_result() 	Prepares the next result set from mysqli_multi_query()
    static function next_result() {}

    //mysqli_num_fields() 	Returns the number of fields in a result set
    static function num_fields(

        $mysqli_result

    ) {

        return mysqli_num_fields ($mysqli_result);

    }

    //mysqli_num_rows() 	Returns the number of rows in a result set
    static function num_rows(
        
        $mysqli_result
        
    ) {

        return mysqli_num_rows ($mysqli_result);

    }

    //mysqli_options() 	Sets extra connect options and affect behavior for a connection
    static function options(

        $mysqli_handle,
        $option,
        $value

    ) {

        switch ($option) {

            /* connection timeout in seconds (supported on Windows with TCP/IP since PHP 5.3.1) */
            /* (argument type: unsigned int *) */
            case "MYSQLI_OPT_CONNECT_TIMEOUT":
                if (filter_var( $value, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE) === NULL) { die('error on value for ' . $option . ' : ' . $value); }
                if (mysqli_options($mysqli_handle, MYSQLI_OPT_CONNECT_TIMEOUT, $value) === FALSE) { die('Setting ' . $option . ' failed'); }
            break;

            /* enable/disable use of LOAD LOCAL INFILE */
            /* (argument type: optional pointer to unsigned int) */
            case "MYSQLI_OPT_LOCAL_INFILE":
                if (filter_var( $value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) === NULL) { die('error on value for ' . $option . ' : ' . $value); }
                if (mysqli_options($mysqli_handle, MYSQLI_OPT_LOCAL_INFILE, $value) === FALSE) { die('Setting ' . $option . ' failed'); }
            break;

            /* command to execute after when connecting to MySQL server */
            /* (argument type: char *) */
            case "MYSQLI_INIT_COMMAND":
                if (filter_var( $value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) === NULL) { die('error on value for ' . $option . ' : ' . $value); }
                if (mysqli_options($mysqli_handle, MYSQLI_INIT_COMMAND, $value) === FALSE) { die('Setting ' . $option . ' failed'); }
            break;

            /* Read options from named option file instead of my.cnf */
            /* (argument type: char *) */
            case "MYSQLI_READ_DEFAULT_FILE":
                if (filter_var( $value, FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE) === NULL) { die('error on value for ' . $option . ' : ' . $value); }
                if (mysqli_options($mysqli_handle, MYSQLI_READ_DEFAULT_FILE, $value) === FALSE) { die('Setting ' . $option . ' failed'); }  
            break;
            /* Read options from the named group from my.cnf or the file specified with MYSQL_READ_DEFAULT_FILE. */
            /* (argument type: char *) */
            case "MYSQLI_READ_DEFAULT_GROUP":
                if (filter_var( $value, FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE) === NULL) { die('error on value for ' . $option . ' : ' . $value); }
                if (mysqli_options($mysqli_handle, MYSQLI_READ_DEFAULT_GROUP, $value) === FALSE) { die('Setting ' . $option . ' failed'); }   
            break;

            /* RSA public key file used with the SHA-256 based authentication. */
            /* (argument type: char *) */
            case "MYSQLI_SERVER_PUBLIC_KEY":
                if (filter_var( $value, FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE) === NULL) { die('error on value for ' . $option . ' : ' . $value); }
                if (mysqli_options($mysqli_handle, MYSQLI_SERVER_PUBLIC_KEY, $value) === FALSE) { die('Setting ' . $option . ' failed'); } 
            break;

            /* The size of the internal command/network buffer. Only valid for mysqlnd. */
            /* */
            case "MYSQLI_OPT_NET_CMD_BUFFER_SIZE":
                if (filter_var( $value, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE) === NULL) { die('error on value for ' . $option . ' : ' . $value); }
                if (mysqli_options($mysqli_handle, MYSQLI_OPT_NET_CMD_BUFFER_SIZE, $value) === FALSE) { die('Setting ' . $option . ' failed'); }
            break;

            /* Maximum read chunk size in bytes when reading the body of a MySQL command packet. Only valid for mysqlnd. */
            /* */
            case "MYSQLI_OPT_NET_READ_BUFFER_SIZE":
                if (filter_var( $value, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE) === NULL) { die('error on value for ' . $option . ' : ' . $value); }
                if (mysqli_options($mysqli_handle, MYSQLI_OPT_NET_READ_BUFFER_SIZE, $value) === FALSE) { die('Setting ' . $option . ' failed'); }
            break;

            /* Convert integer and float columns back to PHP numbers. Only valid for mysqlnd. */
            /* */
            case "MYSQLI_OPT_INT_AND_FLOAT_NATIVE":
                if (filter_var( $value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) === NULL) { die('error on value for ' . $option . ' : ' . $value); }
                if (mysqli_options($mysqli_handle, MYSQLI_OPT_INT_AND_FLOAT_NATIVE, $value) === FALSE) { die('Setting ' . $option . ' failed'); }
            break;

            /* the following does not work, mysqli_options generates an error always */
            /* Enable or disable verification of the server's Common Name value in its certificate against the host name used when connecting to the server. */
            /* (argument type: my_bool *) */
            case "MYSQLI_OPT_SSL_VERIFY_SERVER_CERT":
                if (filter_var( $value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) === NULL) { die('error on value for ' . $option . ' : ' . $value); }
                if (mysqli_options($mysqli_handle, MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, $value) === FALSE) { die('Setting ' . $option . ' failed'); }
             break;

            default:
            break;

        }

    }

    //mysqli_ping() 	Pings a server connection, or tries to reconnect if the connection has gone down
    static function ping(

        $mysqli_handle

    ) {

        return mysqli_ping ($mysqli_handle);

    }

    //mysqli_prepare() 	Prepares an SQL statement for execution
    static function prepare() {}

    static function query(

        $mysqli_handle,
        $statement,
        $options = NULL

    ) {

        /* debug output */
        if (NMCC_DEBUG == TRUE) {
            print '<pre>' . $statement . '</pre>';
        }

        self::$last_query = $statement;

        if ($mysqli_handle) {

            if (!$result = mysqli_query ($mysqli_handle, $statement, $options)) {

                /* debug output */
                if (NMCC_DEBUG == TRUE) {
                    print mysqli_error ($mysqli_handle) . NMCC_BR;
                    print $statement . NMCC_BR;
                }

                $result = FALSE;

            }

        } else {

            /* debug output */
            if (NMCC_DEBUG == TRUE) {
                print ERROR_DB_HANDLE_NOT_INITIALIZED . NMCC_BR;
                print $statement . NMCC_BR;
            }            

            $result = FALSE;

        }

        return $result;        

    }

    static function last_query() {

        return self::$last_query;

    }

    //mysqli_query() 	Performs a query against the database
/**/static function select(

        $mysqli_handle,

        /* http://dev.mysql.com/doc/refman/5.7/en/select.html */

        /* SELECT 
                [ALL | DISTINCT | DISTINCTROW ]
                [HIGH_PRIORITY]
                [MAX_STATEMENT_TIME = N]
                [STRAIGHT_JOIN]
                [SQL_SMALL_RESULT] [SQL_BIG_RESULT] [SQL_BUFFER_RESULT]
                [SQL_CACHE | SQL_NO_CACHE] [SQL_CALC_FOUND_ROWS]
                select_expr [, select_expr ...]
        */
        $select_expression,

        /*  [FROM table_references
                [PARTITION partition_list]
        */
        $table_reference,

        /*  join_table:
                  table_reference [INNER | CROSS] JOIN table_factor [join_condition]
                | table_reference STRAIGHT_JOIN table_factor
                | table_reference STRAIGHT_JOIN table_factor ON conditional_expr
                | table_reference {LEFT|RIGHT} [OUTER] JOIN table_reference join_condition
                | table_reference NATURAL [{LEFT|RIGHT} [OUTER]] JOIN table_factor

            join_condition:
                  ON conditional_expr
                | USING (column_list)
        
        */
        $join_expression = NULL,

        /* [WHERE where_condition] */
        $where_condition = NULL,

        /* [GROUP BY {col_name | expr | position} [ASC | DESC], ... [WITH ROLLUP]] */
        $group_condition = NULL,

        /* [HAVING where_condition] */
        $having_condition = NULL,

        /* [ORDER BY {col_name | expr | position} [ASC | DESC], ...] */
        $order_condition = NULL,

        /* [LIMIT {[offset,] row_count | row_count OFFSET offset}] */
        $limit = NULL,

        /* [PROCEDURE procedure_name(argument_list)] */
        $procedure = NULL,

        /* [INTO OUTFILE 'file_name' [CHARACTER SET charset_name] export_options | INTO DUMPFILE 'file_name' | INTO var_name [, var_name]] */
        $into_target = NULL,

        /* [FOR UPDATE | LOCK IN SHARE MODE]] */
        $for_options = NULL,

        $options = NULL

    ) {

        /* prepare select_statement */
        $select_statement = NMCC_SELECT;

        $dot_mode = TRUE;
        $comma_mode = FALSE;

        $count_select = count($select_expression);

        for ($i = 0; $i < $count_select; $i++) {

            $select_statement .= NMCC_IQ . $select_expression[$i] . NMCC_IQ;

            if ($i < $count_select - 1) {

                if ($dot_mode == TRUE) {

                    $select_statement .= NMCC_DOT;

                    $dot_mode = FALSE;
                    $comma_mode = TRUE;

                }

                else if ($comma_mode == TRUE) {

                    $select_statement .= NMCC_COMMA . NMCC_BLANK;

                    $dot_mode = TRUE;
                    $comma_mode = FALSE;

                }

            }

        }
        //print $select_statement . NMCC_BR;

        /* prepare from_statement */
        $from_statement = NMCC_FROM;

        $dot_mode = TRUE;
        $comma_mode = FALSE;

        $count_from = count($table_reference);

        for ($i = 0; $i < $count_from; $i++) {

            if ($table_reference[$i] != NMCC_AS) {

                $from_statement .= NMCC_IQ . $table_reference[$i] . NMCC_IQ;

                if ($i < $count_from - 1) {

                    if ($dot_mode == TRUE) {

                        $from_statement .= NMCC_DOT;

                        $dot_mode = FALSE;
                        $comma_mode = TRUE;

                    }

                    else if ($comma_mode == TRUE) {

                        if ($table_reference[$i+1] != NMCC_AS) {

                            $from_statement .= NMCC_COMMA . NMCC_BLANK;

                        }

                        $dot_mode = TRUE;
                        $comma_mode = FALSE;

                    }

                }

            } else {

                $from_statement .= $table_reference[$i] . NMCC_BLANK . $table_reference[$i+1];

                $i=$i+1;

                if ($i < $count_from - 1) {

                    $from_statement .= NMCC_COMMA . NMCC_BLANK;

                }

            }

        }
        //print $from_statement . NMCC_BR;

        /* prepare join_statement */
        if ($join_expression) {

            $count_join = count($join_expression);

            for ($i = 0; $i < $count_join; $i++) {

                switch ($join_expression[$i]) {

                    //INNER', $db_name, 'account_keys', 'ON', 'accounts', 'account_id', 'EQUAL', 'account_keys', 'account_id'
                    case "INNER":
                        $join_statement .= NMCC_I_JOIN;

                        $join_statement .= NMCC_IQ
                        . $join_expression[$i+1]
                        . NMCC_IQ
                        . NMCC_DOT
                        . NMCC_IQ
                        . $join_expression[$i+2]
                        . NMCC_IQ

                        . NMCC_BLANK
                        . NMCC_ON
                        . NMCC_BLANK

                        . NMCC_IQ
                        . $join_expression[$i+4]
                        . NMCC_IQ
                        . NMCC_DOT
                        . NMCC_IQ
                        . $join_expression[$i+5]
                        . NMCC_IQ;

                        switch ($join_expression[$i+6]) {

                            case "EQUAL": $join_statement .= NMCC_BLANK . NMCC_EQUAL . NMCC_BLANK; break;
                            case "UNEQUAL": $join_statement .= NMCC_BLANK . NMCC_UNEQUAL . NMCC_BLANK; break;
                            case "NOTEQUAL": $join_statement .= NMCC_BLANK . NMCC_NOTEQUAL . NMCC_BLANK; break;
                            case "NSEQUAL": $join_statement .= NMCC_BLANK . NMCC_NSEQUAL . NMCC_BLANK; break;
                            case "GT": $join_statement .= NMCC_BLANK . NMCC_GT . NMCC_BLANK; break;
                            case "GTOE": $join_statement .= NMCC_BLANK . NMCC_GTOE . NMCC_BLANK; break;
                            case "LT": $join_statement .= NMCC_BLANK . NMCC_LT . NMCC_BLANK; break;
                            case "LTOE": $join_statement .= NMCC_BLANK . NMCC_LTOE . NMCC_BLANK; break;
                            default:
                                die ("operator " . $join_expression[$i+6] . " for join_expression not supported");
                            break;
                        }

                        $join_statement .= NMCC_IQ
                        . $join_expression[$i+7]
                        . NMCC_IQ
                        . NMCC_DOT
                        . NMCC_IQ
                        . $join_expression[$i+8]
                        . NMCC_IQ;

                        $i=$i+8;

                        /* only for browser output */
                        /*
                        if ($i < $count_join - 1) {

                            $join_statement .= NMCC_BR;

                        }
                        */

                    break;

                    case "OUTER":
                        $join_statement .= NMCC_BLANK
                            . NMCC_FO_JOIN
                            . NMCC_BLANK;
                    break;

                    case "CROSS":
                        $join_statement .= NMCC_BLANK
                            . NMCC_C_JOIN
                            . NMCC_BLANK;
                    break;

                    case "STRAIGHT":
                        $join_statement .= NMCC_BR;
                        $join_statement .= NMCC_BLANK
                            . NMCC_S_JOIN
                            . NMCC_BLANK;
                    break;

                    case "LEFT":
                        $join_statement .= NMCC_BLANK
                            . NMCC_L_JOIN
                            . NMCC_BLANK;
                    break;

                    case "LEFTO":
                        $join_statement .= NMCC_BLANK
                            . NMCC_LO_JOIN
                            . NMCC_BLANK;
                    break;

                    case "NLEFT":
                        $join_statement .= NMCC_BLANK
                            . NMCC_NL_JOIN
                            . NMCC_BLANK;
                    break;

                    case "NLEFTO":
                        $join_statement .= NMCC_BLANK
                            . NMCC_NLO_JOIN
                            . NMCC_BLANK;
                    break;                  

                    case "RIGHT":
                        $join_statement .= NMCC_BLANK
                            . NMCC_R_JOIN
                            . NMCC_BLANK;
                    break;

                    case "RIGHTO":
                        $join_statement .= NMCC_BLANK
                            . NMCC_RO_JOIN
                            . NMCC_BLANK;
                    break;

                    case "NRIGHT":
                        $join_statement .= NMCC_BLANK
                            . NMCC_NR_JOIN
                            . NMCC_BLANK;
                    break;

                    case "NRIGHTO":
                        $join_statement .= NMCC_BLANK
                            . NMCC_NRO_JOIN
                            . NMCC_BLANK;
                    break;

                    case "NATURAL":
                        $join_statement .= NMCC_BLANK
                            . NMCC_N_JOIN
                            . NMCC_BLANK;
                    break;

                    case "AS":
                        $join_statement .= NMCC_BLANK
                            . NMCC_AS
                            . NMCC_BLANK;
                    break;

                    case "ON":
                        $join_statement .= NMCC_BLANK
                            . NMCC_ON
                            . NMCC_BLANK;
                    break;

                    case "USING":
                        $join_statement .= NMCC_BLANK
                            . NMCC_USING
                            . NMCC_BLANK;
                    break;

                    default:
                    break;

                }                

            }
            //print $join_statement . NMCC_BR;

        }

        /* prepare where_statement */
        if ($where_condition) {

            $where_statement = NMCC_WHERE;

            $dot_mode = TRUE;
            $value_mode = FALSE;

            $count_where = count($where_condition);

            for ($i = 0; $i < $count_where; $i++) {

                switch ($where_condition[$i]) {

                    case "OR":
                        $where_statement .= NMCC_BLANK
                        . NMCC_OR
                        . NMCC_BLANK;
                    break;                    
                    case "AND":
                        $where_statement .= NMCC_BLANK
                        . NMCC_AND
                        . NMCC_BLANK;
                    break;
                    case "EQUAL":
                        $where_statement .= NMCC_BLANK
                        . NMCC_EQUAL
                        . NMCC_BLANK;
                    break;
                    case "UNEQUAL":
                        $where_statement .= NMCC_BLANK
                        . NMCC_UNEQUAL
                        . NMCC_BLANK;
                    break;

                    case "NOTEQUAL":
                        $where_statement .= NMCC_BLANK
                        . NMCC_NOTEQUAL
                        . NMCC_BLANK;
                    break;

                    case "NSEQUAL":
                        $where_statement .= NMCC_BLANK
                        . NMCC_NSEQUAL
                        . NMCC_BLANK;
                    break;
                    case "GT":
                        $where_statement .= NMCC_BLANK
                        . NMCC_GT
                        . NMCC_BLANK;
                    break;
                    case "GTOE":
                        $where_statement .= NMCC_BLANK
                        . NMCC_GTOE
                        . NMCC_BLANK;
                    break;
                    case "LT":
                        $where_statement .= NMCC_BLANK
                        . NMCC_LT
                        . NMCC_BLANK;
                    break;
                    case "LTOE":
                        $where_statement .= NMCC_BLANK
                        . NMCC_LTOE
                        . NMCC_BLANK;
                    break;

                    //case "XOR": break;
                    //case "NOT": break;
                    //case "IS": break;
                    //case "ISNOT": break;
                    //case "IN": break;
                    //case "NOTIN": break;
                    //case "BETWEEN": break;
                    //case "NOTBETWEEN": break;
                    //case "SOUNDSLIKE": break;
                    //case "LIKE": break;
                    //case "NOTLIKE": break;
                    //case "REGEXP": break;
                    //case "NOTREGEXP": break;

                    case "STRING":
                        $value_mode = TRUE;
                    break;

                    default:

                        if ($value_mode == TRUE) {

                            $where_statement .= NMCC_VQ . $where_condition[$i] . NMCC_VQ;

                            $value_mode = FALSE;
                            $dot_mode = FALSE;

                        } else {

                            $where_statement .= NMCC_IQ . $where_condition[$i] . NMCC_IQ;

                        }

                        if ($i < $count_where - 1) {

                            if ($dot_mode == TRUE) {

                                $where_statement .= NMCC_DOT;

                                $dot_mode = FALSE;

                            } else {

                                $dot_mode = TRUE;

                            }

                        }

                     break;

                }

            }
            //print $where_statement . NMCC_BR;

        }

        /* prepare group_statement  */
        if ($group_condition) {

            $group_statement .= NMCC_GROUP;

            $count = count($group_condition);

            for ($i = 0; $i < $count; $i++) {

                $group_statement .= NMCC_IQ
                . $group_condition[$i]
                . NMCC_IQ;

                if ($group_condition[$i+1] != NULL) { $group_statement .= NMCC_BLANK . $group_condition[$i]; } else { $group_statement .= " ASC"; }

                $i=$i+1;

                if ($i < $count - 1) { $group_statement .= NMCC_COMMA . NMCC_BLANK; }

            }
            //print $group_statement . NMCC_BR;

            /* prepare group_statement  */
            if ($having_condition) {

                print $having_statement . ' not supported' . NMCC_BR;

            }            

        }

        /* prepare order_statement */
        if ($order_condition) {

            $order_statement .= NMCC_ORDER;

            $count = count($order_condition);

            for ($i = 0; $i < $count; $i++) {

                $order_statement .= NMCC_IQ . $order_condition[$i] . NMCC_IQ;

                if ($order_condition[$i+1] != NULL) { $order_statement .= NMCC_BLANK . $order_condition[$i]; } else { $order_statement .= " ASC"; }

                $i=$i+1;

                if ($i < $count - 1) { $order_statement .= NMCC_COMMA . NMCC_BLANK; }

            }
            //print $order_statement . NMCC_BR;

        }

        /* prepare limit_statement */
        if ($limit) {

            $limit_statement .= NMCC_BLANK
            . NMCC_LIMIT
            . NMCC_BLANK
            . $limit;

            //print $limit_statement . NMCC_BR;

        }

        /* prepare procedure_name */
        /* [PROCEDURE procedure_name(argument_list)] */
        if ($procedure) {

            print $procedure . ' not supported' . NMCC_BR;

        }

        /* prepare into_target */
        /* [INTO OUTFILE 'file_name' [CHARACTER SET charset_name] export_options | INTO DUMPFILE 'file_name' | INTO var_name [, var_name]] */
        if ($into_target) {

            print $into_target . ' not supported'. NMCC_BR;

        }

        /* prepare for_options */
        /* [FOR UPDATE | LOCK IN SHARE MODE]] */
        if ($for_options) {

            print $for_options . ' not supported'. NMCC_BR;
    
        }

        /* prepare complete statement */
        $statement = $select_statement
        . $from_statement;

        if ($join_expression) {

            $statement .= $join_statement;

        }

        if ($where_condition) { $statement .= $where_statement; }

        if ($group_condition) { 

            $statement .= $group_statement;

            /*
            if ($having_condition) { 

                $statement .= $having_statement;

            }
            */

        }

        if ($order_condition) { $statement .= $order_statement; }

        if ($limit) { $statement .= $limit_statement; }

        //if ($procedure) { $statement .= $procedure; }

        //if ($into_target) { $statement .= $into_target; }

        //if ($for_options) { $statement .= $for_options; }

        /* debug output */
        if (NMCC_DEBUG == TRUE) {
            print '<pre>' . $statement . '</pre>';
        }

        self::$last_query = $statement;

        if ($mysqli_handle) {

            if (!$result = mysqli_query ($mysqli_handle, $statement, $options)) {

                /* debug output */
                if (NMCC_DEBUG == TRUE) {
                    print mysqli_error ($mysqli_handle) . NMCC_BR;
                    print $statement . NMCC_BR;
                }

                $result = FALSE;

            }

        } else {

            /* debug output */
            if (NMCC_DEBUG == TRUE) {
                print ERROR_DB_HANDLE_NOT_INITIALIZED . NMCC_BR;
                print $statement . NMCC_BR;
            }            

            $result = FALSE;

        }

        return $result;

    }

    //mysqli_query() 	Performs a query against the database
/**/static function insert(

        $mysqli_handle,

        /* http://dev.mysql.com/doc/refman/5.7/en/insert.html */

        /* [INTO] db_name, tbl_name */
        $tbl_name,

        /* [(col_name,...)] */
        $col_name,

        /* {VALUES | VALUE} ({expr | DEFAULT},...),(...),... */
        $values,

        $options = NULL

    ) {

        $count_columns = count($col_name);
        $count_values = count($values);

        if ($count_columns == $count_values) {

            /* set db and table name */
            $db_name = $tbl_name[0];
            $table_name = $tbl_name[1];

            $table_statement = NMCC_INSERT
            . NMCC_IQ
            . $db_name
            . NMCC_IQ
            . NMCC_DOT
            . NMCC_IQ
            . $table_name
            . NMCC_IQ;

            $column_statement = NMCC_BLANK . NMCC_PARENTHESIS_OPEN;
            for ($i = 0; $i < $count_columns; $i++) {

                $column_statement .= NMCC_IQ . $col_name[$i] . NMCC_IQ;

                if ($i < $count_columns - 1) { $column_statement .= NMCC_COMMA . NMCC_BLANK; }

            }
            $column_statement .= NMCC_PARENTHESIS_CLOSE;

            $value_statement = NMCC_BLANK . NMCC_VALUES . NMCC_BLANK . NMCC_PARENTHESIS_OPEN;
            for ($i = 0; $i < $count_values; $i++) {

                $value_statement .= NMCC_VQ
                . \NTRNX_MYSQLI\ntrnx_mysqli::real_escape_string($mysqli_handle, $values[$i])
                . NMCC_VQ;

                if ($i < $count_values - 1) { $value_statement .= NMCC_COMMA . NMCC_BLANK; }

            }
            $value_statement .= NMCC_PARENTHESIS_CLOSE;

            $statement = $table_statement . $column_statement . $value_statement;
            
            /* debug output */
            if (NMCC_DEBUG == TRUE) {
                print '<pre>' . $statement . '</pre>';
            }

            self::$last_query = $statement;

            if ($mysqli_handle) {

                if (!$result = mysqli_query ($mysqli_handle, $statement, $options)) {

                    /* debug output */
                    if (NMCC_DEBUG == TRUE) {
                        print mysqli_error ($mysqli_handle) . NMCC_BR;
                        print $statement . NMCC_BR;
                    }

                    $result = FALSE;

                }

            } else {

                /* debug output */
                if (NMCC_DEBUG == TRUE) {
                    print ERROR_DB_HANDLE_NOT_INITIALIZED . NMCC_BR;
                    print $statement . NMCC_BR;
                }            

                $result = FALSE;

            }

        } else {
            
            /* debug output */
            if (NMCC_DEBUG == TRUE) {
                //print 'table_target length and column_target length dont match' . NMCC_BR;
                print ERROR_FIELD_NUMBER_AND_NUMBER_OF_VALUES_​​DO_NOT_MATCH . NMCC_BR;
            }

            $result = FALSE;

        }

        return $result;

    }

    //mysqli_query() 	Performs a query against the database
/**/static function update(

        $mysqli_handle,

        /* http://dev.mysql.com/doc/refman/5.7/en/update.html */

        /* UPDATE [LOW_PRIORITY] [IGNORE] table_reference */
        $table_reference,

        /* SET col_name1={expr1|DEFAULT} [, col_name2={expr2|DEFAULT}] ... */
        $set_expression,

        /* [WHERE where_condition] */
        $where_condition,

        /* [ORDER BY {col_name | expr | position} [ASC | DESC], ...] */
        $order_condition = NULL,

        /* [LIMIT {[offset,] row_count | row_count OFFSET offset}] */
        $limit = NULL,

        $options = NULL

    ) {

        /* debug output */
        if (NMCC_DEBUG == TRUE) {
            print '<pre>' . $statement . '</pre>';
        }

        self::$last_query = $statement;

        if ($mysqli_handle) {

            if (!$result = mysqli_query ($mysqli_handle, $statement, $options)) {    

                /* debug output */
                if (NMCC_DEBUG == TRUE) {
                    print mysqli_error ($mysqli_handle) . NMCC_BR;
                    print $statement . NMCC_BR;
                }

                $result = FALSE;

            }

        } else {

            /* debug output */
            if (NMCC_DEBUG == TRUE) {
                print ERROR_DB_HANDLE_NOT_INITIALIZED . NMCC_BR;
                print $statement . NMCC_BR;
            }            

            $result = FALSE;

        }

        return $result;

    }

    //mysqli_query() 	Performs a query against the database
/**/static function delete(

        $mysqli_handle,

        /* http://dev.mysql.com/doc/refman/5.7/en/delete.html */

        /* DELETE [LOW_PRIORITY] [QUICK] [IGNORE] FROM tbl_name */
        $tbl_name,

        /* [WHERE where_condition] */
        $where_condition,

        /* [ORDER BY {col_name | expr | position} [ASC | DESC], ...] */
        $order_condition = NULL,

        /* [LIMIT {[offset,] row_count | row_count OFFSET offset}] */
        $limit = NULL,

        $options = NULL

    ) {

        /* debug output */
        if (NMCC_DEBUG == TRUE) {
            print '<pre>' . $statement . '</pre>';
        }

        self::$last_query = $statement;

        if ($mysqli_handle) {

            if (!$result = mysqli_query ($mysqli_handle, $statement, $options)) {

                /* debug output */
                if (NMCC_DEBUG == TRUE) {
                    print mysqli_error ($mysqli_handle) . NMCC_BR;
                    print $statement . NMCC_BR;
                }

                $result = FALSE;

            }

        } else {

            /* debug output */
            if (NMCC_DEBUG == TRUE) {
                print ERROR_DB_HANDLE_NOT_INITIALIZED . NMCC_BR;
                print $statement . NMCC_BR;
            }            

            $result = FALSE;

        }

        return $result;

    }

    //mysqli_real_connect() 	Opens a new connection to the MySQL server
/**/static function real_connect(

        $mysqli_handle,
        $host,
        $username,
        $passwd,
        $dbname,
        $port = NULL,
        $socket = NULL,
        $flags = NULL
        
    ) {

        /* debug output */
        if (NMCC_DEBUG == TRUE) {
            print "host: " . $host . NMCC_COMMA;
            print " username: " . $username . NMCC_COMMA;
            print " passwd: " . $passwd . NMCC_COMMA;
            print " dbname: " . $dbname . NMCC_COMMA;
            print " port: " . $port . NMCC_COMMA;
            print " socket: " . $socket . NMCC_COMMA;
            print " flags: " . $flags . NMCC_BR;
        }

        if ($port != NULL && filter_var($port, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE) === NULL) { 
            die(str_replace("%s", $port, ERROR_PORT_VALUE_MUST_BE_INTEGER));
        }
        
        /* create connection */
        if (!@mysqli_real_connect($mysqli_handle, $host, $username, $passwd, $dbname, $port, $socket, $flags)) {

            die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());

        }
        /* debug output */
        if (NMCC_DEBUG == TRUE) {
            print 'Success... ' . mysqli_get_host_info ($mysqli_handle) . NMCC_BR;
        }

        self::$persistent_connection = FALSE;

    }

    //mysqli_real_pconnect()   Opens a new persistent connection to the MySQL server
/**/static function real_pconnect( 

        $mysqli_handle,
        $host,
        $username,
        $passwd,
        $dbname,
        $port = NULL,
        $socket = NULL,
        $flags = NULL
        
    ) {

        /* debug output */
        if (NMCC_DEBUG == TRUE) {
            print "host: " . $host . NMCC_COMMA;
            print " username: " . $username . NMCC_COMMA;
            print " passwd: " . $passwd . NMCC_COMMA;
            print " dbname: " . $dbname . NMCC_COMMA;
            print " port: " . $port . NMCC_COMMA;
            print " socket: " . $socket . NMCC_COMMA;
            print " flags: " . $flags . NMCC_BR;
        }

        if ($port != NULL && filter_var($port, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE) === NULL) { 
            die(str_replace("%s", $port, ERROR_PORT_VALUE_MUST_BE_INTEGER));
        }
        
        /* create connection */
        if (!@mysqli_real_connect($mysqli_handle, "p:" . $host, $username, $passwd, $dbname, $port, $socket, $flags)) {

            die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());

        }
        /* debug output */
        if (NMCC_DEBUG == TRUE) {
            print 'Success... ' . mysqli_get_host_info ($mysqli_handle) . NMCC_BR;
        }

        self::$persistent_connection = TRUE;

    }

    //mysqli_real_escape_string() 	Escapes special characters in a string for use in an SQL statement
    static function real_escape_string(

        $mysqli_handle,
        $string

    ) {

        return mysqli_real_escape_string($mysqli_handle, trim($string));

    }

    //mysqli_real_query() 	Executes an SQL query
    static function real_query() {}

    //mysqli_reap_async_query() 	Returns the result from async query
    static function reap_async_query() {}

    //mysqli_refresh() 	Refreshes tables or caches, or resets the replication server information
    static function refresh() {}

    //mysqli_rollback() 	Rolls back the current transaction for the database
    static function rollback() {}

    //mysqli_select_db() 	Changes the default database for the connection
    static function select_db(

        $mysqli_handle,
        $db_name

    ) {

        return mysqli_select_db ($mysqli_handle , $db_name);


    }

    //mysqli_set_charset() 	Sets the default client character set
    static function set_charset(

        $mysqli_handle,
        $charset

    ) {

        /* change character set to $charset */
        if (!mysqli_set_charset ($mysqli_handle, $charset)) {
            print str_replace("%s", $charset, ERROR_ON_LOADING_CHARACTER_SET) . NMCC_BR;
            die(\NTRNX_MYSQLI\ntrnx_mysqli::error($mysqli_handle));
        }
        /* debug output */
        if (NMCC_DEBUG == TRUE) {
            print str_replace("%s", \NTRNX_MYSQLI\ntrnx_mysqli::character_set_name($mysqli_handle), NMCC_MSG_CURRENT_CHARACTER_SET) . NMCC_BR;
        }
    
    }

    //mysqli_set_local_infile_default() 	Unsets user defined handler for load local infile command
    static function set_local_infile_default() {}

    //mysqli_set_local_infile_handler() 	Set callback function for LOAD DATA LOCAL INFILE command
    static function set_local_infile_handler() {}

    //mysqli_sqlstate() 	Returns the SQLSTATE error code for the last MySQL operation
    static function sqlstate() {}

    //return ssl status for given connection
/**/static function ssl_get(

        $mysqli_handle

    ) { 

        $have_openssl = FALSE;
        $have_ssl = FALSE;
        $have_cipher = FALSE;
        $have_tls = FALSE;
        $have_key = FALSE;
        $have_cert = FALSE;
        $have_ca = FALSE;

        /* check have_openssl */
        $result_openssl = mysqli_query ($mysqli_handle, "SHOW SESSION VARIABLES LIKE 'have_openssl';");
        while ( $row = mysqli_fetch_array ($result_openssl) ) {
            if ($row['Value'] == 'YES') { $have_openssl = TRUE; }
        }
        mysqli_free_result($result_openssl);

        /* check have_ssl */
        $result_ssl = mysqli_query ($mysqli_handle, "SHOW SESSION VARIABLES LIKE 'have_ssl';");
        while ( $row = mysqli_fetch_array ($result_ssl) ) {
            if ($row['Value'] == 'YES') { $have_ssl = TRUE; }
        }
        mysqli_free_result($result_ssl);

        /* check Ssl_cipher */
        $result_ssl_cipher = mysqli_query ($mysqli_handle, "SHOW SESSION STATUS LIKE 'Ssl_cipher';");
        while ( $row = mysqli_fetch_array ($result_ssl_cipher) ) {
            if ($row['Value'] != '') { $have_cipher = TRUE; }
        }
        mysqli_free_result($result_ssl_cipher);

        /* check Ssl_version */
        $result_ssl_version = mysqli_query ($mysqli_handle, "SHOW SESSION STATUS LIKE 'Ssl_version';");
        while ( $row = mysqli_fetch_array ($result_ssl_version) ) {
            if ($row['Value'] != '') { $have_tls = TRUE; }
        }
        mysqli_free_result($result_ssl_version);

        /* check ssl_key */
        $result_ssl_key = mysqli_query ($mysqli_handle, "SHOW SESSION VARIABLES LIKE 'ssl_key';");
        while ( $row = mysqli_fetch_array ($result_ssl_key) ) {
            if ($row['Value'] != '') { $have_key = TRUE; }
        }
        mysqli_free_result($result_ssl_key);
        
        /* check ssl_cert */
        $result_ssl_cert = mysqli_query ($mysqli_handle, "SHOW SESSION VARIABLES LIKE 'ssl_cert';");
        while ( $row = mysqli_fetch_array ($result_ssl_cert) ) {
            if ($row['Value'] != '') { $have_cert = TRUE; }
        }
        mysqli_free_result($result_ssl_cert);
        
        /* check ssl_ca */
        $result_ssl_ca = mysqli_query ($mysqli_handle, "SHOW SESSION VARIABLES LIKE 'ssl_ca';");
        while ( $row = mysqli_fetch_array ($result_ssl_ca) ) {
            if ($row['Value'] != '') { $have_ca = TRUE; }
        }
        mysqli_free_result($result_ssl_ca);

        if ($have_openssl == TRUE &&
            $have_ssl == TRUE &&
            $have_cipher == TRUE &&
            $have_tls == TRUE &&
            $have_key == TRUE &&
            $have_cert == TRUE &&
            $have_ca == TRUE) {

            return TRUE;

        } else {

            return FALSE;

        }

    }

    //mysqli_ssl_set() 	Used to establish secure connections using SSL
/**/static function ssl_set(

        $mysqli_handle,
        $key,
        $cert,
        $ca,
        $capath = NULL,
        $cipher = NULL

    ) {        

        /* Specifies the path name to the key file */
        $key = htmlspecialchars($key);

        if(!filter_var( $key, FILTER_SANITIZE_STRING) ) { die('error on value for path name to the key file : ' . $key); }

        /* Specifies the path name to the certificate file */
        $cert = htmlspecialchars($cert);

        if(!filter_var( $cert, FILTER_SANITIZE_STRING) ) { die('error on value for path name to the certificate file : ' . $cert); }

        /* Specifies the path name to the certificate authority file */    
        if (isset($ca)) {
        
            $ca = htmlspecialchars($ca);

            if(!filter_var( $ca, FILTER_SANITIZE_STRING) ) { die('error on value for path name to the certificate authority file : ' . $ca); }

        }

        /* Specifies the pathname to a directory that contains trusted SSL CA certificates in PEM format */
        if (isset($capath)) {

            $capath = htmlspecialchars($capath);

            if(!filter_var( $capath, FILTER_SANITIZE_STRING) ) { die('error on value for directory that contains trusted SSL CA certificates : ' . $capathca); }

        }

        /* ??? */
        /* Specifies a list of allowable ciphers to use for SSL encryption */
        /*
            ECDHE-ECDSA-AES128-GCM-SHA256
            ECDHE-RSA-AES128-GCM-SHA256
            ECDHE-ECDSA-AES128-SHA
            ECDHE-RSA-AES128-SHA
            ECDHE-ECDSA-AES256-SHA
            ECDHE-RSA-AES256-SHA
            AES128-GCM-SHA256
            AES128-SHA
            DES-CBC3-SHA
            AES256-SHA
            DHE-RSA-AES128-SHA
            EDH-RSA-DES-CBC3-SHA
            DHE-RSA-AES256-SHA
        */
        if (isset($cipher)) { $cipher = htmlspecialchars($cipher); }

        mysqli_ssl_set($mysqli_handle, $key, $cert, $ca, $capath, $cipher);

    }

    //mysqli_stat() 	Returns the current system status
    static function stat() {}

    //mysqli_stmt_init() 	Initializes a statement and returns an object for use with mysqli_stmt_prepare()
    static function stmt_init() {}

    //mysqli_store_result() 	Transfers a result set from the last query
    static function store_result() {}

    //mysqli_thread_id() 	Returns the thread ID for the current connection
    static function thread_id() {}

    //mysqli_thread_safe() 	Returns whether the client library is compiled as thread-safe
    static function thread_safe() {}

    //mysqli_use_result() 	Initiates the retrieval of a result set from the last query executed using the mysqli_real_query()
    static function use_result() {}

    //mysqli_warning_count() 	Returns the number of warnings from the last query in the connection
    static function warning_count() {}

} /* end of class ntrnx_mysqli */

?>