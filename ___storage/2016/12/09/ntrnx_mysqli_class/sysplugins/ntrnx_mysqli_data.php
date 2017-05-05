<?php

/**
 * ntrnx_mysqli.class.php
 *
 * @category  Database Access
 * @package   ntrnx_mysqli
 * @author    René Zimmerling <nitrinax at googlemail dot com>
 * @license   http://opensource.org/licenses/gpl-3.0.html GNU Public License
 * @link      https://github.com/Nitrinax
 * @version   0.0.0.0-master
 */

namespace NTRNX_MYSQLI;

/* begin of class ntrnx_mysqli_data */
class ntrnx_mysqli_data extends \NTRNX_MYSQLI\ntrnx_mysqli_config {

	/* class name */
	const _CLASS_NAME = "ntrnx_mysqli.class.php";

	/* class version */
	/**
	 * http://en.wikipedia.org/wiki/Software_versioning
	 * major.minor[.build[.revision]]
	 */
	const _CLASS_VERSION_MAJOR = "0";
	const _CLASS_VERSION_MINOR = "0";
	const _CLASS_VERSION_BUILD = "0";
	const _CLASS_VERSION_REVISION = "0";
	/* YYYY-MM-DD */
	const _CLASS_DATE = "2016-12-09";
	/* hh:mm:ss */
	const _CLASS_TIME = "07:02:07";

	/**
	 * project branches
	 *
	 *		branch			const		suffix		desc
	 *
	 *		morning star	ms			ms			new ideas
	 *		dbg				dbg			dbg			with error output informations	 
	 * 		master									master branch
	 */
	const _CLASS_BRANCHES = "master";

	/**
	 * project build channel
	 *
	 *		channel			const		suffix		desc
	 *
	 *		shadow copy		sc			sc			experimental
	 *		nightly			nightly		nightly		nightly build
	 *		aurora			aurora		alpha		alpha build
	 *		sunrise			sunrise		beta		beta build
	 *		daylight		daylight	rc			release candidate
	 *		high noon								release
	 */
	const _CLASS_BUILD_CHANNEL = "";

	/* author data */
	const _CLASS_AUTHOR_NAME = "René Zimmerling";
	const _CLASS_AUTHOR_NICK = "Nitrinax";
	const _CLASS_AUTHOR_MAIL = "nitrinax at googlemail dot com";
	const _CLASS_AUTHOR_URL	 = "https://github.com/Nitrinax/";

	/* class description */
	const _CLASS_DESCRIPTION = "provide abstracted mysqli functions";

	/* project main url */
	const _CLASS_PROJECT_URL = "https://github.com/Nitrinax/ntrnx_mysqli_class/";
	/* project version url */
	const _CLASS_VERSION_URL = "https://raw.githubusercontent.com/Nitrinax/ntrnx_mysqli_class/master/docs/VERSION.txt";
	/* project update url */
	const _CLASS_UPDATES_URL = "https://github.com/Nitrinax/ntrnx_mysqli_class//archive/master.zip/";
	/* project source url */
	const _CLASS_SOURCE_URL = "https://github.com/Nitrinax/ntrnx_mysqli_class/";

	/* class dependences possible */
	const _CLASS_DEPENDENCES = FALSE;

	/* class dependences array */
	public $_class_dependences = array(

		/* name => version */
		"PHP" => "7.0.0",		
		//"" => "",

	);

	/* class dependences possible */
	const _CLASS_NEEDED_FUNCTIONS = FALSE;

	/* needed php functions as array */
	public $_class_needed_functions = array(

		/* name */
		//"",
		//"",

	);

	/* class update possible */
	const _CLASS_UPDATE = FALSE;

	/* begin of class constructor */
	function __construct (){	
	} /* end of class constructor */

	/* begin of class destructor */
	function __destruct() {
	} /* end of class destructor */

} /* end of class ntrnx_mysqli_data */

?>