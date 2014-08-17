<?php
  require("../config.php");
  session_start();
  session_destroy();
  if ( substr($_GET['redirect'],0,12) != 'alumni-forum' ) $_GET['redirect'] = 'index.php/'.$_GET['redirect'];
?>
<script>window.location.href="<?php echo $_SITE['uri'].'/'.$_GET['redirect'];?>"</script>
<?php
  exit;
?>
