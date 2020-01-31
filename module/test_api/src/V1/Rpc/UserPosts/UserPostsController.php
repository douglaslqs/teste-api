<?php
namespace test_api\V1\Rpc\UserPosts;

use Zend\Mvc\Controller\AbstractActionController;

class UserPostsController extends AbstractActionController
{
	private $tablePosts;

	public function __construct($tablePosts)
	{
		$this->tablePosts = $tablePosts;
	}

    public function userPostsAction()
    {
    	return $this->tablePosts->fetch(array('userId'=>$this->params()->fromRoute('id')));
    }
}
