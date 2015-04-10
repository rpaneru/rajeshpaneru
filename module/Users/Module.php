<?php
namespace Users;

use Zend\Mvc\MvcEvent;
use Zend\Mvc\ModuleRouteListener;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable as DbTableAuthAdapter;

use Users\Model\Users;
use Users\Model\UsersTable;

class Module implements AutoloaderProviderInterface, ConfigProviderInterface
{
    public function onBootstrap(MvcEvent $e)
    {
        $e->getApplication()->getServiceManager()->get('MvcTranslator');
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        
        $helperPluginManger = $e->getApplication()->getServiceManager()->get('ViewHelperManager');

        
        $e->getApplication()->getEventManager()->getSharedManager()
        ->attach('Zend\Mvc\Controller\AbstractActionController', 'dispatch', function($e) {
            $controller = $e->getTarget();
            $controllerClass = get_class($controller);
            $arr = explode('\\',$controllerClass);
            $controllerStr = str_replace('Controller','',$arr[count($arr) -1]);
            
            $userDetails = $e->getApplication()->getServiceManager()->get('AuthService')-> getIdentity();
                                 
            $controller->layout()->setVariable('userDetails',  $userDetails); 
            
      }, 100);
          
    }
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getServiceConfig()
    {
        return array(
           'factories' => array( 
               
                'AuthService' => function($sm)
                {
                    $dbAdapter = $sm-> get('Zend\Db\Adapter\Adapter');
                    
                    $dbTableAuthAdapter = new DbTableAuthAdapter($dbAdapter,'users','email','password','MD5(?)');
                    $authService = new AuthenticationService();
                    $authService-> setAdapter($dbTableAuthAdapter);

                    return $authService;
                },
                'Users\Model\UsersTable' => function($sm)
                {
                    $tableGateway = $sm->get('UsersTableGateway');
                    $table = new UsersTable($tableGateway);
                    return $table;
                },
                'UsersTableGateway' => function($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Users());
                    return new TableGateway('users',$dbAdapter,null,$resultSetPrototype);
                }
           ),
        );
    }
}