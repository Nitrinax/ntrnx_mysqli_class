<?php

/**
 * ntrnx_mysqli.class.php
 *
 * @category  Database Access
 * @package   ntrnx_mysqli
 * @author    René Zimmerling <nitrinax at googlemail dot com>
 * @license   http://opensource.org/licenses/gpl-3.0.html GNU Public License
 * @link      https://github.com/Nitrinax
 * @version   0.5.1.9-master
 */

namespace NTRNX_MYSQLI;

/* begin of class ntrnx_mysqli_data */
class ntrnx_mysqli_data extends \NTRNX_MYSQLI\ntrnx_mysqli_config {

	/* class name */
	const _CLASS_NAME = "ntrnx_mysqli.class.php";
	/* class version
	* http://en.wikipedia.org/wiki/Software_versioning
	* major.minor[.build[.revision]]
	*/
	const _CLASS_VERSION_MAJOR = "0";
	const _CLASS_VERSION_MINOR = "5";
	const _CLASS_VERSION_BUILD = "1";
	const _CLASS_VERSION_REVISION = "9";
	/* YYYY-MM-DD */
	const _CLASS_DATE = "2018-02-07";
	/* hh:mm:ss */
	const _CLASS_TIME = "13:54:15";

	/*
	* project branches
	*
	*		branch			suffix		desc
	*
	*		morning star	ms			new ideas
	*		dbg				dbg			with error output informations
	* 		master						master branch
	*/
	const _CLASS_BRANCH = "master";

	/*
	* project build channel
	*
	*		channel			suffix		desc
	*
	*		shadow copy		sc			experimental
	*		nightly			nightly		nightly build
	*		aurora			alpha		alpha build
	*		sunrise			beta		beta build
	*		daylight		rc			release candidate
	*		high noon					release
	*/
	const _CLASS_BUILD_CHANNEL = "nightly";

	/* class api version */
	const _CLASS_API = "1.5";

	/* author data */
	const _CLASS_AUTHOR_NAME = "René Zimmerling";
	const _CLASS_AUTHOR_NICK = "Nitrinax";
	const _CLASS_AUTHOR_MAIL = "nitrinax at googlemail dot com";
	const _CLASS_AUTHOR_URL	 = "https://github.com/Nitrinax/";

	/* class description */
	const _CLASS_DESCRIPTION = "provide abstracted mysqli functions";

	/* project main url */
	const _CLASS_PROJECT_URL = "https://github.com/Nitrinax/ntrnx_mysqli_class/";
	/* project source url */
	const _CLASS_SOURCE_URL = "https://github.com/Nitrinax/ntrnx_mysqli_class/source/";
	/* project version url */
	const _CLASS_VERSION_URL = "https://raw.githubusercontent.com/Nitrinax/ntrnx_mysqli_class/master/docs/VERSION.txt";
	/* project update url */
	const _CLASS_UPDATE_URL = "https://github.com/Nitrinax/ntrnx_mysqli_class/";
	/* project manual url */
	const _CLASS_MANUAL_URL = "https://github.com/Nitrinax/ntrnx_mysqli_class/master/docs/";

	/* class dependences possible */
	const _CLASS_DEPENDENCES = FALSE;

	/* class dependences array */
	static $_class_dependences = array(

		/* name => version */
		"PHP" => "7.0.0",

	);

	/* class dependences possible */
	const _CLASS_NEEDED_FUNCTIONS = FALSE;

	/* needed php functions as array */
	static $_class_needed_functions = array(

		/* php function name */
		"count",
		"define",
		"defined",
		"dirname",
		"file_exists",
		"filter_var",
		"htmlspecialchars",
		"is_dir",
		"mysqli_affected_rows",
		"mysqli_autocommit",
		"mysqli_begin_transaction",
		"mysqli_change_user",
		"mysqli_character_set_name",
		"mysqli_character_set_name",
		"mysqli_close",
		"mysqli_commit",
		"mysqli_connect",
		"mysqli_connect_errno",
		"mysqli_connect_error",
		"mysqli_data_seek",
		"mysqli_debug",
		"mysqli_dump_debug_info",
		"mysqli_errno",
		"mysqli_error",
		"mysqli_error_list",
		"mysqli_fetch_all",
		"mysqli_fetch_array",
		"mysqli_fetch_assoc",
		"mysqli_fetch_field",
		"mysqli_fetch_field_direct",
		"mysqli_fetch_fields",
		"mysqli_fetch_lengths",
		"mysqli_fetch_object",
		"mysqli_fetch_row",
		"mysqli_field_count",
		"mysqli_field_count",
		"mysqli_field_seek",
		"mysqli_field_tell",
		"mysqli_free_result",
		"mysqli_get_charset",
		"mysqli_get_client_info",
		"mysqli_get_client_stats",
		"mysqli_get_client_version",
		"mysqli_get_connection_stats",
		"mysqli_get_host_info",
		"mysqli_get_proto_info",
		"mysqli_get_server_info",
		"mysqli_get_server_version",
		"mysqli_get_warnings",
		"mysqli_info",
		"mysqli_init",
		"mysqli_insert_id",
		"mysqli_kill",
		"mysqli_more_results",
		"mysqli_multi_query",
		"mysqli_next_result",
		"mysqli_num_fields",
		"mysqli_num_rows",
		"mysqli_options",
		"mysqli_ping",
		"mysqli_poll",
		"mysqli_prepare",
		"mysqli_query",
		"mysqli_real_connect",
		"mysqli_real_escape_string",
		"mysqli_real_query",
		"mysqli_reap_async_query",
		"mysqli_refresh",
		"mysqli_release_savepoint",
		"mysqli_rollback",
		"mysqli_savepoint",
		"mysqli_select_db",
		"mysqli_set_charset",
		"mysqli_set_local_infile_default",
		"mysqli_set_local_infile_handler",
		"mysqli_sqlstate",
		"mysqli_ssl_set",
		"mysqli_stat",
		"mysqli_store_result",
		"mysqli_thread_id",
		"mysqli_thread_safe",
		"mysqli_use_result",
		"mysqli_warning_count",
		"phpversion",
		"str_replace",
		"version_compare"

	);

} /* end of class ntrnx_mysqli_data */

?>