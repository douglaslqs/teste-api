<?php
return [
    'service_manager' => [
        'factories' => [
            \test_api\Service\ApiRequestService::class => \test_api\Service\Factory\ApiRequestFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'test_api.rest.address' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/address[/:address_id]',
                    'defaults' => [
                        'controller' => 'test_api\\V1\\Rest\\Address\\Controller',
                    ],
                ],
            ],
            'test_api.rest.users' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/users[/:users_id]',
                    'defaults' => [
                        'controller' => 'test_api\\V1\\Rest\\Users\\Controller',
                    ],
                ],
            ],
            'test_api.rpc.user-import' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/users-import',
                    'defaults' => [
                        'controller' => 'test_api\\V1\\Rpc\\UserImport\\Controller',
                        'action' => 'userImport',
                    ],
                ],
            ],
            'test_api.rest.posts' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/posts[/:id]',
                    'defaults' => [
                        'controller' => 'test_api\\V1\\Rest\\Posts\\Controller',
                    ],
                ],
            ],
            'test_api.rpc.posts-import' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/posts-import',
                    'defaults' => [
                        'controller' => 'test_api\\V1\\Rpc\\PostsImport\\Controller',
                        'action' => 'postsImport',
                    ],
                ],
            ],
            'test_api.rest.company' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/company[/:company_id]',
                    'defaults' => [
                        'controller' => 'test_api\\V1\\Rest\\Company\\Controller',
                    ],
                ],
            ],
            'test_api.rpc.user-posts' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/users[/:id]/posts',
                    'defaults' => [
                        'controller' => 'test_api\\V1\\Rpc\\UserPosts\\Controller',
                        'action' => 'userPosts',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'test_api.rest.address',
            1 => 'test_api.rest.users',
            2 => 'test_api.rpc.user-import',
            3 => 'test_api.rest.posts',
            4 => 'test_api.rpc.posts-import',
            5 => 'test_api.rest.company',
            6 => 'test_api.rpc.user-posts',
        ],
    ],
    'zf-rest' => [
        'test_api\\V1\\Rest\\Address\\Controller' => [
            'listener' => 'test_api\\V1\\Rest\\Address\\AddressResource',
            'route_name' => 'test_api.rest.address',
            'route_identifier_name' => 'address_id',
            'collection_name' => 'address',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
                2 => 'PUT',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \test_api\V1\Rest\Address\AddressEntity::class,
            'collection_class' => \test_api\V1\Rest\Address\AddressCollection::class,
            'service_name' => 'address',
        ],
        'test_api\\V1\\Rest\\Users\\Controller' => [
            'listener' => 'test_api\\V1\\Rest\\Users\\UsersResource',
            'route_name' => 'test_api.rest.users',
            'route_identifier_name' => 'users_id',
            'collection_name' => 'users',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
                4 => 'POST',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
                2 => 'PUT',
                3 => 'PATCH',
                4 => 'DELETE',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \test_api\V1\Rest\Users\UsersEntity::class,
            'collection_class' => \test_api\V1\Rest\Users\UsersCollection::class,
            'service_name' => 'users',
        ],
        'test_api\\V1\\Rest\\Posts\\Controller' => [
            'listener' => 'test_api\\V1\\Rest\\Posts\\PostsResource',
            'route_name' => 'test_api.rest.posts',
            'route_identifier_name' => 'id',
            'collection_name' => 'posts',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
                4 => 'POST',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
                2 => 'PUT',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \test_api\V1\Rest\Posts\PostsEntity::class,
            'collection_class' => \test_api\V1\Rest\Posts\PostsCollection::class,
            'service_name' => 'posts',
        ],
        'test_api\\V1\\Rest\\Company\\Controller' => [
            'listener' => 'test_api\\V1\\Rest\\Company\\CompanyResource',
            'route_name' => 'test_api.rest.company',
            'route_identifier_name' => 'company_id',
            'collection_name' => 'company',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \test_api\V1\Rest\Company\CompanyEntity::class,
            'collection_class' => \test_api\V1\Rest\Company\CompanyCollection::class,
            'service_name' => 'company',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'test_api\\V1\\Rest\\Address\\Controller' => 'HalJson',
            'test_api\\V1\\Rest\\Users\\Controller' => 'HalJson',
            'test_api\\V1\\Rpc\\UserImport\\Controller' => 'Json',
            'test_api\\V1\\Rest\\Posts\\Controller' => 'HalJson',
            'test_api\\V1\\Rpc\\PostsImport\\Controller' => 'Json',
            'test_api\\V1\\Rpc\\UserPosts\\Controller' => 'Json',
            'test_api\\V1\\Rest\\Company\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'test_api\\V1\\Rest\\Address\\Controller' => [
                0 => 'application/vnd.test_api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'test_api\\V1\\Rest\\Users\\Controller' => [
                0 => 'application/vnd.test_api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'test_api\\V1\\Rpc\\UserImport\\Controller' => [
                0 => 'application/vnd.test_api.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'test_api\\V1\\Rest\\Posts\\Controller' => [
                0 => 'application/vnd.test_api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'test_api\\V1\\Rpc\\PostsImport\\Controller' => [
                0 => 'application/vnd.test_api.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'test_api\\V1\\Rpc\\UserPosts\\Controller' => [
                0 => 'application/vnd.test_api.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
                3 => 'application/vnd.test_api.v1+json',
                4 => 'application/json',
                5 => 'application/*+json',
            ],
            'test_api\\V1\\Rest\\Company\\Controller' => [
                0 => 'application/vnd.test_api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'test_api\\V1\\Rest\\Address\\Controller' => [
                0 => 'application/vnd.test_api.v1+json',
                1 => 'application/json',
            ],
            'test_api\\V1\\Rest\\Users\\Controller' => [
                0 => 'application/vnd.test_api.v1+json',
                1 => 'application/json',
            ],
            'test_api\\V1\\Rpc\\UserImport\\Controller' => [
                0 => 'application/vnd.test_api.v1+json',
                1 => 'application/json',
            ],
            'test_api\\V1\\Rest\\Posts\\Controller' => [
                0 => 'application/vnd.test_api.v1+json',
                1 => 'application/json',
            ],
            'test_api\\V1\\Rpc\\PostsImport\\Controller' => [
                0 => 'application/vnd.test_api.v1+json',
                1 => 'application/json',
            ],
            'test_api\\V1\\Rpc\\UserPosts\\Controller' => [
                0 => 'application/vnd.test_api.v1+json',
                1 => 'application/json',
                2 => 'application/vnd.test_api.v1+json',
                3 => 'application/json',
            ],
            'test_api\\V1\\Rest\\Company\\Controller' => [
                0 => 'application/vnd.test_api.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \test_api\V1\Rest\Address\AddressEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'test_api.rest.address',
                'route_identifier_name' => 'address_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \test_api\V1\Rest\Address\AddressCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'test_api.rest.address',
                'route_identifier_name' => 'address_id',
                'is_collection' => true,
            ],
            \test_api\V1\Rest\Users\UsersEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'test_api.rest.users',
                'route_identifier_name' => 'users_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \test_api\V1\Rest\Users\UsersCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'test_api.rest.users',
                'route_identifier_name' => 'users_id',
                'is_collection' => true,
            ],
            \test_api\V1\Rest\Posts\PostsEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'test_api.rest.posts',
                'route_identifier_name' => 'id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \test_api\V1\Rest\Posts\PostsCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'test_api.rest.posts',
                'route_identifier_name' => 'id',
                'is_collection' => true,
            ],
            \test_api\V1\Rest\Company\CompanyEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'test_api.rest.company',
                'route_identifier_name' => 'company_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \test_api\V1\Rest\Company\CompanyCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'test_api.rest.company',
                'route_identifier_name' => 'company_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-apigility' => [
        'db-connected' => [
            'test_api\\V1\\Rest\\Address\\AddressResource' => [
                'adapter_name' => 'db',
                'table_name' => 'address',
                'hydrator_name' => \Zend\Hydrator\ArraySerializable::class,
                'controller_service_name' => 'test_api\\V1\\Rest\\Address\\Controller',
                'entity_identifier_name' => 'id',
                'table_service' => 'test_api\\V1\\Rest\\Address\\AddressResource\\Table',
            ],
            'test_api\\V1\\Rest\\Users\\UsersResource' => [
                'adapter_name' => 'db',
                'table_name' => 'users',
                'hydrator_name' => \Zend\Hydrator\ArraySerializable::class,
                'controller_service_name' => 'test_api\\V1\\Rest\\Users\\Controller',
                'entity_identifier_name' => 'id',
                'table_service' => 'test_api\\V1\\Rest\\Users\\UsersResource\\Table',
            ],
            'test_api\\V1\\Rest\\Posts\\PostsResource' => [
                'adapter_name' => 'db',
                'table_name' => 'posts',
                'hydrator_name' => \Zend\Hydrator\ArraySerializable::class,
                'controller_service_name' => 'test_api\\V1\\Rest\\Posts\\Controller',
                'entity_identifier_name' => 'id',
                'table_service' => 'test_api\\V1\\Rest\\Posts\\PostsResource\\Table',
            ],
            'test_api\\V1\\Rest\\Company\\CompanyResource' => [
                'adapter_name' => 'db',
                'table_name' => 'company',
                'hydrator_name' => \Zend\Hydrator\ArraySerializable::class,
                'controller_service_name' => 'test_api\\V1\\Rest\\Company\\Controller',
                'entity_identifier_name' => 'id',
            ],
        ],
    ],
    'zf-content-validation' => [
        'test_api\\V1\\Rest\\Users\\Controller' => [
            'input_filter' => 'test_api\\V1\\Rest\\Users\\Validator',
        ],
        'test_api\\V1\\Rest\\Posts\\Controller' => [
            'input_filter' => 'test_api\\V1\\Rest\\Posts\\Validator',
        ],
        'test_api\\V1\\Rest\\Company\\Controller' => [
            'input_filter' => 'test_api\\V1\\Rest\\Company\\Validator',
        ],
        'test_api\\V1\\Rpc\\UserPosts\\Controller' => [
            'input_filter' => 'test_api\\V1\\Rpc\\UserPosts\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'test_api\\V1\\Rest\\Users\\Validator' => [
            0 => [
                'name' => 'name',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '128',
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'username',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '32',
                        ],
                    ],
                ],
            ],
            2 => [
                'name' => 'email',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '128',
                        ],
                    ],
                ],
            ],
            3 => [
                'name' => 'phone',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '24',
                        ],
                    ],
                ],
            ],
            4 => [
                'name' => 'website',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '124',
                        ],
                    ],
                ],
            ],
        ],
        'test_api\\V1\\Rest\\Posts\\Validator' => [
            0 => [
                'name' => 'title',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '128',
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'body',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '65535',
                        ],
                    ],
                ],
            ],
        ],
        'test_api\\V1\\Rest\\Company\\Validator' => [
            0 => [
                'name' => 'name',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '128',
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'catchPhrase',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '128',
                        ],
                    ],
                ],
            ],
            2 => [
                'name' => 'bs',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '128',
                        ],
                    ],
                ],
            ],
            3 => [
                'name' => 'id_usuario',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\Digits::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => 'ZF\\ContentValidation\\Validator\\DbRecordExists',
                        'options' => [
                            'adapter' => 'db',
                            'table' => 'users',
                            'field' => 'id',
                        ],
                    ],
                ],
            ],
        ],
        'test_api\\V1\\Rpc\\UserPosts\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => 'ZF\\ContentValidation\\Validator\\DbRecordExists',
                        'options' => [
                            'adapter' => 'db',
                            'field' => 'userId',
                            'table' => 'posts',
                        ],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                        'options' => [],
                    ],
                    1 => [
                        'name' => \Zend\Filter\Digits::class,
                        'options' => [],
                    ],
                ],
                'name' => 'userId',
                'field_type' => 'int',
                'error_message' => 'userId not is required',
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            'test_api\\V1\\Rpc\\UserImport\\Controller' => \test_api\V1\Rpc\UserImport\UserImportControllerFactory::class,
            'test_api\\V1\\Rpc\\PostImport\\Controller' => 'test_api\\V1\\Rpc\\PostImport\\PostImportControllerFactory',
            'test_api\\V1\\Rpc\\PostsImport\\Controller' => \test_api\V1\Rpc\PostsImport\PostsImportControllerFactory::class,
            'test_api\\V1\\Rpc\\UserPosts\\Controller' => \test_api\V1\Rpc\UserPosts\UserPostsControllerFactory::class,
        ],
    ],
    'zf-rpc' => [
        'test_api\\V1\\Rpc\\UserImport\\Controller' => [
            'service_name' => 'UserImport',
            'http_methods' => [
                0 => 'POST',
            ],
            'route_name' => 'test_api.rpc.user-import',
        ],
        'test_api\\V1\\Rpc\\PostsImport\\Controller' => [
            'service_name' => 'PostsImport',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'test_api.rpc.posts-import',
        ],
        'test_api\\V1\\Rpc\\UserPosts\\Controller' => [
            'service_name' => 'UserPosts',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'test_api.rpc.user-posts',
        ],
    ],
];
