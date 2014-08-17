<?php
  require("config.php");
  require("privconfig.php");

  ini_set('session.cookie_lifetime', $_SITE['session_life'] );
  ini_set('session.cookie_secure',   true );
  ini_set('session.cookie_httponly', true );
  session_start();
  session_regenerate_id(true);

  $PAGE_PATH = ltrim($_SERVER['PATH_INFO'],"/");
  if ( empty($PAGE_PATH) ) $PAGE_PATH = "home";
  $PAGE_ID = str_replace("/","-",$PAGE_PATH);
  $PAGE_PATH = "page/".$PAGE_PATH;

  if ( isset($_SESSION['AUTH_TOKEN']) && isset($_SESSION['USER_NAME']) && isset($_SESSION['USER_ID']) ):
    require("php/phpseclib/Crypt/Blowfish.php");
    $cipher = new Crypt_Blowfish();
    $cipher->setKey($_SITE['Key']);
    if ( strpos( $cipher->decrypt($_SESSION['AUTH_TOKEN'] ), $_SESSION['USER_ID'] ) === false ):
        session_destroy();
    endif;
  endif;
?>

<html>
<head>
  <title>EESA Homepage</title>
  <base href='<?php echo $_SITE['uri'];?>/'>

  <meta name='keywords' content="EESA, IITB, AAVRITI, BACKGROUND HUM">
  <meta name='description' content="Electrical Engineering Student Association, Department of Electrical Engineering, Indian Institute of Technology, Bombay">
  <meta name='author' content="Kamal Galrani">
  <meta name='viewport' content="user-scalable=0, width=device-width, initial-scale=1.0">

  <meta http-equiv='content-type' content="text/html; charset=UTF-8">
  <meta http-equiv='Cache-Control' content="no-cache">

  <link rel='stylesheet' type='text/css' href="css/fonts.css">
  <link rel='stylesheet' type='text/css' href="css/latin.css">
  <link rel='stylesheet' type='text/css' href="css/bootstrap.min.css">
  <link rel='stylesheet' type='text/css' href="css/font-awesome.min.css">
  <link rel='stylesheet' type='text/css' href="css/viewer.min.css">
  <link rel='shortcut icon' type='image/x-icon' href="images/favicon.ico">
</head>

<body>
  <div class='site-bg'></div>
  <div class='site-content'>
    <div class='site-page-container'>
<?php include($PAGE_PATH.".php") ?>
    </div>
    <div class="site-header">
      <div class="site-header-ribbon">
        <div class="site-header-ribbon-flag site-header-ribbon-flag-l"></div>
        <div class="site-header-ribbon-flag site-header-ribbon-flag-r"></div>
        <div class="site-header-ribbon-bg"></div>
        <div class="site-header-ribbon-content">
          <div class="site-header-nav">
            <div id='nav-btn-home' class="site-header-nav-btn" state=''>
              <div onclick="nav_btn_onClick('home')">
                <p class="site-header-nav-btn-label main-menu-label">Home</p>
              </div>
            </div>
            <div id="nav-btn-research" class="site-header-nav-btn" listposition="center" state="" onmouseover="nav_btn_onMouseOver('research',89)" onmouseout="nav_btn_onMouseOut('research')">
              <div onclick="nav_btn_onClick('research')">
                <p class="site-header-nav-btn-label main-menu-label">Research</p>
              </div>
<!--HEADER - NAVIGATION SUB MENU - research-->
              <div id="research-dropWrapper" class="site-header-nav-dropWrapper" style="left:0px;width:135px;">
                <div class="site-header-nav-moreContainer">
                  <div id="nav-btn-research-archive" class="site-header-nav-btn " state="" listposition="top" container="drop" style="visibility: inherit; position: relative;" onclick="nav_btn_onClick('research/archive')">
                    <div class="site-header-nav-btn-inner">
                      <p class="site-header-nav-btn-label" style="line-height: 29px;">Archive</p>
                    </div>
                  </div>
                  <div id="nav-btn-research-start" class="site-header-nav-btn " state="" listposition="dropCenter" container="drop" style="visibility: inherit; position: relative;" onclick="nav_btn_onClick('research-start')">
                    <div class="site-header-nav-btn-inner">
                      <p class="site-header-nav-btn-label" style="line-height: 29px;">How&nbsp;to&nbsp;start?</p>
                    </div>
                  </div>
                  <div id="nav-btn-research-guide" class="site-header-nav-btn " state="" listposition="bottom" container="drop" style="visibility: inherit; position: relative;" onclick="nav_btn_onClick('research-guide')">
                    <div class="site-header-nav-btn-inner">
                      <p class="site-header-nav-btn-label" style="line-height: 29px;">Find&nbsp;a&nbsp;guide</p>
                    </div>
                  </div>
                </div>
              </div>
<!--HEADER - NAVIGATION SUB MENU END - research-->
                </div>
                <div id="nav-btn-blog" class="site-header-nav-btn" listposition="center" state="">
                  <div onclick="nav_btn_onClick('blog')">
                      <p class="site-header-nav-btn-label main-menu-label">Blog</p>
                  </div>
                </div>
                <div id="nav-btn-gallery" class="site-header-nav-btn " listposition="center" state="">
                  <div onclick="nav_btn_onClick('gallery')">
                      <p class="site-header-nav-btn-label main-menu-label">Gallery</p>
                  </div>
                </div>
                <div id="nav-btn-students" class="site-header-nav-btn" listposition="center" state="" onmouseover="nav_btn_onMouseOver('students',179)" onmouseout="nav_btn_onMouseOut('students')">
                  <div onclick="nav_btn_onClick('students')">
                      <p class="site-header-nav-btn-label main-menu-label">Students</p>
                  </div>
<!--HEADER - NAVIGATION SUB MENU - students-->
                  <div id="students-dropWrapper" class="site-header-nav-dropWrapper" style="left:0px;width:144px;">
                  <div class="site-header-nav-moreContainer">
                    <div id="nav-btn-students-voting-interface" class="site-header-nav-btn " state="" listposition="top" container="drop" style="visibility: inherit; position: relative;" onclick="nav_btn_onClick('students/voting-interface')">
                      <div class="site-header-nav-btn-inner">
                        <div style="padding: 0px;">
                          <p class="site-header-nav-btn-label" style="line-height: 29px;">Voting&nbsp;Interface</p>
                        </div>
                      </div>
                    </div>
                    <div id="nav-btn-students-alumni-forum" class="site-header-nav-btn " state="" listposition="dropCenter" container="drop" style="visibility: inherit; position: relative;" onclick="nav_btn_onClick('students-alumni-forum')">
                      <div class="site-header-nav-btn-inner">
                        <div style="padding: 0px;">
                          <p class="site-header-nav-btn-label" style="line-height: 29px;">Alumni&nbsp;Forum</p>
                        </div>
                      </div>
                    </div>
                    <div id="nav-btn-students-book-bay" class="site-header-nav-btn " state="" listposition="dropCenter" container="drop" style="visibility: inherit; position: relative;" onclick="nav_btn_onClick('students-book-bay')">
                      <div class="site-header-nav-btn-inner">
                        <div style="padding: 0px;">
                          <p class="site-header-nav-btn-label" style="line-height: 29px;">Book&nbsp;Bay</p>
                        </div>
                      </div>
                    </div>
                    <div id="nav-btn-students-dept-library" class="site-header-nav-btn " state="" listposition="dropCenter" container="drop" style="visibility: inherit; position: relative;" onclick="nav_btn_onClick('students-dept-library')">
                      <div class="site-header-nav-btn-inner">
                        <div style="padding: 0px;">
                          <p class="site-header-nav-btn-label" style="line-height: 29px;">Dept.&nbsp;Library</p>
                        </div>
                      </div>
                    </div>
                    <div id="nav-btn-students-course-wiki" class="site-header-nav-btn " state="" listposition="dropCenter" container="drop" style="visibility: inherit; position: relative;" onclick="nav_btn_onClick('students-course-wiki')">
                      <div class="site-header-nav-btn-inner">
                        <div style="padding: 0px;">
                          <p class="site-header-nav-btn-label" style="line-height: 29px;">Course&nbsp;Wiki</p>
                        </div>
                      </div>
                    </div>
                    <div id="nav-btn-students-placement-database" class="site-header-nav-btn " state="" listposition="bottom" container="drop" style="visibility: inherit; position: relative;" onclick="nav_btn_onClick('students-placement-database')">
                      <div class="site-header-nav-btn-inner">
                        <div style="padding: 0px;">
                          <p class="site-header-nav-btn-label" style="line-height: 29px;">Placement&nbsp;Database</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
<!--HEADER - NAVIGATION SUB MENU END - students-->
                </div>
                <div id="nav-btn-alumni" class="site-header-nav-btn" listposition="center" state="" onmouseover="nav_btn_onMouseOver('alumni',89)" onmouseout="nav_btn_onMouseOut('alumni')">
                  <div onclick="nav_btn_onClick('alumni')">
                      <p class="site-header-nav-btn-label main-menu-label">Alumni</p>
                  </div>
<!--HEADER - NAVIGATION SUB MENU - alumni-->
                  <div id="alumni-dropWrapper" class="site-header-nav-dropWrapper" style="left:0px;width:185px;">
                  <div class="site-header-nav-moreContainer">
                    <div id="nav-btn-alumni-alumni-forum" class="site-header-nav-btn " state="" listposition="top" container="drop" style="visibility: inherit; position: relative;" onclick="nav_btn_onClick('alumni-alumni-forum')">
                      <div class="site-header-nav-btn-inner">
                        <div style="padding: 0px;">
                          <p class="site-header-nav-btn-label" style="line-height: 29px;">Alumni&nbsp;Forum</p>
                        </div>
                      </div>
                    </div>
                    <div id="nav-btn-alumni-submit-contact" class="site-header-nav-btn " state="" listposition="dropCenter" container="drop" style="visibility: inherit; position: relative;" onclick="nav_btn_onClick('alumni-submit-contact')">
                      <div class="site-header-nav-btn-inner">
                        <div style="padding: 0px;">
                          <p class="site-header-nav-btn-label" style="line-height: 29px;">Submit&nbsp;Contact&nbsp;Info</p>
                        </div>
                      </div>
                    </div>
                    <div id="nav-btn-alumni-float-project" class="site-header-nav-btn " state="" listposition="bottom" container="drop" style="visibility: inherit; position: relative;" onclick="nav_btn_onClick('alumni-float-project')">
                      <div class="site-header-nav-btn-inner">
                        <div style="padding: 0px;">
                          <p class="site-header-nav-btn-label" style="line-height: 29px;">Float&nbsp;Project&nbsp;Opportunities</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
<!--HEADER - NAVIGATION SUB MENU END - alumni-->
                </div>
                <div id="nav-btn-about" class="site-header-nav-btn" listposition="center" state="" onmouseover="nav_btn_onMouseOver('about',59)" onmouseout="nav_btn_onMouseOut('about')">
                  <div onclick="nav_btn_onClick('about')">
                      <p class="site-header-nav-btn-label main-menu-label">About</p>
                  </div>
<!--HEADER - NAVIGATION SUB MENU - about-->
                  <div id="about-dropWrapper" class="site-header-nav-dropWrapper" style="left:0px;width:117px;">
                  <div class="site-header-nav-moreContainer">
                    <div id="nav-btn-about-council" class="site-header-nav-btn " state="" listposition="top" container="drop" style="visibility: inherit; position: relative;" onclick="nav_btn_onClick('about/council')">
                      <div class="site-header-nav-btn-inner">
                        <div style="padding: 0px;">
                          <p class="site-header-nav-btn-label" style="line-height: 29px;">Council</p>
                        </div>
                      </div>
                    </div>
                    <div id="nav-btn-about-constitution" class="site-header-nav-btn " state="" listposition="bottom" container="drop" style="visibility: inherit; position: relative;" onclick="nav_btn_onClick('about/constitution')">
                      <div class="site-header-nav-btn-inner">
                        <div style="padding: 0px;">
                          <p class="site-header-nav-btn-label" style="line-height: 29px;">Constitution</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
<!--HEADER - NAVIGATION SUB MENU END - about-->
                </div>
                <div id="nav-btn-more" class="site-header-nav-btn" listposition="right" state="" onmouseover="nav_btn_onMouseOver('more',89)" onmouseout="nav_btn_onMouseOut('more')">
                  <div>
                      <p class="site-header-nav-btn-label main-menu-label">More</p>
                  </div>
<!--HEADER - NAVIGATION SUB MENU - more-->
                  <div id="more-dropWrapper" class="site-header-nav-dropWrapper" style="left:0px;width:126px;">
                  <div class="site-header-nav-moreContainer">
                    <div id="nav-btn-aavriti" class="site-header-nav-btn " state="" listposition="top" container="drop" style="visibility: inherit; position: relative;" onclick="nav_btn_onClick('aavriti')">
                      <div class="site-header-nav-btn-inner">
                        <div style="padding: 0px;">
                          <p class="site-header-nav-btn-label" style="line-height: 29px;">Aavriti</p>
                        </div>
                      </div>
                    </div>
                    <div id="nav-btn-background-hum" class="site-header-nav-btn " state="" listposition="dropCenter" container="drop" style="visibility: inherit; position: relative;" onclick="nav_btn_onClick('background-hum')">
                      <div class="site-header-nav-btn-inner">
                        <div style="padding: 0px;">
                          <p class="site-header-nav-btn-label" style="line-height: 29px;">Background&nbsp;Hum</p>
                        </div>
                      </div>
                    </div>
                    <div id="nav-btn-quick-links" class="site-header-nav-btn " state="" listposition="bottom" container="drop" style="visibility: inherit; position: relative;" onclick="nav_btn_onClick('quick-links')">
                      <div class="site-header-nav-btn-inner">
                        <div style="padding: 0px;">
                          <p class="site-header-nav-btn-label" style="line-height: 29px;">Quick&nbsp;Links</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
<!--HEADER - NAVIGATION SUB MENU END - more-->
                </div>
            </div>
          </div>
        </div>
<!--HEADER - HEADING & FOREGROUND-->
        <div class="wysiwyg_viewer_skins_WRichTextNewSkintxtNew" style="visibility: visible; left: 340px; top: 88px; width: 305px; min-height: 131px; position: absolute;">
          <h4 style="text-align: center;" class="font_4">
            <span class="color_1">EESA</span>
          </h4>
          <h6 style="text-align: center;" class="font_6">
            <span class="color_15">//</span><span class="color_8">&nbsp;IIT Bombay</span>
          </h6>
        </div>
        <div class="wysiwyg_viewer_skins_photo_NoSkinPhotowp2" style="visibility: visible; left: 174px; top: 92px; min-width: 163px; min-height: 26px; position: absolute;">
          <a class="wysiwyg_viewer_skins_photo_NoSkinPhotowp2-link" style="cursor: default;">
            <div class="skins_core_ImageNewSkinZoomable" style="visibility: visible; width: 163px; height: 26px;">
              <img class="skins_core_ImageNewSkinZoomable-image" alt="" src="images/head_left.png" style="margin-top: 0px; margin-left: 0px; width: 163px; height: 26px;">
            </div>
          </a>
        </div>
        <div class="wysiwyg_viewer_skins_photo_NoSkinPhotowp2" style="visibility: visible; left: 462px; top: 18px; min-width: 61px; min-height: 60px; position: absolute;">
          <a class="wysiwyg_viewer_skins_photo_NoSkinPhotowp2-link" style="cursor: default;">
            <div class="skins_core_ImageNewSkinZoomable" style="visibility: visible; width: 61px; height: 60px;">
              <img class="skins_core_ImageNewSkinZoomable-image" alt="" src="images/favicon.png" style="margin-top: 0px; margin-left: 0px; width: 61px; height: 60px;">
            </div>
          </a>
        </div>
        <div class="wysiwyg_viewer_skins_photo_NoSkinPhotowp2" style="visibility: visible; left: 644px; top: 92px; min-width: 163px; min-height: 26px; position: absolute;">
          <a class="wysiwyg_viewer_skins_photo_NoSkinPhotowp2-link" style="cursor: default;">
            <div class="skins_core_ImageNewSkinZoomable" style="visibility: visible; width: 163px; height: 26px;">
              <img class="skins_core_ImageNewSkinZoomable-image" alt="" src="images/head_right.png" style="margin-top: 0px; margin-left: 0px; width: 163px; height: 26px;">
            </div>
          </a>
        </div>
    </div>
<!---PAGE HEADER ENDS HERE--->
<!--PAGE FOOTER STARTS HERE-->
<!--------------------------->
<!--------------------------->
<?php if (isset($LOGGED_IN)): ?>
<?php else: ?>
<?php endif; ?>
<!--------------------------->
<!--------------------------->
    <div id="site-footer" style="position:absolute;bottom:auto;width:980px;height:75px;top:730px;">
      <div class="white-transclusent-bg"></div>
      <div style="left:50px;top:20px;width:480px;height:35px;position:absolute;">
        <p class="font_9">© 2014 EESA, IIT Bombay.<br/> Designed and maintained by Kamal Galrani</p>
      </div>
<style>
.social-btn{width:25px;height:25px;display:inline-block;margin-right:5px;}
.social-btn{position:relative;width:25px;height:25px;}
</style>
      <div style="right:50px;top:25px;width:58px;height:25px;position:absolute;overflow:hidden;">
        <a href="http://www.facebook.com/eesa.iitb" target="_blank" class="social-btn">
          <img alt="" src="images/facebook.png" class="social-btn">
        </a>
        <a href="https://plus.google.com/u/1/117833228624084282709/about" target="_blank" class="social-btn" style="margin-right:0">
          <img alt="" src="images/google+.png" class="social-btn">
        </a>
<!--
        <a href="http://www.twitter.com/" target="_blank" class="social-btn">
          <img alt="" src="images/twitter.png" class="social-btn">
        </a>
        <a href="http://www.youtube.com/" target="_blank" class="social-btn">
          <img alt="" src="images/youtube.png" class="social-btn">
        </a>
        <a href="http://www.linkedin.com/" target="_blank" class="social-btn">
          <img alt="" src="images/linkedin.png" class="social-btn">
        </a>
-->
      </div>
    </div>
  </div>
<script src="js/jquery.min.js"></script>
<script src="js/display.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
$( document ).ready(function() {
  nav_btn_pad = (971-$('[class="site-header-nav"]').width())/(2*$('[class*="main-menu-label"]').length);
  $('[class*="main-menu-label"]').css('padding','0px '+nav_btn_pad+'px');
  $('[class="site-header-nav"]').css('left',(1030-$('[class="site-header-nav"]').width())/2+'px');
//for each $('[class="site-header-nav-dropWrapper"]') as dropWrapper
//center dropWrapper
//  navigate_to("<?php echo $PAGE_ID; ?>");

<?php $PAGE_HEIGHT=isset($PAGE_HEIGHT)?max(500,$PAGE_HEIGHT):500; ?>
  $('#site-footer').css('top', 240+<?php echo $PAGE_HEIGHT; ?>+'px');
  $('#page-<?php echo $PAGE_ID; ?>').css('height', '<?php echo $PAGE_HEIGHT; ?>px');

  $('#nav-btn-'+'<?php echo $PAGE_ID; ?>').attr('state','selected');
  $('#news-carousel').carousel({interval:4000});
});
</script>
</body>
</html>
