<?php 
namespace Authorization;

use Zend\Mvc\MvcEvent;
use Authorization\Model\AccessControl;
use Zend\Filter\Word;

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

//            if(!$isAllowed)
//            {
//                $redirectUrl = "/application/index/index";
//
//                $response = $e->getResponse();
//                $response->getHeaders()->addHeaderLine('Location',$redirectUrl);
//                $response->setStatusCode(302);
//
//                $response->sendHeaders();
//                exit();                    
//            }                     

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
    
}

?>
