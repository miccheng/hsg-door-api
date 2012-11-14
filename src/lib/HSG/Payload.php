<?php
namespace HSG;
class Payload
{
	private $code;
	public $data;
	public $meta;

	public function __construct($code = 200, $data = array(), $meta = array())
	{
		if (is_null($data)) $data = array();
		if (is_null($meta)) $meta = array();
		$this->data = (is_array($data)) ? $data : array($data);
		$this->meta = (is_array($meta)) ? $meta : array($meta);
		$this->setCode($code);
	}
	public function setMeta($meta_name=null, $data=null)
	{
		if (empty($meta_name) || empty($data)) return false;
		$this->meta[$meta_name] = $data;
	}
	public function setCode($code=null)
	{
		if (empty($code)) return;
		$this->code = $code;
		$this->meta['status'] = (string)$code;
	}
	public function getCode()
	{
		return $this->code;
	}
	public function setMessage($message=null)
	{
		if (empty($message)) return;
		$this->meta['message'] = $message;
	}
}
?>