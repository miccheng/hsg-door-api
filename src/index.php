<?php
require_once __DIR__ . '/config.php';

$r3 = new Respect\Rest\Router;

$r3->any('/', function(){
//	$users = HSGUser::all();
//	foreach($users as $user)
//	{
//		printf("My name is %s. My email is %s.<br/>", $user->username, $user->email);
//	}
	try
	{
		echo "<pre>";
		$user_pin = new HSGPin(array('user_id'=>1, 'pin'=>123456));
		$user_pin->save();
	}
	catch (Exception $ex)
	{
		echo "Exception: ".$ex->getMessage();
	}
});
?>