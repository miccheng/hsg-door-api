<?php
require_once __DIR__ . '/config.php';

$r3 = new Respect\Rest\Router;

$r3->any('/', function(){
	echo "Hello, world!<pre>";
	$users = HSGUser::find('all');
	foreach($users as $user)
	{
		$payload = $user->to_array();
		print_r($payload);
	}
});
?>