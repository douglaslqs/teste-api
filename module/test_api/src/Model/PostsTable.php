<?php
namespace test_api\Model;

use Zend\Db\TableGateway\TableGateway;
//use Application\Model\AbstractTable;

class PostsTable
{
	private $tableGateway;

	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}

	public function fetch($arrParams)
	{
		try {
			$sql = $this->tableGateway->getSql();
			$select = $sql->select()->where($arrParams);
			return $this->tableGateway->selectWith($select)->toArray();
		} catch (Exception $e) {
			return array("error: "=>$e->getMessage());
		}
	}
}