function nav_btn_onMouseOver( btn, height ) {
  $('#'+btn+'-dropWrapper').show();
  $('#nav-btn-'+btn).css('height',24+height+'px')
}
function nav_btn_onMouseOut( btn ) {
  $('#nav-btn-'+btn).css('height','24px')
  $('#'+btn+'-dropWrapper').hide();
}
function nav_btn_onClick( btn ) {
  window.location.href = "https://www.ee.iitb.ac.in/course/~eesa/preview/site/"+btn;
}
function navigate_to( btn ) {
  $('[id^="page-"]').fadeOut('fast');
  $('[id^="nav-btn-"]').attr('state','');
  if ($('#page-'+btn).height()!=null) { $('#site-footer').css('top', 240+$('#page-'+btn).height()+'px'); }
  else { $('#site-footer').css('top','710px'); }
  $('#page-'+btn).fadeIn('fast');
  $('#nav-btn-'+btn).attr('state','selected');
  var url = $('#page-'+btn).attr('content');
  if (url) {
    var win = window.open(url, '_blank');
    if(win) {win.focus();}
    else {alert('Can not open popups. Follow '+url);}
  }
}
