<?php
define('PHP_ACTIVERECORD_AUTOLOAD_PREPEND',false);
require_once __DIR__ . '/vendor/autoload.php';

class Config
{
	const ARR_FORMAT  = 'array';
	const DICT_FORMAT = 'dictionary';
	const REC_PP      = 25;

	static $server_databases = array(
		'sandbox' => 'mysql://root:media1@localhost/hsgdoor',
		'development' => 'mysql://root:11password@localhost/hsgdoor'
	);
}

ActiveRecord\Config::initialize(function($cfg)
{
	$af_vars = getenv('VCAP_SERVICES');
	if (!empty($af_vars))
	{
		$af_vars = json_decode($af_vars, true);
		$credentials = $af_vars["mysql-5.1"][0]['credentials'];
		Config::$server_databases['production'] = sprintf(
													'mysql://%s:%s@%s/%s'
													, $credentials['username']
													, $credentials['password']
													, $credentials['hostname']
													, $credentials['name']
												);
	}
	$cfg->set_model_directory('models');
	$cfg->set_connections(Config::$server_databases);
	$db_target = getenv('HSG_DB');
	if ($db_target === false)
	{
		$db_target = 'production';
	}
	$cfg->set_default_connection($db_target);
});
?>