<?php

/* begin of class ntrnx_mysqli_internal_check_update */
class ntrnx_mysqli_internal_check_update {

	/* begin of class constructor */
	function __construct () {
	} /* end of class constructor */

	/* class destructor */
	function __destruct () {
	} /* end of class destructor */
	
	/* begin of function check_update */
	public function check_update($class_local = NULL) {

		/* define update/error messages */
		define("NMYSQCC_MSG_UPDATE_YOU_HAVE_THE_LATEST_VERSION", 	"no updated needed, you have the latest version %v (%d)</br/>");
		define("NMYSQCC_MSG_UPDATE_THERE_IS_A_UPDATE_AVAILABE", 	"there is a update available for %s to version %v (%d)");
		define("NMYSQCC_MSG_UPDATE_DIRECT_DOWNLOAD_FILE", 			"<br/>direct download: <a href=\"%\">%l</a></br/>");

		define("NMYSQCC_ERROR_UNKNOWN_VERSION_OF_LOCAL_FILE", 		"unknown version of local file</br/>");
		define("NMYSQCC_ERROR_CANT_COMPARE_VERSION", 				"cant compare version of local and remote file</br/>");
		define("NMYSQCC_ERROR_COULD_GET_UPDATE_INFORMATIONS", 		"could get update information for %s</br/>");
		
		/* init, clear vars, classes, objects */
		$localVersion = NULL;
		$localDate = NULL;
		$remoteVersion = NULL;
		$remoteDate = NULL;
		$latest_version = NULL;
		$latest_date = NULL;
		$latest_file = NULL;
		$out_str = NULL;
		$out_file = NULL;
		
		/* get version string of local class */
		$localVersion =
			$class_local::_CLASS_VERSION_MAJOR . "."
			. $class_local::_CLASS_VERSION_MINOR . "."
			. $class_local::_CLASS_VERSION_BUILD . "."
			. $class_local::_CLASS_VERSION_REVISION;
			
		/* get date of local class */	
		$localDate = $class_local::_CLASS_DATE;
		
		/* get update url links and add file parts */ 
		$latest_version = $class_local::_CLASS_VERSION_URL . "LATEST_VERSION.txt";
		$latest_date = $class_local::_CLASS_VERSION_URL . "LATEST_DATE.txt";
		$latest_file = $class_local::_CLASS_VERSION_URL . "LATEST_FILE.txt";
		
		/* read remote version, date, file info */
		if (($remoteVersion = @file_get_contents($latest_version))
			&& ($remoteDate = @file_get_contents($latest_date))
			&& ($remoteFile = @file_get_contents($latest_file))) {
			
				/* check version if locale version less than remote version */
				if (version_compare($localVersion, $remoteVersion, "<")) {
					
					/* generate output message */
					$out_str = str_replace("%s", $class_local::_CLASS_NAME, NMYSQCC_MSG_UPDATE_THERE_IS_A_UPDATE_AVAILABE);
					$out_str = str_replace("%v", $remoteVersion, $out_str);
					$out_str = str_replace("%d", $remoteDate, $out_str);
					print $out_str;
					
					/* generate direct download link */
					$out_file = str_replace("%u", $remoteFile, NMYSQCC_MSG_UPDATE_DIRECT_DOWNLOAD_FILE);
					$out_file = str_replace("%l", substr($remoteFile, strpos($remoteFile, $class_local::_CLASS_NAME)), $out_file);
					print $out_file;
				
				/* check version if locale version greater than remote version */
				} else if (version_compare($localVersion, $remoteVersion, ">")) {
						
					print NMYSQCC_ERROR_UNKNOWN_VERSION_OF_LOCAL_FILE;
					
				/* check version if locale version equal to remote version */
				} else if (version_compare($localVersion, $remoteVersion, "=")) {
					
					$out_file = str_replace("%v", $localVersion, NMYSQCC_MSG_UPDATE_YOU_HAVE_THE_LATEST_VERSION);
					$out_file = str_replace("%d", $localDate, $out_file);
					print $out_file;
				
				}
				/* if version compare not possible */
				else {
				
					print NMYSQCC_ERROR_CANT_COMPARE_VERSION;
					
				}
			
		}
		
		/* if no update informations found */
		else {
		
			print str_replace("%s", $class_local::_CLASS_NAME, NMYSQCC_ERROR_COULD_GET_UPDATE_INFORMATIONS);
		
		}
		
	} /* end of function check_update */

} /* end of class ntrnx_mysqli_internal_check_update */

?>