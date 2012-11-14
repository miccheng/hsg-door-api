<?php
use \Pheasant;
use \Pheasant\Events;
use \Pheasant\Types;

abstract class BaseModel extends \Pheasant\DomainObject
{
	public function beforeCreate($data)
	{
		$this->created = date('Y-m-d H:i:s');
		$this->updated = date('Y-m-d H:i:s');
	}

	public function beforeUpdate($data)
	{
		$this->updated = date('Y-m-d H:i:s');
	}

	public function toArray()
	{
		$array = parent::toArray();
		if (isset($array['id']))
		{
			unset($array['id']);
		}
		return $array;
	}
}
?>