<?php
namespace HSG\Model;
class Pin extends Base
{
	protected $to_array_rules = array('except'=>array('id'));
	static $table_name = 'pins';
}
?>