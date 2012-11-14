<?php
require_once __DIR__ . '/config.php';

$r3 = new Respect\Rest\Router;
$r3->always('accept', array(
        'application/json' => 'json_encode'
));

$r3->any('/', function(){
	$payload = new HSG\Payload(200);
	return $payload;
});

$r3->get('/pin/check', function(){
	$status = 403;
	$data = array('is_valid'=>false);
	if (!empty($_GET['pin']))
	{
		$code = $_GET['pin'];
		$users = HSG\Model\Pin::first(array(
					'conditions' => array(
						'pin = ? AND active = 1', $code
					)
				));
		if (count($users) > 0)
		{
			$status = 200;
			$data['is_valid'] = true;
		}
	}
	$payload = new HSG\Payload($status, $data);
	return $payload;
});
?>