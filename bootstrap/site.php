<?php
  require_once("config.php");				//Contains configuration and gloabal code.

  $_PAGE['path'] = ltrim($_SERVER['PATH_INFO'],"/");
  if ( empty($_PAGE['path']) ) $_PAGE['path'] = "home";
  include("overrides.php");				//Takes special actions for specific pages.
  $_PAGE['id']   = str_replace("/","-",$_PAGE['path']);
  $_PAGE['path'] = $_PAGE['path'].".php";

  if ( !file_exists("page/head/".$_PAGE['path']) || !file_exists("page/body/".$_PAGE['path']) ) {
    $_PAGE['params'] = $_PAGE['path'];
    $_PAGE['path']   = "not-found.php";
    $_PAGE['id']     = "not-found";
  }
?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="content-type" content="text/html;charset=UTF-8">
  <meta http-equiv="Cache-Control" content="no-cache">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="icon" type="image/x-icon" href="images/favicon.black.ico">

  <link rel='stylesheet' type='text/css' href="css/bootstrap.min.css">
  <link rel='stylesheet' type='text/css' href="css/font-awesome.min.css">
  <link rel='stylesheet' type='text/css' href="css/style.css">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="js/ie10-viewport-bug-workaround.js"></script>

<?php
  require("page/head/".$_PAGE['path']);
  echo "  <base href='".$_SITE['uri']."/'>";
?>
</head>
<body role="document">
  <div class="site-bg" style="z-index:-999"></div>
  <div class="container" role="main">
    <div class="site-header jumbotron" style="border-radius:0px;" align="center">
      <img class="img-responsive" alt="" src="images/favicon.white.png" style="width:6em;padding-bottom:0.5em;">
      <img class="img-responsive" alt="" src="images/head_left.png" style="width:12em;display:inline-block;padding-bottom:1em">
      <h4  class="font_4 color_1" style="padding:0em 3em;display:inline-block;">&nbsp;EESA</h4>
      <img class="img-responsive" alt="" src="images/head_right.png" style="width:12em;display:inline-block;padding-bottom:1em">
      <h6  class="font_6 color_8" style="margin-top:-0.5em;"><span class="color_15">//</span>&nbsp;IIT Bombay</h6>

<?php
  require("get_nav_main.php");						//(Synthesise and) get navigation bar (from config.php)
  echo "    </div>";
  require("page/body/".$_PAGE['path']);					//Get page body
?>
    <div id="site-footer" style="width:100%;min-height:85px;margin-bottom:50px" class="white-transclusent-bg">
      <div style="padding-left:50px;padding-top:20px;float:left;width:70%">
        <p class="font_9"><span class="glyphicon glyphicon-copyright-mark"></span> 2014 EESA, IIT Bombay.<br> Designed and maintained by Kamal Galrani</p>
      </div>
      <div style="float:right;height:25px;overflow:hidden;margin-top:30px">
        <a href="https://plus.google.com/u/1/117833228624084282709/about" target="_blank" class="social-btn">
          <img alt="" src="images/google+.png" class="social-btn-icon">
        </a>
	<a href="http://www.facebook.com/eesa.iitb" target="_blank" class="social-btn">
          <img alt="" src="images/facebook.png" class="social-btn-icon">
        </a>
      </div>
    </div>
  </div>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <?php @include("page/js/".$_PAGE['path']);?>
</body>
</html>
