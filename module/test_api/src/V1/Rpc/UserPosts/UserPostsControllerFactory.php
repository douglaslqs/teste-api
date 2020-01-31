<?php
namespace test_api\V1\Rpc\UserPosts;

class UserPostsControllerFactory
{
    public function __invoke($services)
    {
    	$table = $services->get('test_api\\Model\\PostsTable');
        return new UserPostsController($table);
    }
}
