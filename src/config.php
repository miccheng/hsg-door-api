<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/models/BaseModel.php';
require_once __DIR__ . '/models/HSGUser.php';
require_once __DIR__ . '/models/HSGPin.php';

class Config
{
	const ARR_FORMAT  = 'array';
	const DICT_FORMAT = 'dictionary';
	const REC_PP      = 25;

	static $server_databases = array(
		'sandbox' => 'mysql://root:media1@localhost/hsgdoor',
		'development' => 'mysql://root:11password@localhost/hsgdoor',
		'production'  => 'mysql://uq0qYMpB4U1Dy:pv2n8sEM64htw@ap01-user01.c0ye1hvnkw6z.ap-southeast-1.rds.amazonaws.com'
	);
}

$db_target = getenv('HSG_DB');
if ($db_target === false)
{
	$db_target = 'production';
}
Pheasant::setup(Config::$server_databases[$db_target]);
?>