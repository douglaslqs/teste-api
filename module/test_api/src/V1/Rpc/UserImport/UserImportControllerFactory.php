<?php
namespace test_api\V1\Rpc\UserImport;

class UserImportControllerFactory
{
    public function __invoke($controllers)
    {
        return new UserImportController();
    }
}
