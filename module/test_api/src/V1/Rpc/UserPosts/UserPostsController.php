<?php
namespace test_api\V1\Rpc\UserPosts;

use Zend\Mvc\Controller\AbstractActionController;

class UserPostsController extends AbstractActionController
{
    public function userPostsAction()
    {
    	$id = $this->params()->fromRoute('id');
    	return array('id'=>$id);
    }
}
