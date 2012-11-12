<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/models/BaseModel.php';
require_once __DIR__ . '/models/HSGUser.php';
require_once __DIR__ . '/models/HSGPin.php';
require __DIR__ . '/vendor/php-activerecord/php-activerecord/lib/ActiveRecord/Utils.php';
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
ActiveRecord\Config::initialize(function($cfg)
{
	$cfg->set_model_directory( __DIR__ . '/models');
	$cfg->set_connections(Config::$server_databases);
	$db_target = getenv('HSG_DB');
	if ($db_target === false)
	{
		$db_target = 'production';
	}
	$cfg->set_default_connection($db_target);
});
?>