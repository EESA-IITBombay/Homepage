<?php
date_default_timezone_set('Asia/Calcutta');

$_SITE['uri']          = "https://www.ee.iitb.ac.in/course/~eesa/devel";
$_SITE['uri_display']          = "https://www.ee.iitb.ac.in/course/~eesa/devel";
$_SITE['path']         = "/ug/misc/eesa/public_html/devel";
$_SITE['session_life'] = 1800 + 3600;			//The server clock is appx 3600s behind IST

set_include_path(get_include_path().PATH_SEPARATOR.$_SITE['path'].'/php/google-api-php-client/src');

/*
       	Omit PHP closing tag to help avoid accidental output
*/

