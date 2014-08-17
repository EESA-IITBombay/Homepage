                  <h3 class='font_3'>Voting Interface</h3>
<?php
  if ( !isset($_SESSION['user']) || !isset($_SESSION['roll']) || !isset($_SESSION['prog']) || !isset($_SESSION['year']) ):
    $src = 'voting';
    $type = 'student';
    include("login/login.php");
  else:
    include("php/MySQL.class.php");
    include("config.php");
    $dbLink = new MySQL($dbHost, $dbUsername, $dbPassword, $dbName);
//Join with if_polls
    $polls  = $dbLink->fetch("SELECT * FROM if_poll_list WHERE programme='".$_SESSION['prog']."' AND year='".$_SESSION['year']."'");
    foreach($polls as $poll) {
?>
                  <div>
                  </div>
<?php
    }
    endif;
?>

