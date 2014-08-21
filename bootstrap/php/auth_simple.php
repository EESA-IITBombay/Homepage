<?php
  if ( isset($_SESSION['AUTH_TOKEN']) && isset($_SESSION['USER_NAME']) && isset($_SESSION['USER_ID']) ):
    require_once("phpseclib/Crypt/Blowfish.php");
    $cipher = new Crypt_Blowfish();
    $cipher->setKey($_SITE['Key']);
    if ( strpos( $cipher->decrypt($_SESSION['AUTH_TOKEN'] ), $_SESSION['USER_ID'] ) === false ):
        session_destroy();
    endif;
    $_SESSION['LOGGED_IN'] = true;
  endif;
