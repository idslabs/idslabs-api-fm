<?php
return array(
    'router' => array(
        'routes' => array(
            'image.rest.image' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/v1/image[/:image_id]',
                    'defaults' => array(
                        'controller' => 'FileManager\\Image\\V1\\Rest\\Image\\Controller',
                    ),
                ),
            ),
            'image.rest.images' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/v1/images',
                    'defaults' => array(
                        'controller' => 'FileManager\\Image\\V1\\Rest\\Images\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'hydrators' => array(
        'factories' => array(
            'FileManager\\Image\\Entity\\Hydrator' => 'FileManager\\Image\\Service\\Factory\DoctrineObjectHydratorFactory',
        ),
        'shared' => array(
            'FileManager\\Image\\Entity\\Hydrator' => true
        )
    ),
    'service_manager' => array(
        'invokables' => array(
            'FileManager\\Image\\Mapper\\Image'  => 'FileManager\\Image\\Mapper\\Adapter\\DoctrineORMImage',
            'FileManager\\Image\\Mapper\\User'   => 'FileManager\\Image\\Mapper\\Adapter\\DoctrineORMUser',
            'FileManager\\Image\\Service\\Image' => 'FileManager\\Image\\Service\\Image',
            'FileManager\\Image\\SharedEventListener' => 'FileManager\\Image\\Service\\SharedEventListener',
            'FileManager\\Image\\Authorization\\AclImageListener'    =>
                'FileManager\\Image\\Authorization\\AclImageListener',
            'FileManager\\Image\\Authorization\\AclScopeListener' =>
                'FileManager\\Image\\Authorization\\AclScopeListener',
            'FileManager\\Image\\V1\\Rest\\Image\\ImageResource'   =>
                'FileManager\\Image\\V1\\Rest\\Image\\ImageResource',
            'FileManager\\Image\\V1\\Rest\\Images\\ImagesResource' =>
                'FileManager\\Image\\V1\\Rest\\Images\\ImagesResource',
            'FileManager\\Image\\Stdlib\\Hydrator\\Strategy\\AssetManagerResolverStrategy' =>
                'FileManager\\Image\\Stdlib\\Hydrator\\Strategy\\AssetManagerResolverStrategy'
        ),
        'factories' => array(
            'image.authenticated.user' => 'FileManager\\Image\\Service\\Factory\\AuthUserFactory',
            'image.requested.image'    => 'FileManager\\Image\\Service\\Factory\\RequestedImageFactory'
        ),
        'aliases' => array(
            'ZF\OAuth2\Provider\UserId' => 'ZF\OAuth2\Provider\UserId\AuthenticationService',
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'image.rest.image',
            1 => 'image.rest.images',
        ),
    ),
    'zf-rest' => array(
        'FileManager\\Image\\V1\\Rest\\Image\\Controller' => array(
            'listener' => 'FileManager\\Image\\V1\\Rest\\Image\\ImageResource',
            'route_name' => 'image.rest.image',
            'route_identifier_name' => 'image_id',
            'collection_name' => 'image',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'FileManager\\Image\\Entity\\Image',
            'collection_class' => 'FileManager\\Image\\V1\\Rest\\Image\\ImageCollection',
            'service_name' => 'FileManager\\Image',
        ),
        'FileManager\\Image\\V1\\Rest\\Images\\Controller' => array(
            'listener' => 'FileManager\\Image\\V1\\Rest\\Images\\ImagesResource',
            'route_name' => 'image.rest.images',
            'route_identifier_name' => 'images_id',
            'collection_name' => 'images',
            'entity_http_methods' => array(),
            'collection_http_methods' => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(
               0 => 'page'
            ),
            'page_size' => 5,
            'page_size_param' => null,
            'entity_class' => 'FileManager\\Image\\V1\\Rest\\Images\\ImagesEntity',
            'collection_class' => 'FileManager\\Image\\V1\\Rest\\Images\\ImagesCollection',
            'service_name' => 'FileManager\\Images',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'FileManager\\Image\\V1\\Rest\\Image\\Controller' => 'HalJson',
            'FileManager\\Image\\V1\\Rest\\Images\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'FileManager\\Image\\V1\\Rest\\Image\\Controller' => array(
                0 => 'application/vnd.image.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'FileManager\\Image\\V1\\Rest\\Images\\Controller' => array(
                0 => 'application/vnd.image.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'FileManager\\Image\\V1\\Rest\\Image\\Controller' => array(
                0 => 'application/vnd.image.v1+json',
                1 => 'application/json',
                2 => 'multipart/form-data',
                3 => 'image/jpeg',
                4 => 'image/png',
                5 => 'image/jpg',
            ),
            'FileManager\\Image\\V1\\Rest\\Images\\Controller' => array(
                0 => 'application/vnd.image.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'FileManager\\Image\\Entity\\Image' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'image.rest.image',
                'route_identifier_name' => 'image_id',
                'hydrator' => 'FileManager\\Image\\Entity\\Hydrator',
            ),
            'FileManager\\Image\\V1\\Rest\\Images\\ImagesCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'image.rest.images',
                'route_identifier_name' => 'images_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-content-validation' => array(
        'FileManager\\Image\\V1\\Rest\\Image\\Controller' => array(
            'input_filter' => 'FileManager\\Image\\V1\\Rest\\Image\\Validator',
        ),
    ),
    'zf-mvc-auth' => array(
        'authorization' => array(
            'FileManager\\Image\\V1\\Rest\\Image\\Controller' => array(
                'entity' => array(
                    'GET' => true,
                    'PATCH' => true,
                    'DELETE' => true,
                ),
                'collection' => array(
                    'POST' => true,
                )
            ),
            'FileManager\\Image\\V1\\Rest\\Images\\Controller' => array(
                'collection' => array(
                    'GET' => true,
                ),
            ),
        ),
    ),
    'input_filter_specs' => array(
        'FileManager\\Image\\V1\\Rest\\Image\\Validator' => array(
            0 => array(
                'required' => true,
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\NotEmpty',
                        'options' => array(),
                    ),
                    1 => array(
                        'name' => 'Zend\\I18n\\Validator\\Alnum',
                        'options' => array(
                            'allowwhitespace' => true,
                        ),
                    ),
                ),
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                        'options' => array(),
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                        'options' => array(),
                    ),
                ),
                'name' => 'description',
                'description' => 'FileManager\\Image Description',
                'error_message' => 'Description should be filled',
            ),
            1 => array(
                'required' => true,
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\File\\Extension',
                        'options' => array(
                            0 => 'jpg',
                            1 => 'png',
                        ),
                    ),
                ),
                'filters' => array(),
                'name' => 'image',
                'description' => 'FileManager\\Image File',
                'type' => 'Zend\\InputFilter\\FileInput',
                'error_message' => 'File should be uploaded',
            ),
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            'image_db_driver' => array(
                'class' => 'Doctrine\\ORM\\Mapping\\Driver\\YamlDriver',
                'paths' => array(
                    0 => __DIR__ . '/entity',
                ),
                'cache' => 'array',
            ),
            'orm_default' => array(
                'drivers' => array(
                    'FileManager\\Image\\Entity' => 'image_db_driver',
                ),
            ),
        ),
    ),
    'data-fixture' => array(
        'fixtures' => __DIR__ . '/../src/FileManager/Image/Fixture'
    ),
    'asset_manager' => array(
        'resolver_configs' => array(
            'paths' => array(
                'data/upload',
            ),
        ),
    ),
    'images' => array(
        'asset_manager_resolver_path' => 'data/upload',
        'target' => 'data/upload/images/img',
        'thumb_path' => 'data/upload/images/thumbs',
        'ori_path'   => 'data/upload/images/ori',
    ),
    'authorization' => array(
        'scopes' => array(
            'post' => array(
                // 'resource' => 'FileManager\Image\V1\Rest\Image\Controller::collection',
                // 'method' => 'POST',
            ),
            'update' => array(
                // 'resource' => 'FileManager\Image\V1\Rest\Image\Controller::entity',
                // 'method' => 'PATCH',
            ),
            'delete' => array(
                // 'resource' => 'FileManager\Image\V1\Rest\Image\Controller::entity',
                // 'method' => 'DELETE',
            )
        )
    ),
);
