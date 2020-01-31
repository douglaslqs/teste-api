<?php
namespace test_api\V1\Rpc\UserPosts;

class UserPostsControllerFactory
{
    public function __invoke($controllers)
    {
        return new UserPostsController();
    }
}
