<?php

if (!defined("MAKE_DS")) {	define("MAKE_DS",       DIRECTORY_SEPARATOR); }
if (!defined("MAKE_DIR")) { define("MAKE_DIR", "___make" . MAKE_DS); }

echo "
<html>
<head></head>
<body>
<div><table>
<tr><td><a href=\"" . MAKE_DIR . "bump_major.php\">bump major</a></td></tr>
<tr><td><a href=\"" . MAKE_DIR . "bump_minor.php\">bump minor</a></td></tr>
<tr><td><a href=\"" . MAKE_DIR . "bump_build.php\">bump build</a></td></tr>
<tr><td><a href=\"" . MAKE_DIR . "bump_revision.php\">bump revision</a></td></tr>
</table></div>
</body></html>
";

?>