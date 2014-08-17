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
<div class="white-transclusent-bg" style="height:22px;position: absolute;top:15px;">
  <p class="font_8" style="padding-left: 20px;">You are here:&nbsp;&nbsp;
    <a href="">Home</a>
  </p>
</div>
<div id='page-home' class='site-page' style='height:490px;'>
  <div class='site-page-padded-content'>
    <div style='visibility:visible;position:absolute;left:0px;top:0px;width:510px;height:420px;'>
      <div class="white-transclusent-bg"></div>
<!--News Carousel-->
      <div id='news-carousel' class="carousel slide" style='visibility:visible;overflow:hidden;left:15px;top:15px;width:480px;height:360px;position:absolute;'>
        <div class="carousel-inner">
<!--News Items-->
<?php
  require("php/MySQL.class.php");
  require("config.php");
  isset($dbLink)?:$dbLink = new MySQL($_SITE['dbHost'], $_SITE['dbUser'], $_SITE['dbPass'], $_SITE['dbName']);
//  $dbLink = new MySQL($_SITE['dbHost'], $_SITE['dbUser'], $_SITE['dbPass'], $_SITE['dbName']);
  $news   = $dbLink->fetch("SELECT * from if_news ORDER BY start_time LIMIT 5");
  foreach($news as $obj) {
?>
          <article class="item">
            <img src="site-data/news/images/<?php echo $obj['ID'];?>">
            <div class="carousel-caption">
              <h3><?php echo $obj['headline'];?></h3>
              <p><?php echo $obj['synopsis'];?></p>
              <p><a class="btn btn-info btn-sm">Read More</a></p>
            </div>
          </article>
<?php
  }
?>
          <article class="item active">
            <img src="http://placehold.it/640x480/999999/cccccc">
            <div class="carousel-caption">
              <h3>Headline</h3>
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
              <p><a class="btn btn-info btn-sm">Read More</a></p>
            </div>
          </article>

<!--News Items End-->
<!--News Carousel Indicators And Control-->
        </div>
        <ol class="carousel-indicators">
          <li data-target='#news-carousel' data-slide-to='0' class="active"></li>
          <li data-target='#news-carousel' data-slide-to='1' class=""></li>
          <li data-target='#news-carousel' data-slide-to='2' class=""></li>
        </ol>        
        <div class="carousel-controls">
          <a class="carousel-control left" href='#news-carousel' data-slide='prev'>
            <span class="fa fa-chevron-circle-left"></span>
          </a>
          <a class="carousel-control right" href='#news-carousel' data-slide='next'>
            <span class="fa fa-chevron-circle-right"></span>
          </a>
        </div>
      </div>
      <a style="position:absolute;bottom:10px;left:15px;" class="font_1 color_15">Click here for more news...</a>
    </div>
<!--News Carousel Indicators And Control End-->
<!--News Carousel End-->
<!--Google Calendar-->
    <div class="tpa_viewer_skins_TPAWidgetSkintpaw0" style='visibility:visible;left:530px;top:0;width:450px;height:420px;position:absolute;'>
<!-- !!!!!---LOOKS NEED SOME ATTENTION---!!!!! -->
      <iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;showCalendars=0&amp;showTz=0&amp;mode=AGENDA&amp;height=420&amp;wkst=2&amp;bgcolor=%23FFFFFF&amp;src=eesa.iitb%40gmail.com&amp;color=%232F6309&amp;ctz=Asia%2FCalcutta" style="border:solid 1px #777" width='450' height='420' frameborder='0' scrolling='no'></iframe>
    </div>
<!--Google Calendar End-->
  </div>
</div>
