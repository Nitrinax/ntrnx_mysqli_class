<?php

/* define shorthand directory separator constant */
if (!defined("MAKE_DS")) {			define("MAKE_DS",       DIRECTORY_SEPARATOR); }
if (!defined("MAKE_PS")) {			define("MAKE_PS",       PATH_SEPARATOR); }
if (!defined("MAKE_BR")) {			define("MAKE_BR",       "<br />"); }    /* HTML break row */
if (!defined("MAKE_LF")) {			define("MAKE_LF",       "\n"); }        /* PHP break row */
if (!defined("MAKE_BOLD_ON")) {		define("MAKE_BOLD_ON",  "<b>"); } 
if (!defined("MAKE_BOLD_OFF")) {	define("MAKE_BOLD_OFF", "</b>"); }

/* set DIR to absolute path to library files */
if (!defined("MAKE_DIR")) { define("MAKE_DIR", dirname(__FILE__) . MAKE_DS); }

/* get parent dir */
if (!defined("PARENT_DIR")) { define("PARENT_DIR", realpath(__DIR__ . '/..') . MAKE_DS); }

/* define source dir for make files */
if (!defined("MAKE_SUFFIX")) { define("MAKE_SUFFIX", ".make"); }

/* define target dir for sysplugins */
if (!defined("MAKE_SYSPLUGINS_DIR")) { define("MAKE_SYSPLUGINS_DIR", PARENT_DIR . "sysplugins" . MAKE_DS); }

/* define target dir for docs */
if (!defined("MAKE_DOCS_DIR")) { define("MAKE_DOCS_DIR", PARENT_DIR . "docs" . MAKE_DS); }

/* define source and target files */
if (!defined("DATA_FILE")) { define("DATA_FILE", "ntrnx_mysqli_data.php"); }
if (!defined("VERSION_FILE")) { define("VERSION_FILE", "VERSION.txt"); }

/* define pattern */
if (!defined("VERSION_PATTERN")) { define("VERSION_PATTERN", "{VERSION}"); }
if (!defined("MAJOR_PATTERN")) { define("MAJOR_PATTERN", "{VERSION_MAJOR}"); }
if (!defined("MINOR_PATTERN")) { define("MINOR_PATTERN", "{VERSION_MINOR}"); }
if (!defined("BUILD_PATTERN")) { define("BUILD_PATTERN", "{VERSION_BUILD}"); }
if (!defined("REVISION_PATTERN")) { define("REVISION_PATTERN", "{VERSION_REVISION}"); }
if (!defined("DATE_PATTERN")) { define("DATE_PATTERN", "{DATE}"); }
if (!defined("TIME_PATTERN")) { define("TIME_PATTERN", "{TIME}"); }

$path_array = explode(DIRECTORY_SEPARATOR, PARENT_DIR);
$class_file_name = $path_array[count($path_array)-2];
//echo $class_file_name;

$old_version = NULL;
$old_major = NULL;
$old_minor = NULL;
$old_build = NULL;
$old_revision = NULL;

/* read version file */
if (!file_exists(MAKE_DOCS_DIR . VERSION_FILE)) {
      $version_str = "0.0.0.0";
 } else {
      /* read version file */
      $version_text = file(MAKE_DOCS_DIR . VERSION_FILE);
      /* use 1st line */
      $version_str = trim(substr($version_text[0],11));
}
/* use 1st line */
$version_str = trim(substr($version_text[0],11));
/* explode version string parts */
$version_array = explode(".",$version_str);

/* set version string */
$old_version = $version_str;
/* set version major string */
$old_major = $version_array[0];
/* set version minor string */
$old_minor = $version_array[1];
/* set version build string */
$old_build = $version_array[2];
/* set version revision string */
$old_revision = $version_array[3];

/* bumping revision */
$new_major = $old_major + 1;
$new_minor = 0;
$new_build = 0;
$new_revision = 0;
$new_version = $new_major . "." .  $new_minor . "." . $new_build . "." . $new_revision;

echo "bumping " . MAKE_BR . MAKE_BOLD_ON . $class_file_name . MAKE_BOLD_OFF . MAKE_BR . " from " . $old_version . " to " . $new_version;

$data_file = file_get_contents(MAKE_DIR . DATA_FILE . MAKE_SUFFIX);
$version_file = file_get_contents(MAKE_DIR . VERSION_FILE . MAKE_SUFFIX);

$new_date = date("Y-m-d");
$new_time = date("H:i:s");

$new_data_file = str_replace(
  
  array('$' . VERSION_PATTERN,
        '$' . MAJOR_PATTERN,
        '$' . MINOR_PATTERN,
        '$' . BUILD_PATTERN,
        '$' . REVISION_PATTERN,
        '$' . DATE_PATTERN,
        '$' . TIME_PATTERN

  ),
  array($new_version,
        $new_major,
        $new_minor,
        $new_build,
        $new_revision,
        $new_date,
        $new_time
  ),
  
  $data_file);

$new_version_file = str_replace(

  array ('$' . VERSION_PATTERN,
         '$' . DATE_PATTERN,
         '$' . TIME_PATTERN
  ),
  array($new_version,
        $new_date,
        $new_time
  ),
  
  $version_file);

/* control output */
//echo "<pre>" . $new_data_file . "<pre/>";
//echo "<pre>" . $new_version_file . "<pre/>";

/* bumping ntrnx_mysqli_data.php */
$data_handle = fopen(MAKE_SYSPLUGINS_DIR . DATA_FILE, "w");
fwrite($data_handle, $new_data_file);
fclose($data_handle);

/* bumping VERSION.txt */
$version_handle = fopen(MAKE_DOCS_DIR . VERSION_FILE, "w");
fwrite($version_handle, $new_version_file);
fclose($version_handle);

?>