<?php
require_once "Auth/HTTP.php";
define('DSN','sqlite://dummy:@localhost//tmp/user.db?mode=0644');

$options = array('dsn'=>DSN, 'authType'=>'digest');
$auth = new Auth_HTTP("DB", $options);

$auth->setRealm('dummy', 'sample');
$auth->start();

?>
<html>
<head><title>HTTP digest authentication for POST method</title></head>
<body>
<?php
if($auth->getAuth()) {
  print <<<EOS
<form action="{$_SERVER['PHP_SELF']}" method="post">
<input type="text" name="title" value="php5" />
<input type="submit" />
</form>
EOS;
}
if (!empty($_POST['title'])) {echo 'POST:Title: '.$_POST['title'].'<br>';}
if (!empty($_GET['foo'])) {echo 'GET:foo: '.$_GET['foo'].'<br>';}
print "METHOD: ".$_SERVER['REQUEST_METHOD']."<br>";
?>
</body></html>
