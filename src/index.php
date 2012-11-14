<?php
require_once __DIR__ . '/config.php';

$r3 = new Respect\Rest\Router;

$r3->any('/', function(){
	$users = HSG\Model\User::find('all');
	foreach($users as $user)
	{
		printf("My name is %s. My email is %s.<br/>", $user->username, $user->email);
	}
});
?>