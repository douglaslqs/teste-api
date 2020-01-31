<?php
namespace test_api;

use ZF\Apigility\Provider\ApigilityProviderInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use test_api\Model\Entity\PostsEntity;
use test_api\Model\PostsTable;

class Module implements ApigilityProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return [
            'ZF\Apigility\Autoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src',
                ],
            ],
        ];
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'test_api\Model\PostsTable' =>  function($sm) {
                    $tableGateway = $sm->get('PostsTableGateway');
                    return new PostsTable($tableGateway);
                },
                'PostsTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('db');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new PostsEntity());
                    return new TableGateway('posts', $dbAdapter, null, $resultSetPrototype);
                },
            )
        );
    }
}
