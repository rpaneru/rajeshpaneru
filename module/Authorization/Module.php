<?php 
namespace Authorization;

use Zend\Mvc\MvcEvent;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable as DbTableAuthAdapter;

use Authorization\Model\AccessControl;
use Authorization\Model\ServiceGroups;
use Authorization\Model\ServiceGroupsTable;
use Authorization\Model\Services;
use Authorization\Model\ServicesTable;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $event = $e->getApplication()->getEventManager();
        
        $event->attach('dispatch', function($e) 
        {
            $sm = $e-> getTarget()-> getServiceManager();
            $match = $e->getRouteMatch();
            $controller = $match-> getParam('controller');
            $action     = $match-> getParam('action');
            //$routeName = $match->getMatchedRouteName();
            
            $authService = $sm-> get('AuthService');
            if($authService-> hasIdentity())
            {                    
                $userTypeId = $authService-> getIdentity()-> userTypeId;                            
            }
            else
            {
                $userTypeId = '1'; 
            }

            $viewModel = $e->getViewModel();
            $viewModel-> setVariable('userTypeId',$userTypeId);                        

            $accessCheck = new AccessControl($sm);
            $isAllowed = $accessCheck-> checkAccess($action,$userTypeId);

            //echo 'controller => '.$controller.'<br />action => '.$action.'<br />userTypeId => '.$userTypeId;
            
            if(!$isAllowed)
            {
                $redirectUrl = "/application/index/index";

                $response = $e->getResponse();
                $response->getHeaders()->addHeaderLine('Location',$redirectUrl);
                $response->setStatusCode(302);

                $response->sendHeaders();
                exit();                    
            }                     

            },1000);						
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
                'Authorization\Model\ServiceGroupsTable' => function($sm)
                {                                        
                    $dbAdapter = $sm-> get('Zend\Db\Adapter\Adapter');
                    $tableGateway = $sm->get('ServiceGroupsTableGateway');
                    $table = new ServiceGroupsTable($dbAdapter,$tableGateway);
                    return $table;
                },
                'ServiceGroupsTableGateway' => function($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new ServiceGroups());
                    return new TableGateway('service_groups',$dbAdapter,null,$resultSetPrototype);
                },
                'Authorization\Model\ServicesTable' => function($sm)
                {                                        
                    $dbAdapter = $sm-> get('Zend\Db\Adapter\Adapter');
                    $tableGateway = $sm->get('ServicesTableGateway');
                    $table = new ServicesTable($dbAdapter,$tableGateway);
                    return $table;
                },
                'ServicesTableGateway' => function($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Services());
                    return new TableGateway('services',$dbAdapter,null,$resultSetPrototype);
                }
           ),
        );
    }
    
}
?>
