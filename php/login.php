<?php
  require("../config.php");
  ini_set('session.cookie_lifetime', $_SITE['session_life'] );
  ini_set('session.cookie_secure',true);
  ini_set('session.cookie_httponly',true);
  session_start();
  session_regenerate_id(true);


  if ( isset($_POST['USER_ID']) && isset($_POST['PASSWD']) ):
    require("../privconfig.php");
    require("../php/MySQL.class.php");
    isset($dbLink)?: $dbLink = new MySQL($_SITE['dbHost'], $_SITE['dbUser'], $_SITE['dbPass'], $_SITE['dbName']);
    $_POST['USER_ID']        = $dbLink->real_escape_string($_POST['USER_ID']);
    $_SERVER['REQUEST_TIME'] = $dbLink->real_escape_string($_SERVER['REQUEST_TIME']);

    $_USER = reset($dbLink->fetch("SELECT user_id,display_name,ldap_dn,programme,year from tbl_students where ldap_uid='".$_POST['USER_ID']."'")) or die("The username you entered is incorrect.");
    $ldapserver = ldap_connect("ldap.iitb.ac.in") or die("Could not connect to ldap.iitb.ac.in :( Please try again later.");
    $bind = @ldap_bind($ldapserver,$_USER['ldap_dn'],$_POST['PASSWD']) or die("The password you entered is incorrect.");

    $_SESSION['USER_ID']=$_USER['user_id'];
    $_SESSION['USER_NAME']=$_USER['display_name'];
    $_SESSION['PROG']=$_USER['programme'];
    $_SESSION['YEAR']=$_USER['year'];

    require("../php/phpseclib/Crypt/Blowfish.php");
    $cipher = new Crypt_Blowfish();
    $cipher->setKey($_SITE['Key']);
    $_SESSION['AUTH_TOKEN']=$cipher->encrypt($_SERVER['REQUEST_TIME'].$_SESSION['USER_ID']);
    $dbLink->query("UPDATE tbl_students SET auth_token='".$_SESSION['AUTH_TOKEN']."', last_auth=".$_SERVER['REQUEST_TIME']." WHERE user_id='".$_SESSION['USER_ID']."'");
    echo "<script>LoggedIn();</script>";
  else:
    echo "Empty username and/or password. Are you kidding me?";
  endif;
?>
