<?php
require_once __DIR__ . '/config.php';

$r3 = new Respect\Rest\Router;
$r3->always('Accept', array(
        'application/json' => 'json_encode'
));

$r3->any('/', function(){
	$payload = new HSG\Payload(200);
	return $payload;
});

$r3->get('/pin/check', function(){
	$status_code = 403;
	$data = array('is_valid'=>false);
	if (!empty($_GET['q']))
	{
		$code = $_GET['q'];
		$code = trim($code);
		$data['is_valid'] = HSG\Model\Pin::check_pin($code);
		if ($data['is_valid'])
		{
			$status_code = 200;
		}
	}
	$payload = new HSG\Payload($status_code, $data);
	return $payload;
});
?>