<?php
return array(
    
    'db' => array(
        'driver'         => 'Pdo',
        'dsn'            => 'mysql:dbname=rajeshpaneru;host=localhost',
        'driver_options' => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        ),  
    ),
    'service_manager' => array(
        'factories' => array(
            'Zend\Db\Adapter\Adapter'
                    => 'Zend\Db\Adapter\AdapterServiceFactory',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',        
        'translation_file_patterns' => array(
            array(
                'type'     => 'phpArray',
               'base_dir' => __DIR__ . '/../../language',
                'pattern'  => '%s.php',
            ),
        ),
    ),
    'module_layouts' => array(
        'Application' => 'layout/application.phtml',
        'Users' => 'layout/users.phtml'
    ),
    'custom_paths' => array(
        'userImagePath' => 'http://rajeshpaneru/user_images/'
    ),
);