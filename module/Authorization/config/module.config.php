<?php
return array(
    'router' => array(
        'routes' => array(
            
            'authorization' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/authorization',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Authorization\Controller',
                        'controller'    => 'ServiceGroups',
                        'action'        => 'list-service-groups',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'MvcTranslator' => 'Zend\I18n\Translator\TranslatorServiceFactory'   
        )
    ),
    'MvcTranslator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Authorization\Controller\ServiceGroups' => 'Authorization\Controller\ServiceGroupsController',
            'Authorization\Controller\Services' => 'Authorization\Controller\ServicesController',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'         => __DIR__ . '/../view/layout/users.phtml',
            'users/index/index' => __DIR__ . '/../view/users/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    )
);