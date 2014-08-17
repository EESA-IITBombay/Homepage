  <div id='page-login' class="site-page" style='height:500px;'>
  <div class="white-transclusent-bg"></div>
  <div class="site-page-padded-content" align='center'>
<?php
  if ( substr($_GET['redirect'],0,12) != 'alumni-forum' ) $_GET['redirect'] = 'index.php/'.$_GET['redirect'];
  if ( isset($_SESSION['AUTH_TOKEN']) ):
?>
    <script>window.location.href="<?php echo $_SITE['uri'].'/'.$_GET['redirect'];?>"</script>
<?php
    die();
  endif;
  if ( isset($_GET['page']) && isset($_GET['redirect'])):
?>
    <h3 class='font_3'><?php echo $_GET['page']?></h3>
    <h2 class='font_2' style='padding-top:50px'>Please sign in</h2>
<?php
  else:
?>
    <h3 class='font_3'>Sign in</h3>
<?php
  endif;
?>
    <div skinpart='LoginForm' class='form-login'>
      <input id='login-uid' type='text' class='form-control' placeholder="LDAP username" required='true' autofocus='true'>
      <input id='login-pwd' type='password' class='form-control' placeholder="LDAP password" required='true'>
      <button id='login-btn' type='submit' class='btn btn-lg btn-primary btn-block' onclick="login_btn_onClick()">Sign in</button>
    </div>
    <p id='login-err' class='font_8 color_3'></p>
  </div>
</div>
<script>
function LoggedIn() {
    window.location.href="<?php echo $_SITE['uri'].'/'.$_GET['redirect'];?>"
    return true;
  }
  function login_btn_onClick() {
    $("button[id='login-btn']").attr("disabled", true);
    $.ajax({
      url: '<?php echo $_SITE['uri']; ?>/php/login.php',
      type: 'POST',
      data: { USER_ID: $('#login-uid').val(), PASSWD: $('#login-pwd').val() }
    })
    .done( function ( response ) {
      $('#login-err').html(response);
    })
    .fail( function () {
      $('#login-err').html("Could not connect to login server! Please try again later...");
    })
    .always( function () {
      $("button[id='login-btn']").attr("disabled", false);
    });
    return false;
  }
</script>
