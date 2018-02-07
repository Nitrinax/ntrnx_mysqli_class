<?php

const SHOW_CLASSDATA = TRUE;
const SHOW_QUERIES = TRUE;

/* error reporting for classname */
ini_set ("error_reporting", E_ALL & ~E_NOTICE);
ini_set ("display_errors", 1);

include_once "ntrnx_mysqli.class.php";

$my_tab = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

const STATE_ON = "<font color=\"green\">ON</font>";
const STATE_OFF = "<font color=\"red\">OFF</font>";
const STATE_PASSED = "<font color=\"green\">PASSED</font><br/>";

echo "example for using the ntrnx_mysqli_class<br/><br/>";

echo "SHOW_CLASSDATA is ";
if (SHOW_CLASSDATA === TRUE) { echo STATE_ON; } else { echo STATE_OFF; }
echo "<br/>";
echo "SHOW_QUERIES is ";
if (SHOW_QUERIES === TRUE) { echo STATE_ON; } else { echo STATE_OFF; }
echo "<br/><br/>";

if (SHOW_CLASSDATA === TRUE) {
	echo "show class data<br/>";
	echo "<br/>";

	echo "class : "
	. \NTRNX_MYSQLI\ntrnx_mysqli_internal_name::get() . " "
	. \NTRNX_MYSQLI\ntrnx_mysqli_internal_version::get_major() . "."
	. \NTRNX_MYSQLI\ntrnx_mysqli_internal_version::get_minor() . "."
	. \NTRNX_MYSQLI\ntrnx_mysqli_internal_version::get_build() . "."
	. \NTRNX_MYSQLI\ntrnx_mysqli_internal_version::get_revision() . " ("
	. \NTRNX_MYSQLI\ntrnx_mysqli_internal_version::get_date() . ") ["
	. \NTRNX_MYSQLI\ntrnx_mysqli_internal_version::get_time() . "] loaded<br/>";

	echo "class api : " . \NTRNX_MYSQLI\ntrnx_mysqli_internal_api::get() . "<br/>";

	echo "class author name: " . \NTRNX_MYSQLI\ntrnx_mysqli_internal_author::get_name() . "<br/>";
	echo "class author nick: " . \NTRNX_MYSQLI\ntrnx_mysqli_internal_author::get_nick() . "<br/>";
	echo "class author email: " . \NTRNX_MYSQLI\ntrnx_mysqli_internal_author::get_email() . "<br/>";
	echo "class author url: " . \NTRNX_MYSQLI\ntrnx_mysqli_internal_author::get_url() . "<br/>";
	echo "class branch : " . \NTRNX_MYSQLI\ntrnx_mysqli_internal_build::get_branch() . "<br/>";
	echo "class buildchannel : " . \NTRNX_MYSQLI\ntrnx_mysqli_internal_build::get_build_channel() . "<br/>";
	echo "class project url : " . \NTRNX_MYSQLI\ntrnx_mysqli_internal_url::get_project_url() . "<br/>";
	echo "class source url : " . \NTRNX_MYSQLI\ntrnx_mysqli_internal_url::get_source_url() . "<br/>";
	echo "class version url : " . \NTRNX_MYSQLI\ntrnx_mysqli_internal_url::get_version_url() . "<br/>";
	echo "class update url : " . \NTRNX_MYSQLI\ntrnx_mysqli_internal_url::get_update_url() . "<br/>";
	echo "class manual url : " . \NTRNX_MYSQLI\ntrnx_mysqli_internal_url::get_manual_url() . "<br/>";

	echo "class dependences_state : ";

	if (\NTRNX_MYSQLI\ntrnx_mysqli_internal_dependences::state()===TRUE) {
		echo "ON<br/>";
		echo "class dependences list :" . \NTRNX_MYSQLI\ntrnx_mysqli_internal_dependences::check() . "<br/>";
	} else {
		echo "OFF<br/>";
	}

	echo "class needed functions state : ";

	if (\NTRNX_MYSQLI\ntrnx_mysqli_internal_needed_functions::state()===TRUE) {

		echo "ON<br/>";
		echo "class needed function list :" . \NTRNX_MYSQLI\ntrnx_mysqli_internal_needed_functions::check() ."<br/>";
	} else {
		echo "OFF<br/>";
	}
	echo "<br/>";
}

echo "check mysqli functions<br/>";
echo "<br/>";

$db_handle = NULL;

if (get_server_os() === "windows") {
	$task = "mysqld";
} else if (get_server_os() === "linux") {
	$task = "mysqlnd";
} else {
	$task = "mysqld";
}

if (check_if_task_run($task)===TRUE) {

	echo "testing unsecure connection<br/>";
	echo "<br/>";

	echo " - connect : "; if ($db_handle = \NTRNX_MYSQLI\connect::db()) { echo STATE_PASSED;

		echo " - close : "; if ($db_handle) { \NTRNX_MYSQLI\close::link($db_handle); echo STATE_PASSED . "<br/>"; } else { echo "<br/>"; }
		echo " - pconnect : "; if ($db_handle = \NTRNX_MYSQLI\pconnect::db()) { echo STATE_PASSED; }
		echo " - close : "; if ($db_handle) { \NTRNX_MYSQLI\close::link($db_handle); echo STATE_PASSED . "<br/>"; } else { echo "<br/>"; }

	} else {

		echo "<font color=\"red\"> - no unsecure connections allowed</font><br/><br/>";

	}

	echo "testing secure connection<br/>";
	echo "<br/>";

	echo " - init : "; if ($db_handle = \NTRNX_MYSQLI\init::resource()) { echo STATE_PASSED; }
	echo " - ssl_set : "; if (\NTRNX_MYSQLI\ssl_set::link($db_handle) === TRUE) { echo STATE_PASSED; }

	echo " - real_connect : ";
	if (\NTRNX_MYSQLI\real_connect::db($db_handle) === TRUE) {
		
		echo STATE_PASSED;

		echo " - ssl_get : ";
		if (\NTRNX_MYSQLI\ssl_get::resource($db_handle) === TRUE) {
			echo "<font color=\"green\">" . NMYSQCC_ERROR_MSG_SSL_IS_ENABLED . "</font>";
		} else {
			echo "<font color=\"red\">" . NMYSQCC_ERROR_MSG_SSL_IS_DISABLED . "</font>";
		}
		echo "<br/>";

		echo " - select : ";
		$query_result = \NTRNX_MYSQLI\select::query($db_handle,
			
				/* SELECT */
				array(
					'test','name','AS','name',
					'test','salary','AS','salary'
				),
				/* FROM */
				array(
					'test'
				),
				/* JOIN */
				NULL,
				/* WHERE */
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
			echo STATE_PASSED;
		}
		if (SHOW_QUERIES === TRUE) {
			echo "<br/>" . $my_tab . "- command : ";
				echo "<pre>";
				echo $my_tab;

			echo "\$query_result = \\NTRNX_MYSQLI\\select::query(\$db_handle,
				
					/* SELECT */
					array(
						'test','name','AS','name',
						'test','salary','AS','salary'
					),
					/* FROM */
					array(
						'test'
					),
					/* JOIN */
					NULL,
					/* WHERE */
					array(
						'test', 'name',
						'LIKE', 'kenobi'
					)

			);";
			echo "</pre>";
			echo $my_tab . "- last_query : ";
			$last_query = \NTRNX_MYSQLI\last_query::get($db_handle);
			if ($last_query) {
				echo "<pre>";
				echo $my_tab . $last_query;
				echo "</pre>";
			}
		}
		if ($query_result) {
			echo " - free_result : ";
			\NTRNX_MYSQLI\free_result::result($query_result);
			echo STATE_PASSED;
		}

		echo " - insert : ";
		$query_result = \NTRNX_MYSQLI\insert::query($db_handle,
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
		if ($query_result) { echo STATE_PASSED; }
		if (SHOW_QUERIES === TRUE) {
			echo "<br/>" . $my_tab . "- command : ";
				echo "<pre>";
				echo $my_tab;

			echo "\$query_result = \\NTRNX_MYSQLI\\insert::query(\$db_handle,
					'test',
					array(
						'name',
						'salary'
					),
					array(
						'abc',
						'def'
					)
			);";
			echo "</pre>";
			echo $my_tab . "- last_query : ";
			$last_query = \NTRNX_MYSQLI\last_query::get($db_handle);
			if ($last_query) {
				echo "<pre>";
				echo $my_tab . $last_query;
				echo "</pre>";
			}
		}

		echo " - update : ";
		$query_result = \NTRNX_MYSQLI\update::query($db_handle,
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
		if ($query_result) { echo STATE_PASSED; }
		if (SHOW_QUERIES === TRUE) {
			echo "<br/>" . $my_tab . "- command : ";
				echo "<pre>";
				echo $my_tab;

			echo "\$query_result = \\NTRNX_MYSQLI\\update::query(\$db_handle,
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
			);";
			echo "</pre>";
			echo $my_tab . "- last_query : ";
			$last_query = \NTRNX_MYSQLI\last_query::get($db_handle);
			if ($last_query) {
				echo "<pre>";
				echo $my_tab . $last_query;
				echo "</pre>";
			}
		}

		echo " - delete : ";
		$query_result = \NTRNX_MYSQLI\delete::query($db_handle,
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
		if ($query_result) { echo STATE_PASSED; }
		if (SHOW_QUERIES === TRUE) {
			echo "<br/>" . $my_tab . "- command : ";
				echo "<pre>";
				echo $my_tab;

			echo "\$query_result = \\NTRNX_MYSQLI\\delete::query(\$db_handle,
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
			);";
			echo "</pre>";
			echo $my_tab . "- last_query : ";
			$last_query = \NTRNX_MYSQLI\last_query::get($db_handle);
			if ($last_query) {
				echo "<pre>";
				echo $my_tab . $last_query;
				echo "</pre>";
			}
		}

		echo "- tables :<br/>";
		$tables_result = \NTRNX_MYSQLI\tables::show($db_handle);
		$tables_assoc = \NTRNX_MYSQLI\fetch_all::result($tables_result, MYSQLI_ASSOC);
		if (\NTRNX_MYSQLI\num_rows::result($tables_result) > 0) {
			$tables_count = count($tables_assoc);
			echo "<pre>";
			for ($i=0; $i < $tables_count; $i++) {
				echo " - " . $tables_assoc[$i]["Tables_in_". \NTRNX_MYSQLI\ntrnx_mysqli::$dbname] . "<br/>";
			}
			echo "</pre>";
		}
		if ($tables_result) {
			\NTRNX_MYSQLI\free_result::result($tables_result);
		}
		if (SHOW_QUERIES === TRUE) {
			echo $my_tab . "- command : ";
				echo "<pre>";
				echo $my_tab;

			echo "\$tables_result = \\NTRNX_MYSQLI\\tables::show(\$db_handle);";
			echo "</pre>";
			echo $my_tab . "- last_query : ";
			$last_query = \NTRNX_MYSQLI\last_query::get($db_handle);
			if ($last_query) {
				echo "<pre>";
				echo $my_tab . $last_query;
				echo "</pre>";
			}
		}

		echo "- columns  :<br/>";
		$columns_result = \NTRNX_MYSQLI\columns::show($db_handle, "test");
		$columns_assoc = \NTRNX_MYSQLI\fetch_all::result($columns_result, MYSQLI_ASSOC);
		if (\NTRNX_MYSQLI\num_rows::result($columns_result) > 0) {
			$columns_count = count($columns_assoc);
			echo "<pre>";
			for ($i=0; $i < $columns_count; $i++) {
				echo " - " . $columns_assoc[$i]["Field"] . "<br/>";
			}
			echo "</pre>";
		}
		if ($columns_result) {
			\NTRNX_MYSQLI\free_result::result($columns_result);
		}
		if (SHOW_QUERIES === TRUE) {
			echo $my_tab . "- command : ";
				echo "<pre>";
				echo $my_tab;

			echo "\$columns_result = \\NTRNX_MYSQLI\\columns::show(\$db_handle, \"test\");";
			echo "</pre>";
			echo $my_tab . "- last_query : ";
			$last_query = \NTRNX_MYSQLI\last_query::get($db_handle);
			if ($last_query) {
				echo "<pre>";
				echo $my_tab . $last_query;
				echo "</pre>";
			}
		}

		echo " - close : ";
		\NTRNX_MYSQLI\close::link($db_handle);
		echo STATE_PASSED . "<br/>";

	}

	echo " - init : ";
	if ($db_handle = \NTRNX_MYSQLI\init::resource($db_handle)) { echo STATE_PASSED; }

	echo " - real_pconnect : ";
	if (\NTRNX_MYSQLI\real_pconnect::db($db_handle) === TRUE) {

		echo STATE_PASSED;

		echo " - close : ";
		\NTRNX_MYSQLI\close::link($db_handle);
		echo STATE_PASSED;

	}

} else {

	echo "<font color=\"red\">" . $task . " not running</font>";

}
echo "<br/>";

exit();

function check_if_task_run($pattern) {

	/* windows */
	if (get_server_os() === "windows") {
		$task_list = array();
		$task_pattern = "~(" . $pattern . ")\.exe~i";
		exec("tasklist 2>NUL", $task_list);
		foreach ($task_list AS $task_line) {
			if (preg_match($task_pattern, $task_line, $out)) {
				return TRUE;
			}
		}
		return FALSE;
	}

	/* linux */
	if (get_server_os() === "linux") {
		exec("ps -A | grep -i $pattern | grep -v grep", $pids);
		if (count($pids) > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

}

function get_server_os() {
        switch (PHP_OS) {
            case "CYGWIN_NT-5.1": return "cygwinnt"; break;
            case "Darwin": return "darwin"; break;
            case "FreeBSD": return "freebsd"; break;
            case "HP-UX": return "hpux"; break;
            case "IRIX64": return "irix64"; break;
            case "Linux": return "linux"; break;
            case "NetBSD": return "netbsd"; break;
            case "NetWare": return "netware"; break;
            case "OpenBSD": return "openbsd"; break;
            case "SunOS": return "sunos"; break;
            case "Unix": return "unix"; break;
            case "WIN32": return "windows"; break;
            case "WINNT": return "windows"; break;
            case "Windows": return "windows"; break;
            default: return "unknow"; break;
        }
    }

?>