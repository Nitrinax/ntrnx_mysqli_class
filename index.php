<?php

/* error reporting for classname */
ini_set ("error_reporting", E_ALL & ~E_NOTICE);
ini_set ("display_errors", 1);

require "ntrnx_mysqli.class.php";

print "class informations<br/>";
print "<br/>";

print "class : "
. \NTRNX_MYSQLI\ntrnx_mysqli::get_name() . " "
. \NTRNX_MYSQLI\ntrnx_mysqli::get_version_major() . "."
. \NTRNX_MYSQLI\ntrnx_mysqli::get_version_minor() . "."
. \NTRNX_MYSQLI\ntrnx_mysqli::get_version_build() . "."
. \NTRNX_MYSQLI\ntrnx_mysqli::get_version_revision() . " ("
. \NTRNX_MYSQLI\ntrnx_mysqli::get_version_date() . ") ["
. \NTRNX_MYSQLI\ntrnx_mysqli::get_version_time() . "] loaded<br/>";

print "class api : " . \NTRNX_MYSQLI\ntrnx_mysqli::get_api() . "<br/>";

//print "class author name: " . \NTRNX_MYSQLI\ntrnx_mysqli::get_author_name() . "<br/>";
//print "class author nick: " . \NTRNX_MYSQLI\ntrnx_mysqli::get_author_nick() . "<br/>";
//print "class author email: " . \NTRNX_MYSQLI\ntrnx_mysqli::get_author_email() . "<br/>";
//print "class author url: " . \NTRNX_MYSQLI\ntrnx_mysqli::get_author_url() . "<br/>";
//print "class branch : " . \NTRNX_MYSQLI\ntrnx_mysqli::get_branch() . "<br/>";
//print "class buildchannel : " . \NTRNX_MYSQLI\ntrnx_mysqli::get_buildchannel() . "<br/>";
//print "class project url : " . \NTRNX_MYSQLI\ntrnx_mysqli::get_project_url() . "<br/>";
//print "class source url : " . \NTRNX_MYSQLI\ntrnx_mysqli::get_source_url() . "<br/>";
//print "class version url : " . \NTRNX_MYSQLI\ntrnx_mysqli::get_version_url() . "<br/>";
//print "class update url : " . \NTRNX_MYSQLI\ntrnx_mysqli::get_update_url() . "<br/>";
//print "class manual url : " . \NTRNX_MYSQLI\ntrnx_mysqli::get_manual_url() . "<br/>";

print "class dependences_state : ";

if (\NTRNX_MYSQLI\ntrnx_mysqli::get_dependences_state()===TRUE) {
    print "ON<br/>";
    print "class dependences list :" . \NTRNX_MYSQLI\ntrnx_mysqli::check_dependences() . "<br/>";
} else {
    print "OFF<br/>";
}

print "class needed functions state : ";

if (\NTRNX_MYSQLI\ntrnx_mysqli::get_needed_functions_state()===TRUE) {

    print "ON<br/>";
    print "class eeded function list :" . \NTRNX_MYSQLI\ntrnx_mysqli::check_needed_functions() ."<br/>";
} else {
    print "OFF<br/>";
}

print "<br/>";
print "now check  functions<br/>";
print "<br/>";

$db_handle = NULL;

print " - connect : "; if ($db_handle = \NTRNX_MYSQLI\ntrnx_mysqli::connect()) { print "PASSED<br/>"; }
print " - close : "; if ($db_handle) { \NTRNX_MYSQLI\ntrnx_mysqli::close($db_handle); print "PASSED<br/><br/>"; }
print " - pconnect : "; if ($db_handle = \NTRNX_MYSQLI\ntrnx_mysqli::pconnect()) { print "PASSED<br/>"; }
print " - close : "; if ($db_handle) { \NTRNX_MYSQLI\ntrnx_mysqli::close($db_handle); print "PASSED<br/><br/>"; }
print " - init : "; if ($db_handle = \NTRNX_MYSQLI\ntrnx_mysqli::init($db_handle)) { print "PASSED<br/>"; }
print " - ssl_set : "; if (\NTRNX_MYSQLI\ntrnx_mysqli::ssl_set($db_handle) === TRUE) { print "PASSED<br/>"; }
print " - real_connect : ";
if (\NTRNX_MYSQLI\ntrnx_mysqli::real_connect($db_handle) === TRUE) {
	
	print "PASSED<br/>";

	print " - ssl_get : ";
	if (\NTRNX_MYSQLI\ntrnx_mysqli::ssl_get($db_handle) === TRUE) { print NMYSQCC_ERROR_SSL_IS_ENABLED; } else { print NMYSQCC_ERROR_SSL_IS_DISABLED; }
	print "<br/>";

	print " - select : ";
	$query_result = \NTRNX_MYSQLI\ntrnx_mysqli::select($db_handle,
		
			// SELECT
			array(
				'test','name','AS','name',
				'test','salary','AS','salary'
			),
			// FROM
			array(
				'test'
			),
			// JOIN
			NULL,
			// WHERE
			array(
				'test', 'name',
				//'EQUAL', 'STRING', 'test'
				//'GT', '0',
				//'OR',
				//'test', 'name',
				//'EQUAL', 'kenobi',
				'LIKE', 'kenobi'
			)

	);
	if ($query_result) {
		print "PASSED<br/>";
		print " - free_result : ";
		\NTRNX_MYSQLI\ntrnx_mysqli::free_result($query_result);
		print "PASSED<br/>";
	}

	print " - insert : ";
	$query_result = \NTRNX_MYSQLI\ntrnx_mysqli::insert($db_handle,
			'test',
			array(
				'name',
				'salary'
			),
			array(
				'abc',
				'def'
			)
	);
	if ($query_result) { print "PASSED<br/>"; }

	print " - update : ";
	$query_result = \NTRNX_MYSQLI\ntrnx_mysqli::update($db_handle,
			'test',
			array(
				'name',
				'xyz',
				'salary',
				'xyz'
			),
			array(
				'name',
				'abc',
				'salary',
				'def'
			)
	);
	if ($query_result) { print "PASSED<br/>"; }

	print " - delete : ";
	$query_result = \NTRNX_MYSQLI\ntrnx_mysqli::delete($db_handle,
			'test',
			array(
				'name',
				'EQUAL',
				'xyz',
				'AND',
				'salary',
				'EQUAL',
				'xyz'
			)
	);
	if ($query_result) { print "PASSED<br/><br/>"; }

	print "- tables :<br/>";
	$tables_result = \NTRNX_MYSQLI\ntrnx_mysqli::tables($db_handle);
	$tables_assoc = \NTRNX_MYSQLI\ntrnx_mysqli::fetch_all($tables_result, MYSQLI_ASSOC);
	if (\NTRNX_MYSQLI\ntrnx_mysqli::num_rows($tables_result) > 0) {
		$tables_count = count($tables_assoc);
		print "<pre>";
		for ($i=0; $i < $tables_count; $i++) {
			print " - " . $tables_assoc[$i]["Tables_in_". \NTRNX_MYSQLI\ntrnx_mysqli::$dbname] . "<br/>";
		}
		print "</pre>";
	}
	if ($tables_result) { \NTRNX_MYSQLI\ntrnx_mysqli::free_result($tables_result); }

	print "- columns  :<br/>";
	$columns_result = \NTRNX_MYSQLI\ntrnx_mysqli::columns($db_handle, "test");
	$columns_assoc = \NTRNX_MYSQLI\ntrnx_mysqli::fetch_all($columns_result, MYSQLI_ASSOC);
	if (\NTRNX_MYSQLI\ntrnx_mysqli::num_rows($columns_result) > 0) {
		$columns_count = count($columns_assoc);
		print "<pre>";
		for ($i=0; $i < $columns_count; $i++) {
			print " - " . $columns_assoc[$i]["Field"] . "<br/>";
		}
		print "</pre>";
	}
	if ($columns_result) { \NTRNX_MYSQLI\ntrnx_mysqli::free_result($columns_result); }

	print " - close : ";
	\NTRNX_MYSQLI\ntrnx_mysqli::close($db_handle);
	print "PASSED<br/><br/>";

 }

print " - init : ";
if ($db_handle = \NTRNX_MYSQLI\ntrnx_mysqli::init($db_handle)) { print "PASSED<br/>"; }

print " - real_pconnect : ";
if (\NTRNX_MYSQLI\ntrnx_mysqli::real_pconnect($db_handle) === TRUE) {

	print "PASSED<br/>";

	print " - close : ";
	\NTRNX_MYSQLI\ntrnx_mysqli::close($db_handle);
	print "PASSED<br/>";

 }

?>