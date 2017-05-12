<?php

/* error reporting for classname */
ini_set ("error_reporting", E_ALL & ~E_NOTICE);
ini_set ("display_errors", 1);

require "ntrnx_mysqli.class.php";

print "class : "
. \NTRNX_MYSQLI\ntrnx_mysqli::get_name() . " "
. \NTRNX_MYSQLI\ntrnx_mysqli::get_version_major() . "."
. \NTRNX_MYSQLI\ntrnx_mysqli::get_version_minor() . "."
. \NTRNX_MYSQLI\ntrnx_mysqli::get_version_build() . "."
. \NTRNX_MYSQLI\ntrnx_mysqli::get_version_revision() . " ("
. \NTRNX_MYSQLI\ntrnx_mysqli::get_version_date() . ") ["
. \NTRNX_MYSQLI\ntrnx_mysqli::get_version_time() . "] loaded<br />";

print "class api : " . \NTRNX_MYSQLI\ntrnx_mysqli::get_api() . "<br />";
//print "class author name: " . \NTRNX_MYSQLI\ntrnx_mysqli::get_author_name() . "<br />";
//print "class author nick: " . \NTRNX_MYSQLI\ntrnx_mysqli::get_author_nick() . "<br />";
//print "class author email: " . \NTRNX_MYSQLI\ntrnx_mysqli::get_author_email() . "<br />";
//print "class author url: " . \NTRNX_MYSQLI\ntrnx_mysqli::get_author_url() . "<br />";
print "class branch : " . \NTRNX_MYSQLI\ntrnx_mysqli::get_branch() . "<br />";
print "class buildchannel : " . \NTRNX_MYSQLI\ntrnx_mysqli::get_buildchannel() . "<br />";
//print "class project url : " . \NTRNX_MYSQLI\ntrnx_mysqli::get_project_url() . "<br />";
//print "class source url : " . \NTRNX_MYSQLI\ntrnx_mysqli::get_source_url() . "<br />";
//print "class version url : " . \NTRNX_MYSQLI\ntrnx_mysqli::get_version_url() . "<br />";
//print "class update url : " . \NTRNX_MYSQLI\ntrnx_mysqli::get_update_url() . "<br />";
//print "class manual url : " . \NTRNX_MYSQLI\ntrnx_mysqli::get_manual_url() . "<br />";

print "class dependences_state : ";

if (\NTRNX_MYSQLI\ntrnx_mysqli::get_dependences_state()===TRUE) {
    
    print "ON<br />";
    
    print "class dependences list :<br />";
    $dependences_array = \NTRNX_MYSQLI\ntrnx_mysqli::get_dependences();
    foreach ($dependences_array as $key => $value) {
        print " - " . $key . " (" . $value . ")<br />";
    }
    
    print "class dependences check : " . \NTRNX_MYSQLI\ntrnx_mysqli::check_dependences();
    print "<br />";

} else {
    print "OFF<br />";
}


print "class needed functions state : ";

if (\NTRNX_MYSQLI\ntrnx_mysqli::get_needed_functions_state()===TRUE) {
    
    print "ON<br />";
    
    print "class needded functions list :<br />";
    $function_array = \NTRNX_MYSQLI\ntrnx_mysqli::get_needed_functions();
    foreach ($function_array as $key => $value) {
        print " - " . $value . "<br />";
    }

    print "class needed functions check : " . \NTRNX_MYSQLI\ntrnx_mysqli::check_needed_functions();
    print "<br />";

} else {
    print "OFF<br />";
}

?>