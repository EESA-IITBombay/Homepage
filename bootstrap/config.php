<?php
/******************************************************************************************/
/**                                                                                      **/
/**  Project:  EESA Homepage                                                             **/
/**  File:     overrides.php                                                             **/
/**                                                                                      **/
/**  This file contains manual overrides to the usual page structure for special pages.  **/
/**  Read the section on page navigation in README.md to know more.                      **/
/**                                                                                      **/
/******************************************************************************************/


date_default_timezone_set('Asia/Calcutta');

/*
 *  SITE specific parameters.
 *
 *  $_SITE['uri']          :Actual URI to website root. Used for internal redirects.
 *  $_SITE['uri_display']  :URI to display in client browser.
 *                          If this is different from $_SITE['uri'] you may need to edit .htaccess file as explained in README.md
 *  $_SITE['path']         :Absolute path to website root.
 *  $_SITE['session_life'] :The user will logout if no activity is detected for these many seconds.
 *                          Setting it to 0 will not logout the user till browser shutdown.
 */

$_SITE['uri']          = "https://www.ee.iitb.ac.in/course/~eesa/devel/bootstrap";
$_SITE['uri_display']  = "https://www.ee.iitb.ac.in/course/~eesa/devel/bootstrap";
$_SITE['path']         = "/ug/misc/eesa/public_html/devel/bootstrap";
$_SITE['session_life'] = 1800 + 3600;			//The server clock is appx 3600s behind IST

/*
 * Additional include paths for php files.
 */
set_include_path(get_include_path().PATH_SEPARATOR.$_SITE['path']);
set_include_path(get_include_path().PATH_SEPARATOR.$_SITE['path'].'/php');
set_include_path(get_include_path().PATH_SEPARATOR.$_SITE['path'].'/php/google-api-php-client/src');

/*
 * Initialize a session.
 */
ini_set('session.cookie_lifetime', $_SITE['session_life'] );
ini_set('session.cookie_secure',   true );
ini_set('session.cookie_httponly', true );
session_start();
session_regenerate_id(true);

/*
 *  Include files needed by all pages.
 */
require_once("privconfig.local.php");
require_once("MySQL.class.php");
require_once("auth_simple.php");

/*
       	Omit PHP closing tag to help avoid accidental output
*/
