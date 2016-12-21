<?php

namespace NTRNX_MYSQLI;

/**
 * ntrnx_mysqli.class.php
 *
 * @category  Database Access
 * @package   ntrnx_mysqli
 * @author    René Zimmerling <nitrinax at googlemail dot com>
 * @license   http://opensource.org/licenses/gpl-3.0.html GNU Public License
 * @link      https://github.com/Nitrinax
 * @version   0.1.0.0-master
 */

/* begin of class ntrnx_mysqli_core_data */
class ntrnx_mysqli_core_data extends \NTRNX_MYSQLI\ntrnx_mysqli_config {

	/* class name */
	const _CLASS_NAME = 'ntrnx_mysqli.class.php';

	/**
	 * http://en.wikipedia.org/wiki/Software_versioning
	 * major.minor[.build[.revision]]
	 */
	const _CLASS_VERSION_MAJOR = '0';
	const _CLASS_VERSION_MINOR = '1';
	const _CLASS_VERSION_BUILD = '0';
	const _CLASS_VERSION_REVISION = '0';
	/* YYYY-MM-DD */
	const _CLASS_DATE = '2016-11-10';
	/* hh:mm:ss */
	const _CLASS_TIME = '08:50:00';

	/**
	 * project branches
	 *
	 *		branch			const		suffix		desc
	 *
	 *		morning star	ms			ms			new ideas
	 *		error			dbg			dbg			with error output informations	 
	 * 		master									master branch
	 */
	const _CLASS_BRANCH = 'master';

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
	const _CLASS_BUILD_CHANNEL = 'sc';

	/* author data */
	const _CLASS_AUTHOR_DATA = 'René Zimmerling';
	const _CLASS_AUTHOR_NICK = 'Nitrinax';
	const _CLASS_AUTHOR_MAIL = 'nitrinax at googlemail dot com';
	const _CLASS_AUTHOR_URL	 = 'https://github.com/Nitrinax';

	/* class description */
	const _CLASS_DESCRIPTION = 'provide abstracted mysqli functions';

	/* project main url */
	const _CLASS_PROJECT_URL = 'https://github.com/Nitrinax/ntrnx_mysqli_class';
	/* project version url */
	const _CLASS_VERSION_URL = 'https://github.com/Nitrinax/ntrnx_mysqli_class/docs/VERSION.txt';
	/* project update url */
	const _CLASS_UPDATES_URL = 'https://github.com/Nitrinax/ntrnx_mysqli_class';
	/* project source url */
	const _CLASS_SOURCE_URL = 'https://github.com/Nitrinax/ntrnx_mysqli_class';

	/* class dependences possible */
	const _CLASS_DEPENDENCES = FALSE;

	/* class dependences array */
	public $_class_dependences = array('PHP' => '7.0.0');

	/* class dependences possible */
	const _CLASS_NEEDED_FUNCTIONS = FALSE;

	/* project needed php functions */
	public $_class_needed_functions = array();

	/* class update possible */
	const _CLASS_UPDATE = FALSE;

	/* begin of class constructor */
	function __construct () {
	} /* end of class constructor */

	/* class destructor */
	function __destruct () {
	} /* end of class destructor */

} /* end of class ntrnx_mysqli_core_data */

?>