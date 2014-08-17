<div id='page-about-council-prev-council' class='site-page' style='height:500px;'>
  <div class='white-transclusent-bg'></div>
  <div class='white-transclusent-bg' style="height:22px;position: absolute;top:15px;">
    <p class="font_8" style="padding-left: 20px;">You are here:&nbsp;&nbsp;
    <a href="<?php echo $_SITE['uri']; ?>/index.php/about">About</a>
      &nbsp;>>&nbsp;
      <a href="#">Council</a>
      &nbsp;>>&nbsp;
      <a href="#">Previous Councils</a>
    </p>
  </div>
  <div class='site-page-padded-content'>
    <div class="wysiwyg_viewer_skins_WRichTextNewSkintxtNew" style="left:20px;top:30px;right:20px;min-height:312px;position:absolute;">
<?php
    require_once("php/MySQL.class.php");
    require_once("privconfig.php");
    isset($dbLink)?:$dbLink = new MySQL($_SITE['dbHost'], $_SITE['dbUser'], $_SITE['dbPass'], $_SITE['dbName']);
    $councils = $dbLink->fetch("SELECT * FROM tbl_council_history ORDER BY year DESC");
?>
      <h2 class="font_3 color_15">Previous Councils</h2>
      <p class="font_8">&nbsp;</p>
      <div style="overflow-x:scroll;overflow-y:scroll;">
      <table cellspacing="3" cellpadding="3" class="table table-condensed table-striped" style="width:1240px">
      <thead>
        <tr>
          <th class="headerSortable">Year</th>
          <th class="headerSortable">Dept. G. Sec.</th>
          <th class="headerSortable">EESA G. Sec.</th>
          <th class="headerSortable">Joint Sec.</th>
          <th class="headerSortable">Joint Sec.</th>
          <th class="headerSortable">Web Sec.</th>
          <th class="headerSortable">Alumni Sec.</th>
          <th class="headerSortable">PG Nominee</th>
          <th class="headerSortable">Design Sec.</th>
        </tr>
      </thead>
      <tbody>
<?php
  foreach ( $councils as $council ) {
?>
        <tr style="height: 40px;">
          <td><?php echo $council['year'];?></td>
          <td><?php echo $council['DeptGSec'];?></td>
          <td><?php echo $council['EESAGSec'];?></td>
          <td><?php echo $council['JointSec1'];?></td>
          <td><?php echo $council['JointSec2'];?></td>
          <td><?php echo $council['WebSec'];?></td>
          <td><?php echo $council['AlumSec'];?></td>
          <td><?php echo $council['PGNom'];?></td>
          <td><?php echo $council['DesignSec'];?></td>
        </tr>
<?php
  }
?>
      </table>
      </div>
    </div>
  </div>
</div>
<?php $PAGE_HEIGHT=900; ?>
