<?php
class HSGUser extends BaseModel
{
	public function tableName()
	{
		return 'users';
	}

	public function properties()
	{
		return array(
			  'id' => new Pheasant\Types\Sequence()
			, 'username' => new Pheasant\Types\String()
			, 'email' => new Pheasant\Types\String()
			, 'active' => new Pheasant\Types\Integer(1)
			, 'created' => new Pheasant\Types\String()
			, 'updated' => new Pheasant\Types\String()
		);
	}
}
?>