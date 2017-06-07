<?php

/*
* class ntrnx_mysqli_core
*
* short:
*
* - core funtions for class ntrnx_mysqli
*
*/

namespace NTRNX_MYSQLI;

/* begin of class ntrnx_mysqli_core */
class ntrnx_mysqli_core extends \NTRNX_MYSQLI\ntrnx_mysqli_data {

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
    public static function check_dependences() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_dependences::check(); }
    public static function get_needed_functions_state() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_needed_functions::state(); }
    public static function get_needed_functions() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_needed_functions::get(); }
    public static function check_needed_functions() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_needed_functions::check(); }
    public static function get_project_url() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_url::get_project_url(); }
    public static function get_source_url() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_url::get_source_url(); }
    public static function get_version_url() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_url::get_version_url(); }
    public static function get_update_url() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_url::get_update_url(); }
    public static function get_manual_url() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_url::get_manual_url(); }
    public static function get_version() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_version::get(); }
    public static function get_version_major() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_version::get_major(); }
    public static function get_version_minor() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_version::get_minor(); }
    public static function get_version_build() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_version::get_build(); }
    public static function get_version_revision() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_version::get_revision(); }
    public static function get_version_date() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_version::get_date(); }
    public static function get_version_time() { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_version::get_time(); }
    public static function raise_error($error_id, $error_class, $error_line, $stringA = NULL, $stringB = NULL, $stringC = NULL) {
        return \NTRNX_MYSQLI\ntrnx_mysqli_internal_error::raise($error_id, $error_class, $error_line, $stringA, $stringB, $stringC);
    }
    public static function log_error($error, $class, $line) { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_log::log_error($error, $class, $line); }
    public static function log_warning($warning, $class, $line) { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_log::log_warning($warning, $class, $line); }
    public static function log_info($info, $class, $line) { return \NTRNX_MYSQLI\ntrnx_mysqli_internal_log::log_info($info, $class, $line); }

} /* end of class ntrnx_mysqli_core */

?>