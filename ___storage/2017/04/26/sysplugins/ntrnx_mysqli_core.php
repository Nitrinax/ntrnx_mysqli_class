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

	static function check_dependences() {}

	static function check_functions() {}

	static function check_update() {

		global $ntrnx_mysqli_sublib_array_files;

		/*  */
		foreach ($ntrnx_mysqli_sublib_array_files as &$ntrnx_mysqli_sublib_var_file) {

			//$subclass_version = "\\NTRNX_MYSQLI\\" . $ntrnx_mysqli_sublib_var_file . "::get_version";
			//$subclass_version = "\\NTRNX_MYSQLI\\" . $ntrnx_mysqli_sublib_var_file . "::_CLASS_VERSION";

		}

		print \NTRNX_MYSQLI\ntrnx_mysqli_affected_fields::_CLASS_VERSION;

	}

} /* end of class ntrnx_mysqli_core */

?>