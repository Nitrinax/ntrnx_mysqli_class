<?php

/** define shorthand directory separator constant */
if (!defined("DS")) { define("DS", DIRECTORY_SEPARATOR); }

/** set NTRNX_MYSQLI_AUTOLOADER_FILE_PATH to absolute path */
if (!defined("NTRNX_MYSQLI_AUTOLOADER_FILE_PATH")) { define("NTRNX_MYSQLI_AUTOLOADER_FILE_PATH", dirname(__FILE__) . DS); }

/** set file suffix for loadable files */
if (!defined("NTRNX_MYSQLI_AUTOLOADER_FILE_SUFFIX")) { define("NTRNX_MYSQLI_AUTOLOADER_FILE_SUFFIX", ".php"); }

class ntrnx_mysqli_autoloader {

    private $namespace;
    
    public function __construct($namespace = null) { $this->namespace = $namespace; }
    
    public function register() { spl_autoload_register(array($this, "loadClass")); }
    
    public function loadClass($myClass)     {	
		
	    if($this->namespace !== null) { $myClass = str_replace($this->namespace . "\\", "", $myClass); }
        
        $myClass = str_replace("\\", DS, $myClass);
	    
        $file = NTRNX_MYSQLI_AUTOLOADER_FILE_PATH . $myClass . NTRNX_MYSQLI_AUTOLOADER_FILE_SUFFIX;
		//echo $file;
	    
        if(file_exists($file)) { require_once $file; }

    }

}