<?php

/* DIRECTORY SEPARATOR - Windows = \ Linux = / */
if (!defined('PRJ_CONST_DS')) { define('PRJ_CONST_DS', DIRECTORY_SEPARATOR); }

/* HTML BREAK ROW */
if (!defined('PRJ_CONST_BR')) { define('PRJ_CONST_BR', '<br />'); }

/* set error messages */
if (!defined('ERROR_DIRECTORY_DOES_NOT_EXISTS')) { define('ERROR_DIRECTORY_DOES_NOT_EXISTS', 'directory "%d" does not exist<br/>'); }
if (!defined('ERROR_FILE_DOES_NOT_EXISTS')) { define('ERROR_FILE_DOES_NOT_EXISTS', 'file "%s" does not exist<br/>'); }

/* set project DIR to absolute path of files */
if (!defined('PRJ_DIR')) { define('PRJ_DIR', dirname(__FILE__) . PRJ_CONST_DS); }

/* ntrx_mysqli_class */
if (!defined('CLASS_NTRNX_MYSQLI_CONFIG_DIR')) { define('CLASS_NTRNX_MYSQLI_CONFIG_DIR', PRJ_DIR . 'configs' . PRJ_CONST_DS ); }
if (!is_dir(CLASS_NTRNX_MYSQLI_CONFIG_DIR)) { die(str_replace('%d', CLASS_NTRNX_MYSQLI_CONFIG_DIR, ERROR_DIRECTORY_DOES_NOT_EXISTS)); }
if (!defined('CLASS_NTRNX_MYSQLI_FILE')) { define('CLASS_NTRNX_MYSQLI_FILE', PRJ_DIR . 'ntrnx_mysqli.class.php'); }
if (!file_exists(CLASS_NTRNX_MYSQLI_FILE)) { die(str_replace('%s', CLASS_NTRNX_MYSQLI_FILE, ERROR_FILE_DOES_NOT_EXISTS)); } else { require_once CLASS_NTRNX_MYSQLI_FILE; }

my_get_class_methods('ntrnx_mysqli', TRUE);

function my_get_class_methods($class_file, $sort=NULL) {        
    $my_class = new $class_file();
    $class_methods = get_class_methods($my_class);            
    if ($sort===TRUE) { sort($class_methods); }
    print 'methods of ' .get_class($my_class);     
    print '<pre>';
    foreach ($class_methods as $number => $value) {
        print "$value\n";
    }
    print '</pre>';
    }

?>