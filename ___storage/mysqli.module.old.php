<?php

namespace Projectname\core\modules;

/*
* plugin_mysqli.class.php
*
* functions:
* - 
*
* VERSION:
*
* 1.0.0 - 16.08.2016
*
*/

/*
//mysqli_affected_rows() 	Returns the number of affected rows in the previous MySQL operation
//mysqli_affected_fields() {}
//mysqli_affected_tables() {}
//mysqli_autocommit() 	Turns on or off auto-committing database modifications
//mysqli_change_user() 	Changes the user of the specified database connection
//mysqli_character_set_name() 	Returns the default character set for the database connection

//mysqli_close() 	Closes a previously opened database connection

//mysqli_commit() 	Commits the current transaction
//mysqli_connect_errno() 	Returns the error code from the last connection error
//mysqli_connect_error() 	Returns the error description from the last connection error

//mysqli_connect() 	Opens a new connection to the MySQL server
//mysqli_pconnect()   Opens a new persistent connection to the MySQL server

//mysqli_data_seek() 	Adjusts the result pointer to an arbitrary row in the result-set
//mysqli_debug() 	Performs debugging operations
//mysqli_dump_debug_info() 	Dumps debugging info into the log
//mysqli_errno() 	Returns the last error code for the most recent function call
//mysqli_error_list() 	Returns a list of errors for the most recent function call
//mysqli_error() 	Returns the last error description for the most recent function call
//mysqli_fetch_all() 	Fetches all result rows as an associative array, a numeric array, or both
//mysqli_fetch_array() 	Fetches a result row as an associative, a numeric array, or both
//mysqli_fetch_assoc() 	Fetches a result row as an associative array
//mysqli_fetch_field_direct() 	Returns meta-data for a single field in the result set, as an object
//mysqli_fetch_field() 	Returns the next field in the result set, as an object
//mysqli_fetch_fields() 	Returns an array of objects that represent the fields in a result set
//mysqli_fetch_lengths() 	Returns the lengths of the columns of the current row in the result set
//mysqli_fetch_object() 	Returns the current row of a result set, as an object
//mysqli_fetch_row() 	Fetches one row from a result-set and returns it as an enumerated array
//mysqli_field_count() 	Returns the number of columns for the most recent query
//mysqli_field_seek() 	Sets the field cursor to the given field offset
//mysqli_field_tell() 	Returns the position of the field cursor
//mysqli_free_result() 	Frees the memory associated with a result
//mysqli_get_charset() 	Returns a character set object
//mysqli_get_client_info() 	Returns the MySQL client library version
//mysqli_get_client_stats() 	Returns statistics about client per-process
//mysqli_get_client_version() 	Returns the MySQL client library version as an integer
//mysqli_get_connection_stats() 	Returns statistics about the client connection
//mysqli_get_host_info() 	Returns the MySQL server hostname and the connection type
//mysqli_get_proto_info() 	Returns the MySQL protocol version
//mysqli_get_server_info() 	Returns the MySQL server version
//mysqli_get_server_version() 	Returns the MySQL server version as an integer
//mysqli_info() 	Returns information about the most recently executed query

//mysqli_init() 	Initializes MySQLi and returns a resource for use with mysqli_real_connect()

//mysqli_insert_id() 	Returns the auto-generated id used in the last query
//mysqli_kill() 	Asks the server to kill a MySQL thread
//mysqli_more_results() 	Checks if there are more results from a multi query
//mysqli_multi_query() 	Performs one or more queries on the database
//mysqli_next_result() 	Prepares the next result set from mysqli_multi_query()
//mysqli_num_fields() 	Returns the number of fields in a result set
//mysqli_num_rows() 	Returns the number of rows in a result set

//mysqli_options() 	Sets extra connect options and affect behavior for a connection

//mysqli_ping() 	Pings a server connection, or tries to reconnect if the connection has gone down
//mysqli_prepare() 	Prepares an SQL statement for execution
//mysqli_query() 	Performs a query against the database

//mysqli_real_connect() 	Opens a new connection to the MySQL server
//mysqli_real_pconnect()   Opens a new persistent connection to the MySQL server

//mysqli_real_escape_string() 	Escapes special characters in a string for use in an SQL statement
//mysqli_real_query() 	Executes an SQL query
//mysqli_reap_async_query() 	Returns the result from async query
//mysqli_refresh() 	Refreshes tables or caches, or resets the replication server information
//mysqli_rollback() 	Rolls back the current transaction for the database
//mysqli_select_db() 	Changes the default database for the connection
//mysqli_set_charset() 	Sets the default client character set
//mysqli_set_local_infile_default() 	Unsets user defined handler for load local infile command
//mysqli_set_local_infile_handler() 	Set callback function for LOAD DATA LOCAL INFILE command
//mysqli_sqlstate() 	Returns the SQLSTATE error code for the last MySQL operation

//mysqli_ssl_set() 	Used to establish secure connections using SSL

//mysqli_stat() 	Returns the current system status
//mysqli_stmt_init() 	Initializes a statement and returns an object for use with mysqli_stmt_prepare()
//mysqli_store_result() 	Transfers a result set from the last query
//mysqli_thread_id() 	Returns the thread ID for the current connection
//mysqli_thread_safe() 	Returns whether the client library is compiled as thread-safe
//mysqli_use_result() 	Initiates the retrieval of a result set from the last query executed using the mysqli_real_query()
//mysqli_warning_count() 	Returns the number of warnings from the last query in the connection

*/

/* begin of class plugin_mysqli */
class mysqli_module {

	/* begin of class constructor */
	function __construct (){
	} /* end of class constructor */

	/* class destructor */
	function __destruct() {
	} /* end of class destructor */

    static function affected_rows() {}
    static function autocommit() {}
    static function begin_transaction() {}
    static function change_user() {}
    static function character_set_name() {}
    static function client_info() {}
    static function client_version() {}

/**/static function close(
    
    $link
    
    ) {

        $mysqli->close($link);

    }

    static function commit() {}
    static function connect_errno() {}
    static function connect_error() {}

/**/static function connect( 
        
        $host,
        $usernameL,
        $passwd,
        $dbname,
        $port = NULL,
        $socket = NULL
        
        ) {

        /* convert input vars */
        if (isset($host)) { $host = htmlspecialchars($host); }
        if (isset($username)) { $username = htmlspecialchars($username); }
        if (isset($passwd)) { $passwd = htmlspecialchars($passwd); }
        if (isset($dbname)) { $dbname = htmlspecialchars($dbname); }
        if (isset($port)) { $port = htmlspecialchars($port); }
        if (isset($socket)) { $socket = htmlspecialchars($socket); }

        /* create connection */
        $mysqli = new mysqli($host, $username, $passwd, $dbname, $port, $socket);

        if (mysqli_connect_error()) {
            die('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }
        echo 'Success... ' . $mysqli->host_info . "\n";

        return $mysqli;

    }

/**/static function pconnect( 
        
        $host,
        $usernameL,
        $passwd,
        $dbname,
        $port = NULL,
        $socket = NULL
        
        ) {

        /* convert input vars */
        if (isset($host)) { $host = htmlspecialchars($host); }
        if (isset($username)) { $username = htmlspecialchars($username); }
        if (isset($passwd)) { $passwd = htmlspecialchars($passwd); }
        if (isset($dbname)) { $dbname = htmlspecialchars($dbname); }
        if (isset($port)) { $port = htmlspecialchars($port); }
        if (isset($socket)) { $socket = htmlspecialchars($socket); }

        /* create connection */
        $mysqli = new mysqli( "p:" . $host, $username, $passwd, $dbname, $port, $socket);

        if (mysqli_connect_error()) {
            die('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }
        echo 'Success... ' . $mysqli->host_info . "\n";

        return $mysqli;

    }

    static function current_field() {}
    static function data_seek() {}
    static function debug() {}
    static function dump_debug_info() {}
    static function errno() {}
    static function error_list() {}
    static function error() {}
    static function fetch_all() {}
    static function fetch_array() {}
    static function fetch_assoc() {}
    static function fetch_field_direct() {}
    static function fetch_field() {}
    static function fetch_fields() {}
    static function fetch_lengths() {}
    static function fetch_object() {}
    static function fetch_row() {}
    static function field_count() {}
    static function field_seek() {}
    //static function field_tell() {}
    static function free_result() {}
    static function get_charset() {}
    static function get_client_info() {}
    static function get_client_stats() {}
    static function get_client_version() {}
    static function get_connection_stats() {}
    static function get_host_info() {}
    static function get_proto_info() {}
    static function get_server_info() {}
    static function get_server_version() {}
    static function info() {}

/**/static function init(

    ) {

        $mysqli = mysqli_init();

        if (!$mysqli) {
            die('mysqli_init failed');
        }

        return $mysqli;

    }

    static function insert_id() {}
    static function kill() {}
    static function more_results() {}
    static function multi_query() {}
    static function next_result() {}
    static function num_fields() {}
    static function num_rows() {}

/**/static function options(

        $mysqli,
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

        if (!$mysqli) {
            die('no mysqli link');
        }
        
        /* (argument type: unsigned int *) - connection timeout in seconds (supported on Windows with TCP/IP since PHP 5.3.1)  */
        if (isset($connect_timeout)) {
            $connect_timeout = htmlspecialchars($connect_timeout);
            if(!filter_var( $connect_timeout, FILTER_VALIDATE_INT) ) { die('error on value for MYSQLI_OPT_CONNECT_TIMEOUT : ' . $connect_timeout); }
            if (!mysqli_options($mysqli, MYSQLI_OPT_CONNECT_TIMEOUT, $connect_timeout)) { die('Setting MYSQLI_OPT_CONNECT_TIMEOUT failed'); }
        }

        /* (argument type: optional pointer to unsigned int) - enable/disable use of LOAD LOCAL INFILE */
        if (isset($local_infile)) {
            $local_infile = htmlspecialchars($local_infile);
            if(!filter_var( $local_infile, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ) { die('error on value for MYSQLI_OPT_LOCAL_INFILE : ' . $local_infile); }
            if (!mysqli_options($mysqli, MYSQLI_OPT_LOCAL_INFILE, $local_infile)) { die('Setting MYSQLI_OPT_LOCAL_INFILE failed'); }
        }

        /* (argument type: char *) - command to execute after when connecting to MySQL server */
        if (isset($init_command)) { 
            //$init_command = htmlspecialchars($init_command);
            if(!filter_var( $init_command, FILTER_SANITIZE_STRING) ) { die('error on value for MYSQLI_INIT_COMMAND : ' . $init_command); }
            if (!mysqli_options($mysqli, MYSQLI_INIT_COMMAND, $init_command)) { die('Setting MYSQLI_INIT_COMMAND failed'); }  
        }

        /* (argument type: char *) - Read options from named option file instead of my.cnf */
        if (isset($read_default_file)) {
            $read_default_file = htmlspecialchars($read_default_file);
            if(!filter_var( $read_default_file, FILTER_SANITIZE_STRING) ) { die('error on value for MYSQLI_READ_DEFAULT_FILE : ' . $read_default_file); }
            if (!mysqli_options($mysqli, MYSQLI_READ_DEFAULT_FILE, $read_default_file)) { die('Setting MYSQLI_READ_DEFAULT_FILE failed'); }   
        }

        /* (argument type: char *) - Read options from the named group from my.cnf or the file specified with MYSQL_READ_DEFAULT_FILE. */
        if (isset($read_default_group)) {
            $read_default_group = htmlspecialchars($read_default_group);
            if(!filter_var( $read_default_group, FILTER_SANITIZE_STRING) ) { die('error on value for MYSQLI_READ_DEFAULT_GROUP : ' . $read_default_group); }
            if (!mysqli_options($mysqli, MYSQLI_READ_DEFAULT_GROUP, $read_default_group)) { die('Setting MYSQLI_READ_DEFAULT_GROUP failed'); }   
        }

        /* (argument type: char *) - RSA public key file used with the SHA-256 based authentication. */
        if (isset($server_public_key)) {
            $server_public_key = htmlspecialchars($server_public_key);
            if(!filter_var( $server_public_key, FILTER_SANITIZE_STRING) ) { die('error on value for MYSQLI_SERVER_PUBLIC_KEY : ' . $server_public_key); }
            if (!mysqli_options($mysqli, MYSQLI_SERVER_PUBLIC_KEY, $server_public_key)) { die('Setting MYSQLI_SERVER_PUBLIC_KEY failed'); } 
        }

        /* The size of the internal command/network buffer. Only valid for mysqlnd. */
        if (isset($net_cmd_buffer_size)) {
            $net_cmd_buffer_size = htmlspecialchars($net_cmd_buffer_size);
            if(!filter_var( $net_cmd_buffer_size, FILTER_VALIDATE_INT) ) { die('error on value for MYSQLI_OPT_NET_CMD_BUFFER_SIZE : ' . $net_cmd_buffer_size); }
            if (!mysqli_options($mysqli, MYSQLI_OPT_NET_CMD_BUFFER_SIZE, $net_cmd_buffer_size)) { die('Setting MYSQLI_OPT_NET_CMD_BUFFER_SIZE failed'); }
        }

        /* Maximum read chunk size in bytes when reading the body of a MySQL command packet. Only valid for mysqlnd. */
        if (isset($net_read_buffer_size)) {
            $net_read_buffer_size = htmlspecialchars($net_read_buffer_size);
            if(!filter_var( $net_read_buffer_size, FILTER_VALIDATE_INT) ) { die('error on value for MYSQLI_OPT_NET_READ_BUFFER_SIZE : ' . $net_read_buffer_size); }
            if (!mysqli_options($mysqli, MYSQLI_OPT_NET_READ_BUFFER_SIZE, $net_read_buffer_size)) { die('Setting MYSQLI_OPT_NET_READ_BUFFER_SIZE failed'); }
        }

        /* Convert integer and float columns back to PHP numbers. Only valid for mysqlnd. */
        if (isset($int_and_float_native)) {
            $int_and_float_nativehost = htmlspecialchars($int_and_float_native);            
            if(!filter_var( $int_and_float_nativehost, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ) { die('error on value for MYSQLI_OPT_INT_AND_FLOAT_NATIVE : ' . $int_and_float_nativehost); }
            if (!mysqli_options($mysqli, MYSQLI_OPT_INT_AND_FLOAT_NATIVE, $int_and_float_nativehost)) { die('Setting MYSQLI_OPT_INT_AND_FLOAT_NATIVE failed'); }
        }

        /* (argument type: my_bool *) - Enable or disable verification of the server's Common Name value in its certificate against the host name used when connecting to the server. */
        if (isset($ssl_verify_server_cert)) {
            $ssl_verify_server_cert = htmlspecialchars($ssl_verify_server_cert);
            if(!filter_var( $ssl_verify_server_cert, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ) { die('error on value for MYSQLI_OPT_SSL_VERIFY_SERVER_CERT : ' . $ssl_verify_server_cert); }
            if (!mysqli_options($mysqli, MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, $ssl_verify_server_cert)) { die('Setting MYSQLI_OPT_SSL_VERIFY_SERVER_CERT failed'); }
        }

        return $mysqli;

    }

    static function ping() {}
    static function prepare() {}

    static function query(

        $query,
        $target,
        $fields = NULL,
        $source,
        $where = NULL
        
        ) {

		global	$db_login_handle;

        //print '$query : ' . $query . '<br />';
        //print '$target : ' . $target . '<br />';
        //print '$fields : ' . $fields . '<br />';
        //print '$source : ' . $source . '<br />';
        //print '$where : ' . $where . '<br />';

/*
SELECT          `article_id`, `article_name`, `article_desciption`, `manufacturer_id`                       FROM `epc`.`articles`   WHERE  `article_id`='1';
INSERT INTO     `epc`.`articles` (`article_id`, `article_name`, `article_desciption`, `manufacturer_id`)    VALUES ('1', 'name', 'description', 'manufacturer');
UPDATE          `epc`.`articles`                                                                            SET `article_id`='2'    WHERE  `article_id`='1';
DELETE FROM     `epc`.`articles`                                                                                                    WHERE  `article_id`='2';
*/

        //$query = htmlspecialchars($query);
        //$target = htmlspecialchars($target);
        //$source = htmlspecialchars($source);
        if ($where) { $where = htmlspecialchars($where); }

        switch($query) {

            case 'SELECT':
                if ($where) { $statement = "SELECT " . $target . " FROM " . $source . " WHERE " . $where; }
                else { $statement = "SELECT " . $target . " FROM " . $source; }
            break;
            
            case 'INSERT':
                $statement = "INSERT INTO " . $target . " (" . $fields . ") VALUES (" . $source . ")";
            break;
            
            case 'UPDATE':
            break;
            
            case 'DELETE':
            break;
            
            default: break;

        }

        //print $statement . '<br />';

        if ($db_login_handle) {

            /* Select queries return a resultset */
            if ($result = $db_login_handle->query($statement)) {

                //printf("Select returned %d rows.<br />", $result->num_rows);

                if ($result->num_rows>0) { $data = $result; } else { $data = false; } 

            } else {

                print 'function query result error';

                return false;

            }

            return $data;

        }

    }

/**/static function real_connect( 
        
        $link,
        $host = NULL,
        $username = NULL,
        $passwd = NULL,
        $dbname = NULL,
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
        
        if (!@$link->real_connect($host, $username, $passwd, $dbname, $port, $socket, $flags)) {
            die('Connect Error (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
        }

        //print 'Success... ' . $link->host_info . "\n";

        return $link;

    }

/**/static function real_pconnect( 
        
        $mysqli,
        $host = NULL,
        $username = NULL,
        $passwd = NULL,
        $dbname = NULL,
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
        //$mysqli = new mysqli($host, $username, $passwd, $dbname, $port, $socket);
        if (!mysqli_real_connect($mysqli, "p:" . $host, $username, $passwd, $dbname, $port, $socket, $flags)) {
            die('Connect Error (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
        }
        
        /*
        * Use this instead of $connect_error if you need to ensure
        * compatibility with PHP versions prior to 5.2.9 and 5.3.0.
        */
        if (mysqli_connect_error()) {
            die('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }
        echo 'Success... ' . $mysqli->host_info . "\n";

        return $mysqli;

    }


    static function real_escape_string() {}
    static function real_query() {}
    static function reap_async_query() {}
    static function refresh() {}
    static function rollback() {}
    static function select_db() {}
    static function set_charset(

        $mysqli,
        $charset

    ) {    
  
        /* change character set to $charset */
        if (!$mysqli->set_charset($charset)) {
            printf("Error loading character set utf8: %s\n", $mysqli->error);
            exit();
        } else {
            printf("Current character set: %s\n", $mysqli->character_set_name());
        }  
    
    }

    static function set_local_infile_default() {}
    static function set_local_infile_handler() {}
    static function sqlstate() {}

/**/static function ssl_set(

        $mysqli,
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

        mysqli_ssl_set($mysqli, $key, $cert, $ca, $capath, $cipher);

    }

    static function stat() {}
    static function stmt_init() {}
    static function store_result() {}
    static function thread_id() {}
    static function thread_safe() {}
    static function use_result() {}
    static function warning_count() {}

    /* custom */
    static function affected_fields() {}
    static function affected_tables() {}

    static function lengths() {}

} /* end of class plugin_mysqli */

?>