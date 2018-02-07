<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class options extends \NTRNX_MYSQLI\ntrnx_mysqli {

    //(PHP 5, PHP 7)
    //mysqli::options -- mysqli_options — Set options
    static function link(

        $mysqli_handle,
        $option,
        $value

    ) {

        $placeholder_array = array ("{VALUE}", "{OPTION}");
        $string_array = array ($value, $option);

        switch ($option) {

            /* connection timeout in seconds (supported on Windows with TCP/IP since PHP 5.3.1) */
            /* (argument type: unsigned int *) */
            case "MYSQLI_OPT_CONNECT_TIMEOUT":
                if (filter_var( $value, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE) === NULL) { die(str_replace($placeholder_array, $string_array, NMYSQCC_ERROR_MSG_ON_SETTINGS_VALUE_FOR_OPTION_MUST_BE_INTEGER)); }
                if (mysqli_options($mysqli_handle, MYSQLI_OPT_CONNECT_TIMEOUT, $value) === FALSE) { die(str_replace($placeholder_array, $string_array, NMYSQCC_ERROR_MSG_ON_SETTINGS_VALUE_FOR_OPTION)); }
            break;

            /* enable/disable use of LOAD LOCAL INFILE */
            /* (argument type: optional pointer to unsigned int) */
            case "MYSQLI_OPT_LOCAL_INFILE":
                if (filter_var( $value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) === NULL) { die(str_replace($placeholder_array, $string_array, NMYSQCC_ERROR_MSG_ON_SETTINGS_VALUE_FOR_OPTION_MUST_BE_BOOLEAN)); }
                if (mysqli_options($mysqli_handle, MYSQLI_OPT_LOCAL_INFILE, $value) === FALSE) { die(str_replace($placeholder_array, $string_array, NMYSQCC_ERROR_MSG_ON_SETTINGS_VALUE_FOR_OPTION)); }
            break;

            /* command to execute after when connecting to MySQL server */
            /* (argument type: char *) */
            case "MYSQLI_INIT_COMMAND":
                if (filter_var( $value, FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE) === NULL) { die(str_replace($placeholder_array, $string_array, NMYSQCC_ERROR_MSG_ON_SETTINGS_VALUE_FOR_OPTION_MUST_BE_STRING)); }
                if (mysqli_options($mysqli_handle, MYSQLI_INIT_COMMAND, $value) === FALSE) { die(str_replace($placeholder_array, $string_array, NMYSQCC_ERROR_MSG_ON_SETTINGS_VALUE_FOR_OPTION)); }
            break;

            /* Read options from named option file instead of my.cnf */
            /* (argument type: char *) */
            case "MYSQLI_READ_DEFAULT_FILE":
                if (filter_var( $value, FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE) === NULL) { die(str_replace($placeholder_array, $string_array, NMYSQCC_ERROR_MSG_ON_SETTINGS_VALUE_FOR_OPTION_MUST_BE_STRING)); }
                if (mysqli_options($mysqli_handle, MYSQLI_READ_DEFAULT_FILE, $value) === FALSE) { die(str_replace($placeholder_array, $string_array, NMYSQCC_ERROR_MSG_ON_SETTINGS_VALUE_FOR_OPTION)); }
            break;
            /* Read options from the named group from my.cnf or the file specified with MYSQL_READ_DEFAULT_FILE. */
            /* (argument type: char *) */
            case "MYSQLI_READ_DEFAULT_GROUP":
                if (filter_var( $value, FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE) === NULL) { die(str_replace($placeholder_array, $string_array, NMYSQCC_ERROR_MSG_ON_SETTINGS_VALUE_FOR_OPTION_MUST_BE_STRING)); }
                if (mysqli_options($mysqli_handle, MYSQLI_READ_DEFAULT_GROUP, $value) === FALSE) { die(str_replace($placeholder_array, $string_array, NMYSQCC_ERROR_MSG_ON_SETTINGS_VALUE_FOR_OPTION)); }
            break;

            /* RSA public key file used with the SHA-256 based authentication. */
            /* (argument type: char *) */
            case "MYSQLI_SERVER_PUBLIC_KEY":
                if (filter_var( $value, FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE) === NULL) { die(str_replace($placeholder_array, $string_array, NMYSQCC_ERROR_MSG_ON_SETTINGS_VALUE_FOR_OPTION_MUST_BE_STRING)); }
                if (mysqli_options($mysqli_handle, MYSQLI_SERVER_PUBLIC_KEY, $value) === FALSE) { die(str_replace($placeholder_array, $string_array, NMYSQCC_ERROR_MSG_ON_SETTINGS_VALUE_FOR_OPTION)); }
            break;

            /* The size of the internal command/network buffer. Only valid for mysqlnd. */
            /* */
            case "MYSQLI_OPT_NET_CMD_BUFFER_SIZE":
                if (filter_var( $value, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE) === NULL) { die(str_replace($placeholder_array, $string_array, NMYSQCC_ERROR_MSG_ON_SETTINGS_VALUE_FOR_OPTION_MUST_BE_INTEGER)); }
                if (mysqli_options($mysqli_handle, MYSQLI_OPT_NET_CMD_BUFFER_SIZE, $value) === FALSE) { die(str_replace($placeholder_array, $string_array, NMYSQCC_ERROR_MSG_ON_SETTINGS_VALUE_FOR_OPTION)); }
            break;

            /* Maximum read chunk size in bytes when reading the body of a MySQL command packet. Only valid for mysqlnd. */
            /* */
            case "MYSQLI_OPT_NET_READ_BUFFER_SIZE":
                if (filter_var( $value, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE) === NULL) { die(str_replace($placeholder_array, $string_array, NMYSQCC_ERROR_MSG_ON_SETTINGS_VALUE_FOR_OPTION_MUST_BE_INTEGER)); }
                if (mysqli_options($mysqli_handle, MYSQLI_OPT_NET_READ_BUFFER_SIZE, $value) === FALSE) { die(str_replace($placeholder_array, $string_array, NMYSQCC_ERROR_MSG_ON_SETTINGS_VALUE_FOR_OPTION)); }
            break;

            /* Convert integer and float columns back to PHP numbers. Only valid for mysqlnd. */
            /* */
            case "MYSQLI_OPT_INT_AND_FLOAT_NATIVE":
                if (filter_var( $value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) === NULL) { die(str_replace($placeholder_array, $string_array, NMYSQCC_ERROR_MSG_ON_SETTINGS_VALUE_FOR_OPTION_MUST_BE_BOOLEAN)); }
                if (mysqli_options($mysqli_handle, MYSQLI_OPT_INT_AND_FLOAT_NATIVE, $value) === FALSE) { die(str_replace($placeholder_array, $string_array, NMYSQCC_ERROR_MSG_ON_SETTINGS_VALUE_FOR_OPTION)); }
            break;

            /* the following does not work, mysqli_options generates an error always */
            /* Enable or disable verification of the server's Common Name value in its certificate against the host name used when connecting to the server. */
            /* (argument type: my_bool *) */
            case "MYSQLI_OPT_SSL_VERIFY_SERVER_CERT":
                if (filter_var( $value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) === NULL) { die(str_replace($placeholder_array, $string_array, NMYSQCC_ERROR_MSG_ON_SETTINGS_VALUE_FOR_OPTION_MUST_BE_BOOLEAN)); }
                if (mysqli_options($mysqli_handle, MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, $value) === FALSE) { die(str_replace($placeholder_array, $string_array, NMYSQCC_ERROR_MSG_ON_SETTINGS_VALUE_FOR_OPTION)); }
             break;

            default:
            break;

        }

    }

}

?>