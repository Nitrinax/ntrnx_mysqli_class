<?php

/** define shorthand directory separator constant */
if (!defined('DS')) { define('DS', DIRECTORY_SEPARATOR); }

/** set MYAUTOLOADER_FILE_PATH to absolute path */
if (!defined('MYAUTOLOADER_FILE_PATH')) { define('MYAUTOLOADER_FILE_PATH', dirname(__FILE__) . DS); }

/** set file suffix for loadable files */
if (!defined('MYAUTOLOADER_FILE_SUFFIX')) { define('MYAUTOLOADER_FILE_SUFFIX', '.php'); }

class MyAutoloader {
    private $namespace;
    public function __construct($namespace = null) { $this->namespace = $namespace; }
    public function register() { spl_autoload_register(array($this, 'loadClass')); }
    public function loadClass($className)     {	
		
	    if($this->namespace !== null) { $className = str_replace($this->namespace . '\\', '', $className); }
        $className = str_replace('\\', DS, $className);
	    $file = MYAUTOLOADER_FILE_PATH . $className . MYAUTOLOADER_FILE_SUFFIX;		
		//print $file;
	    if(file_exists($file)) { require_once $file; }		
    }	
}