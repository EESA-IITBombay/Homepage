<?php
  require("../config.php");
  ini_set('session.cookie_lifetime', $_SITE['session_life'] );
  ini_set('session.cookie_secure',true);
  ini_set('session.cookie_httponly',true);
  session_start();
  session_regenerate_id(true);

  if ( isset($_SESSION['AUTH_TOKEN']) && isset($_SESSION['USER_NAME']) && isset($_SESSION['USER_ID']) ):
    require("../privconfig.php");
    require("phpseclib/Crypt/Blowfish.php");
    $cipher = new Crypt_Blowfish();
    $cipher->setKey($_SITE['Key']);
    if ( strpos( $cipher->decrypt($_SESSION['AUTH_TOKEN'] ), $_SESSION['USER_ID'] ) === false ):
        session_destroy();
        header('Location:'.$_SITE['uri']);
        exit();
    endif;
  else:
    header('Location:'.$_SITE['uri']);
    exit();
  endif;

  require("MySQL.class.php");
  $dbLink = new MySQL($_SITE['dbHost'], $_SITE['dbUser'], $_SITE['dbPass'], $_SITE['dbName']);
  $_SESSION['USER_ID'] = $dbLink->real_escape_string($_SESSION['USER_ID']);
  $_GET['election_id'] = $dbLink->real_escape_string($_GET['election_id']);

  $vote_cast = $dbLink->fetch("SELECT * FROM tbl_elections_voterlist WHERE user_id='".$_SESSION['USER_ID']."' AND election_id=".$_GET['election_id']);
  if ( count($vote_cast) === 0 ):
    foreach(array_unique(array_values($_GET)) as $value) {
      foreach(array_keys($_GET, $value) as $entry) {
        if ($entry === "election_id") continue;
        $entry    = explode("_",$entry);
        $entry[0] = $dbLink->real_escape_string($entry[0]);
        $entry[1] = $dbLink->real_escape_string($entry[1]);
        $entry[2] = $dbLink->real_escape_string($value);

        $dbLink->query("INSERT into tbl_elections_votes(election_id, contestant_id, vote) VALUES('".$entry[1]."','".$entry[0]."','".$entry[2]."')");
      }
    }
    $dbLink->query("INSERT into tbl_elections_voterlist(election_id, user_id) VALUES(".$_GET['election_id'].",'".$_SESSION['USER_ID']."')");
?>
You have succesfully cast your vote :)<br>
You will be redirected to the voting interface in <span id='timer' style="color:#FF0000;">5</span> seconds...
<?php else: ?>
You had succesfully cast your vote for this election.<br>
You will be redirected to the voting interface in <span id='timer' style="color:#FF0000;">5</span> seconds...
<?php endif; ?>
<script>
  setTimeout(function(){document.getElementById('timer').innerHTML="4"}, 1000);
  setTimeout(function(){document.getElementById('timer').innerHTML="3"}, 2000);
  setTimeout(function(){document.getElementById('timer').innerHTML="2"}, 3000);
  setTimeout(function(){document.getElementById('timer').innerHTML="1"}, 4000);
  setTimeout(function(){window.location.href="<?php echo $_SITE['uri']; ?>/site/students/voting-interface";},5000);
</script>
