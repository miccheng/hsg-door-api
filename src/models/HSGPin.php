<?php
class HSGPin extends BaseModel
{
	public function tableName()
	{
		return 'pins';
	}

	public function properties()
	{
		return array(
			  'id' => new Pheasant\Types\Sequence()
			, 'user_id' => new Pheasant\Types\Integer(20)
			, 'pin' => new Pheasant\Types\Integer(10)
			, 'active' => new Pheasant\Types\Integer(1)
			, 'created' => new Pheasant\Types\String()
			, 'updated' => new Pheasant\Types\String()
		);
	}
}
?>