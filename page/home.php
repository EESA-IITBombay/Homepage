<!----PAGE-SPECIFIC-CSS-STARTS---->
<style>
  .carousel-control.left,.carousel-control.right{background-image:none!important;}
  .carousel-inner .item img{width:100%;height:100%;}
  .carousel-indicators{bottom:12px;left:0;width:auto;height:20px;padding:5px 25px 5px 25px;margin-left:0;}
  .carousel-indicators li{width:8px;height:8px;background:#fff;}
  .carousel-indicators .active{width:10px;height:10px;background:rgb(39,131,137);border-color:rgb(39,131,137);}
  .carousel-control{color:rgb(39,131,137);padding: 4px 0;width:26px;top:auto;left:auto;bottom:12px;opacity:0.80;}
  .carousel-control.right{right:10px;}
  .carousel-control.left{right:46px;}
  .carousel-caption{top:auto;width:auto;right:auto;bottom:60px;left:0;padding:20px;background:rgba(0,0,0,0.7);text-align:left;height:auto;max-width:50%;}
</style>
<!-----PAGE-SPECIFIC-CSS-ENDS----->

<!-----ADDRESS-BAR-STARTS-HERE---->
<div class="white-transclusent-bg" style="height:22px;position:absolute;top:15px;z-index:999">
  <p class="font_8" style="padding-left: 20px;">You are here:&nbsp;&nbsp;
    <a href="#">Home</a>
  </p>
</div>
<!------ADDRESS-BAR-ENDS-HERE----->

<!----PAGE-CONTENT-STARTS-HERE---->
<div id='page-home' class='site-page' style='height:500px;'>
<?php $PAGE_HEIGHT = 500; ?>
  <div class='site-page-padded-content'>
    <!------NEWS-CAROUSEL-STARTS------>
    <div style='position:absolute;left:0px;top:5px;width:510px;height:420px;'>
      <div class="white-transclusent-bg"></div>
      <div id='news-carousel' class="carousel slide" style='overflow:hidden;left:15px;top:15px;width:480px;height:360px;position:absolute;'>
        <div class="carousel-inner">
        <!--------NEWS-ITEMS-START-------->
<?php
  require_once("php/MySQL.class.php");
  require_once("privconfig.php");
  isset($dbLink)?:$dbLink = new MySQL($_SITE['dbHost'], $_SITE['dbUser'], $_SITE['dbPass'], $_SITE['dbName']);
  $news  = $dbLink->fetch("SELECT * from tbl_news WHERE banner=1 ORDER BY start_time DESC LIMIT 20");
  $empty = false;
FETCH_NEWS:
  $count = 0;
  $level = 1;
  while ( $level < 3 && $count < 10) {
    foreach ( $news as $obj ) {
      if ( $obj['importance'] != $level ) continue;
      if ( $obj['end_time'] < time() && !$empty ) continue;
      if ( $count == 0 ):
        echo "          <article class='item active'>";
      else:
        echo "          <article class='item'>";
      endif;
?>
            <img src="site-data/news/images/<?php echo $obj['ID'];?>">
            <div class="carousel-caption">
              <h3><?php echo $obj['headline'];?></h3>
              <p><?php echo $obj['synopsis'];?></p>
              <p><a class="btn btn-info btn-sm" href="<?php echo $_SITE['uri'].'/index.php/news?article='.$obj['ID'];?>">Read More</a></p>
            </div>
          </article>
<?php
      $count++;
      if ($count == 10) break;
    }
    $level++;
  }
  if ( $count == 0 && $empty == false ) { $empty = true; goto FETCH_NEWS;}
?>
        </div>
        <!---------NEWS-ITEMS-END--------->

        <!--NEWS-CAROUSEL-CONTROLS-START-->
        <ol class="carousel-indicators">
<?php
  if ( $count != 0 ):
?>
          <li data-target='#news-carousel' data-slide-to='0' class="active"></li>
<?php
    for($i=1;$i<$count;$i++){
?>
          <li data-target='#news-carousel' data-slide-to='<?php echo $i; ?>' class=""></li>
<?php
    }
  endif;
?>
        </ol>
        <div class="carousel-controls">
          <a class="carousel-control left" href='#news-carousel' data-slide='prev'>
            <span class="fa fa-chevron-circle-left"></span>
          </a>
          <a class="carousel-control right" href='#news-carousel' data-slide='next'>
            <span class="fa fa-chevron-circle-right"></span>
          </a>
        </div>
        <!---NEWS-CAROUSEL-CONTROLS-END--->
      </div>
      <a style="position:absolute;bottom:10px;left:15px;" class="font_1 color_15" href="<?php echo $_SITE['uri'].'/index.php/news';?>">Click here for more news...</a>
    </div>
    <!-------NEWS-CAROUSEL-ENDS------->

    <!-----GOOGLE-CALENDAR-STARTS----->
    <div style='left:530px;top:5px;width:450px;height:420px;position:absolute;'>
    <!--::::::::::::::::::::::::::::-->
    <!--:::::::TODO::EDIT-CSS:::::::-->
    <!--::::::::::::::::::::::::::::-->
      <iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;showCalendars=0&amp;showTz=0&amp;mode=AGENDA&amp;height=420&amp;wkst=2&amp;bgcolor=%23FFFFFF&amp;src=eesa.iitb%40gmail.com&amp;color=%232F6309&amp;ctz=Asia%2FCalcutta" style="border:solid 1px #777" width='450' height='420' frameborder='0' scrolling='yes'></iframe>
    </div>
    <!------GOOGLE-CALENDAR-ENDS------>
  </div>
</div>
