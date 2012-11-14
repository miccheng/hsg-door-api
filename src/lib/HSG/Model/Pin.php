<?php
namespace HSG\Model;
class Pin extends Base
{
	protected $to_array_rules = array('except'=>array('id'));
	static $table_name = 'pins';

	public static function check_pin($code=null)
	{
		$code = trim($code);
		if (empty($code)) return false;

		$user = self::first(array(
					'conditions' => array(
						'pin = ? AND active = 1', $code
					)
				));
		return (count($user) > 0);
	}
}
?>