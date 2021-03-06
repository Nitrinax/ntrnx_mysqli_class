<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_internal_log extends \NTRNX_MYSQLI\ntrnx_mysqli {

    private static $error_logfile = NULL;
    private static $warning_logfile = NULL;
    private static $current_datetime = NULL;

    private static $error_filename = NMYSQCC_LOG_DIR . "errors.txt";
    private static $warning_filename = NMYSQCC_LOG_DIR . "warnings.txt";
    private static $info_file = NMYSQCC_LOG_DIR . "infos.txt";

    static function log_error($error, $class, $line, $error_id = NULL){

        $current_datetime = NMYSQCC_DATETIME_SUFFIX . date(NMYSQCC_DATETIME_FORMAT) . NMYSQCC_DATETIME_PRAEFIX;

        $error_file = fopen(self::$error_filename, "a");
        fputs($error_file, $current_datetime . NMYSQCC_LOG_SEPARATOR . $error . NMYSQCC_BLANK . NMYSQCC_LEFT_PARENTHESIS . $error_id . NMYSQCC_RIGHT_PARENTHESIS . NMYSQCC_LOG_SEPARATOR . $class . NMYSQCC_LOG_SEPARATOR . $line . PHP_EOL);
        fclose($error_file);

    }

    static function log_warning($warning, $class, $line, $error_id = NULL){

        $current_datetime = NMYSQCC_DATETIME_SUFFIX . date(NMYSQCC_DATETIME_FORMAT) . NMYSQCC_DATETIME_PRAEFIX;

        $warning_file = fopen(self::$warning_filename, "a");
        fputs($warning_file, $current_datetime . NMYSQCC_LOG_SEPARATOR . $warning . NMYSQCC_BLANK . NMYSQCC_LEFT_PARENTHESIS . $error_id . NMYSQCC_RIGHT_PARENTHESIS . NMYSQCC_LOG_SEPARATOR . $class . NMYSQCC_LOG_SEPARATOR . $line . PHP_EOL);
        fclose($warning_file);

    }

    static function log_info($info, $class, $line, $error_id = NULL){

        $current_datetime = NMYSQCC_DATETIME_SUFFIX . date(NMYSQCC_DATETIME_FORMAT) . NMYSQCC_DATETIME_PRAEFIX;

        $info_file = fopen(self::$info_file, "a");
        fputs($info_file, $current_datetime . NMYSQCC_LOG_SEPARATOR . $info . NMYSQCC_BLANK . NMYSQCC_LEFT_PARENTHESIS . $error_id . NMYSQCC_RIGHT_PARENTHESIS . NMYSQCC_LOG_SEPARATOR . $class . NMYSQCC_LOG_SEPARATOR . $line . PHP_EOL);
        fclose($info_file);

    }

}

?>