<?php

namespace NTRNX_MYSQLI;

const NMYSQCC_ERROR_TYPE_A = 1;
const NMYSQCC_ERROR_TYPE_B = 2;
const NMYSQCC_ERROR_TYPE_C = 4;

/* begin of class */
class ntrnx_mysqli_internal_raise extends \NTRNX_MYSQLI\ntrnx_mysqli {

    static function error($error_id, $error_class, $error_line, $stringA = NULL, $stringB = NULL, $stringC = NULL) {

        static $error_type = NULL;
        static $error_message = NULL;

        //https://dev.mysql.com/doc/refman/5.5/en/error-messages-server.html
        //https://dev.mysql.com/doc/refman/5.5/en/error-messages-client.html

        switch ($error_id) {

            case NMYSQCC_ERROR_MYSQLI_INIT_FAILED: $error_type = NMYSQCC_ERROR_TYPE_A; $error_message = NMYSQCC_ERROR_MSG_MYSQLI_INIT_FAILED; break;
            case NMYSQCC_ERROR_DB_HANDLE_NOT_INITIALIZED: $error_type = NMYSQCC_ERROR_TYPE_A; $error_message = NMYSQCC_ERROR_MSG_DB_HANDLE_NOT_INITIALIZED; break;
            case NMYSQCC_ERROR_NOT_CONNECTED: $error_type = NMYSQCC_ERROR_TYPE_A; $error_message = NMYSQCC_ERROR_MSG_NOT_CONNECTED; break;

            case NMYSQCC_ERROR_ON_LOADING_CHARACTER_SET: $error_type = NMYSQCC_ERROR_TYPE_A; $error_message = str_replace("%s", $stringA, NMYSQCC_ERROR_MSG_ON_LOADING_CHARACTER_SET); break;
            case NMYSQCC_ERROR_CLIENT_CHARACTER_SET_WAS_CHANGED: $error_type = NMYSQCC_ERROR_TYPE_C; $error_message = str_replace("%s", $stringA, NMYSQCC_ERROR_MSG_CLIENT_CHARACTER_SET_WAS_CHANGED); break;
            
            case NMYSQCC_ERROR_ON_SETTINGS_VALUE_FOR_OPTION: $error_type = NMYSQCC_ERROR_TYPE_A; $error_message = str_replace(array("{VALUE}", "{OPTION}"), array($stringA, $stringB), NMYSQCC_ERROR_MSG_ON_SETTINGS_VALUE_FOR_OPTION); break;
            case NMYSQCC_ERROR_VALUE_MUST_BE_INTEGER: $error_type = NMYSQCC_ERROR_TYPE_A; $error_message = NMYSQCC_ERROR_MSG_VALUE_MUST_BE_INTEGER; break;
            case NMYSQCC_ERROR_VALUE_MUST_BE_BOOLEAN: $error_type = NMYSQCC_ERROR_TYPE_A; $error_message = NMYSQCC_ERROR_MSG_VALUE_MUST_BE_BOOLEAN; break;
            case NMYSQCC_ERROR_VALUE_MUST_BE_STRING: $error_type = NMYSQCC_ERROR_TYPE_A; $error_message = NMYSQCC_ERROR_MSG_VALUE_MUST_BE_STRING; break;

            case NMYSQCC_ERROR_ON_SETTINGS_PATH_TO_FILE: $error_type = NMYSQCC_ERROR_TYPE_A; $error_message = str_replace("{FILE}", $stringA, NMYSQCC_ERROR_MSG_ON_SETTINGS_PATH_TO_FILE); break;
            case NMYSQCC_ERROR_ON_SETTINGS_PATH_TO_FILE: $error_type = NMYSQCC_ERROR_TYPE_A; $error_message = str_replace("{FILE}", $stringA, NMYSQCC_ERROR_MSG_ON_SETTINGS_PATH_TO_FILE); break;
            case NMYSQCC_ERROR_ON_SETTINGS_PATH_TO_FILE: $error_type = NMYSQCC_ERROR_TYPE_A; $error_message = str_replace("{FILE}", $stringA, NMYSQCC_ERROR_MSG_ON_SETTINGS_PATH_TO_FILE); break;
            case NMYSQCC_ERROR_ON_SETTINGS_PATH_TO_FILE: $error_type = NMYSQCC_ERROR_TYPE_A; $error_message = str_replace("{FILE}", $stringA, NMYSQCC_ERROR_MSG_ON_SETTINGS_PATH_TO_FILE); break;

            case NMYSQCC_ERROR_ON_SETTINGS_PATH_TO_DIR: $error_type = NMYSQCC_ERROR_TYPE_A; $error_message = str_replace(array("{DIR}", "{FILE}"), array($stringA, $stringB), NMYSQCC_ERROR_MSG_ON_SETTINGS_PATH_TO_DIR); break;

            case NMYSQCC_ERROR_SSL_IS_ENABLED: $error_type = NMYSQCC_ERROR_TYPE_C; $error_message = NMYSQCC_ERROR_MSG_SSL_IS_ENABLED; break;
            case NMYSQCC_ERROR_SSL_IS_DISABLED: $error_type = NMYSQCC_ERROR_TYPE_B; $error_message = NMYSQCC_ERROR_MSG_SSL_IS_DISABLED; break;

            /* ntrnx_mysqli_insert */
            case NMYSQCC_ERROR_NUMBER_OF_COLUMNS_AND_NUMBER_OF_VALUES_DO_NOT_MATCH: $error_type = NMYSQCC_ERROR_TYPE_B; $error_message = NMYSQCC_ERROR_MSG_NUMBER_OF_COLUMNS_AND_NUMBER_OF_VALUES_DO_NOT_MATCH; break;            
            case NMYSQCC_ERROR_FLAGS_NOT_SUPPORTED: $error_type = NMYSQCC_ERROR_TYPE_B; $error_message = NMYSQCC_ERROR_MSG_FLAGS_NOT_SUPPORTED; break;
            case NMYSQCC_ERROR_RESULTMODE_NOT_SUPPORTED: $error_type = NMYSQCC_ERROR_TYPE_B; $error_message = NMYSQCC_ERROR_MSG_RESULTMODE_NOT_SUPPORTED; break;

            case NMYSQCC_ERROR_JOIN_SYNTAX: $error_type = NMYSQCC_ERROR_TYPE_B; $error_message = NMYSQCC_ERROR_MSG_JOIN_SYNTAX; break;          
            case NMYSQCC_ERROR_JOIN_EXPRESSION: $error_type = NMYSQCC_ERROR_TYPE_B; $error_message = NMYSQCC_ERROR_MSG_JOIN_EXPRESSION; break;
            
            case NMYSQCC_ERROR_OPERATOR_NOT_SUPPORTED: $error_type = NMYSQCC_ERROR_TYPE_B; $error_message = str_replace("%s", $stringA, NMYSQCC_ERROR_MSG_OPERATOR_NOT_SUPPORTED); break;
            case NMYSQCC_ERROR_HAVING_CONDITION_NOT_SUPPORTED: $error_type = NMYSQCC_ERROR_TYPE_B; $error_message = NMYSQCC_ERROR_MSG_HAVING_CONDITION_NOT_SUPPORTED; break;
            case NMYSQCC_ERROR_PROCEDURE_NOT_SUPPORTED: $error_type = NMYSQCC_ERROR_TYPE_B; $error_message = NMYSQCC_ERROR_MSG_PROCEDURE_NOT_SUPPORTED; break;
            case NMYSQCC_ERROR_INTO_TARGET_NOT_SUPPORTED: $error_type = NMYSQCC_ERROR_TYPE_B; $error_message = NMYSQCC_ERROR_MSG_INTO_TARGET_NOT_SUPPORTED; break;
            case NMYSQCC_ERROR_FOR_OPTIONS_NOT_SUPPORTED: $error_type = NMYSQCC_ERROR_TYPE_B; $error_message = NMYSQCC_ERROR_MSG_FOR_OPTIONS_NOT_SUPPORTED; break;
 
            //Access denied for user '%s'@'%s' to database '%s'
            case NMYSQCC_ERROR_ACCESS_DENIED_FOR_USER_TO_DATABASE: $error_type = NMYSQCC_ERROR_TYPE_A; $error_message = $stringA; break;

            //Access denied for user '%s'@'%s' (using password: %s)
            case NMYSQCC_ERROR_ACCESS_DENIED_FOR_USER_USING_PASSWORD: $error_type = NMYSQCC_ERROR_TYPE_A; $error_message = $stringA; break;

            //Unknown column '%s' in '%s'
            case NMYSQCC_ERROR_UNKNOWN_COLUMN: $error_type = NMYSQCC_ERROR_TYPE_A; $error_message = $stringA; break;

            //Table '%s.%s' doesn't exist 
            case NMYSQCC_ERROR_TABLE_DOESNT_EXIST: $error_type = NMYSQCC_ERROR_TYPE_A; $error_message = $stringA; break;

            //Can't connect to local MySQL server through socket '%s' (%d)
            case NMYSQCC_ERROR_CANT_CONNECT_TO_LOCAL_MYSQL_SERVER_THROUGH_SOCKET: $error_type = NMYSQCC_ERROR_TYPE_A; $error_message = $stringA; break;

            //Unknown MySQL server host '%s' (%d)
            case NMYSQCC_ERROR_UNKNOWN_MYSQL_SERVER_HOST: $error_type = NMYSQCC_ERROR_TYPE_A; $error_message = $stringA; break;

            default:

                $error_type = NMYSQCC_ERROR_TYPE_A; $error_message = $stringA; 

            break;

        }

        self::handle($error_type, $error_message, $error_class, $error_line, $error_id);

    }

    private static function handle($error_type, $error_message, $error_class, $error_line, $error_id) {

        switch ($error_type) {

            case NMYSQCC_ERROR_TYPE_A:
                
                if (NMYSQCC_LOG_LEVEL >= NMYSQCC_ERROR_TYPE_A) {
                    self::write_error($error_message, $error_class, $error_line, $error_id);
                }
                if (NMYSQCC_DISPLAY_LEVEL >= NMYSQCC_ERROR_TYPE_A) {
                    self::display_output($error_message,  $error_class, $error_line, $error_id);
                }

            break;

            case NMYSQCC_ERROR_TYPE_B:

                if (NMYSQCC_LOG_LEVEL >= NMYSQCC_ERROR_TYPE_B) {
                    self::write_warning($error_message, $error_class, $error_line, $error_id);
                }
                if (NMYSQCC_DISPLAY_LEVEL >= NMYSQCC_ERROR_TYPE_B) {
                    self::display_output($error_message,  $error_class, $error_line, $error_id);
                }

                $result = FALSE;                

            break;

            case NMYSQCC_ERROR_TYPE_C:

                if (NMYSQCC_LOG_LEVEL === NMYSQCC_ERROR_TYPE_C) {
                    self::write_info($error_message, $error_class, $error_line, $error_id);
                }
                if (NMYSQCC_DISPLAY_LEVEL === NMYSQCC_ERROR_TYPE_C) {
                    self::display_output($error_message,  $error_class, $error_line, $error_id);
                }

            break;

            default:
            break;

        }

        return $error_id;

    }

    private static function write_error($msg,  $class, $line, $error_id = NULL) {

        \NTRNX_MYSQLI\ntrnx_mysqli_internal_log::log_error($msg,  $class, $line, $error_id);

    }

    private static function write_warning($msg,  $class, $line, $error_id = NULL) {

        \NTRNX_MYSQLI\ntrnx_mysqli::log_warning($msg,  $class, $line, $error_id);

    }

    private static function write_info($msg,  $class, $line, $error_id = NULL) {

        \NTRNX_MYSQLI\ntrnx_mysqli::log_info($msg,  $class, $line, $error_id);

    }

    private static function display_output($msg,  $class, $line, $error_id = NULL) {

        echo NMYSQCC_DATETIME_SUFFIX
        . date(NMYSQCC_DATETIME_FORMAT)
        . NMYSQCC_DATETIME_PRAEFIX
        . NMYSQCC_LOG_SEPARATOR
        . $msg
        . NMYSQCC_BLANK
        . NMYSQCC_LEFT_PARENTHESIS
        . $error_id
        . NMYSQCC_RIGHT_PARENTHESIS 
        . NMYSQCC_LOG_SEPARATOR
        . $class
        . NMYSQCC_LOG_SEPARATOR
        . $line
        . NMYSQCC_BR;

    }

}

?>