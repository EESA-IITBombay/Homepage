<script>
  function rescale() {
    var w=$("[class='img-responsive']","[class='carousel-inner']").css("width");
    w=0.75*(w.substr(0, w.length - 2));
    $("[class='img-responsive']","[class='carousel-inner']").css("height",w+"px");
    w=w+50;
    $("#news-container").css("height",w+"px");
    $("#calendar-container").css("height",w+"px");
  }

  rescale();

  $( window ).resize(rescale);
</script>

