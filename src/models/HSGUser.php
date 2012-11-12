<?php
class HSGUser extends BaseModel
{
	protected $to_array_rules = array('except'=>array('id'));
	static $table_name = 'users';
	
}
?>