<?php
namespace HSG\Model;
class User extends Base
{
	protected $to_array_rules = array('except'=>array('id'));
	static $table_name = 'users';
}
?>