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

if (substr($_PAGE['path'],0,12) == "alumni-forum") header("Location: ".$_SITE['uri_display']."/".$_PAGE['path']);
if (substr($_PAGE['path'],0,4) == "user") {
  $_PAGE['params'] = substr($_PAGE['path'],5);
  if ( strrpos($_PAGE['params'],"/") !== false ) header("Location: ".$_SITE['uri_display']."/alumni-forum/index.php/".$_PAGE['path']);
  else $_PAGE['path'] = "user";
}

/*
 *    Omit PHP closing tag to help avoid accidental output
 */
