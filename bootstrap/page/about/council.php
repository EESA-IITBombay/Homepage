<div id='page-about-council' class='site-page' style='height:500px;'>
  <div class='white-transclusent-bg'></div>
  <div class='white-transclusent-bg' style="height:22px;position: absolute;top:15px;">
    <p class="font_8" style="padding-left: 20px;">You are here:&nbsp;&nbsp;
    <a href="<?php echo $_SITE['uri']; ?>/site/about">About</a>
      &nbsp;>>&nbsp;
      <a href="#">Council</a>
    </p>
  </div>
  <div class='site-page-padded-content'>
    <div class="wysiwyg_viewer_skins_WRichTextNewSkintxtNew" style="visibility: visible; left: 30px; top: 30px; right:30px; min-height: 312px; position: absolute;">
      <h2 class="font_3 color_15">Department Council (2014-2015)</h2>
      <p class="font_8">&nbsp;</p>
<?php
    require_once("php/MySQL.class.php");
    require_once("privconfig.php");
    isset($dbLink)?:$dbLink = new MySQL($_SITE['dbHost'], $_SITE['dbUser'], $_SITE['dbPass'], $_SITE['dbName']);
    $council = reset($dbLink->fetch("SELECT * FROM tbl_council_history ORDER BY year DESC LIMIT 1"));
?>
      <!----DeptGSec---->
<?php
    $member = reset($dbLink->fetch("SELECT * FROM tbl_council_data where name='".$council['DeptGSec']."'"));
?>
      <div class="lifted-image image_150x150" style="position:absolute;left:0px;top:100px">
        <!--
	<div class="wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-shd wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-left"></div>
        <div class="wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-shd wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-right"></div>
        -->
	<img src="site-data/council/DeptGSec.jpg" style="width:100%;height:100%;">
      </div>
      <div style="position:absolute;left:170px;top:100px">
	<a class='font_2' style='font-size:25px;' href="https://www.facebook.com/<?php echo $member['fbuid'];?>"><?php echo $member['name'];?></a>
	<h5 class='font_7'>Department General Secretary</h5>
	<a class='font_7' href='mailto:<?php echo $member['email'];?>'><?php echo $member['email'];?></a>
	<h5 class='font_7'><?php echo $member['mobile'];?></h5>
      </div>
      <!----EESAGsec---->
<?php
    $member = reset($dbLink->fetch("SELECT * FROM tbl_council_data where name='".$council['EESAGSec']."'"));
?>
      <div class="lifted-image image_150x150" style="position:absolute;left:450px;top:100px">
        <!--
	<div class="wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-shd wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-left"></div>
        <div class="wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-shd wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-right"></div>
        -->
	<img src="site-data/council/EESAGSec.jpg" style="width:100%;height:100%;">
      </div>
      <div style="position:absolute;left:620px;top:100px">
	<a class='font_2' style='font-size:25px;' href="https://www.facebook.com/<?php echo $member['fbuid'];?>"><?php echo $member['name'];?></a>
	<h5 class='font_7'>EESA General Secretary</h5>
	<a class='font_7' href='mailto:<?php echo $member['email'];?>'><?php echo $member['email'];?></a>
	<h5 class='font_7'><?php echo $member['mobile'];?></h5>
      </div>
      <!----JointSec1---->
<?php
    $member = reset($dbLink->fetch("SELECT * FROM tbl_council_data where name='".$council['JointSec1']."'"));
?>
      <div class="lifted-image image_150x150" style="position:absolute;left:0px;top:270px">
        <!--
	<div class="wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-shd wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-left"></div>
        <div class="wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-shd wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-right"></div>
        -->
	<img src="site-data/council/JointSec1.jpg" style="width:100%;height:100%;">
      </div>
      <div style="position:absolute;left:170px;top:270px">
	<a class='font_2' style='font-size:25px;' href="https://www.facebook.com/<?php echo $member['fbuid'];?>"><?php echo $member['name'];?></a>
	<h5 class='font_7'>Joint Secretary</h5>
	<a class='font_7' href='mailto:<?php echo $member['email'];?>'><?php echo $member['email'];?></a>
	<h5 class='font_7'><?php echo $member['mobile'];?></h5>
      </div>
      <!----JointSec2---->
<?php
    $member = reset($dbLink->fetch("SELECT * FROM tbl_council_data where name='".$council['JointSec2']."'"));
?>
      <div class="lifted-image image_150x150" style="position:absolute;left:450px;top:270px">
        <!--
	<div class="wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-shd wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-left"></div>
        <div class="wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-shd wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-right"></div>
        -->
	<img src="site-data/council/JointSec2.jpg" style="width:100%;height:100%;">
      </div>
      <div style="position:absolute;left:620px;top:270px">
	<a class='font_2' style='font-size:25px;' href="https://www.facebook.com/<?php echo $member['fbuid'];?>"><?php echo $member['name'];?></a>
	<h5 class='font_7'>Joint Secretary</h5>
	<a class='font_7' href='mailto:<?php echo $member['email'];?>'><?php echo $member['email'];?></a>
	<h5 class='font_7'><?php echo $member['mobile'];?></h5>
      </div>
      <!----WebSec---->
<?php
    $member = reset($dbLink->fetch("SELECT * FROM tbl_council_data where name='".$council['WebSec']."'"));
?>
      <div class="lifted-image image_150x150" style="position:absolute;left:0px;top:440px">
        <!--
	<div class="wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-shd wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-left"></div>
        <div class="wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-shd wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-right"></div>
        -->
	<img src="site-data/council/WebSec.jpg" style="width:100%;height:100%;">
      </div>
      <div style="position:absolute;left:170px;top:440px">
	<a class='font_2' style='font-size:25px;' href="https://www.facebook.com/<?php echo $member['fbuid'];?>"><?php echo $member['name'];?></a>
	<h5 class='font_7'>Web Secretary</h5>
	<a class='font_7' href='mailto:<?php echo $member['email'];?>'><?php echo $member['email'];?></a>
	<h5 class='font_7'><?php echo $member['mobile'];?></h5>
      </div>
      <!----AlumSec---->
<?php
    $member = reset($dbLink->fetch("SELECT * FROM tbl_council_data where name='".$council['AlumSec']."'"));
?>
      <div class="lifted-image image_150x150" style="position:absolute;left:450px;top:440px">
        <!--
	<div class="wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-shd wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-left"></div>
        <div class="wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-shd wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-right"></div>
        -->
	<img src="site-data/council/AlumSec.jpg" style="width:100%;height:100%;">
      </div>
      <div style="position:absolute;left:620px;top:440px">
	<a class='font_2' style='font-size:25px;' href="https://www.facebook.com/<?php echo $member['fbuid'];?>"><?php echo $member['name'];?></a>
	<h5 class='font_7'>Alumni Secretary</h5>
	<a class='font_7' href='mailto:<?php echo $member['email'];?>'><?php echo $member['email'];?></a>
	<h5 class='font_7'><?php echo $member['mobile'];?></h5>
      </div>
      <!----PGNom---->
<?php
    $member = reset($dbLink->fetch("SELECT * FROM tbl_council_data where name='".$council['PGNom']."'"));
?>
      <div class="lifted-image image_150x150" style="position:absolute;left:0px;top:610px">
        <!--
	<div class="wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-shd wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-left"></div>
        <div class="wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-shd wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-right"></div>
        -->
	<img src="site-data/council/PGNom.jpg" style="width:100%;height:100%;">
      </div>
      <div style="position:absolute;left:170px;top:610px">
	<a class='font_2' style='font-size:25px;' href="https://www.facebook.com/<?php echo $member['fbuid'];?>"><?php echo $member['name'];?></a>
	<h5 class='font_7'>PG Nominee</h5>
	<a class='font_7' href='mailto:<?php echo $member['email'];?>'><?php echo $member['email'];?></a>
	<h5 class='font_7'><?php echo $member['mobile'];?></h5>
      </div>
      <!----DesignSec---->
<?php
    $member = reset($dbLink->fetch("SELECT * FROM tbl_council_data where name='".$council['DesignSec']."'"));
?>
      <div class="lifted-image image_150x150" style="position:absolute;left:450px;top:610px">
        <!--
	<div class="wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-shd wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-left"></div>
        <div class="wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-shd wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-right"></div>
        -->
	<img src="site-data/council/DesignSec.jpg" style="width:100%;height:100%;">
      </div>
      <div style="position:absolute;left:620px;top:610px">
	<a class='font_2' style='font-size:25px;' href="https://www.facebook.com/<?php echo $member['fbuid'];?>"><?php echo $member['name'];?></a>
	<h5 class='font_7'>Design Secretary</h5>
	<a class='font_7' href='mailto:<?php echo $member['email'];?>'><?php echo $member['email'];?></a>
	<h5 class='font_7'><?php echo $member['mobile'];?></h5>
      </div>
      <div style="position:absolute;left:0px;top:780px">
	<a class='font_7' style="color:rgb(39,131,137)!important;" href="<?php echo $_SITE['uri']; ?>/site/about/council/prev-council">Previous Councils</a>
      </div>
    </div>
  </div>
</div>
<?php $PAGE_HEIGHT=900; ?>
