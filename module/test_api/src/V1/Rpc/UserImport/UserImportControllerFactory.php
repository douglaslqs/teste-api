<?php
namespace test_api\V1\Rpc\UserImport;

class UserImportControllerFactory
{
    public function __invoke($services)
    {
    	$apiRequestService = $services->get('test_api\\Service\\ApiRequestService');
        return new UserImportController($apiRequestService);
    }
}
