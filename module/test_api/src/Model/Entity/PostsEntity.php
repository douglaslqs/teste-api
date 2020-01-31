<?php
namespace test_api\Model\Entity;

class PostsEntity
{
	public $id;
	public $userId;
	public $title;
	public $body;

	public function exchangeArray($data)
	{
		$this->id = isset($data['id']) ? $data['id'] : null;
		$this->userId = isset($data['userId']) ? $data['userId'] : null;
		$this->active = isset($data['active']) ? $data['active'] : null;
		$this->title = isset($data['title']) ? $data['title'] : null;
		$this->body = isset($data['body']) ? $data['body'] : null;
	}

	public function getArrayCopy()
	{
		return get_object_vars($this);
	}
}