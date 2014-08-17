<style>
.lifted-image {
  display: block;
  border-radius: 0px;
  box-shadow: rgba(0, 0, 0, 0.0980392) 0px 0px 5px 0px;
  background-color: rgb(255, 255, 255);
  border: 3px solid rgb(255, 255, 255);
  border-image-source: initial;
  border-image-slice: initial;
  border-image-width: initial;
  border-image-outset: initial;
  border-image-repeat: initial;
  overflow: hidden;
}
.image_150x150 {
  width:150px;
  height:150px;
}
</style>
<div id='page-students-voting-interface' class='site-page' style='height:470px;'>
  <div class='white-transclusent-bg'></div>
  <div class='site-page-padded-content' align='center'>
    <h3 class='font_3'>Voting Interface</h3>
<?php
  if ( !isset($_SESSION['USER_ID']) || !isset($_SESSION['USER_NAME']) || !isset($_SESSION['AUTH_TOKEN']) ):
?>
    <script>window.location.href="<?php echo $_SITE['uri'].'/index.php/login?page='.urlencode('Voting Interface').'&redirect='.urlencode('students/voting-interface'); ?>"</script>
<?php
  else:
    require_once("php/MySQL.class.php");
    require_once("privconfig.php");
    isset($dbLink)?:$dbLink = new MySQL($_SITE['dbHost'], $_SITE['dbUser'], $_SITE['dbPass'], $_SITE['dbName']);
    $elections = $dbLink->fetch("SELECT * FROM tbl_elections_lookup WHERE programme='".$_SESSION['PROG']."' AND year='".$_SESSION['YEAR']."'");
    $PAGE_HEIGHT = 180;
    $flag = 1;
    foreach ( $elections as $election ) {
      if ( $election['start_time'] < time() && time() < $election['end_time'] ):
        $vote_cast = $dbLink->fetch("SELECT * FROM tbl_elections_voterlist WHERE user_id='".$_SESSION['USER_ID']."' AND election_id=".$election['election_id']);
        if ( count($vote_cast) === 0):
          $PAGE_HEIGHT += 56 + 45;
          $flag = 0;
?>
    <form align='left' style="margin-left:50px;margin-top:20px;margin-right:50px" action="<?php echo $_SITE['uri']; ?>/php/vote.php">
      <h2 class='font_2'><?php echo $election['friendly_name']; ?></h2><br>
<?php
          $contestants = $dbLink->fetch("SELECT * FROM tbl_elections_data WHERE election_id=".$election['election_id']);
          foreach ( $contestants as $contestant ) {
            $PAGE_HEIGHT += 170;
?>
      <div class="lifted-image image_150x150" style="margin-bottom:20px;margin-right:20px;float:left">
        <!--
        <div class="wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-shd wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-left"></div>
        <div class="wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-shd wysiwyg_viewer_skins_photo_LiftedTopPhotowp1-c-right"></div>
        -->
        <img src="site-data/elections/images/<?php echo $contestant['contestant_id']; ?>.jpg" style="width:100%;height:100%;">
      </div>
      <div>
        <h5 class='font_4 color_20' style="font-size:23px;"><?php echo $contestant['contestant_name']; ?></h5>
        <span class="font_1"><?php echo $contestant['contestant_id']; ?> - <a href = 'site-data/elections/manifestos/<?php echo $contestant['contestant_id']."_".$contestant['contestant_election_id']; ?>.pdf' target='_blank'>Manifesto</a></span><br>
      </div>
      <div class="font_7" style="margin-top:10px">
        <input name="<?php echo $contestant['contestant_id'].'_'.$election['election_id']; ?>" value="Yes" type="radio" style="margin-right:10px">Yes
        <input name="<?php echo $contestant['contestant_id'].'_'.$election['election_id']; ?>" value="No" type="radio" style="margin-left:20px;margin-right:10px">No
        <input name="<?php echo $contestant['contestant_id'].'_'.$election['election_id']; ?>" value="Neutral" checked="checked" type="radio" style="margin-left:20px;margin-right:10px">Neutral
      </div>
      <br style="clear:both;">
<?php
          }
?>
      <button name="election_id" value="<?php echo $election['election_id']; ?>" type="submit" class="btn btn-lg btn-primary btn-block" style="width:150px;margin:0px auto">Submit</button>
    </form>
<?php
        endif;
      endif;
    }
    if ( $flag ) echo "<p class='font_2 color_3' style='margin:20px 0px'>No active elections.</p>";
  endif;
?>
  </div>
</div>
