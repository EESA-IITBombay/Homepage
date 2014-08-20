<?php
if ( substr($_SERVER['REQUEST_URI'],0,7) === "/~eesa/" &&
     substr($_SERVER['SCRIPT_URL'],0,7) === "/~eesa/" &&
     substr($_SERVER['SCRIPT_FILENAME'],0,26) === "/ug/misc/eesa/public_html/" ):

  //MySQL DB Parameter
  $_SITE['dbUser']   = "eesa.iitb";
  $_SITE['dbPass']   = "karandikar";
  $_SITE['dbName']   = "eesadb";
  $_SITE['dbHost']   = "localhost";

  //Blowfish Key
  $_SITE['Key']	   = "\$String\$RandomNumbersAreDreamBut27IsRandomNumber\$Theory\$";

endif;
?>

