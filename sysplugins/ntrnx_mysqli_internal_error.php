<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_internal_error extends \NTRNX_MYSQLI\ntrnx_mysqli {

    static function raise($error_id, $error_class, $error_line, $stringA = NULL, $stringB = NULL, $stringC = NULL) {

        static $error_type = NULL;
        static $error_message = NULL;

        //https://dev.mysql.com/doc/refman/5.5/en/error-messages-server.html
        //https://dev.mysql.com/doc/refman/5.5/en/error-messages-client.html

        switch ($error_id) {

            case "1": $error_type = "1"; $error_message = NMYSQCC_ERROR_MYSQLI_INIT_FAILED; break;
            case "2": $error_type = "1"; $error_message = NMYSQCC_ERROR_DB_HANDLE_NOT_INITIALIZED; break;
            case "3": $error_type = "1"; $error_message = NMYSQCC_ERROR_NOT_CONNECTED; break;

            case "20": $error_type = "1"; $error_message = str_replace("%s", $stringA, NMYSQCC_ERROR_ON_LOADING_CHARACTER_SET); break;
            case "21": $error_type = "4"; $error_message = str_replace("%s", $stringA, NMYSQCC_MSG_CLIENT_CHARACTER_SET_WAS_CHANGED); break;
            
            case "30": $error_type = "1"; $error_message = str_replace(array("{VALUE}", "{OPTION}"), array($stringA, $stringB), NMYSQCC_ERROR_ON_SETTINGS_VALUE_FOR_OPTION); break;
            case "31": $error_type = "1"; $error_message = NMYSQCC_ERROR_VALUE_MUST_BE_INTEGER; break;
            case "32": $error_type = "1"; $error_message = NMYSQCC_ERROR_VALUE_MUST_BE_BOOLEAN; break;
            case "33": $error_type = "1"; $error_message = NMYSQCC_ERROR_VALUE_MUST_BE_STRING; break;

            case "40": $error_type = "1"; $error_message = str_replace("{FILE}", $stringA, NMYSQCC_ERROR_ON_SETTINGS_PATH_TO_FILE); break;
            case "41": $error_type = "1"; $error_message = str_replace("{FILE}", $stringA, NMYSQCC_ERROR_ON_SETTINGS_PATH_TO_FILE); break;
            case "42": $error_type = "1"; $error_message = str_replace("{FILE}", $stringA, NMYSQCC_ERROR_ON_SETTINGS_PATH_TO_FILE); break;
            case "43": $error_type = "1"; $error_message = str_replace("{FILE}", $stringA, NMYSQCC_ERROR_ON_SETTINGS_PATH_TO_FILE); break;

            case "50": $error_type = "1"; $error_message = str_replace(array("{DIR}", "{FILE}"), array($stringA, $stringB), NMYSQCC_ERROR_ON_SETTINGS_PATH_TO_DIR); break;

            case "60": $error_type = "4"; $error_message = NMYSQCC_ERROR_SSL_IS_ENABLED; break;
            case "61": $error_type = "2"; $error_message = NMYSQCC_ERROR_SSL_IS_DISABLED; break;

            case "70": $error_type = "2"; $error_message = NMYSQCC_ERROR_NUMBER_OF_COLUMNS_AND_NUMBER_OF_VALUES_DO_NOT_MATCH; break;

            case "80": $error_type = "2"; $error_message = NMYSQCC_ERROR_JOIN_SYNTAX; break;          
            case "81": $error_type = "2"; $error_message = NMYSQCC_ERROR_JOIN_EXPRESSION; break;
            case "82": $error_type = "2"; $error_message = str_replace("%s", $stringA, NMYSQCC_ERROR_OPERATOR_NOT_SUPPORTED); break;
            case "83": $error_type = "2"; $error_message = NMYSQCC_ERROR_HAVING_CONDITION_NOT_SUPPORTED; break;
            case "84": $error_type = "2"; $error_message = NMYSQCC_ERROR_PROCEDURE_NOT_SUPPORTED; break;
            case "85": $error_type = "2"; $error_message = NMYSQCC_ERROR_INTO_TARGET_NOT_SUPPORTED; break;
            case "86": $error_type = "2"; $error_message = NMYSQCC_ERROR_FOR_OPTIONS_NOT_SUPPORTED; break;

            //Access denied for user '%s'@'%s' to database '%s'
            case "1044": $error_type = "1"; $error_message = $stringA; break;

            //Access denied for user '%s'@'%s' (using password: %s)
            case "1045": $error_type = "1"; $error_message = $stringA; break;

            //Unknown column '%s' in '%s'
            case "1054": $error_type = "1"; $error_message = $stringA; break;

            //Table '%s.%s' doesn't exist 
            case "1146": $error_type = "1"; $error_message = $stringA; break;

            //Can't connect to local MySQL server through socket '%s' (%d)
            case "2002": $error_type = "1"; $error_message = $stringA; break;

            //Unknown MySQL server host '%s' (%d)
            case "2005": $error_type = "1"; $error_message = $stringA; break;

            default:

                $error_type = "1"; $error_message = $stringA; 

            break;

        }

        self::handle($error_type, $error_message, $error_class, $error_line);

    }

    private static function handle($error_type, $error_message, $error_class, $error_line) {

        switch ($error_type) {

            case "1":
                
                if (NMYSQCC_LOG_LEVEL >= 1) {
                    self::write_error($error_message, $error_class, $error_line);
                }
                if (NMYSQCC_DISPLAY_LEVEL >= 1) {
                    self::display_output($error_message,  $error_class, $error_line);
                }

                /* end of execution on critical errors */
                die();

            break;

            case "2":

                if (NMYSQCC_LOG_LEVEL >= 2) {
                    self::write_warning($error_message, $error_class, $error_line);
                }
                if (NMYSQCC_DISPLAY_LEVEL >= 2) {
                    self::display_output($error_message,  $error_class, $error_line);
                }

            break;

            case "4":

                if (NMYSQCC_LOG_LEVEL === 4) {
                    self::write_info($error_message, $error_class, $error_line);
                }
                if (NMYSQCC_DISPLAY_LEVEL === 4) {
                    self::display_output($error_message,  $error_class, $error_line);
                }

            break;

            default:
            break;

        }

    }

    private static function write_error($msg,  $class, $line) {

        \NTRNX_MYSQLI\ntrnx_mysqli::log_error($msg,  $class, $line);

    }

    private static function write_warning($msg,  $class, $line) {

        \NTRNX_MYSQLI\ntrnx_mysqli::log_warning($msg,  $class, $line);

    }

    private static function write_info($msg,  $class, $line) {

        \NTRNX_MYSQLI\ntrnx_mysqli::log_info($msg,  $class, $line);

    }

    private static function display_output($msg,  $class, $line) {

        print NMYSQCC_DATETIME_SUFFIX
        . date(NMYSQCC_DATETIME_FORMAT)
        . NMYSQCC_DATETIME_PRAEFIX
        . NMYSQCC_LOG_SEPARATOR
        . $msg
        . NMYSQCC_LOG_SEPARATOR
        . $class
        . NMYSQCC_LOG_SEPARATOR
        . $line
        . NMYSQCC_BR;

    }

}

?>