<?php
require_once "Auth/HTTP.php";
define('DSN','sqlite://dummy:@localhost//tmp/user.db?mode=0644');

$options = array('dsn'=>DSN, 'authType'=>'digest');
$auth = new Auth_HTTP("DB", $options);

$auth->setRealm('dummy', 'sample');
$auth->start();

?>
<html>
<head><title>HTTP digest authentication for GET method</title></head>
<body>
<?php
print "auth: ".$auth->authMethod."<br />";
print "username: ".$auth->username."<br />";
print "password: ".$auth->password."<br />";
print "auth: ".print_r($auth->auth)."<br />";
if($auth->getAuth()) {
  print <<<EOS
<form action="{$_SERVER['PHP_SELF']}" method="get">
<input type="text" name="title" value="php5" />
<input type="submit" />
</form>
EOS;
}
if (!empty($_POST['title'])) {echo 'Title: '.$_POST['title'];}
?>


</body></html>
