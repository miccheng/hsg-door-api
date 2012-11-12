<?php
abstract class BaseModel extends ActiveRecord\Model
{
	protected $to_array_rules = array();
	static $before_create = array('generate_create_ts');
	static $before_save = array('generate_updated_ts');

	public function generate_create_ts()
	{
		$this->created = date('Y-m-d H:i:s');
		return true;
	}

	public function generate_updated_ts()
	{
		if (isset($this->updated))
		{
			$this->updated = date('Y-m-d H:i:s');
		}
		return true;
	}

	public function to_array(array $options = array())
	{
		$all_options = array_merge($options, $this->to_array_rules);
		return parent::to_array($all_options);
	}
}
?>