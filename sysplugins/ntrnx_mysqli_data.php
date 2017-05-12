<?php

/**
 * ntrnx_mysqli.class.php
 *
 * @category  Database Access
 * @package   ntrnx_mysqli
 * @author    René Zimmerling <nitrinax at googlemail dot com>
 * @license   http://opensource.org/licenses/gpl-3.0.html GNU Public License
 * @link      https://github.com/Nitrinax
 * @version   0.4.0.0-master
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
	const _CLASS_VERSION_MINOR = "4";
	const _CLASS_VERSION_BUILD = "1";
	const _CLASS_VERSION_REVISION = "0";
	/* YYYY-MM-DD */
	const _CLASS_DATE = "2017-05-12";
	/* hh:mm:ss */
	const _CLASS_TIME = "10:00:00";

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
		"PHP" => "7.0.0"

	);

	/* class dependences possible */
	const _CLASS_NEEDED_FUNCTIONS = FALSE;

	/* needed php functions as array */
	static $_class_needed_functions = array(

		/* php function name */
		"function_exists",
		"phpversion",
		"version_compare"

	);

} /* end of class ntrnx_mysqli_data */

?>