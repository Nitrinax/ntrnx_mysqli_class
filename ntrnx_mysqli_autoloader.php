<?php

class ntrnx_mysqli_autoloader {

    public static function register() {
        spl_autoload_register('ntrnx_mysqli_autoloader::autoload');
    }

    public static function autoload($class_name) {

        //echo "***** className : " . $class_name . "<br/>";

        /* set up vars from consts */
        $autoloader_namespace = AUTOLOADER_NAMESPACE;
        //echo "***** autoloader_namespace : " . $autoloader_namespace . "<br/>";

        $autoloader_file_dir = AUTOLOADER_FILE_DIR;
        //echo "***** autoloader_file_dir : " . $autoloader_file_dir . "<br/>";

        $autoloader_file_suffix = AUTOLOADER_FILE_SUFFIX;
        //echo "***** autoloader_file_suffix : " . $autoloader_file_suffix . "<br/>";

        $autoloader_file_part = strtolower(substr($autoloader_namespace, 0)) . "_";
        //echo "***** autoloader_file_part : " . $autoloader_file_part . "<br/>";

        $autoloader_internal_part = AUTOLOADER_INTERNAL_PART . "_";
        //echo "***** autoloader_internal_part : " . $autoloader_internal_part . "<br/>";

        $autoloader_function_part = AUTOLOADER_FUNCTION_PART . "_";
        //echo "***** autoloader_function_part : " . $autoloader_function_part . "<br/>";

        /* check if class name defined in namespace */
        if (strstr($class_name, $autoloader_namespace) != FALSE) {

            /* extract class part from class name */
            $class_part = substr($class_name, strpos($class_name, $autoloader_namespace) + strlen($autoloader_namespace) +1);
            //echo "***** class_part : " . $class_part . "<br/>";

            /* check if not found internal in class name */
            if (strstr($class_name, $autoloader_internal_part) === FALSE) {

                /* combine first part, last part and filling to file name */
                $filename = $autoloader_file_part . $autoloader_function_part . $class_part;

            /* "internal" found in class name */
            } else {

                /* combine first part, last part and filling to file name */
                $filename = $class_part;

            }
            //echo "***** filename : " . $filename . "<br/>";

            /* combine file path and file name */
            $filepath = $autoloader_file_dir . $filename . $autoloader_file_suffix;
            //echo "filepath : " . $filepath . "<br/>";

            /* check if file exists */
            if (file_exists($filepath)) {

                /* include file */
                require_once($filepath);

                /* check if class exists */
                if (class_exists($class_name)) {

                    return TRUE;

                } else {

                    echo "class " . $class_name . " not exists<br/>";

                }

            } else {

                echo "file " . $filepath . " not exists<br/>";

            }

            return FALSE;

        }

    }

}

?>