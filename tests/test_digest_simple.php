<?php
require_once "Auth/HTTP.php";
define('DSN','sqlite://dummy:@localhost//tmp/user.db?mode=0644');

$options = array('dsn'=>DSN, 'authType'=>'digest');
$auth = new Auth_HTTP("DB", $options);

$auth->setRealm('dummy', 'sample');
$auth->start();

?>
<html>
<head><title>HTTP digest authentication test for simple case</title></head>
<body>
<?php
print "auth: ".$auth->authType."<br />";
print "username: ".$auth->username."<br />";
print "password: ".$auth->password."<br />";
print "auth: ".print_r($auth->auth)."<br />";
if($auth->getAuth()) {
  print "authentication is succeeded.<br />";
}
?>
</body></html>
