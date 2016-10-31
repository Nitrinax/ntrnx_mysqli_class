<?php

namespace NTRNX_MYSQLI;

/* define shorthand directory separator constant */
if (!defined('DS')) { define('DS', DIRECTORY_SEPARATOR); }
if (!defined('PS')) { define('PS', PATH_SEPARATOR); }

/* set error messages */
if (!defined('ERROR_DIRECTORY_DOES_NOT_EXISTS')) { define('ERROR_DIRECTORY_DOES_NOT_EXISTS', 'directory "%d" does not exist<br/>'); }
if (!defined('ERROR_FILE_DOES_NOT_EXISTS')) { define('ERROR_FILE_DOES_NOT_EXISTS', 'file "%s" does not exist<br/>'); }

/* set DIR to absolute path to library files */
if (!defined('CLASS_NTRNX_MYSQLI_DIR')) { define('CLASS_NTRNX_MYSQLI_DIR', dirname(__FILE__) . DS); }

/* define dir for sysplugins */
if (!defined('CLASS_NTRNX_MYSQLI_SYSPLUGINS_DIR')) { define('CLASS_NTRNX_MYSQLI_SYSPLUGINS_DIR', CLASS_NTRNX_MYSQLI_DIR . 'sysplugins' . DS); }
if (!is_dir(CLASS_NTRNX_MYSQLI_SYSPLUGINS_DIR)) { die(str_replace('%d', CLASS_NTRNX_MYSQLI_SYSPLUGINS_DIR, ERROR_DIRECTORY_DOES_NOT_EXISTS)); }

/* define dir for class config */
if (!defined('CLASS_NTRNX_MYSQLI_CONFIG_DIR')) { define('CLASS_NTRNX_MYSQLI_CONFIG_DIR', CLASS_NTRNX_MYSQLI_DIR . 'configs' . DS); }
if (!is_dir(CLASS_NTRNX_MYSQLI_CONFIG_DIR)) { die(str_replace('%d', CLASS_NTRNX_MYSQLI_CONFIG_DIR, ERROR_DIRECTORY_DOES_NOT_EXISTS)); }

/* check and load config and subclasses */
if (!defined('CLASS_NTRNX_MYSQLI_CONFIG_FILE')) { define('CLASS_NTRNX_MYSQLI_CONFIG_FILE', CLASS_NTRNX_MYSQLI_CONFIG_DIR . 'ntrnx_mysqli_config.php'); }
if (!file_exists(CLASS_NTRNX_MYSQLI_CONFIG_FILE)) { die(str_replace('%s', CLASS_NTRNX_MYSQLI_CONFIG_FILE, ERROR_FILE_DOES_NOT_EXISTS)); } else { require_once CLASS_NTRNX_MYSQLI_CONFIG_FILE; }

if (!defined('CLASS_NTRNX_MYSQLI_CORE_DATA')) { define('CLASS_NTRNX_MYSQLI_CORE_DATA', CLASS_NTRNX_MYSQLI_SYSPLUGINS_DIR . 'ntrnx_mysqli_core_data.php'); }
if (!file_exists(CLASS_NTRNX_MYSQLI_CORE_DATA)) { die(str_replace('%s', CLASS_NTRNX_MYSQLI_CORE_DATA, ERROR_FILE_DOES_NOT_EXISTS)); } else { require_once CLASS_NTRNX_MYSQLI_CORE_DATA; }

if (!defined('CLASS_NTRNX_MYSQLI_CORE_BASE')) { define('CLASS_NTRNX_MYSQLI_CORE_BASE', CLASS_NTRNX_MYSQLI_SYSPLUGINS_DIR . 'ntrnx_mysqli_core_base.php'); }
if (!file_exists(CLASS_NTRNX_MYSQLI_CORE_BASE)) { die(str_replace('%s', CLASS_NTRNX_MYSQLI_CORE_BASE, ERROR_FILE_DOES_NOT_EXISTS)); } else { require_once CLASS_NTRNX_MYSQLI_CORE_BASE; }

if (!defined('CLASS_NTRNX_MYSQLI_CORE')) { define('CLASS_NTRNX_MYSQLI_CORE', CLASS_NTRNX_MYSQLI_SYSPLUGINS_DIR . 'ntrnx_mysqli_core.php'); }
if (!file_exists(CLASS_NTRNX_MYSQLI_CORE)) { die(str_replace('%s', CLASS_NTRNX_MYSQLI_CORE, ERROR_FILE_DOES_NOT_EXISTS)); } else { require_once CLASS_NTRNX_MYSQLI_CORE; }

/* begin of class ntrnx_mysqli */
class ntrnx_mysqli extends \NTRNX_MYSQLI\ntrnx_mysqli_core {

    /*
    const DB_HOST = \NTRNX_MYSQLI\ntrnx_mysqli_config::DB_HOST;
    const DB_USER = \NTRNX_MYSQLI\ntrnx_mysqli_config::DB_USER;
    const DB_PASS = \NTRNX_MYSQLI\ntrnx_mysqli_config::DB_PASS;
    const DB_NAME = \NTRNX_MYSQLI\ntrnx_mysqli_config::DB_NAME;
    const DB_PORT = \NTRNX_MYSQLI\ntrnx_mysqli_config::DB_PORT;
    const DB_SOCKET = \NTRNX_MYSQLI\ntrnx_mysqli_config::DB_SOCKET;
    const DB_PID = \NTRNX_MYSQLI\ntrnx_mysqli_config::DB_PID;

    const DB_LOGIN_HOST = \NTRNX_MYSQLI\ntrnx_mysqli_config::DB_LOGIN_HOST;
    const DB_LOGIN_USER = \NTRNX_MYSQLI\ntrnx_mysqli_config::DB_LOGIN_USER;
    const DB_LOGIN_PASS = \NTRNX_MYSQLI\ntrnx_mysqli_config::DB_LOGIN_PASS;
    const DB_LOGIN_NAME = \NTRNX_MYSQLI\ntrnx_mysqli_config::DB_LOGIN_NAME;
    const DB_LOGIN_PORT = \NTRNX_MYSQLI\ntrnx_mysqli_config::DB_LOGIN_PORT;
    const DB_LOGIN_SOCKET = \NTRNX_MYSQLI\ntrnx_mysqli_config::DB_LOGIN_SOCKET;
    const DB_LOGIN_PID = \NTRNX_MYSQLI\ntrnx_mysqli_config::DB_LOGIN_PID; 
    */

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

        $row_cnt = $mysqli_handle->affected_rows;

        //printf("affected %d rows.<br />", $row_cnt);

        return $row_cnt;

    }

//mysqli_affected_fields() {}
    static function affected_fields() {}

//mysqli_affected_tables() {}
    static function affected_tables() {}

//mysqli_autocommit() 	Turns on or off auto-committing database modifications
    static function autocommit() {}


    static function begin_transaction() {}

//mysqli_change_user() 	Changes the user of the specified database connection
    static function change_user() {}

//mysqli_character_set_name() 	Returns the default character set for the database connection
    static function character_set_name() {}

    static function client_info() {}

    static function client_version() {}

//mysqli_close() 	Closes a previously opened database connection
/**/static function close(

        $mysqli_handle

    ) {

        $mysqli_handle->close();

    }

//mysqli_commit() 	Commits the current transaction
    static function commit() {}

//mysqli_connect_errno() 	Returns the error code from the last connection error
    static function connect_errno() {}

//mysqli_connect_error() 	Returns the error description from the last connection error
    static function connect_error() {}

//mysqli_connect() 	Opens a new connection to the MySQL server
    static function connect() {}

//mysqli_pconnect()   Opens a new persistent connection to the MySQL server
    static function pconnect() {}

    static function current_field() {}

//mysqli_data_seek() 	Adjusts the result pointer to an arbitrary row in the result-set
    static function data_seek() {}

//mysqli_debug() 	Performs debugging operations
    static function debug() {}

//mysqli_dump_debug_info() 	Dumps debugging info into the log
    static function dump_debug_info() {}

//mysqli_errno() 	Returns the last error code for the most recent function call
    static function errno() {}

//mysqli_error_list() 	Returns a list of errors for the most recent function call
    static function error_list() {}

//mysqli_error() 	Returns the last error description for the most recent function call
    static function error() {}

//mysqli_fetch_all() 	Fetches all result rows as an associative array, a numeric array, or both
    static function fetch_all() {}

//mysqli_fetch_array() 	Fetches a result row as an associative, a numeric array, or both
    static function fetch_array() {}

//mysqli_fetch_assoc() 	Fetches a result row as an associative array
    static function fetch_assoc() {}

//mysqli_fetch_field_direct() 	Returns meta-data for a single field in the result set, as an object
    static function fetch_field_direct() {}

//mysqli_fetch_field() 	Returns the next field in the result set, as an object
    static function fetch_field() {}

//mysqli_fetch_fields() 	Returns an array of objects that represent the fields in a result set
    static function fetch_fields() {}

//mysqli_fetch_lengths() 	Returns the lengths of the columns of the current row in the result set
    static function fetch_lengths() {}

//mysqli_fetch_object() 	Returns the current row of a result set, as an object
    static function fetch_object() {}

//mysqli_fetch_row() 	Fetches one row from a result-set and returns it as an enumerated array
    static function fetch_row() {}

//mysqli_field_count() 	Returns the number of columns for the most recent query
    static function field_count() {}

//mysqli_field_seek() 	Sets the field cursor to the given field offset
    static function field_seek() {}

//mysqli_field_tell() 	Returns the position of the field cursor
    static function field_tell() {}

//mysqli_free_result() 	Frees the memory associated with a result
    static function free_result() {}

//mysqli_get_charset() 	Returns a character set object
    static function get_charset() {}

//mysqli_get_client_info() 	Returns the MySQL client library version
    static function get_client_info() {}

//mysqli_get_client_stats() 	Returns statistics about client per-process
    static function get_client_stats() {}

//mysqli_get_client_version() 	Returns the MySQL client library version as an integer
    static function get_client_version() {}

//mysqli_get_connection_stats() 	Returns statistics about the client connection
    static function get_connection_stats() {}

//mysqli_get_host_info() 	Returns the MySQL server hostname and the connection type
    static function get_host_info() {}

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
    
        $mysqli_handle

    ) {

        $mysqli_handle = mysqli_init();

        if (!$mysqli_handle) {

            die('mysqli_init failed');

        } else {

            //print 'mysqli_init successfully';

            return $mysqli_handle;

        }       

    }

//mysqli_insert_id() 	Returns the auto-generated id used in the last query
    static function insert_id() {}

//mysqli_kill() 	Asks the server to kill a MySQL thread
    static function kill() {}

    static function lengths() {}

//mysqli_more_results() 	Checks if there are more results from a multi query
    static function more_results() {}

//mysqli_multi_query() 	Performs one or more queries on the database
    static function multi_query() {}

//mysqli_next_result() 	Prepares the next result set from mysqli_multi_query()
    static function next_result() {}

//mysqli_num_fields() 	Returns the number of fields in a result set
    static function num_fields() {}

//mysqli_num_rows() 	Returns the number of rows in a result set
    static function num_rows(
        
        $result
        
    ) {

        $row_cnt = $result->num_rows;

        //printf("num %d rows.<br />", $row_cnt);

        return $row_cnt;

    }

//mysqli_options() 	Sets extra connect options and affect behavior for a connection
/**/static function options(

        $mysqli_handle,
        $connect_timeout = NULL,
        $local_infile = NULL,
        $init_command = NULL,
        $read_default_file = NULL,
        $read_default_group = NULL,
        $server_public_key = NULL,
        $net_cmd_buffer_size = NULL,
        $net_read_buffer_size = NULL,
        $int_and_float_native = NULL,
        $ssl_verify_server_cert = NULL

    ) {

        if (!$mysqli_handle) {
            die('no mysqli link');
        }

        /* (argument type: unsigned int *) - connection timeout in seconds (supported on Windows with TCP/IP since PHP 5.3.1)  */
        if (isset($connect_timeout)) {
            $connect_timeout = htmlspecialchars($connect_timeout);
            if(!filter_var( $connect_timeout, FILTER_VALIDATE_INT) ) { die('error on value for MYSQLI_OPT_CONNECT_TIMEOUT : ' . $connect_timeout); }
            if (!mysqli_options($mysqli_handle, MYSQLI_OPT_CONNECT_TIMEOUT, $connect_timeout)) { die('Setting MYSQLI_OPT_CONNECT_TIMEOUT failed'); }
        }

        /* (argument type: optional pointer to unsigned int) - enable/disable use of LOAD LOCAL INFILE */
        if (isset($local_infile)) {
            $local_infile = htmlspecialchars($local_infile);
            if(!filter_var( $local_infile, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ) { die('error on value for MYSQLI_OPT_LOCAL_INFILE : ' . $local_infile); }
            if (!mysqli_options($mysqli_handle, MYSQLI_OPT_LOCAL_INFILE, $local_infile)) { die('Setting MYSQLI_OPT_LOCAL_INFILE failed'); }
        }

        /* (argument type: char *) - command to execute after when connecting to MySQL server */
        if (isset($init_command)) { 
            //$init_command = htmlspecialchars($init_command);
            if(!filter_var( $init_command, FILTER_SANITIZE_STRING) ) { die('error on value for MYSQLI_INIT_COMMAND : ' . $init_command); }
            if (!mysqli_options($mysqli_handle, MYSQLI_INIT_COMMAND, $init_command)) { die('Setting MYSQLI_INIT_COMMAND failed'); }  
        }

        /* (argument type: char *) - Read options from named option file instead of my.cnf */
        if (isset($read_default_file)) {
            $read_default_file = htmlspecialchars($read_default_file);
            if(!filter_var( $read_default_file, FILTER_SANITIZE_STRING) ) { die('error on value for MYSQLI_READ_DEFAULT_FILE : ' . $read_default_file); }
            if (!mysqli_options($mysqli_handle, MYSQLI_READ_DEFAULT_FILE, $read_default_file)) { die('Setting MYSQLI_READ_DEFAULT_FILE failed'); }   
        }

        /* (argument type: char *) - Read options from the named group from my.cnf or the file specified with MYSQL_READ_DEFAULT_FILE. */
        if (isset($read_default_group)) {
            $read_default_group = htmlspecialchars($read_default_group);
            if(!filter_var( $read_default_group, FILTER_SANITIZE_STRING) ) { die('error on value for MYSQLI_READ_DEFAULT_GROUP : ' . $read_default_group); }
            if (!mysqli_options($mysqli_handle, MYSQLI_READ_DEFAULT_GROUP, $read_default_group)) { die('Setting MYSQLI_READ_DEFAULT_GROUP failed'); }   
        }

        /* (argument type: char *) - RSA public key file used with the SHA-256 based authentication. */
        if (isset($server_public_key)) {
            $server_public_key = htmlspecialchars($server_public_key);
            if(!filter_var( $server_public_key, FILTER_SANITIZE_STRING) ) { die('error on value for MYSQLI_SERVER_PUBLIC_KEY : ' . $server_public_key); }
            if (!mysqli_options($mysqli_handle, MYSQLI_SERVER_PUBLIC_KEY, $server_public_key)) { die('Setting MYSQLI_SERVER_PUBLIC_KEY failed'); } 
        }

        /* The size of the internal command/network buffer. Only valid for mysqlnd. */
        if (isset($net_cmd_buffer_size)) {
            $net_cmd_buffer_size = htmlspecialchars($net_cmd_buffer_size);
            if(!filter_var( $net_cmd_buffer_size, FILTER_VALIDATE_INT) ) { die('error on value for MYSQLI_OPT_NET_CMD_BUFFER_SIZE : ' . $net_cmd_buffer_size); }
            if (!mysqli_options($mysqli_handle, MYSQLI_OPT_NET_CMD_BUFFER_SIZE, $net_cmd_buffer_size)) { die('Setting MYSQLI_OPT_NET_CMD_BUFFER_SIZE failed'); }
        }

        /* Maximum read chunk size in bytes when reading the body of a MySQL command packet. Only valid for mysqlnd. */
        if (isset($net_read_buffer_size)) {
            $net_read_buffer_size = htmlspecialchars($net_read_buffer_size);
            if(!filter_var( $net_read_buffer_size, FILTER_VALIDATE_INT) ) { die('error on value for MYSQLI_OPT_NET_READ_BUFFER_SIZE : ' . $net_read_buffer_size); }
            if (!mysqli_options($mysqli_handle, MYSQLI_OPT_NET_READ_BUFFER_SIZE, $net_read_buffer_size)) { die('Setting MYSQLI_OPT_NET_READ_BUFFER_SIZE failed'); }
        }

        /* Convert integer and float columns back to PHP numbers. Only valid for mysqlnd. */
        if (isset($int_and_float_native)) {
            $int_and_float_nativehost = htmlspecialchars($int_and_float_native);            
            if(!filter_var( $int_and_float_nativehost, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ) { die('error on value for MYSQLI_OPT_INT_AND_FLOAT_NATIVE : ' . $int_and_float_nativehost); }
            if (!mysqli_options($mysqli_handle, MYSQLI_OPT_INT_AND_FLOAT_NATIVE, $int_and_float_nativehost)) { die('Setting MYSQLI_OPT_INT_AND_FLOAT_NATIVE failed'); }
        }

        /* (argument type: my_bool *) - Enable or disable verification of the server's Common Name value in its certificate against the host name used when connecting to the server. */
        if (isset($ssl_verify_server_cert)) {
            $ssl_verify_server_cert = htmlspecialchars($ssl_verify_server_cert);
            if(!filter_var( $ssl_verify_server_cert, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ) { die('error on value for MYSQLI_OPT_SSL_VERIFY_SERVER_CERT : ' . $ssl_verify_server_cert); }
            if (!mysqli_options($mysqli_handle, MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, $ssl_verify_server_cert)) { die('Setting MYSQLI_OPT_SSL_VERIFY_SERVER_CERT failed'); }
        }

        return $mysqli_handle;

    }

//mysqli_ping() 	Pings a server connection, or tries to reconnect if the connection has gone down
    static function ping() {}

//mysqli_prepare() 	Prepares an SQL statement for execution
    static function prepare() {}

//mysqli_query() 	Performs a query against the database
/**/static function select_raw(

        $mysqli_handle,

        /* http://dev.mysql.com/doc/refman/5.7/en/select.html */

        /* select_expr [, select_expr ...] */
        $select_expression,
        /* [FROM table_references */
        $table_reference,
        /* [WHERE where_condition] */
        $where_condition = NULL,
        /* [GROUP BY {col_name | expr | position} [ASC | DESC], ... [WITH ROLLUP]] */
        $order_condition = NULL,
        /* [LIMIT {[offset,] row_count | row_count OFFSET offset}] */  
        $group_condition = NULL,
        /* [ORDER BY {col_name | expr | position} [ASC | DESC], ...] */
        $limit = NULL

    ) {

        /* prepare statement */
        $select_statement = "SELECT " . $select_expression;
        $from_statement = " FROM " . $table_reference;
        if ($where_condition) { $where_statement .= " WHERE " . $where_condition; }
        if ($order_condition) { $order_statement .= " ORDER BY " . $order_condition; }
        if ($group_condition) { $group_statement .= " GROUP BY " . $group_condition; }
        if ($limit) { $limit_statement .= " LIMIT " . $limit; }

        $statement = $select_statement
        . $from_statement
        . $where_statement;
        if ($group_condition) { $statement .= $group_statement; }
        if ($order_condition) { $statement .= $order_statement; }
        if ($limit) { $statement .= $limit_statement; }  

        //print 'select_raw = ' . $statement . '<br />';
    
        if ($mysqli_handle) {

            /* Select queries return a result set */
            if ($result = $mysqli_handle->query($statement)) {

                //printf("Select returned %d rows.<br />", $result->num_rows);
                if ($result->num_rows > 0) { $data = $result; } else { $data = FALSE; } 

            } else {

                print $mysqli_handle->error . '<br />';
                print $statement . '<br />';

                $data = FALSE;

            }

            return $data;

        }

        }

//mysqli_query() 	Performs a query against the database
/**/static function select(

        $mysqli_handle,

        /* http://dev.mysql.com/doc/refman/5.7/en/select.html */

        /* select_expr [, select_expr ...] */
        $select_expression,
        /* [FROM table_references */
        $table_reference,
        /* [WHERE where_condition] */
        $where_condition = NULL,
        /* [GROUP BY {col_name | expr | position} [ASC | DESC], ... [WITH ROLLUP]] */
        $order_condition = NULL,
        /* [LIMIT {[offset,] row_count | row_count OFFSET offset}] */  
        $group_condition = NULL,
        /* [ORDER BY {col_name | expr | position} [ASC | DESC], ...] */
        $limit = NULL

    ) {

        /* prepare select_statement */
        $select_statement = "SELECT ";        
        $count = count($select_expression);
        for ($i = 0; $i < $count; $i++) {
            $select_statement .= PRJ_CONST_SQLIQ . $select_expression[$i] . PRJ_CONST_SQLIQ;
            if ($i < $count - 1) { $select_statement .= ", "; }
        }
        //print $select_statement . '<br />';

        /* set db and table name */
        //$db_name = $table_reference[0];
        $table_name = $table_reference[0];  

        $from_statement .= " FROM " . PRJ_CONST_SQLIQ . \NTRNX_MYSQLI\ntrnx_mysqli::DB_LOGIN_NAME . PRJ_CONST_SQLIQ . "." . PRJ_CONST_SQLIQ . $table_name . PRJ_CONST_SQLIQ;
        //print $from_statement . '<br />';

        /* prepare where_statement */
        if ($where_condition) {

            $where_statement .= " WHERE ";

            $count = count($where_condition);
            for ($i = 0; $i < $count; $i++) {

                if ($where_condition[$i]=='NOT') {

                    //$where_statement .= " NOT " . PRJ_CONST_SQLIQ . $where_condition[$i+1] . PRJ_CONST_SQLIQ;
                    //$where_statement .= " NOT " . PRJ_CONST_SQLIQ . mysqli_real_escape_string($mysqli_handle, trim($where_condition[$i+1])) . PRJ_CONST_SQLIQ;
                    $where_statement .= " NOT " . PRJ_CONST_SQLIQ . \NTRNX_MYSQLI\ntrnx_mysqli::real_escape_string($mysqli_handle, $where_condition[$i+1]) . PRJ_CONST_SQLIQ;

                    /* NULL, =, LIKE, */
                    if ($where_condition[$i+2]==NULL) { $where_statement .= '='; } else { $where_statement .= $where_condition[$i+2]; }
                    
                    //$where_statement .= PRJ_CONST_SQLVQ . $where_condition[$i+3] . PRJ_CONST_SQLVQ;
                    //$where_statement .= PRJ_CONST_SQLVQ . mysqli_real_escape_string($mysqli_handle, trim($where_condition[$i+3])) . PRJ_CONST_SQLVQ;
                    $where_statement .= PRJ_CONST_SQLVQ . \NTRNX_MYSQLI\ntrnx_mysqli::real_escape_string($mysqli_handle, $where_condition[$i+3]) . PRJ_CONST_SQLVQ;

                    //$where_statement .= " " . $where_condition[$i+4] . " ";
                    //$where_statement .= " " . mysqli_real_escape_string($mysqli_handle, trim($where_condition[$i+4])) . " ";
                    $where_statement .= " " . \NTRNX_MYSQLI\ntrnx_mysqli::real_escape_string($mysqli_handle, $where_condition[$i+4]) . " ";

                    $i=$i+4;

                } else {

                    $where_statement .= PRJ_CONST_SQLIQ . $where_condition[$i] . PRJ_CONST_SQLIQ;

                    /* NULL, =, LIKE, */
                    if ($where_condition[$i+1] != 'LIKE') {

                        $where_statement .= ' = ';

                        //$where_statement .= PRJ_CONST_SQLVQ . $where_condition[$i+2] . PRJ_CONST_SQLVQ;
                        //$where_statement .= PRJ_CONST_SQLVQ . mysqli_real_escape_string($mysqli_handle, trim($where_condition[$i+2])) . PRJ_CONST_SQLVQ;
                        $where_statement .= PRJ_CONST_SQLVQ . \NTRNX_MYSQLI\ntrnx_mysqli::real_escape_string($mysqli_handle, $where_condition[$i+2]) . PRJ_CONST_SQLVQ;

                    } else { 

                        //$where_statement .= " " . $where_condition[$i+1] . " ";
                        //$where_statement .= " " . mysqli_real_escape_string($mysqli_handle, trim($where_condition[$i+1])) . " ";
                        $where_statement .= " " . \NTRNX_MYSQLI\ntrnx_mysqli::real_escape_string($mysqli_handle, $where_condition[$i+1]) . " ";

                        //$where_statement .= PRJ_CONST_SQLVQ . "%" . $where_condition[$i+2] . "%" . PRJ_CONST_SQLVQ;
                        //$where_statement .= PRJ_CONST_SQLVQ . "%" . mysqli_real_escape_string($mysqli_handle, trim($where_condition[$i+2])) . "%" . PRJ_CONST_SQLVQ;
                        $where_statement .= PRJ_CONST_SQLVQ . "%" . \NTRNX_MYSQLI\ntrnx_mysqli::real_escape_string($mysqli_handle, $where_condition[$i+2]) . "%" . PRJ_CONST_SQLVQ;
                    
                    }

                    /* AND, OR, NOT */
                    if ($where_condition[$i+3]=='AND' || $where_condition[$i+3]=='OR') {

                        //$where_statement .= " " . $where_condition[$i+3] . " ";
                        //$where_statement .= " " . mysqli_real_escape_string($mysqli_handle, trim($where_condition[$i+3])) . " ";
                        $where_statement .= " " . \NTRNX_MYSQLI\ntrnx_mysqli::real_escape_string($mysqli_handle, $where_condition[$i+3]) . " ";

                        $i=$i+3;

                    } else {

                        $i=$i+2;

                    }

                }

            }

        }
        //print $where_statement . '<br />';

        /* prepare order_statement */
        if ($order_condition) {
            $order_statement .= " ORDER BY ";

            $count = count($order_condition);
            for ($i = 0; $i < $count; $i++) {
                $order_statement .= PRJ_CONST_SQLIQ . $order_condition[$i] . PRJ_CONST_SQLIQ;
                if ($order_condition[$i+1] != NULL) { $order_statement .= " " . $order_condition[$i]; } else { $order_statement .= " ASC"; }
                $i=$i+1;
                if ($i < $count - 1) { $order_statement .= ", "; }
            }
        }
        //print $order_statement . '<br />';

        /* prepare group_statement  */
        if ($group_condition) {

            $group_statement .= " GROUP BY ";

            $count = count($group_condition);
            for ($i = 0; $i < $count; $i++) {
                $group_statement .= PRJ_CONST_SQLIQ . $group_condition[$i] . PRJ_CONST_SQLIQ;
                if ($group_condition[$i+1] != NULL) { $group_statement .= " " . $group_condition[$i]; } else { $group_statement .= " ASC"; }
                $i=$i+1;
                if ($i < $count - 1) { $group_statement .= ", "; }
            }
        }
        //print $group_statement . '<br />';

        /* prepare limit_statement */
        if ($limit) { $limit_statement .= " LIMIT " . $limit; }
        //print $limit_statement . '<br />';

        /* prepare complete statement */
        $statement = $select_statement
        . $from_statement
        . $where_statement;
        if ($group_condition) { $statement .= $group_statement; }
        if ($order_condition) { $statement .= $order_statement; }
        if ($limit) { $statement .= $limit_statement; }
        //print 'select = ' . $statement . '<br />';   

        if ($mysqli_handle) {

            /* Select queries return a result set */
            if ($result = $mysqli_handle->query($statement)) {

                //printf("Select returned %d rows.<br />", $result->num_rows);
                if (\NTRNX_MYSQLI\ntrnx_mysqli::num_rows($result) > 0) { $data = $result; } else { $data = FALSE; } 

            } else {

                print $mysqli_handle->error . '<br />';
                print $statement . '<br />';

                $data = FALSE;

            }

            return $data;

        } else {

            print 'no db_handle' . '<br />';
            print $statement . '<br />';

        }

    }

//mysqli_query() 	Performs a query against the database
    static function insert(

        $mysqli_handle,

        /* http://dev.mysql.com/doc/refman/5.7/en/insert.html */

        //INSERT INTO `epc`.`articles` (`article_id`, `article_name`, `article_desciption`, `manufacturer_id`) VALUES ('1', 'name', 'description', 'manufacturer');
        //INSERT INTO `epc_login`.`accounts` (`account_id`, `name`, `created`, `updated`) VALUES ('86f2cc71-7007-43b3-8f26-94eacc8014ff', 'test', '2016-10-30 09:30:26', '2016-10-30 09:30:26')

        /* [INTO] db_name, tbl_name */
        $table_target,

        /* [(col_name,...)] */
        $column_target,

        /* {VALUES | VALUE} ({expr | DEFAULT},...),(...),... */
        $values

    ) {

        $count_columns = count($column_target);
        $count_values = count($values);

        if ($count_columns == $count_values) {

            /* set db and table name */
            //$db_name = $table_target[0];
            $table_name = $table_target[0];

            $table_statement = "INSERT INTO " . PRJ_CONST_SQLIQ . \NTRNX_MYSQLI\ntrnx_mysqli::DB_LOGIN_NAME . PRJ_CONST_SQLIQ . "." . PRJ_CONST_SQLIQ . $table_name . PRJ_CONST_SQLIQ;

            $column_statement = " " . PRJ_CONST_PARENTHESIS_OPEN;
            for ($i = 0; $i < $count_columns; $i++) {
                $column_statement .= PRJ_CONST_SQLIQ . $column_target[$i] . PRJ_CONST_SQLIQ;
                if ($i < $count_columns - 1) { $column_statement .= ", "; }
            }
            $column_statement .= PRJ_CONST_PARENTHESIS_CLOSE;

            $value_statement = " VALUES " . PRJ_CONST_PARENTHESIS_OPEN;
            for ($i = 0; $i < $count_values; $i++) {

                //$value_statement .= PRJ_CONST_SQLVQ . $values[$i] . PRJ_CONST_SQLVQ;
                //$value_statement .= PRJ_CONST_SQLVQ . mysqli_real_escape_string($mysqli_handle, trim($values[$i])) . PRJ_CONST_SQLVQ;
                $value_statement .= PRJ_CONST_SQLVQ . \NTRNX_MYSQLI\ntrnx_mysqli::real_escape_string($mysqli_handle, $values[$i]) . PRJ_CONST_SQLVQ;

                if ($i < $count_values - 1) { $value_statement .= ", "; }
            }
            $value_statement .= PRJ_CONST_PARENTHESIS_CLOSE;

            $statement = $table_statement . $column_statement . $value_statement;

            print 'query_insert = ' . $statement . '<br />';

            if ($mysqli_handle) {

                /* Select queries return a result set */
                if ($result = $mysqli_handle->query($statement)) {

                    //printf("Insert returned %d rows.<br />", $result->$affected_rows);
                    if (\NTRNX_MYSQLI\ntrnx_mysqli::affected_rows($mysqli_handle) > 0) { $data = $result; } else { $data = FALSE; } 

                } else {
                    
                    print $mysqli_handle->error . '<br />';
                    print $statement . '<br />';

                    $data = FALSE;

                }

                return $data;

            }

        } else {

            print 'table_target length and column_target length dont match' . '<br />';

        }

    }

//mysqli_query() 	Performs a query against the database
    static function update(

        $mysqli_handle,

        /* http://dev.mysql.com/doc/refman/5.7/en/update.html */

        /* UPDATE [LOW_PRIORITY] [IGNORE] table_reference */
        $table_reference,

        /* SET col_name1={expr1|DEFAULT} [, col_name2={expr2|DEFAULT}] ... */
        $set_expression,

        /* [WHERE where_condition] */
        $where_condition

    ) {

        if (is_array($table_reference)) { } else { }
        if (is_array($set_expression)) { } else { }
        if (is_array($where_condition)) { } else { }

        print 'query_update = ' . '<br />';

    }

//mysqli_query() 	Performs a query against the database
    static function delete(

        $mysqli_handle,

        /* http://dev.mysql.com/doc/refman/5.7/en/delete.html */

        /* DELETE [LOW_PRIORITY] [QUICK] [IGNORE] FROM tbl_name */
        $tbl_name,

        /* [WHERE where_condition] */
        $where_condition

    ) {

        if (is_array($tbl_name)) { } else { }
        if (is_array($where_condition)) { } else { }

        print 'query_delete = ' . '<br />';

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

        //print $host . '<br />';
        //print $username . '<br />';
        //print $passwd . '<br />';
        //print $dbname . '<br />';

        /* convert input vars */
        if (isset($host)) { $host = htmlspecialchars($host); }
        if (isset($username)) { $username = htmlspecialchars($username); }
        if (isset($passwd)) { $passwd = htmlspecialchars($passwd); }
        if (isset($dbname)) { $dbname = htmlspecialchars($dbname); }
        if (isset($port)) { $port = htmlspecialchars($port); }
        if (isset($socket)) { $socket = htmlspecialchars($socket); }
        if (isset($flags)) { $flags = htmlspecialchars($flags); }
        
        /* create connection */
        if (!$result = @mysqli_real_connect($mysqli_handle, $host, $username, $passwd, $dbname, $port, $socket, $flags)) {
            die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
        }
        // print 'Success... ' . $mysqli_handle->host_info . '<br />';

        return $result;

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

        /* convert input vars */
        if (isset($host)) { $host = htmlspecialchars($host); }
        if (isset($username)) { $username = htmlspecialchars($username); }
        if (isset($passwd)) { $passwd = htmlspecialchars($passwd); }
        if (isset($dbname)) { $dbname = htmlspecialchars($dbname); }
        if (isset($port)) { $port = htmlspecialchars($port); }
        if (isset($socket)) { $socket = htmlspecialchars($socket); }
        if (isset($flags)) { $flags = htmlspecialchars($flags); }

        /* create connection */
        /* create connection */
        if (!@mysqli_real_connect($mysqli_handle, "p:" . $host, $username, $passwd, $dbname, $port, $socket, $flags)) {
            die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
        }
        //print 'Success... ' . $mysqli_handle->host_info . '<br />';

        return $mysqli_handle;

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
    static function select_db() {}

//mysqli_set_charset() 	Sets the default client character set
    static function set_charset(

        $charset

    ) {
  
        /* change character set to $charset */
        if (!$mysqli_handle->set_charset($charset)) {
            printf("Error loading character set utf8: %s", $mysqli_handle->error) . '<br />';;
            exit();
        } else {
            printf("Current character set: %s", $mysqli_handle->character_set_name()) . '<br />';;
        }  
    
    }

//mysqli_set_local_infile_default() 	Unsets user defined handler for load local infile command
    static function set_local_infile_default() {}

//mysqli_set_local_infile_handler() 	Set callback function for LOAD DATA LOCAL INFILE command
    static function set_local_infile_handler() {}

//mysqli_sqlstate() 	Returns the SQLSTATE error code for the last MySQL operation
    static function sqlstate() {}

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
      
        $ca = htmlspecialchars($ca);
        if(!filter_var( $ca, FILTER_SANITIZE_STRING) ) { die('error on value for path name to the certificate authority file : ' . $ca); }

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