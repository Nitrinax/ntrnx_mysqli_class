<?php

namespace NTRNX_MYSQLI;

/* begin of class */
class ntrnx_mysqli_internal_log extends \NTRNX_MYSQLI\ntrnx_mysqli {

    static $error_logfile = NULL;
    static $warning_logfile = NULL;
    static $current_datetime = NULL;

    static function error($error){

        $error_logfile = NMYSQCC_LOG_DIR . "errors.txt";
        $current_datetime = "[" . date(NMYSQCC_DATETIME_FORMAT) . "]";

        /*
        if (NMYSQCC_DEBUG == TRUE) {
            print "<pre>" . $error . "<br/>";
            print $error_logfile . "</pre>";
        }
        */

        if (NMYSQCC_LOG_ERRORS === TRUE) {

            $error_file = fopen($error_logfile, "a");
            fputs($error_file, $current_datetime . " - " . $error. PHP_EOL);
            fclose($error_file);

        }

    }

    static function warning($warning){

        $warning_logfile = NMYSQCC_LOG_DIR . "warnings.txt";
        $current_datetime = "[" . date(NMYSQCC_DATETIME_FORMAT) . "]";

        /*
        if (NMYSQCC_DEBUG == TRUE) {
            print "<pre>" . $warning . "<br/>";
            print $warning_logfile . "</pre>";
        }
        */

        if (NMYSQCC_LOG_WARNINGS === TRUE) {

            $warning_file = fopen($warning_logfile, "a");
            fputs($warning_file, $current_datetime . " - " . $warning. PHP_EOL);
            fclose($warning_file);

        }

    }

}

?>