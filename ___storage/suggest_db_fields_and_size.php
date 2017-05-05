<?php

/** error reporting for debug */
ini_set ('error_reporting', E_ALL & ~E_NOTICE);
ini_set ('display_errors', 1);

/** define shorthand directory separator constant */
if (!defined('DS')) { define('DS', DIRECTORY_SEPARATOR); }

$path = 'G:\datamining\data\uncrunched\ageofwushu_0.0.1.096\res\share.package\res\share\item' . DS;

$file_name = 'tool_item';

$import_file = $path . $file_name . '.ini';
$export_file = $file_name . '.sql';

$count = 0;
$bracket_open_pos = false;
$bracket_close_pos = false;
$separator_pos = false;

$string_bracket_open = "[";
$string_bracket_close = "]";
$string_separator = "=";

$max_len_name = 0;
$max_len_name_pos = 0;
$max_len_content = 0;
$max_len_content_pos = 0;

$array_of_fields = array();
$array_of_lengths = array();

$handle_import = fopen($import_file,"r");
//$handle_export = fopen($export_file,"w+");

while(!feof($handle_import)) {

	$count = $count+1;
   
	$row = fgets($handle_import);
	
	/*
	if ((($bracket_open_pos = strpos ($row, $string_bracket_open, 0)) == true) and (($bracket_close_pos = strpos ($row, $string_bracket_close, 0)) == true) { }
	*/
	
	
	$max_len_name = 0;
	$max_len_content = 0;
	
	if (($separator_pos = strpos ($row, $string_separator, 0)) == true) {

		$string_name = strtolower(trim(preg_replace("/[^A-Za-z0-9 _ - ]/", '', substr ($row, 0, $separator_pos))));
	
		$string_content = trim(substr ($row, $separator_pos + 1));
	
		if (strlen($string_name)>$max_len_name) { $max_len_name=strlen($string_name); $max_len_name_pos = $count; }
		if (strlen($string_content)>$max_len_content) { $max_len_content=strlen($string_content); $max_len_content_pos = $count; }
		
		if (in_array($string_name, $array_of_fields)) {
			if ($array_of_lengths[$string_name] < $max_len_content) {
				$array_of_lengths[$string_name] = $max_len_content;
			}
		} else {
			$array_of_fields[] = $string_name;
			$array_of_lengths[$string_name] = $max_len_content;
		}

		
	} else {
	
		//$string_not_imported = $string_not_imported + 1;
		//$string_not_imported_pos .= $count . ', ';
	
	}
	
	//if (($string_name == 'qname') && ($max_len_content == '20')) { echo $i .'<br/>'; }

	
}

fclose ($handle_import);
//fclose ($handle_export);

foreach ($array_of_fields as $key){
	print $key . ' = '. $array_of_lengths[$key] . '<br />';
}

//print '<br />imported strings = ' . $string_imported . '<br />';
//print 'not imported strings = ' . $string_not_imported . ' (Pos '.$string_not_imported_pos.') <br />';
//print 'max len name = ' . $max_name . ' (Pos '.$max_name_pos.')' . suggest_field_type('name', $max_name) . '<br />';
//print 'max len content = ' . $max_content . ' (Pos '.$max_content_pos.')' . suggest_field_type('content', $max_content); 

function suggest_field_type($name, $len) {

	if (!defined('LENGTH_CHAR')) { define ('LENGTH_CHAR', 255); }
	if (!defined('NAME_CHAR')) { define ('NAME_CHAR', 'CHAR'); }
	
	if (!defined('LENGTH_TEXT')) { define ('LENGTH_TEXT', 65535); }
	if (!defined('NAME_TEXT')) { define ('NAME_TEXT', 'TEXT'); }
	
	if (!defined('LENGTH_MEDIUMTEXT')) { define ('LENGTH_MEDIUMTEXT', 16777215); }
	if (!defined('NAME_MEDIUMTEXT')) { define ('NAME_MEDIUMTEXT', 'MEDIUMTEXT'); }
	
	if (!defined('LENGTH_LONGTEXT')) { define ('LENGTH_LONGTEXT', 4294967295); }
	if (!defined('NAME_LONGTEXT')) { define ('NAME_LONGTEXT', 'LONGTEXT'); }

	$suggested_len = $len*2+1;
	
	if ($suggested_len<LENGTH_CHAR) { $suggested_type = NAME_CHAR . '('.$suggested_len.')';}
	if ($suggested_len>LENGTH_CHAR) { $suggested_type = NAME_TEXT; }
	if ($suggested_len>LENGTH_TEXT) { $suggested_type = NAME_MEDIUMTEXT; }
	if ($suggested_len>LENGTH_MEDIUMTEXT) { $suggested_type = NAME_LONGTEXT; }
	if ($suggested_len>LENGTH_LONGTEXT) { $suggested_type = 'unknown'; }
		
	return ' - suggested type (and len) of "' . $name . '" is ' . $suggested_type;

}

?>