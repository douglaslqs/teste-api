<?php
namespace test_api\V1\Rpc\PostsImport;

class PostsImportControllerFactory
{
    public function __invoke($services)
    {
    	$apiRequestService = $services->get('test_api\\Service\\ApiRequestService');
        return new PostsImportController($apiRequestService);
    }
}
