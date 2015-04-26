<?php
namespace Application;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable as DbTableAuthAdapter;

use Application\Model\IndianStates;
use Application\Model\IndianStatesTable;

use Application\Model\Countries;
use Application\Model\CountriesTable;

use Application\Model\EmailRelayer;
use Application\Model\EmailRelayerTable;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager = $e->getApplication()->getEventManager();        
        
        $eventManager->getSharedManager()->attach('Zend\Mvc\Controller\AbstractActionController', 'dispatch', function($e) {
            $controller = $e->getTarget();
            $controllerClass = get_class($controller);
            $moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));
            $config = $e->getApplication()->getServiceManager()->get('config');
            
                if (isset($config['module_layouts'][$moduleNamespace])) {
                    $controller->layout($config['module_layouts'][$moduleNamespace]);
                }
                $viewModel = $e->getApplication()->getMvcEvent()->getViewModel();
                $viewModel->userImagePath = $config["custom_paths"]["userImagePath"];
                
        }, 100);
        
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        
        $eventManager->attach(MvcEvent::EVENT_DISPATCH_ERROR, function(MvcEvent $event) {
            $viewModel = $event->getViewModel();
            $viewModel->setTemplate('layout/404');
        }, -200);
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
    
    public function getViewHelperConfig()
    {
        return array(
            'factories' => array(
                'getValue' => function ($sm) {
                    $locator = $sm->getServiceLocator();
                    $viewHelper = new View\Helper\GetValue($locator->get('Zend\Db\Adapter\Adapter'));
                    return $viewHelper;
                },
                'getRowCount' => function ($sm) {
                    $locator = $sm->getServiceLocator();
                    $viewHelper = new View\Helper\GetRowCount($locator->get('Zend\Db\Adapter\Adapter'));
                    return $viewHelper;
                },
                'dateFormatIndia' => function ($sm) {
                    $locator = $sm->getServiceLocator();
                    $viewHelper = new View\Helper\DateFormatIndia();
                    return $viewHelper;
                },
                'DateFormatDatabase' => function ($sm) {
                    $locator = $sm->getServiceLocator();
                    $viewHelper = new View\Helper\DateFormatDatabase();
                    return $viewHelper;
                }
            ),
        );
    }
    
    public function getServiceConfig()
    {
        return array(
           'factories' => array( 
               
               'Application\Model\IndianStatesTable' => function($sm)
                {                                        
                    $dbAdapter = $sm-> get('Zend\Db\Adapter\Adapter');
                    $tableGateway = $sm->get('IndianStatesTableGateway');
                    $table = new IndianStatesTable($dbAdapter,$tableGateway);
                    return $table;
                },
                'IndianStatesTableGateway' => function($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new IndianStates());
                    return new TableGateway('indian_states',$dbAdapter,null,$resultSetPrototype);
                },
                        
                'Application\Model\CountriesTable' => function($sm)
                {                                        
                    $dbAdapter = $sm-> get('Zend\Db\Adapter\Adapter');
                    $tableGateway = $sm->get('CountriesTableGateway');
                    $table = new CountriesTable($dbAdapter,$tableGateway);
                    return $table;
                },
                'CountriesTableGateway' => function($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Countries());
                    return new TableGateway('countries',$dbAdapter,null,$resultSetPrototype);
                },
                        
                'Application\Model\EmailRelayerTable' => function($sm)
                {                                        
                    $dbAdapter = $sm-> get('Zend\Db\Adapter\Adapter');
                    $tableGateway = $sm->get('EmailRelayerTableGateway');
                    $table = new EmailRelayerTable($dbAdapter,$tableGateway);
                    return $table;
                },
                'EmailRelayerTableGateway' => function($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new EmailRelayer());
                    return new TableGateway('email_relayer',$dbAdapter,null,$resultSetPrototype);
                }
           ),
        );
    }
}